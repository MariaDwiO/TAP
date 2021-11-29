<?php

namespace App\Repositories\Admin\Interfaces;

use App\Http\Requests\CostsRequest;

interface CostRepositoryInterface
{
    public function paginate(int $perPage);
    public function findById(int $costId);
    public function getCostDropdown(int $exceptCostId = null);
    public function create(CostsRequest $CostsRequest);
    public function update(CostsRequest $CostsRequest, int $costId);
    public function delete(int $costId);
}
