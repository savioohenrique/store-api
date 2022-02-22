<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Tag;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\ProductTagRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Services\Interfaces\ProductTagServiceInterface;
use Exception;
use Illuminate\Http\Request;

Class ProductTagService implements ProductTagServiceInterface {

    private ProductTagRepositoryInterface $productTagRepository;
    private ProductRepositoryInterface $productRepository;
    private TagRepositoryInterface $tagRepository;

    /**
     * Class constructor.
     */
    public function __construct(
        ProductTagRepositoryInterface $productTagRepository, 
        ProductRepositoryInterface $productRepository, 
        TagRepositoryInterface $tagRepository
    )
    {
        $this->productTagRepository = $productTagRepository;
        $this->productRepository = $productRepository;
        $this->tagRepository = $tagRepository;
    }

    public function addTagToProduct(Request $request, String $product_id){
        $product = $this->productRepository->findById($product_id);
        $this->validateProduct($product);
        
        $tag = $this->tagRepository->findById($request->tag_id);
        $this->validateTag($tag);

        $productTag = $this->productTagRepository->findById($product->id, $tag->id);
        if (!empty($productTag)) {
            throw new Exception("Tag has already been added to the product", 422);
        }

        return $this->productTagRepository->addTagToProduct($product, $tag);
    }

    public function getTagsByProduct(String $id)
    {
        $product = $this->productRepository->findById($id);
        $this->validateProduct($product);

        return $product->tags;
    }

    public function getProductsByTag(String $id)
    {
        $tag = $this->tagRepository->findById($id);
        $this->validateTag($tag);

        return $tag->products;
    }

    public function removeTagFromProduct(Request $request, String $product_id){
        $product = $this->productRepository->findById($product_id);
        $this->validateProduct($product);
        
        $tag = $this->tagRepository->findById($request->tag_id);
        $this->validateTag($tag);

        $productTag = $this->productTagRepository->findById($product->id, $tag->id);
        if (empty($productTag)) {
            throw new Exception("Tag has already been added removed from product", 422);
        }

        return $this->productTagRepository->removeTagFromProduct($productTag->product_id, $productTag->tag_id);
    }

    private function validateProduct(Product $product)
    {
        if (!$product) {
            throw new Exception("Product don't exist", 422);
        }
    }

    private function validateTag(Tag $tag)
    {
        if (!$tag) {
            throw new Exception("Tag don't exist", 422);
        }
    }
}