<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_recharge extends Model
{
    use HasFactory;
    protected $table = "03_user_recharges";
    protected $primaryKey = "id";
}
