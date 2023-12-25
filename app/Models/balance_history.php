<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class balance_history extends Model
{
    use HasFactory;
    protected $table = '11_balance_histories';
    protected $primaryKey = 'id';
}
