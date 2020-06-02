<?php

namespace App\Http\Controllers;

use App\Promjer;
use Illuminate\Http\Request;

class PromjerController extends Controller
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
        $promjeri = Promjer::all();
        return view('products.promjeri.create', [
            'promjeri' => $promjeri]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promjer = new Promjer;

        $promjer->ime = $request->name;

        if($promjer->save()) {
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
     * @param  \App\Promjer  $promjer
     * @return \Illuminate\Http\Response
     */
    public function show(Promjer $promjer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promjer  $promjer
     * @return \Illuminate\Http\Response
     */
    public function edit(Promjer $promjer)
    {
        return view('products.promjeri.edit', [
            'promjer' => $promjer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promjer  $promjer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promjer $promjer)
    {
        $promjer->ime = $request->name;

        if($promjer->save())
        {
            $request->session()->flash('success', 'Uspješno uređeno');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška.');
        }

        return redirect()->route('promjer.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promjer  $promjer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promjer $promjer, Request $request)
    {
        if($promjer->delete())
        {
            $request->session()->flash('success', 'Uspješno obrisano!');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška!');
        }

        return redirect()->route('promjer.create');
    }
}
