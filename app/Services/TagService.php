<?php

namespace App\Services;

use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\TagRepository;
use App\Services\Interfaces\TagServiceInterface;
use Exception;
use Illuminate\Http\Request;

Class TagService implements TagServiceInterface {

    private TagRepository $tagRepository;

    /**
     * Class constructor.
     */
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function create(Request $request)
    {
        $tag = $this->tagRepository->findByName($request->name);
        if ($tag){
            throw new Exception("tag already exists", 422);
        }

        return $this->tagRepository->create($request->name);
    }

    public function getAll()
    {
        return $this->tagRepository->findAll();
    }

    public function getById(String $id)
    {
        $tag = $this->tagRepository->findById($id);
        
        if (!$tag){
            throw new Exception("tag don't exist", 422);
        }

        return $tag;
    }

    public function delete(String $id)
    {
        $tag = $this->tagRepository->findById($id);
        
        if (!$tag){
            throw new Exception("tag don't exist", 422);
        }
        
        return $this->tagRepository->delete($id);
    }
}