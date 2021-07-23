<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    protected $fillable = ['id', 'Product_Name', 'Product_Picture', 'Product_Price', 'Product_Status'];
    use HasFactory;
}
