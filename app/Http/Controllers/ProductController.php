<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoryChild;
use App\categoryParent;
use App\debljinaStjenke;
use App\duv;
use App\Promjer;
use App\Materijal;
use App\Lokacija;
use App\vrstaIzolacije;
use App\Product;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories = categoryParent::all();
        $debljineStjenke = debljinaStjenke::all();
        $duvs = duv::all();
        $promjeri = Promjer::all();
        $materijali = Materijal::all();
        $lokacije = Lokacija::all();
        $vrsteIzolacije = vrstaIzolacije::all();

        return view('products.create', [
            'parentCategories' => $parentCategories,
            'debljineStjenke' => $debljineStjenke,
            'duvs' => $duvs,
            'promjeri' => $promjeri,
            'materijali' => $materijali,
            'lokacije' => $lokacije,
            'vrsteIzolacije' => $vrsteIzolacije
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
        $product = new Product;

        $product->ime = $request->ime;
        $product->promjer_id = $request->promjer;
        $product->duv_id = $request->duv;
        $product->vrstaIzolacije_id = $request->vrsta;
        $product->materijal_id = $request->materijal;
        $product->debljinaStjenke_id = $request->debljina;
        $product->lokacija_id = $request->lokacija;
        $product->categoryParent_id = $request->kategorija;
        $product->categoryChild_id = $request->kategorijaB;
        $product->stariSistem = $request->stariSistem;
        $product->noviSistem = $request->noviSistem;
        $product->saldo = $request->noviSistem + $request->stariSistem;
        $product->kriticnaKolicina = $request->kriticnaKolicina;

        if($product->save())
        {
            $request->session()->flash('success', 'Uspješno uređeno');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška.');
        }

        return redirect()->route('parentCategories.show', $request->kategorija);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function addCategory(Product $product)
    {
        $childCategories = categoryChild::all()->where('categoryParent_id', $product->categoryParent_id);
        return view('products.addCategory', [
            'product' => $product,
            'childCategories' => $childCategories
        ]);
    }

    public function updateCategory(Request $request, Product $product) {
        $id = $request->product_id;

        $update = DB::table('products')->where('id', $id)->update(['categoryChild_id' => $request->kategorija]);

        if($update)
        {
            $request->session()->flash('success', 'Uspješno završena radnja');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška.');
        }
        
        return redirect()->route('parentCategories.show', $request->parentCategory);
    }

    public function alterKolicina(Product $product)
    {
        return view('products.alterKolicina', [
            'product' => $product,
        ]);
    }

    public function updateKolicina(Request $request, Product $product) {
        $id = $request->product_id;

        $update = DB::table('products')->where('id', $id)->update([
            'stariSistem' => $request->stariSistem,
            'noviSistem' => $request->noviSistem,
            'saldo' => $request->stariSistem + $request->noviSistem
        ]);

        if($update)
        {
            $request->session()->flash('success', 'Uspješno završena radnja');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška.');
        }

        return redirect()->route('childCategories.show', $request->childCategory);
    }

    public function edit(Product $product)
    {
        $parentCategories = categoryParent::all();
        $childCategories = categoryChild::all();
        $debljineStjenke = debljinaStjenke::all();
        $duvs = duv::all();
        $promjeri = Promjer::all();
        $materijali = Materijal::all();
        $lokacije = Lokacija::all();
        $vrsteIzolacije = vrstaIzolacije::all();
        return view('products.edit', [
            'product' => $product,
            'parentCategories' => $parentCategories,
            'childCategories' => $childCategories,
            'debljineStjenke' => $debljineStjenke,
            'duvs' => $duvs,
            'promjeri' => $promjeri,
            'materijali' => $materijali,
            'lokacije' => $lokacije,
            'vrsteIzolacije' => $vrsteIzolacije
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $product->ime = $request->ime;
        $product->promjer_id = $request->promjer;
        $product->duv_id = $request->duv;
        $product->vrstaIzolacije_id = $request->vrsta;
        $product->materijal_id = $request->materijal;
        $product->debljinaStjenke_id = $request->debljina;
        $product->lokacija_id = $request->lokacija;
        $product->categoryParent_id = $request->kategorija;
        $product->categoryChild_id = $request->kategorija2;
        $product->stariSistem = $request->stariSistem;
        $product->noviSistem = $request->noviSistem;
        $product->saldo = $request->noviSistem + $request->stariSistem;
        $product->kriticnaKolicina = $request->kriticnaKolicina;

        if($product->save())
        {
            $request->session()->flash('success', 'Uspješno uređeno');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška.');
        }

        return redirect()->route('parentCategories.show', $request->kategorija);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Request $request)
    {
        if($product->delete())
        {
            $request->session()->flash('success', 'Uspješno obrisano!');
        }
        else 
        {
            $request->session()->flash('error', 'Desila se greška!');
        }

        return redirect()->back();
    }
}
