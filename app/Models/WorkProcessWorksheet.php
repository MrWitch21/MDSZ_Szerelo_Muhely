<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkProcessWorksheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'work_process_id',
        'worksheet_id',
        'duration',
    ];
}
