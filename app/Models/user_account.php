<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_account extends Model
{
    use HasFactory;
    protected $table = "01_user_account";
    protected $primaryKey = "id";
}
