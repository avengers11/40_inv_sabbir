<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_task_history extends Model
{
    use HasFactory;
    protected $table = '07_users_task_histories';
    protected $primaryKey = 'id';
}
