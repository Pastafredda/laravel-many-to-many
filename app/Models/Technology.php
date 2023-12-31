<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable=[
        "name"
    ];

    public function books(){
        return $this -> belongsToMany(book :: class);
    }
}
