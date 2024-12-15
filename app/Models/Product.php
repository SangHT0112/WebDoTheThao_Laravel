<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        "name",
        'menu_id',
        'description',
        'content',
        'price',
        'price_sale',
        'slug',
        'thumb',
        'active',
        'created_at',
        'updated_at'
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')
            ->withDefault(['name' => '']);
    }
}
