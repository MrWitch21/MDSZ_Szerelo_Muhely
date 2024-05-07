<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Component;
use App\Models\WorkProcess;
use App\Models\WorkProcessWorksheet;
use App\Models\Worksheet;
use Illuminate\Http\Request;
use App\Models\ComponentWorksheet;
use App\Models\Material;
use App\Models\MaterialWorksheet;
use Illuminate\Support\Facades\Auth;

class WorksheetController extends Controller
{
    public function __construct(Worksheet $worksheet)
    {
        if ($worksheet->closed) {
            return redirect()->route('worksheet.closed');
        }
        //$this->middleware('mechanic')->only([]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'mechanic') {
            $mechanicId = Auth::id();

            $worksheetsQuery = Worksheet::whereHas('users', function ($query) use ($mechanicId) {
                $query->where('users.id', $mechanicId);
            })
            ->where('closed', false)
            ->orderBy('created_at');
        } else {
            $worksheetsQuery = Worksheet::where('closed', false)->orderBy('created_at');
        }

        if (request()->has('search')) {
            $worksheetsQuery = $worksheetsQuery->where(request()->get('search_select', ''), 'like', '%' . request()->get('search', '') . '%');
        }
        $isMechanic = auth()->user()->role === 'mechanic';
        $worksheets = $worksheetsQuery->paginate(10);

