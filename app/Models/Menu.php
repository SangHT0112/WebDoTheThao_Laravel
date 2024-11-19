<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $fillable = [
        "name",
        'parent_id',
        'description',
        'content',
        'slug',
        'active',
        'created_at',
        'updated_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'menu_id','id');
    }
}
