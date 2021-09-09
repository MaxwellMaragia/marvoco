<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chemical extends Model
{
    use HasFactory;
    public function chemical_category(){
       return $this->belongsTo(Category::class,'category');
    }

}
