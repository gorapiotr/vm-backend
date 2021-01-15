<?php

namespace Modules\Book\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;

class Book extends Model
{
    protected $fillable = ['name', 'isbn'];


    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'categories_books',
            'category_id',
            'book_id'
        );
    }
}
