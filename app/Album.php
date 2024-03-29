<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);

    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);

    }
}
