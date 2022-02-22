<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ProductServiceInterface;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductServiceInterface $productService;
    
    /**
     * Class constructor.
     */
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function create(Request $request)
    {
        try {
            $this->validate($request, ['name' => 'required|string']);
            
            $result = $this->productService->create($request);
            
            return response()->json($result, 201);
        } catch (Exception $e) {
            return response()->json(['errors' => ['main' => $e->getMessage()]], $e->getCode());
        }
    }

    public function getAll()
    {
        try {
            $result = $this->productService->getAll();
            
            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json(['errors' => ['main' => $e->getMessage()]], $e->getCode());
        }
    }

    public function getAllByField(Request $request)
    {
        try {
            $this->validate($request,['field' => 'required|string', 'order' => 'required|string']);

            $result = $this->productService->getAllByField($request->field, $request->order);
            
            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json(['errors' => ['main' => $e->getMessage()]], $e->getCode());
        }
    }

    public function get(String $id)
    {
        try {
            $result = $this->productService->getById($id);
            
            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json(['errors' => ['main' => $e->getMessage()]], $e->getCode());
        }
    }

    public function delete(String $id)
    {
        try {
            $result = $this->productService->delete($id);
            
            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json(['errors' => ['main' => $e->getMessage()]], $e->getCode());
        }
    }
}
