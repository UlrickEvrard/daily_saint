<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Saint;


class Article extends Model
{
    use HasFactory;

    public function saint(){

        return $this->belongsTo('App\Models\Saint');
    }
}
