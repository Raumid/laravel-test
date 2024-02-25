<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = "product_category";
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "product_category_id";
    protected $fillable = ["product_category_name"];


}
