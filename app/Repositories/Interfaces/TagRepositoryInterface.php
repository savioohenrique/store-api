<?php

namespace App\Repositories\Interfaces;

Interface TagRepositoryInterface
{
    public function create(String $name);
    public function findByName(String $name);
    public function findAll();
    public function findById(String $id);
    public function delete(String $id);
    public function all();
}