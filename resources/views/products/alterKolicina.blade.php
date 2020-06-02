@extends('layouts.app')

@section('content')

<div class="col-md-12">
	<h5>
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{ route('home') }}">Početna</a></li>
		    <li class="breadcrumb-item"><a href="#">Proizvodi</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Izmijeni količinu</li>
		  </ol>
		</nav>
	</h5>
</div>

<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">{{ $product->ime }}</div>
			<div class="card-body">
				<form method="POST" action="{{ route('products.updateKolicina') }}">
				   @csrf
				   @method('PATCH')
				  <div class="form-group">
				    <label for="stariSistem">Stari sistem</label>
				    <input type="number" class="form-control" value="{{ $product->stariSistem }}" name="stariSistem" required>
				  </div>
				  <div class="form-group">
				    <label for="noviSistem">Novi sistem</label>
				      <input type="number" class="form-control" value="{{ $product->noviSistem }}" name="noviSistem" required>
				   </div>
				   <input type="hidden" name="product_id" value="{{ $product->id }}">
				   <input type="hidden" name="parentCategory" value="{{ $product->categoryParent_id }}">
				   <input type="hidden" name="childCategory" value="{{ $product->categoryChild_id }}">
				  <button type="submit" class="btn btn-success">Sačuvaj</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection