<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Services\Interfaces\ProductServiceInterface;
use Exception;
use Illuminate\Http\Request;

Class ProductService implements ProductServiceInterface {

    private ProductRepositoryInterface $productRepository;

    /**
     * Class constructor.
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create(Request $request)
    {
        $product = $this->productRepository->findByName($request->name);
        if ($product){
            throw new Exception("Product already exists", 422);
        }

        return $this->productRepository->create($request->name);
    }

    public function getAll()
    {
        return $this->productRepository->findAll();
    }

    public function getAllByField($field, $order)
    {
        if (!in_array($field, ['views', 'created_at'])) {
            throw new Exception("Invalid field", 400);
        }

        if (!in_array($order, ['asc', 'desc'])) {
            throw new Exception("Invalid order", 400);
        }

        return $this->productRepository->findAllByField($field, $order);
    }

    public function getById(String $id)
    {
        $product = $this->productRepository->findById($id);
        
        if (!$product){
            throw new Exception("Product don't exist", 422);
        }

        $this->productRepository->addView($id);

        return $product;
    }

    public function delete(String $id)
    {
        $product = $this->productRepository->findById($id);
        
        if (!$product){
            throw new Exception("Product don't exist", 422);
        }
        
        return $this->productRepository->delete($id);
    }
}