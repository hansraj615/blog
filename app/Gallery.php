<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);

    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);

    }
    public function album()
    {
        return $this->belongsTo(Album::class);

    }
}
