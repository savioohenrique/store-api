<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Product extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $table = 'products';
    protected $dates = ['created_at','updated_at'];
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
    ];

    protected static function booted()
    {
        static::creating(fn(Product $product) => $product->id = (string) Uuid::uuid4());
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'products_tags');
    }

}
