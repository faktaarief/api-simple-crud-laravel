<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'author',
        'publisher',
        'publication_year',
        'isbn',
        'stock',
        'borrowed',
        'booked',
        'image',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
