<?php

namespace App\Http\Controllers;
use App\Models\Huis;

use Illuminate\Http\Request;

class HuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $huis = Huis::all();
 
        return view('huis.index', compact('huis')); // -> resources/views/huis/index.blade.php 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('huis.create'); // -> resources/views/huis/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // Validation for required fields (and using some regex to validate our numeric value)
    $request->validate([
        'naam' => 'required',
    'beschrijving' => 'required',
    'oppervlakte_m2' => 'required|numeric',
    'huur_per_week' => 'required|numeric|'
    ]); 
    // Getting values from the blade template form
    $huis = new Huis([
        'naam' => $request->get('naam'),
        'beschrijving' => $request->get('beschrijving'),
        'oppervlakte_m2' => $request->get('oppervlakte_m2'),
        'huur_per_week' => $request->get('huur_per_week')
    ]);
    $huis->save();
    return redirect('/huis')->with('success', 'Huis saved.');   // -> resources/views/huis/index.blade.php
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $huis = Huis::find($id);
    return view('huis.edit',['huis'=>$huis]);  // -> resources/views/huis/edit.blade.php
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validation for required fields (and using some regex to validate our numeric value)
    $request->validate([
        'naam' => 'required',
    'beschrijving' => 'required',
    'oppervlakte_m2' => 'required|numeric',
    'huur_per_week' => 'required|numeric|'
    ]); 
    $huis = Huis::find($id);
    // Getting values from the blade template form
    $huis->naam =  $request->get('naam');
    $huis->beschrijving = $request->get('beschrijving');
    $huis->oppervlakte_m2 = $request->get('oppervlakte_m2');
    $huis->huur_per_week = $request->get('huur_per_week');
    $huis->save();

    return redirect('/huis'); // -> resources/views/huis/index.blade.php
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $huis = Huis::find($id);
        $huis->delete(); // Easy right?
    
        return redirect('/huis');  // -> resources/views/huis/index.blade.php
    }



public function showDescription($id)
{
    $huis = Huis::find($id);
    return response()->json([
        'beschrijving' => $huis->beschrijving
    ]);
}

public function showDescriptionPage($id)
{
    $huis = Huis::find($id);

    if ($huis) {
        return view('huis.description', ['huis' => $huis]);
    } else {
        return redirect('/huis')->with('error', 'Huis niet gevonden.');
    }
}
}