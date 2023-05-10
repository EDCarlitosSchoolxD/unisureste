<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository{


    protected $model;
    private $relations;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }



    public function all()
    {
        $query = $this->model;

       

        return $query->get();
    }

    public function get(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function save(Model $model)
    {
        $model->save();

        return $model;
    }

    public function updateDB($datos, int $id){
        return $this->model->where('id','=',$id)->update($datos);
    }

  
    public function delete(Model $model)
    {
        $model->delete();
        return $model;
    }


}