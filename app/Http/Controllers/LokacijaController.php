<?php

namespace App\Http\Controllers;

use App\Lokacija;
use Illuminate\Http\Request;

class LokacijaController extends Controller
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
        $lokacije = Lokacija::all();
        return view('products.lokacije.create', [
            'lokacije' => $lokacije]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lokacija = new Lokacija;

        $lokacija->ime = $request->name;

        if($lokacija->save()) {
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
     * @param  \App\Lokacija  $lokacija
     * @return \Illuminate\Http\Response
     */
    public function show(Lokacija $lokacija)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lokacija  $lokacija
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokacija $lokacija)
    {
        return view('products.lokacije.edit', [
            'lokacija' => $lokacija
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lokacija  $lokacija
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lokacija $lokacija)
    {
        $lokacija->ime = $request->name;

        if($lokacija->save())
        {
            $request->session()->flash('success', 'Uspješno uređeno');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška.');
        }

        return redirect()->route('lokacija.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lokacija  $lokacija
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokacija $lokacija, Request $request)
    {
        if($lokacija->delete())
        {
            $request->session()->flash('success', 'Uspješno obrisano!');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška!');
        }

        return redirect()->route('lokacija.create');
    }
}
