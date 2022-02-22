<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

Interface ProductTagServiceInterface 
{
    public function addTagToProduct(Request $request, String $product_id);
    public function getTagsByProduct(String $id);
    public function getProductsByTag(String $id);
    public function removeTagFromProduct(Request $request, String $product_id);
}