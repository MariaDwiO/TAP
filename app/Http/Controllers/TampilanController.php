<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use App\Models\Category;
use Str;

class TampilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $products = Product::orderBy('created_at', 'ASC');

        $keyword = $request->q;
        // dd($keyword);

        if (request('q')) {
            $products = $products->where('name', 'like', '%' . $keyword . '%')
                ->orwhere('name_siswa', 'like', '%' . $keyword . '%');
        }

        $this->data['products'] = $products->paginate(20);

        return $this->load_Theme('index1', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $this->data['products'] = Product::where('slug', $slug)->firstOrFail();
        return $this->load_Theme('show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function category(Category $category)
    {
        // $this->data['category'] = Category::all()->get();
        // $this->data['categories'] = Category::pluck('name', 'id');

        $categories = $category->products()->get();

        // return $this->load_Theme('category', compact('categories'));
        return $categories;
    }
}
