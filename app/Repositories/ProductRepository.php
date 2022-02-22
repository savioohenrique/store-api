<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

Class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Class constructor.
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    /**
    * @param string $name
    * @return Model
    */
    public function create(String $name): ?Product
    {
        $product = new Product;
        $product->name = $name;
        $product->save();
 
        return $product;
    }

    /**
    * @param string $name
    * @return Model
    */
    public function findbyName(String $name)
    {
        $product = $this->model->where('name', '=', $name)->first();
 
        return $product;
    }

    /**
    * 
    * @return array
    */
    public function findAll()
    {
        $products = $this->model->all();

        return $products;
    }

    /**
    * @param string $column
    * @param string $direction
    * @return array
    */
    public function findAllByField(String $column, String $direction)
    {
        $products = DB::table('products')
                ->orderBy($column, $direction)
                ->get();

        return $products;
    }

    /**
    * @param string $id
    * @return Model
    */
    public function findById(String $id)
    {
        $product = $this->model->find($id);
 
        return $product;
    }

    /**
    * @param string $id
    * @return bool
    */
    public function delete(String $id)
    {
        $product = $this->model->find($id);

        return $product->delete();
    }
    
    public function addView(String $id)
    {
        $product = $this->model->find($id);
        $product->views += 1;
        $product->save();
        
        return $product;
    }
}