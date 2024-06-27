<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['product_id', 'responsible', 'quantity', 'date', 'status', 'observations', 'project_id', 'user_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}




