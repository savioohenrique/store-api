<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Repositories\Interfaces\TagRepositoryInterface;

Class TagRepository implements TagRepositoryInterface
{
    /**
     * Class constructor.
     */
    public function __construct(Tag $tag)
    {
        $this->model = $tag;
    }
    
    /**
    * @param string $name
    * @return Model
    */
    public function create(String $name): ?Tag
    {
        $tag = new Tag;
        $tag->name = $name;
        $tag->save();
 
        return $tag;
    }

    /**
    * @param string $name
    * @return Model
    */
    public function findbyName(String $name)
    {
        $tag = $this->model->where('name', '=', $name)->first();
 
        return $tag;
    }

    /**
    * 
    * @return array
    */
    public function findAll()
    {
        $tags = $this->model->all();
 
        return $tags;
    }

    /**
    * @param string $id
    * @return Model
    */
    public function findById(String $id)
    {
        $tag = $this->model->find($id);
 
        return $tag;
    }

    /**
    * @param string $id
    * @return bool
    */
    public function delete(String $id)
    {
        $tag = $this->model->find($id);

        return $tag->delete();
    }


    public function all()
    {
        $tag = $this->model->all();
 
        return $tag;
    }
}