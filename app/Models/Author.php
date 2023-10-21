<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Author extends Model
{
    use HasFactory;

    const DEFAULT_AUTHOR_PICTURE_PATH = 'images/user.jpg';

    protected $fillable = ['name', 'about', 'picture'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

}
