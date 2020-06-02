@extends('layouts.app')

@section('content')

<div class="col-md-12">
	<h5>
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{ route('home') }}">Početna</a></li>
		    <li class="breadcrumb-item"><a href="#">Proizvodi</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Dodaj kategoriju nivo 2</li>
		  </ol>
		</nav>
	</h5>
</div>

<div class="row justify-content-center">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">{{ $product->ime }}</div>
			<div class="card-body">
				<form method="POST" action="{{ route('products.updateCategory') }}">
				   @csrf
				   @method('PATCH')
				  <div class="form-group">
				        <select class="custom-select form-control" name="kategorija" required> 
				        <option selected="true" disabled>Kategorija nivo 2</option>

					        @foreach($childCategories as $childCategory)
					        	<option value="{{ $childCategory->id }}">{{ $childCategory->ime }}</option>
					        @endforeach
				        
				        </select>
					   </div>
					   <input type="hidden" name="product_id" value="{{ $product->id }}">
					   <input type="hidden" name="parentCategory" value="{{ $product->categoryParent_id }}">
				  <button type="submit" class="btn btn-success">Sačuvaj</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection