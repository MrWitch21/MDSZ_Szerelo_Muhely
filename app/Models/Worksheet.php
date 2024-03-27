<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worksheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'receptionist_id',
        'mechanic_id',
        'license_plate',
        'make',
        'model',
        'owner_name',
        'owner_address',
        'closed',
        'total',
        'payment_method',
        'closed_at',
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function workProcesses()
    {
        return $this->belongsToMany(WorkProcess::class);
    }
}
