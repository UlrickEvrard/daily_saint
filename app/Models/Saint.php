<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Saint extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function article(){

        return $this->hasOne('App\Models\Article');
    }
}

