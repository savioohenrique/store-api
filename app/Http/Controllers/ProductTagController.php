<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ProductTagServiceInterface;
use Exception;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    private ProductTagServiceInterface $productTagService;

    /**
     * Class constructor.
     */
    public function __construct(ProductTagServiceInterface $productTagService)
    {
        $this->productTagService = $productTagService;
    }
    
    public function addTagToProduct(Request $request, String $product_id)
    {
        try {
            $result = $this->productTagService->addTagToProduct($request, $product_id);
            
            return response()->json($result, 201);
        } catch (Exception $e) {
            return response()->json(['errors' => ['main' => $e->getMessage()]], $e->getCode());
        }
    }

    public function removeTagFromProduct(Request $request, $product_id)
    {
        try {
            $result = $this->productTagService->removeTagFromProduct($request, $product_id);
            
            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json(['errors' => ['main' => $e->getMessage()]], $e->getCode());
        }
    }

    public function getTagsByProduct(String $product_id)
    {
        try {
            $result = $this->productTagService->getTagsByProduct($product_id);
            
            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json(['errors' => ['main' => $e->getMessage()]], $e->getCode());
        }
    }

    public function getProductsByTag(String $tag_id)
    {
        try {
            $result = $this->productTagService->getProductsByTag($tag_id);
            
            return response()->json($result, 200);
        } catch (Exception $e) {
            return response()->json(['errors' => ['main' => $e->getMessage()]], $e->getCode());
        }
    }
}
