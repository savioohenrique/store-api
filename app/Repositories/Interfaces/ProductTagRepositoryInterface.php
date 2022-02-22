<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;
use App\Models\Tag;

Interface ProductTagRepositoryInterface
{
    public function addTagToProduct(Product $product, Tag $tag);
    public function findById(String $product_id, String $tag_id);
    public function removeTagFromProduct(String $product_id, String $tag_id);
}