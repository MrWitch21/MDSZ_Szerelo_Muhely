<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentWorksheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'component_id',
        'worksheet_id',
        'quantity',
    ];
}
