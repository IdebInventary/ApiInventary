<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = [
        'name', 'model', 'measurement_unit', 'brand', 'quantity', 'description', 
        'price', 'profile_image', 'serie', 'observations', 'location', 'category_id', 'supplier_id'
    ];

    // Relación con la categoría
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    // Relación con el proveedor
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
}


