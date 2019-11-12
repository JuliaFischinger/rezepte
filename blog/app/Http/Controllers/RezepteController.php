<?php

namespace App\Http\Controllers;

use App\Rezept;
use Illuminate\Http\Request;

class RezepteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rezepte = Rezept::latest()->paginate(5);

        return view('rezepte.index',compact('rezepte'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rezepte.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Rezept::create($request->all());

        return redirect()->route('rezepte.index')
                        ->with('success','Rezept created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rezept  $rezept
     * @return \Illuminate\Http\Response
     */
    public function show(Rezept $rezept)
    {
        return view('rezepte.show',compact('rezept'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rezept  $rezept
     * @return \Illuminate\Http\Response
     */
    public function edit(Rezept $rezept)
    {
        return view('rezepte.edit',compact('rezept'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rezept  $rezept
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rezept $rezept)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $rezept->update($request->all());

        return redirect()->route('rezepte.index')
                        ->with('success','Rezept updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rezept  $rezept
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rezept $rezept)
    {
        $rezept->delete();

        return redirect()->route('rezepte.index')
                        ->with('success','Rezept deleted successfully');
    }
}
