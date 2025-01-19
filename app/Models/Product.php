<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'collage_id',
        'name'
    ];

    public function collage()
    {
        return $this->belongsTo(Collage::class);
    }
}
