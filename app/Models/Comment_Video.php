<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_Video extends Model
{
    use HasFactory;
    
    protected $table = 'comment__videos';

    protected $primaryKey = 'id';

    protected $fillable = [
      'uId', 'videoId', 'desc'  
    ];
}
