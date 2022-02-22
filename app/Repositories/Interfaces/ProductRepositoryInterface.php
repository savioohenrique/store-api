<?php

namespace App\Repositories\Interfaces;

Interface ProductRepositoryInterface
{
    public function create(String $name);
    public function findByName(String $name);
    public function findAll();
    public function findById(String $id);
    public function findAllByField(String $field, String $order);
    public function delete(String $id);
    public function addView(String $id);
}