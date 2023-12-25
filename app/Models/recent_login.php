<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recent_login extends Model
{
    use HasFactory;
    protected $table = "05_recent_login";
    protected $primaryKey = "id";
}
