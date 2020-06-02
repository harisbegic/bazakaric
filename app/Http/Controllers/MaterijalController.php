<?php

namespace App\Http\Controllers;

use App\Materijal;
use Illuminate\Http\Request;

class MaterijalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materijali = Materijal::all();
        return view('products.materijali.create', [
            'materijali' => $materijali]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materijal = new Materijal;

        $materijal->name = $request->name;

        if($materijal->save()) {
                $request->session()->flash('success', 'Uspješno dodano.');
        }
        else {
            $request->session()->flash('error', 'Desila se greška.');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materijal  $materijal
     * @return \Illuminate\Http\Response
     */
    public function show(Materijal $materijal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materijal  $materijal
     * @return \Illuminate\Http\Response
     */
    public function edit(Materijal $materijal)
    {
        return view('products.materijali.edit', [
            'materijal' => $materijal
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materijal  $materijal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materijal $materijal)
    {
        $materijal->name = $request->name;

        if($materijal->save())
        {
            $request->session()->flash('success', 'Uspješno uređeno');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška.');
        }

        return redirect()->route('materijal.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materijal  $materijal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materijal $materijal, Request $request)
    {
        if($materijal->delete())
        {
            $request->session()->flash('success', 'Uspješno obrisano!');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška!');
        }

        return redirect()->route('materijal.create');
    }
}
