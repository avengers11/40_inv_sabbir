<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_withdraw extends Model
{
    use HasFactory;
    protected $table = "04_user_withdraws";
    protected $primaryKey = "id";
}
