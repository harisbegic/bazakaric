<?php

namespace App\Http\Controllers;

use App\categoryChild;
use App\categoryParent;
use App\Product;
use Illuminate\Http\Request;
use DB;


class CategoryChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childCategoies = categoryChild::all();
        return view('products.childCategoies.index', ['childCategoies' => $childCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = categoryParent::all();
        $childCategories = categoryChild::all();
        return view('products.childCategories.create', [
            'parentCategories' => $parentCategories,
            'childCategories' => $childCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $childCategory = new categoryChild;

        $childCategory->ime = $request->name;
        $childCategory->categoryParent_id = $request->parent;

        if($childCategory->save()) {
            $request->session()->flash('success', 'Uspješno završena radnja.');
        }
        else {
            $request->session()->flash('error', ' Par errora i to');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categoryChil  $categoryChil
     * @return \Illuminate\Http\Response
     */
    public function show(categoryChild $childCategory)
    {
        $products = Product::all()->where('categoryChild_id', $childCategory->id);
        $childCategories = categoryChild::all()->where('categoryParent_id', $childCategory->categoryParent_id);

        $sum = DB::table("products")->where('categoryChild_id', $childCategory->id)->sum("saldo");

        return view('products.childCategories.show', [
            'products' => $products,
            'childCategory' => $childCategory,
            'childCategories' => $childCategories,
            'sum' => $sum
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categoryChild  $categoryChild
     * @return \Illuminate\Http\Response
     */
    public function edit(categoryChild $childCategory)
    {
        $parentCategories = categoryParent::all();
        return view('products.childCategories.edit', [
            'childCategory' => $childCategory,
            'parentCategories' => $parentCategories
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categoryChild  $categoryChild
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categoryChild $childCategory)
    {
        $childCategory->ime = $request->name;
        $childCategory->categoryParent_id = $request->parent_id;

        if($childCategory->save())
        {
            $request->session()->flash('success', 'Uspješno završena radnja');
        }
        else 
        {
            $request->session()->flash('error', ' Error updating the user');
        }
        return redirect()->route('childCategories.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categoryChild  $categoryChild
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoryChild $childCategory, Request $request)
    {
        if($childCategory->delete())
        {
            $request->session()->flash('success', 'Uspješno završena radnja');
        }
        else 
        {
            $request->session()->flash('error', ' Desila se greška');
        }

        return redirect()->route('childCategories.create');
    }
}
