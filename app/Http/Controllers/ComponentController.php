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

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     $component = Component::findOrFail($id);
    //     return view('component.edit', compact('component'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request,  $id)
    // {
    //     $component = Component::findOrFail($id);

    //     $validatedData = $request->validate([
    //         'name' => [
    //             'required',
    //             Rule::unique('components')->ignore($component->id),
    //         ],
    //         'price' => ['required', 'numeric', 'min:0'],
    //     ]);

    //     $component->update($validatedData);

    //     return redirect('component');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy($id)
    // {
    //     $component = Component::findOrFail($id);
    //     $component->delete();

    //     return redirect('component');
    // }
}
