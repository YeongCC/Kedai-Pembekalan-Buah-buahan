<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = ['id', 'Customer_Name', 'Customer_Address', 'Customer_Phone', 'Customer_Receive_Day'];

    use HasFactory;
}
