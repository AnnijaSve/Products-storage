<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Delivery;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'size',
        'price',
        'weight'
    ];

    public function deliveries()
    {
        return $this->hasMany(Delivery::class, 'size', 'size');
    }

    public function getPrice(): string
    {
        return 'EUR ' . round($this->price/100,2);
    }

    public function getWeight(): string
    {
        return 'Kg ' . round($this->weight/1000,2);
    }

    public function getSize(): string
    {
        return $this->size;
    }
}
