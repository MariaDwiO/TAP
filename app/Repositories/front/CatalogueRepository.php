<?php

namespace App\Repositories\Front;

use App\Repositories\Front\Interfaces\CatalogueRepositoryInterface;

use App\Models\Product;
use App\Models\Category;
use App\Models\AttributeOption;
use App\Models\ProductAttributeValue;
// use App\Models\Cost;
// use App\Models\State;

use Str;

class CatalogueRepository implements CatalogueRepositoryInterface
{
    public function paginate($perPage, $request)
    {
        $products = Product::active();
        $products = $this->searchProducts($products, $request);
        $products = $this->filterProductsByPriceRange($products, $request);
        $products = $this->sortProducts($products, $request);

        return $products->paginate($perPage);
    }

    public function findBySlug($slug)
    {
        return Product::active()->where('slug', $slug)->firstOrFail();
    }

    public function findBySKU($sku)
    {
        return Product::active()->where('sku', $sku)->firstOrFail();
    }

    public function findProductByID($productID)
    {
        return Product::findOrFail($productID);
    }

    public function getParentCategories()
    {
        return Category::parentCategories()
            ->orderBy('name', 'asc')
            ->get();
    }

    /**
     * Search products
     *
     * @param array   $products array of products
     * @param Request $request  request param
     *
     * @return \Illuminate\Http\Response
     */
    private function searchProducts($products, $request)
    {
        if ($q = $request->query('q')) {
            $q = str_replace('-', ' ', Str::slug($q));

            $products = $products->whereRaw('MATCH(name, slug, price, name_siswa, description) AGAINST (? IN NATURAL LANGUAGE MODE)', [$q]);

            $this->data['q'] = $q;
        }

        if ($categorySlug = $request->query('category')) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();

            $childIds = Category::childIds($category->id);
            $categoryIds = array_merge([$category->id], $childIds);

            $products = $products->whereHas(
                'categories',
                function ($query) use ($categoryIds) {
                    $query->whereIn('categories.id', $categoryIds);
                }
            );
        }

        // if ($costSlug = $request->query('cost')) {
        //     $cost = Cost::where('slug', $costSlug)->firstOrFail();

        //     $childIds = Cost::childIds($cost->id);
        //     $costIds = array_merge([$cost->id], $childIds);

        //     $products = $products->whereHas(
        //         'costs',
        //         function ($query) use ($costIds) {
        //             $query->whereIn('costs.id', $costIds);
        //         }
        //     );
        // }

        // if ($stateSlug = $request->query('state')) {
        //     $state = State::where('slug', $stateSlug)->firstOrFail();

        //     $childIds = State::childIds($state->id);
        //     $stateIds = array_merge([$state->id], $childIds);

        //     $products = $products->whereHas(
        //         'states',
        //         function ($query) use ($stateIds) {
        //             $query->whereIn('states.id', $stateIds);
        //         }
        //     );
        // }
        return $products;
    }

    /**
     * Filter products by price range
     *
     * @param array   $products array of products
     * @param Request $request  request param
     *
     * @return \Illuminate\Http\Response
     */
    private function filterProductsByPriceRange($products, $request)
    {
        $lowPrice = null;
        $highPrice = null;

        if ($priceSlider = $request->query('price')) {
            $prices = explode('-', $priceSlider);

            $lowPrice = !empty($prices[0]) ? (float)$prices[0] : $this->data['minPrice'];
            $highPrice = !empty($prices[1]) ? (float)$prices[1] : $this->data['maxPrice'];

            if ($lowPrice && $highPrice) {
                $products = $products->where('price', '>=', $lowPrice)
                    ->where('price', '<=', $highPrice)
                    ->orWhereHas(
                        'variants',
                        function ($query) use ($lowPrice, $highPrice) {
                            $query->where('price', '>=', $lowPrice)
                                ->where('price', '<=', $highPrice);
                        }
                    );
                $this->data['minPrice'] = $lowPrice;
                $this->data['maxPrice'] = $highPrice;
            }
        }
        return $products;
    }

    /**
     * Filter products by attribute
     *
     * @param array   $products array of products
     * @param Request $request  request param
     *
     * @return \Illuminate\Http\Response
     */
    private function filterProductsByAttribute($products, $request)
    {
        if ($attributeOptionID = $request->query('option')) {
            $attributeOption = AttributeOption::findOrFail($attributeOptionID);

            $products = $products->whereHas(
                'ProductAttributeValues',
                function ($query) use ($attributeOption) {
                    $query->where('attribute_id', $attributeOption->attribute_id)
                        ->where('text_value', $attributeOption->name);
                }
            );
        }
        return $products;
    }

    /**
     * Sort products
     *
     * @param array   $products array of products
     * @param Request $request  request param
     *
     * @return \Illuminate\Http\Response
     */
    private function sortProducts($products, $request)
    {
        if ($sort = preg_replace('/\s+/', '', $request->query('sort'))) {
            $availableSorts = ['price', 'created_at'];
            $availableOrder = ['asc', 'desc'];
            $sortAndOrder = explode('-', $sort);

            $sortBy = strtolower($sortAndOrder[0]);
            $orderBy = strtolower($sortAndOrder[1]);

            if (in_array($sortBy, $availableSorts) && in_array($orderBy, $availableOrder)) {
                $products = $products->orderBy($sortBy, $orderBy);
            }

            $this->data['selectedSort'] = url('products?sort=' . $sort);
        }
        return $products;
    }
}
