<?php

namespace App\Http\Controllers;

use App\Models\Collage;
use Illuminate\Http\Request;

class CollageController extends Controller
{
    // Display all collages
    public function index()
    {
        $collages = Collage::all(); // You need to fetch all collages for display
        return view('collages.index', compact('collages'));
    }

    // Show the form to create a new collage
    public function create()
    {
        return view('collages.create');
    }


    // Store a new collage in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Collage::create([
            'name' => $request->name,
        ]);

        return redirect()->route('collages.index');
    }


    // Show the form to edit an existing collage
    public function edit(Collage $collage)
    {
        return view('collages.edit', compact('collage'));
    }

    // Update the existing collage in the database
    public function update(Request $request, Collage $collage)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $collage->name = $request->name;
        $collage->save();

        return redirect()->route('collages.index');
    }

    // Delete a specific collage
    public function destroy(Collage $collage)
    {
        $collage->delete();
        return redirect()->route('collages.index');
    }
}

