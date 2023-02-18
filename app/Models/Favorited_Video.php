<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorited_Video extends Model
{
    use HasFactory;

    protected $table = 'favorited__videos';

    protected $primaryKey = 'id';

    protected $fillable = [
      'uId', 'videoId'
    ];
}
