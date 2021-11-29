<?php

namespace App\Repositories\Admin;

use App\Repositories\Admin\Interfaces\StateRepositoryInterface;
use App\Http\Requests\StateRequest;
use App\Models\State;
use Str;

class StateRepository implements StateRepositoryInterface
{
    //menampilkan halaman index
    public function paginate(int $perPage)
    {
        return State::orderBy('name', 'ASC')->paginate($perPage);
    }

    //pencarian State melalui id
    public function findById($stateId)
    {
        return State::findOrFail($stateId);
    }

    public function getStateDropdown($exceptStateId = null)
    {
        $states = new State;

        if ($exceptStateId) {
            $states = $states->where('id', '!=', $exceptStateId);
        }
        $states = $states->orderBy('name', 'asc');

        return $states->get();
    }

    public function create(StateRequest $request)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);
        $params['parent_id'] = 0;

        return State::create($params);
    }

    public function update(StateRequest $request, $id)
    {
        $params = $request->except('_token');
        $params['slug'] = Str::slug($params['name']);
        $params['parent_id'] = 0;
        $state = State::findOrFail($id);

        return $state->update($params);
    }

    public function delete($stateId)
    {
        $states  = State::findOrFail($stateId);
        return $states->delete();
    }
}
