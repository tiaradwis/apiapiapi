<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    
    protected $table = 'videos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'adminId', 'categoryId', 'title', 'video', 'description'
    ];

}
