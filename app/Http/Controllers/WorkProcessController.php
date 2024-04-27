<?php

namespace App\Http\Controllers;

use App\Models\WorkProcess;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WorkProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $work_processes = WorkProcess::get();

        return view('work_process.index', [
            'work_processes' => WorkProcess:: orderBy('name') -> paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('work_process.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:work_processes,name',
            'price' => ['required', 'numeric'],
        ]);
        WorkProcess::create($validatedData);

        return redirect('work_process');
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show($id)
    // {
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     $work_process = WorkProcess::findOrFail($id);
    //     return view('work_process.edit', compact('work_process'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     $work_process = WorkProcess::findOrFail($id);

    //     $validatedData = $request->validate([
    //         'name' => [
    //             'required',
    //             Rule::unique('work_processes')->ignore($work_process->id),
    //         ],
    //         'price' => ['required', 'numeric', 'min:0'],
    //     ]);

    //     $work_process->update($validatedData);

    //     return redirect('work_process');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     $work_process = WorkProcess::findOrFail($id);
    //     $work_process->delete();

    //     return redirect('work_process');
    // }
}
