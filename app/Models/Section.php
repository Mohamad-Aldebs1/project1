<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
