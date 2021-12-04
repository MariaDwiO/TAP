<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
// use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('name', 'ASC');

        $keyword = $request->search;
        // dd($keyword);

        if (request('search')) {
            $products = $products->where('name', 'like', '%' . $keyword . '%')
                ->orwhere('name_siswa', 'like', '%' . $keyword . '%');
        }

        $this->data['products'] = $products->paginate(5);

        return view('admin.products.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('name', 'ASC')->get();

        $this->data['productID'] = 0;
        $this->data['product'] = null;
        $this->data['categories'] = $category->toArray();
        $this->data['product'] = null;
        $this->data['categoryIDs'] = [];

        return view('admin.products.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pro = $request->except('_token');
        // dd($pro);

        $request->validate([
            'name_siswa' => 'required|max:255',
            'telephone' => 'required|max:12',
            'name' => 'required|max:255',
            'price' =>  'required',
            'pengerjaan' => 'required',
            'image' => 'required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:1024',
            'description' => 'required',
            'category_IDs' => 'required',
        ]);
        //  return $request;

        if ($request->file('image')) {
            $img = $request->file('image');
            $name = time() . '_' . $img->getClientOriginalExtension();
            $file = 'product-images';
            $filePath = $img->storeAs($file, $name, 'public');
        }

        $id_category = $pro['category_IDs'];

        $category = Category::findOrFail($id_category);
        $kategory = $category->first()->slug;
        // var_dump($kategory);

        $product = ([
            'name_siswa' => $pro['name_siswa'],
            'telephone' => $pro['telephone'],
            'name' => $pro['name'],
            'slug' => \Str::slug($pro['name']),
            'price' => $pro['price'],
            'pengerjaan' => $pro['pengerjaan'],
            'image' => $filePath,
            'description' => $pro['description'],
            'kategori' => $kategory,
        ]);
        // var_dump($product);


        $save = false;
        $save = DB::transaction(function () use ($product, $pro) {
            $products = Product::create($product);
            $products->categories()->sync($pro['category_IDs']);

            return true;
        });

        if ($save) {
            Session::flash('Success', 'Product has been create');
        } else {
            Session::flash('Error', 'Product could not be create!');
        }

        return redirect('admin/products')->with('Success', 'Product berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findorFail($id);
        $categories = Category::orderBy('name', 'ASC')->get();

        $this->data['product'] = $products;
        $this->data['productID'] = $products->id;
        $this->data['product'] = $products;
        $this->data['categories'] = $categories->toArray();
        $this->data['categoryIDs'] = $products->categories->pluck('id')->toArray();

        return view('admin.products.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $params = $request->except('_token');
        $img = $params['image'];
        // var_dump ($img );

        $this->data['slug'] = Str::slug($params['name']);
        // var_dump($params);

        $products = Product::findOrFail($id);
        $categories = Category::orderBy('name', 'ASC')->get();

        $this->data['product'] = $products;
        $this->data['categories'] = $categories->toArray();
        $this->data['categoryIDs'] = $products->categories->pluck('id')->toArray();

        $id_category = $params['category_IDs'];
        $gambar = $products->image;
        $category = Category::findOrFail($id_category);
        $kategory = $category->first()->slug;
        // var_dump($kategory);

        $product = ([
            'name_siswa' => $params['name_siswa'],
            'telephone' => $params['telephone'],
            'name' => $params['name'],
            'slug' => \Str::slug($params['name']),
            'price' => $params['price'],
            'pengerjaan' => $params['pengerjaan'],
            'image' => $gambar,
            'description' => $params['description'],
            'kategori' => $kategory,
        ]);


        $save = false;
        $save = DB::transaction(function () use ($params, $products,  $product) {
            $products->update($product);
            $products->categories()->sync($params['category_IDs']);

            return true;
        });

        if ($save) {
            Session::flash('Success', 'Product has been update');
        } else {
            Session::flash('Error', 'Product could not be update!');
        }

        return redirect('admin/products')->with('Success', 'Product berhasil terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products  = Product::findOrFail($id);

        if ($products->delete()) {
            Session::flash('success', 'Product has been deleted');
        }
        return redirect('admin/products');
    }
}
