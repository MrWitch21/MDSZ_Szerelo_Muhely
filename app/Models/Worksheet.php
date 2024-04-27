<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Worksheet extends Model
{
    use HasFactory;
    protected $fillable = [
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
    protected $dates = ['closed_at'];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function workProcesses()
    {
        return $this->belongsToMany(WorkProcess::class);
    }
    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }
    public function components()
    {
        return $this->belongsToMany(Component::class);
    }
    public function listOfComponents(): Collection
    {
        return DB::table('component_worksheet')
            ->select('components.name', 'components.price', 'component_worksheet.quantity', DB::raw('components.price * component_worksheet.quantity as total'), 'component_worksheet.id')
            ->join('components', 'component_worksheet.component_id', '=', 'components.id')
            ->where('component_worksheet.worksheet_id', $this->id)
            ->get();
    }
    public function getComponentName($id): string
    {
        return DB::table('components')
            ->select('name')
            ->where('id', $id)
            ->value('name');
    }
    public function listOfMaterials(): Collection
    {
        return DB::table('material_worksheet')
            ->select('materials.name', 'materials.price', 'material_worksheet.quantity', DB::raw('materials.price * material_worksheet.quantity as total'), 'material_worksheet.id')
            ->join('materials', 'material_worksheet.material_id', '=', 'materials.id')
            ->where('material_worksheet.worksheet_id', $this->id)
            ->get();
    }
    public function getMaterialName($id): string
    {
        return DB::table('materials')
            ->select('name')
            ->where('id', $id)
            ->value('name');
    }
    public function listOfWorkProcesses(): Collection
    {
        return DB::table('work_process_worksheet')
            ->select('work_processes.name', 'work_processes.price', 'work_process_worksheet.duration', DB::raw('ROUND((work_process_worksheet.duration / 100) * work_processes.price) as total'), 'work_process_worksheet.id')
            ->join('work_processes', 'work_process_worksheet.work_process_id', '=', 'work_processes.id')
            ->where('work_process_worksheet.worksheet_id', $this->id)
            ->get();
    }
    public function getWorkProcessName($id): string
    {
        return DB::table('work_processes')
            ->select('name')
            ->where('id', $id)
            ->value('name');
    }

    public function getTotalValue(): float
    {
        $totalValue = 0;

        $totalValue += DB::table('component_worksheet')
            ->join('components', 'component_worksheet.component_id', '=', 'components.id')
            ->where('component_worksheet.worksheet_id', $this->id)
            ->sum(DB::raw('components.price * component_worksheet.quantity'));

        $totalValue += DB::table('material_worksheet')
            ->join('materials', 'material_worksheet.material_id', '=', 'materials.id')
            ->where('material_worksheet.worksheet_id', $this->id)
            ->sum(DB::raw('materials.price * material_worksheet.quantity'));

        $totalValue += DB::table('work_process_worksheet')
            ->join('work_processes', 'work_process_worksheet.work_process_id', '=', 'work_processes.id')
            ->where('work_process_worksheet.worksheet_id', $this->id)
            ->sum(DB::raw('ROUND((work_process_worksheet.duration / 100) * work_processes.price)'));

        return $totalValue;
    }
}
