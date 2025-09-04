<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'price',
        'city',
        'contact_phone',   
        'status',          
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
