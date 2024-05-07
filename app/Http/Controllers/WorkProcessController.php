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
}
