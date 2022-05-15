<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    protected $fillable = [
        'title', 'difficulty', 'category', 'type', 'result'
    ];

    protected $table = 'quiz';

    protected $primaryKey = 'id';

    public $incrementing = true;
}
