<?php

namespace App\Repositories\Front\Interfaces;

interface CatalogueRepositoryInterface
{
    public function paginate($perPage, $request);

    public function findBySlug($slug);

    public function findBySKU($sku);
}
