<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductImageRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Facades\Image;
use App\Models\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = Product::orderBy('name', 'ASC')->paginate(5);
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
        // $product = Product::orderBy('name', 'ASC')->get();

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
        $validatedata = $request->validate([
            'name_siswa' => 'required|max:255',
            'telephone' => 'required|max:12',
            'name' => 'required|max:255',
            'price' =>  'required',
            'pengerjaan' => 'required',
            'category_IDs' => 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg|max:1024',
            'description' => 'required',
        ]);
        $validatedata['user_id'] = Auth::user()->id;
        $validatedata['slug'] = Str::slug($request['name']);

        if ($request->file('image')) {
            $validatedata['image'] = $request->file('image')->store('product-images');
        }

        Product::create($validatedata);
        // $params = $request->except('_token');
        // $params['slug'] = Str::slug($params['name']);
        // $params['user_id'] = Auth::user()->id;

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     // $name = $product->slug . '_' . time();
        //     $fileName = $image->getClientOriginalExtension();

        //     $folder = '/product-images';
        //     $filePath = $image->storeAs($folder, $fileName, 'public');
        //     $image = $filePath;
        //     $product = Product::create([
        //         'image_product' => $image,
        //     ]);
        //     $product->save();
        // }

        // $save = false;
        // $save = DB::transaction(function () use ($params) {
        //     $product = Product::create($params);
        //     $product->categories()->sync($params['category_IDs']);

        //     return true;
        // });

        // if ($save) {
        //     Session::flash('Success', 'Product has been saved');
        // } else {
        //     Session::flash('Error', 'Product could not be saved');
        // }

        return redirect('admin/products')->with('Success', 'New Product has been added');
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
        $product = Product::findorfail($id);
        $categories = Category::orderBy('name', 'ASC')->get();

        $this->data['product'] = $product;
        $this->data['productID'] = $product->id;
        $this->data['product'] = $product;
        $this->data['categories'] = $categories->toArray();
        $this->data['categoryIDs'] = $product->categories->pluck('id')->toArray();


        return view('admin.products.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);
        // var_dump($params);

        $product = Product::findOrFail($id);
        $categories = Category::orderBy('name', 'ASC')->get();

        $this->data['product'] = $product;
        $this->data['categories'] = $categories->toArray();
        $this->data['categoryIDs'] = $product->categories->pluck('id')->toArray();

        $save = false;
        $save = DB::transaction(function () use ($params, $product) {
            $product->update($params);
            $product->categories()->sync($params['category_IDs']);

            return true;
        });

        if ($save) {
            Session::flash('Success', 'Product has been update');
        } else {
            Session::flash('Error', 'Product could not be update!');
        }

        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product  = Product::findOrFail($id);

        if ($product->delete()) {
            Session::flash('success', 'Product has been deleted');
        }
        return redirect('admin/products');
    }

    /**
     * Resize image
     *
     * @param file   $image    raw file
     * @param string $fileName image file name
     * @param string $folder   folder name
     *
     * @return Response
     */
    private function _resizeImage($image, $fileName, $folder)
    {
        $resizedImage = [];

        $smallImageFilePath = $folder . '/small/' . $fileName;
        $size = explode('x', Product::SMALL);
        list($width, $height) = $size;

        $smallImageFile = Product::make($image)->fit($width, $height)->stream();
        if (Storage::put('public/' . $smallImageFilePath, $smallImageFile)) {
            $resizedImage['small'] = $smallImageFilePath;
        }

        $mediumImageFilePath = $folder . '/medium/' . $fileName;
        $size = explode('x', Product::MEDIUM);
        list($width, $height) = $size;

        $mediumImageFile = Product::make($image)->fit($width, $height)->stream();
        if (Storage::put('public/' . $mediumImageFilePath, $mediumImageFile)) {
            $resizedImage['medium'] = $mediumImageFilePath;
        }

        $largeImageFilePath = $folder . '/large/' . $fileName;
        $size = explode('x', Product::LARGE);
        list($width, $height) = $size;

        $largeImageFile = Product::make($image)->fit($width, $height)->stream();
        if (Storage::put('public/' . $largeImageFilePath, $largeImageFile)) {
            $resizedImage['large'] = $largeImageFilePath;
        }

        $extraLargeImageFilePath  = $folder . '/xlarge/' . $fileName;
        $size = explode('x', Product::EXTRA_LARGE);
        list($width, $height) = $size;

        $extraLargeImageFile = Product::make($image)->fit($width, $height)->stream();
        if (Storage::put('public/' . $extraLargeImageFilePath, $extraLargeImageFile)) {
            $resizedImage['extra_large'] = $extraLargeImageFilePath;
        }

        return $resizedImage;
    }
}
