<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Repositories\Interfaces\ProductTagRepositoryInterface;

Class ProductTagRepository implements ProductTagRepositoryInterface
{
    /**
     * Class constructor.
     */
    public function __construct(ProductTag $productTag)
    {
        $this->model = $productTag;
    }  

    /**
    * @param Product $product
    * @param Tag $tag
    * @return Product
    */
    public function addTagToProduct(Product $product, Tag $tag)
    {
        $productTag = new ProductTag;
        $productTag->product_id = $product->id;
        $productTag->tag_id = $tag->id;
        $productTag->save();

        return $product->tags;
    }

    /**
    * @param String $product_id
    * @param String $tag_id
    * @return bool
    */
    public function removeTagFromProduct(String $product_id, String $tag_id)
    {
        $productTag = $this->findById($product_id, $tag_id);

        return $productTag->de1eteByKey($product_id, $tag_id);
    }

    /**
    * @param string $id
    * @return Model
    */
    public function findAll(String $product_id, String $tag_id)
    {
        $productTag = $this->model->all()->where('product_id', '=', $product_id)->where('tag_id', '=', $tag_id);

        return $productTag;
    }
    
    /**
    * @param string $id
    * @return Model
    */
    public function findById(String $product_id, String $tag_id)
    {
        $productTag = $this->model->all()->where('product_id', '=', $product_id)->where('tag_id', '=', $tag_id)->first();

        return $productTag;
    }
}