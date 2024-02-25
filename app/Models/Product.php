<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;

class Product extends Model
{
    protected $table = "products";
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "product_id";
    protected $fillable = ["product_category_id",
                           "product_name"];

    public function productCategory()
    {
        return $this->hasOne(ProductCategory::class, "product_category_id", "product_category_id");
    }
}
