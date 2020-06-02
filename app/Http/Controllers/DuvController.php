<?php

namespace App\Http\Controllers;

use App\duv;
use Illuminate\Http\Request;

class DuvController extends Controller
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
        $duvs = duv::all();
        return view('products.duv.create', [
            'duvs' => $duvs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duv = new duv;

        $duv->ime = $request->name;

        if($duv->save()) {
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
     * @param  \App\duv  $duv
     * @return \Illuminate\Http\Response
     */
    public function show(duv $duv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\duv  $duv
     * @return \Illuminate\Http\Response
     */
    public function edit(duv $duv)
    {
        return view('products.duv.edit', [
            'duv' => $duv
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\duv  $duv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, duv $duv)
    {
        $duv->ime = $request->name;

        if($duv->save())
        {
            $request->session()->flash('success', 'Uspješno uređeno');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška.');
        }

        return redirect()->route('duv.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\duv  $duv
     * @return \Illuminate\Http\Response
     */
    public function destroy(duv $duv, Request $request)
    {
        if($duv->delete())
        {
            $request->session()->flash('success', 'Uspješno obrisano!');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška!');
        }

        return redirect()->route('duv.create');
    }
}
