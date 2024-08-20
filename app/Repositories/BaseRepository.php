<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function allActives(array $relations = [])
    {
        $query = $this->model;

        if (!empty($relations)) {
            $query = $query->with($relations);
        }

        return $query->where('partner_id', Auth::user()->partner_id)->where('status', 'active')->get();
    }

    public function get(int $id, array $relations = [])
    {
        $query = $this->model;

        if (!empty($relations)) {
            $query = $query->with($relations);
        }

        return $query->find($id);
    }

    public function store(array $data)
    {
        $model = $this->model->create($data);
        return $model;
    }

    public function update(Model $model, $data)
    {
        $updated = $model->update($data);
        return $updated;
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }
}
