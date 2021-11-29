<?php

namespace App\Repositories\Admin;

use App\Repositories\Admin\Interfaces\CostRepositoryInterface;
use App\Http\Requests\CostsRequest;
use App\Models\Cost;
use Str;

class CostRepository implements CostRepositoryInterface
{
    //menampilkan halaman index
    public function paginate(int $perPage)
    {
        return Cost::orderBy('name', 'ASC')->paginate($perPage);
    }

    //pencarian cost melalui id
    public function findById($costId)
    {
        return Cost::findOrFail($costId);
    }

    public function getCostDropdown($exceptCostId = null)
    {
        $costs = new cost;

        if ($exceptCostId) {
            $costs = $costs->where('id', '!=', $exceptCostId);
        }
        $costs = $costs->orderBy('name', 'asc');

        return $costs->get();
    }

    public function create(CostsRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);
        $params['parent_id'] = 0;

        return Cost::create($params);
    }

    public function update(CostsRequest $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);
        $params['parent_id'] = 0;
        $cost = Cost::findOrFail($id);

        return $cost->update($params);
    }

    public function delete($costId)
    {
        $cost  = Cost::findOrFail($costId);
        return $cost->delete();
    }
}
