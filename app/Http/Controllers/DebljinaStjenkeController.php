<?php

namespace App\Http\Controllers;

use App\debljinaStjenke;
use Illuminate\Http\Request;

class DebljinaStjenkeController extends Controller
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
        $debljineStjenke = debljinaStjenke::all();
        return view('products.debljineStjenke.create', [
            'debljineStjenke' => $debljineStjenke]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $debljinaStjenke = new debljinaStjenke;

        $debljinaStjenke->ime = $request->name;

        if($debljinaStjenke->save()) {
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
     * @param  \App\debljinaStjenke  $debljinaStjenke
     * @return \Illuminate\Http\Response
     */
    public function show(debljinaStjenke $debljinaStjenke)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\debljinaStjenke  $debljinaStjenke
     * @return \Illuminate\Http\Response
     */
    public function edit(debljinaStjenke $debljinaStjenke)
    {
        return view('products.debljineStjenke.edit', [
            'debljinaStjenke' => $debljinaStjenke
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\debljinaStjenke  $debljinaStjenke
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, debljinaStjenke $debljinaStjenke)
    {
        $debljinaStjenke->ime = $request->name;

        if($debljinaStjenke->save())
        {
            $request->session()->flash('success', 'Uspješno uređeno');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška.');
        }

        return redirect()->route('debljinaStjenke.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\debljinaStjenke  $debljinaStjenke
     * @return \Illuminate\Http\Response
     */
    public function destroy(debljinaStjenke $debljinaStjenke, Request $request)
    {
        if($debljinaStjenke->delete())
        {
            $request->session()->flash('success', 'Uspješno obrisano!');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška!');
        }

        return redirect()->route('debljinaStjenke.create');
    }
}
