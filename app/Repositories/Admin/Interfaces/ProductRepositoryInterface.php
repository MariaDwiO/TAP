<?php

namespace App\Repositories\Admin\Interfaces;

use App\Http\Requests\ProductRequest;

interface ProductRepositoryInterface
{
    public function paginate(int $perPage);
    public function findById(int $id);
    public function create($params);
    public function update($params, int $id);
    public function delete(int $id);

    public function addimage(int $id, $image);
    public function findImageById(int $id);
    public function removeImage(int $id);
    public function types();
    public function statuses();
}
