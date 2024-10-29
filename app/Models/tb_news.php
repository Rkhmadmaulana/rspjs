<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_news extends Model
{
    protected $fillable = [
        'nm_news',
        'news',
        'category_news',
        'view_news',
        'date_news',
        'hidden_news',
        'pin_news'
    ];
}
