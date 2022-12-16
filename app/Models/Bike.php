<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;
    protected $fillable = ['brand_id', 'name', 'image', 'price_per_hour', 'description', 'color', 'quantity'];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function features()
    {
        return $this->hasMany(Feature::class);
    }
    // image accessor
    public function getImageAttribute($value)
    {
        return asset('storage/bikes/' . $value);
    }
}
