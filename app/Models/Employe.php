<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $table = "employees";
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = "employe_id";
    protected $fillable = ["employe_name"];
}
