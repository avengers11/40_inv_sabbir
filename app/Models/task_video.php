<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task_video extends Model
{
    use HasFactory;
    protected $table = "08_task_videos";
    protected $primaryKey = "id";
}
