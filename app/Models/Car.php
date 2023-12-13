<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Car extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
    'carTitle',
    'description',
    'image',
    'published',
    'shortDescription',
    'category_id',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
