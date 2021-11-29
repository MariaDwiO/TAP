<?php

namespace App\Repositories\Admin\Interfaces;

use App\Http\Requests\CategoryRequest;

interface CategoryRepositoryInterface
{
    public function paginate(int $perPage);
    public function findById(int $categoryId);
    public function getCategoryDropdown(int $exceptCategoryId = null);
    public function create(CategoryRequest $CategoryRequest);
    public function update(CategoryRequest $CategoryRequest, int $categoryId);
    public function delete(int $categoryId);
}
