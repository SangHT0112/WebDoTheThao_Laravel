<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public $table = 'news';
    public $fillable=[
        "qc",
        "status",
        "title",
        "description",
        "imgs",

    ];
}
