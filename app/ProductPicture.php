<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPicture extends Model
{
    protected $table = 'product_pictures';
    protected $fillable = ['product_id', 'image'];
}
