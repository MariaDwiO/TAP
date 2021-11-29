<?php

namespace App\Repositories\Admin\Interfaces;

use App\Http\Requests\StateRequest;

interface StateRepositoryInterface
{
    public function paginate(int $perPage);
    public function findById(int $stateId);
    public function getStateDropdown(int $exceptStateId = null);
    public function create(StateRequest $StateRequest);
    public function update(StateRequest $StateRequest, int $stateId);
    public function delete(int $stateId);
}
