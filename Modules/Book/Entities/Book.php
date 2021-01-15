<?php

namespace Modules\Book\Entities;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'isbn'];
}
