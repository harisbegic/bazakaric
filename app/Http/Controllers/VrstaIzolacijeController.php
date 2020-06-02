<?php

namespace App\Http\Controllers;

use App\vrstaIzolacije;
use Illuminate\Http\Request;

class VrstaIzolacijeController extends Controller
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
        $vrsteIzolacije = vrstaIzolacije::all();
        return view('products.vrsteIzolacije.create', [
            'vrsteIzolacije' => $vrsteIzolacije]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vrstaIzolacije = new vrstaIzolacije;

        $vrstaIzolacije->ime = $request->name;

        if($vrstaIzolacije->save()) {
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
     * @param  \App\vrstaIzolacije  $vrstaIzolacije
     * @return \Illuminate\Http\Response
     */
    public function show(vrstaIzolacije $vrstaIzolacije)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vrstaIzolacije  $vrstaIzolacije
     * @return \Illuminate\Http\Response
     */
    public function edit(vrstaIzolacije $vrstaIzolacije)
    {
        return view('products.vrsteIzolacije.edit', [
            'vrstaIzolacije' => $vrstaIzolacije
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vrstaIzolacije  $vrstaIzolacije
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vrstaIzolacije $vrstaIzolacije)
    {
        $vrstaIzolacije->ime = $request->name;

        if($vrstaIzolacije->save())
        {
            $request->session()->flash('success', 'Uspješno uređeno');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška.');
        }

        return redirect()->route('vrstaIzolacije.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vrstaIzolacije  $vrstaIzolacije
     * @return \Illuminate\Http\Response
     */
    public function destroy(vrstaIzolacije $vrstaIzolacije, Request $request)
    {
        if($vrstaIzolacije->delete())
        {
            $request->session()->flash('success', 'Uspješno obrisano!');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška!');
        }

        return redirect()->route('vrstaIzolacije.create');
    }
}
