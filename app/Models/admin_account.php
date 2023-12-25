<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_account extends Model
{
    use HasFactory;
    protected $table = "00_admin_accounts";
    protected $primaryKey = "id";
}
