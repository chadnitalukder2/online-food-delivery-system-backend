<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Defining which fields are mass assignable
    protected $fillable = [
        'restaurant_id', 
        'name', 
        'description', 
        'price', 
        'image', 
        'availability'
    ];

    // Relationships
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}

