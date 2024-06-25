<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['product_id', 'responsible', 'quantity', 'date', 'status', 'observations', 'project_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}




