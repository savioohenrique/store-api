<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductTag extends Model
{
    public $incrementing = false;

    protected $table = 'products_tags';
    protected $dates = ['created_at','updated_at'];
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'tag_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'id', 'tag_id');
    }

    public function findById(String $product_id, $tag_id)
    {
        return $this->all()->where('product_id', '=', $product_id)->where('tag_id', '=', $tag_id);
    }

    public function de1eteByKey(String $product_id, String $tag_id)
    {
        return DB::table($this->table)->where('product_id', '=', $product_id)->where('tag_id', '=', $tag_id)->delete();
    }

}
