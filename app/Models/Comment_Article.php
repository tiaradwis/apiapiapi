<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_Article extends Model
{
    use HasFactory;

    protected $table = 'comment__articles';

    protected $primaryKey = 'id';

    protected $fillable = [
      'uId', 'articleId', 'desc'  
    ];
}
