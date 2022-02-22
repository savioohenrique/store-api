<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Tag extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $table = 'tags';
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
        static::creating(fn(Tag $tag) => $tag->id = (string) Uuid::uuid4());
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_tags');
    }
}
