<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorited_Article extends Model
{
    use HasFactory;

    protected $table = 'favorited__articles';

    protected $primaryKey = 'id';

    protected $fillable = [
      'uId', 'articleId'
    ];
}
