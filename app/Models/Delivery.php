<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'size',
        'price'
    ];

    public function getPrice(): string
    {
        return 'EUR ' . round($this->price/100,2);
    }
}