        return view('worksheet.index', [
            'worksheets' => $worksheets,
            'isMechanic' => $isMechanic
        ]);
    }

    public function closed()
    {
        $worksheetsQuery = Worksheet::where('closed', true)->orderByDesc('closed_at');

        if (request()->has('search')) {
            $worksheetsQuery = $worksheetsQuery->where(request()->get('search_select', ''), 'like', '%' . request()->get('search', '') . '%');
        }
        $worksheets = $worksheetsQuery->paginate(10);


        return view('worksheet.closed', [
            'worksheets' => $worksheets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mechanics = User::where('role', 'mechanic')->get();
        return view('worksheet.create', ['mechanics' => $mechanics]);
    }
    public function componentCreate(Worksheet $worksheet)
    {
        $components = Component::get();
        return view('worksheet.components_add', compact('components', 'worksheet'));
    }
    public function materialCreate(Worksheet $worksheet)
    {
        $materials = Material::get();
        return view('worksheet.materials_add', compact('materials', 'worksheet'));
    }

    public function work_processCreate(Worksheet $worksheet)
    {
        $work_processes = WorkProcess::get();
        return view('worksheet.work_processes_add', compact('work_processes', 'worksheet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'license_plate' => 'required|string',
            'make' => 'required|string',
            'model' => 'required|string',
            'owner_name' => 'required|string',
            'owner_address' => 'required|string',
            'mechanic_id' => 'numeric',
        ]);
        $worksheet = Worksheet::create([
            'license_plate' => $validatedData['license_plate'],
            'make' => $validatedData['make'],
            'model' => $validatedData['model'],
            'owner_name' => $validatedData['owner_name'],
            'owner_address' => $validatedData['owner_address'],
        ]);
        $worksheet->users()->attach($validatedData['mechanic_id'], ['access_role' => 'mechanic']);
        $worksheet->users()->attach(Auth::id(), ['access_role' => 'receptionist']);

        return redirect('worksheet');
    }
    public function componentStore(Request $request, $id)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $worksheet = Worksheet::findOrFail($id);

        if ($worksheet->components()->where('component_id', $request->component_id)->exists()) {
            return redirect()->back()->withErrors(['component_id' => 'Ez az alkatrész már szerepel a munkalapon.']);
        }

        $worksheet->components()->attach($request->component_id, ['quantity' => $validatedData['quantity']]);
        return redirect()->route('worksheet.edit', $worksheet);
    }
    public function materialStore(Request $request, $id)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $worksheet = Worksheet::findOrFail($id);

        if ($worksheet->materials()->where('material_id', $request->material_id)->exists()) {
            return redirect()->back()->withErrors(['material_id' => 'Ez az anyag már szerepel a munkalapon.']);
        }

        $worksheet->materials()->attach($request->material_id, ['quantity' => $validatedData['quantity']]);
        return redirect()->route('worksheet.edit', $worksheet);
    }
    public function work_processStore(Request $request, $id)
    {
        $validatedData = $request->validate([
            'duration' => 'required|numeric|min:1',
        ]);

        $worksheet = Worksheet::findOrFail($id);

        if ($worksheet->workProcesses()->where('work_process_id', $request->work_process_id)->exists()) {
            return redirect()->back()->withErrors(['work_process_id' => 'Ez a szolgáltatás már szerepel a munkalapon.']);
        }

        $worksheet->workProcesses()->attach($request->work_process_id, ['duration' => $validatedData['duration']]);
        return redirect()->route('worksheet.edit', $worksheet);
    }
    /**
     * Display the specified resource.
     */
    public function show(Worksheet $worksheet)
    {
        return view('worksheet.show', compact('worksheet'));
    }
    public function closedShow(Worksheet $worksheet)
    {
        return view('worksheet.closed_show', compact('worksheet'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worksheet $worksheet)
    {
        $mechanics = User::where('role', 'mechanic')->get();

        $isMechanic = auth()->user()->role === 'mechanic';

        return view('worksheet.edit', compact('worksheet', 'mechanics', 'isMechanic'));
    }
    public function closing(Worksheet $worksheet)
    {
        return view('worksheet.closing', compact('worksheet'));
    }

    public function componentsEdit(Worksheet $worksheet, string $component_worksheetid)
    {
        $component = ComponentWorksheet::findOrFail($component_worksheetid);
        $component_name = $worksheet->getComponentName($component->component_id);

        return view('worksheet.components_edit', compact('worksheet', 'component', 'component_name'));
    }
    public function materialsEdit(Worksheet $worksheet, string $material_worksheetid)
    {
        $material = MaterialWorksheet::findOrFail($material_worksheetid);
        $material_name = $worksheet->getMaterialName($material->material_id);

        return view('worksheet.materials_edit', compact('worksheet', 'material', 'material_name'));
    }
    public function work_processesEdit(Worksheet $worksheet, string $work_process_worksheetid)
    {
        $work_process = WorkProcessWorksheet::findOrFail($work_process_worksheetid);
        $work_process_name = $worksheet->getWorkProcessName($work_process->work_process_id);

        return view('worksheet.work_processes_edit', compact('worksheet', 'work_process', 'work_process_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $worksheet = Worksheet::findOrFail($id);

        $validatedData = $request->validate([
            'license_plate' => 'required|string',
            'make' => 'required|string',
            'model' => 'required|string',
            'owner_name' => 'required|string',
            'owner_address' => 'required|string',
            'mechanic_id' => 'numeric',
        ]);

        $worksheet->update([
            'license_plate' => $validatedData['license_plate'],
            'make' => $validatedData['make'],
            'model' => $validatedData['model'],
            'owner_name' => $validatedData['owner_name'],
            'owner_address' => $validatedData['owner_address'],
        ]);

        $worksheet->users()->wherePivot('access_role', 'mechanic')->detach();
        $worksheet->users()->attach($validatedData['mechanic_id'], ['access_role' => 'mechanic']);

        return redirect()->back();
    }
    public function close(Request $request, string $id)
    {
        $worksheet = Worksheet::findOrFail($id);
        $total = (int) str_replace(' Ft', '', $request->total);

        $validatedData = $request->validate([
            $total => 'numeric|min:0',
            'payment_method' => 'required|in:cash,card',
        ]);

        $worksheet->update([
            'total' => $total,
            'payment_method' => $validatedData['payment_method'],
            'closed' => true,
            'closed_at' => now(),
        ]);

        return redirect()->route('worksheet.closed');
    }
    public function componentsUpdate(Request $request, string $worksheetid, string $component_worksheetid)
    {
        $worksheet = Worksheet::findOrFail($worksheetid);
        $component = ComponentWorksheet::findOrFail($component_worksheetid);
        $validatedData = $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);
        $component->update([
            'quantity' => $validatedData['quantity'],
        ]);
        return redirect()->route('worksheet.edit', $worksheet);
    }
    public function materialsUpdate(Request $request, string $worksheetid, string $material_worksheetid)
    {
        $worksheet = Worksheet::findOrFail($worksheetid);
        $material = MaterialWorksheet::findOrFail($material_worksheetid);
        $validatedData = $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);
        $material->update([
            'quantity' => $validatedData['quantity'],
        ]);
        return redirect()->route('worksheet.edit', $worksheet);
    }
    public function work_processesUpdate(Request $request, string $worksheetid, string $work_process_worksheetid)
    {
        $worksheet = Worksheet::findOrFail($worksheetid);
        $work_process = WorkProcessWorksheet::findOrFail($work_process_worksheetid);
        $validatedData = $request->validate([
            'duration' => 'required|numeric|min:1',
        ]);
        $work_process->update([
            'duration' => $validatedData['duration'],
        ]);
        return redirect()->route('worksheet.edit', $worksheet);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function componentDestroy(string $worksheetid, string $component_worksheetid)
    {
        $worksheet = Worksheet::findOrFail($worksheetid);
        $component = ComponentWorksheet::findOrFail($component_worksheetid);
        $component->delete();
        return redirect()->route('worksheet.edit', $worksheet);
    }
    public function materialDestroy(string $worksheetid, string $material_worksheetid)
    {
        $worksheet = Worksheet::findOrFail($worksheetid);
        $material = MaterialWorksheet::findOrFail($material_worksheetid);
        $material->delete();
        return redirect()->route('worksheet.edit', $worksheet);
    }
    public function work_processDestroy(string $worksheetid, string $work_process_worksheetid)
    {
        $worksheet = Worksheet::findOrFail($worksheetid);
        $work_process = WorkProcessWorksheet::findOrFail($work_process_worksheetid);
        $work_process->delete();
        return redirect()->route('worksheet.edit', $worksheet);
    }
}
