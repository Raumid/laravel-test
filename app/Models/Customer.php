<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "customer_id";
    protected $fillable = ["customer_name"];
}
