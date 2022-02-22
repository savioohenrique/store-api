<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

Interface TagServiceInterface 
{
    public function create(Request $request);
    public function getAll();
    public function getById(String $id);
    public function delete(String $id);
}