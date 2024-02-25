<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Models\Employe;
use App\Models\Product;
use App\Models\TypeMovement;
use App\Models\Customer;

class Transaction extends Model
{
    protected $table = "transactions";
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "transaction_id";
    protected $fillable = [
        "transaction_product_id",
        "transaction_employe_id",
        "transaction_customer_id",
        "transaction_type_movement_id",
        "transaction_amount",
        "transaction_price",
        "transaction_date"
    ];

    static function getAll() {
        return self::where('transaction_delete', 0)
        ->with('employe')
        ->with('movement')
        ->with('customer')
        ->get();
    }

    static function getFirst($id) {
        return self::where('transaction_delete', 0)
        ->with('employe')
        ->with('movement')
        ->with('customer')
        ->find($id);
    }

    public function employe(): HasOne
    {
        return $this->hasOne(Employe::class, 'employe_id', 'transaction_employe_id');
    }

    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'product_id', 'transaction_product_id')
        ->with('productCategory');
    }

    public function movement(): HasOne
    {
        return $this->hasOne(TypeMovement::class, 'type_movement_id', 'transaction_type_movement_id');
    }

    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class, 'customer_id', 'transaction_customer_id');
    }
}
