<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
        'is paid',
        'price',
        'author_id',
        'section_id',
        'file_url'
    ];
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function section(){
        return $this->belongsTo(Section::class);
    }
}
