<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

Interface ProductServiceInterface 
{
    public function create(Request $request);
    public function getAll();
    public function getAllByField($field, $order);
    public function getById(String $id);
    public function delete(String $id);
}