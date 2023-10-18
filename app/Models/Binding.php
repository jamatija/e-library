<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binding extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function book(){
        return $this->hasOne(Book::class);
    }
}
