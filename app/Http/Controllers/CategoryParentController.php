<?php

namespace App\Http\Controllers;

use App\categoryParent;
use App\categoryChild;
use App\Product;
use Illuminate\Http\Request;

class CategoryParentController extends Controller
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
        $parentCategories = categoryParent::all();
        return view('products.parentCategories.create', ['parentCategories' => $parentCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parentCategory = new categoryParent;

        $parentCategory->ime = $request->name;

        if($parentCategory->save()) {
            $request->session()->flash('success', 'Uspješno odrađena radnja.');
        }
        else {
            $request->session()->flash('error', ' Par errora i to');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categoryParent  $categoryParent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoryParent = categoryParent::find($id);
        $childCategories = categoryChild::all()->where('categoryParent_id', $id);
        $products = Product::all()->where('categoryParent_id', $id);
        return view('products.parentCategories.show', [
            'products' => $products,
            'categoryParent' => $categoryParent,
            'childCategories' => $childCategories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categoryParent  $categoryParent
     * @return \Illuminate\Http\Response
     */
    public function edit(categoryParent $parentCategory)
    {
        return view('products.parentCategories.edit', ['parentCategory' => $parentCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categoryParent  $categoryParent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categoryParent $parentCategory)
    {
        $parentCategory->ime = $request->name;

        if($parentCategory->save())
        {
            $request->session()->flash('success', 'Uspješno završena radnja');
        }
        else 
        {
            $request->session()->flash('error', ' Error updating the user');
        }
        return redirect()->route('parentCategories.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categoryParent  $categoryParent
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoryParent $parentCategory, Request $request)
    {
        if($parentCategory->delete())
        {
            $request->session()->flash('success','Report has been deleted');
        }
        else 
        {
            $request->session()->flash('error', ' Error deleting the report');
        }

        return redirect()->back();
    }
}
