<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMovement extends Model
{
    protected $table = "types_movements";
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "type_movement_id";
    protected $fillable = ["type_movement_name"];
}
