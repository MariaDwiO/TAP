<?php

namespace App\Repositories\Admin;

use App\Repositories\Admin\Interfaces\CategoryRepositoryInterface;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Str;
use DB;

class CategoryRepository implements CategoryRepositoryInterface
{
    //menampilkan halaman index
    public function paginate(int $perPage)
    {
        return Category::orderBy('name', 'ASC')->paginate($perPage);
    }

    public function findById($categoryId)
    {
        return Category::findOrFail($categoryId);
    }

    public function getCategoryDropdown($exceptCategoryId = null)
    {
        $categories = new Category;

        if ($exceptCategoryId) {
            $categories = $categories->where('id', '!=', $exceptCategoryId);
        }
        $categories = $categories->orderBy('name', 'asc');

        return $categories->get();
    }

    public function create(CategoryRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);
        $params['parent_id'] = 0;

        return Category::create($params);
    }

    public function update(CategoryRequest $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);
        $params['parent_id'] = 0;
        $category = Category::findOrFail($id);

        return $category->update($params);
    }

    public function delete($categoryId)
    {
        $category  = Category::findOrFail($categoryId);
        return $category->delete();
    }
}
