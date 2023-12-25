<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package_history extends Model
{
    use HasFactory;
    protected $table = "09_package_histories";
    protected $primaryKey = "id";
}
