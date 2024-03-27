<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialWorksheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'material_id',
        'worksheet_id',
        'quantity',
    ];
}