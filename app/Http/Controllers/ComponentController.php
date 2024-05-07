<?php

namespace App\Http\Controllers;
use App\Models\Component;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $components = Component::get();

        return view('component.index', [
            'components' => Component:: orderBy('name') -> paginate(10)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('component.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:components,name',
            'price' => ['required', 'numeric'],
        ]);
        Component::create($validatedData);

        return redirect('component');
    }
}
