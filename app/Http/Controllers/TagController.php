<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\TagServiceInterface;
use Exception;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private TagServiceInterface $tagService;

    /**
     * Class constructor.
     */
    public function __construct(TagServiceInterface $tagService)
    {
        $this->tagService = $tagService;
    }

    public function create(Request $request)
    {
        try {
            $this->validate($request, ['name' => 'required|string']);
            
            $result = $this->tagService->create($request);
            
            return response()->json($result, 201);
        } catch (Exception $e) {
            return response()->json(['errors' => ['main' => $e->getMessage()]], $e->getCode());
        }
    }

    public function getAll()
    {
        try {
            $result = $this->tagService->getAll();
            
            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json(['errors' => ['main' => $e->getMessage()]], $e->getCode());
        }
    }

    public function get(String $id)
    {
        try {
            $result = $this->tagService->getById($id);
            
            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json(['errors' => ['main' => $e->getMessage()]], $e->getCode());
        }
    }

    public function delete(String $id)
    {
        try {
            $result = $this->tagService->delete($id);
            
            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json(['errors' => ['main' => $e->getMessage()]], $e->getCode());
        }
    }
}
