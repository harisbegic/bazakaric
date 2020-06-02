@extends('layouts.app')

@section('content')

	@if(count($errors))
		<div class="col-sm-12">
			<div class="col-sm-offset-3 col-sm-6">
				<div class="alert alert-danger">
					<ul>
						@foreach($errors as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	@endif

	<div class="row justify-content-center">
		<div class="col-md-12">
			<h5>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="{{ route('home') }}">Početna</a></li>
				    <li class="breadcrumb-item"><a href="#">Proizvodi</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Uredi</li>
				  </ol>
				</nav>
			</h5>
		</div>
	    <div class="col-md-6">
	        <div class="card">
	            <div class="card-header">Uredi artikal <b>{{ $product->ime }}</b></div>
	            <div class="card-body">
					<form method="POST" action="{{ route('products.update', $product->id) }}">
					   @csrf
					   @method('PUT')
					  <div class="form-group">
					    <input type="text" class="form-control" id="name" name="ime" value="{{ $product->ime }}">
					  </div>
					  <div class="form-group">
				        <select class="custom-select form-control" name="kategorija" required> 
				        <option disabled>Kategorija nivo 1</option>

					        @foreach($parentCategories as $parentCategory)
					        	<option 
					        	@if($product->parentCategory_id === $parentCategory->id) selected='selected'@endif value="{{ $parentCategory->id }}">
								{{ $parentCategory->ime }}</option>
					        @endforeach
				        
				        </select>
					   </div>

					   <div class="form-group">
				        <select class="custom-select form-control" name="kategorija2" required> 
				        <option disabled>Kategorija nivo 2</option>

					        @foreach($childCategories as $childCategory)
					        	<option 
					        	@if($product->childCategory_id === $childCategory->id) selected='selected'@endif value="{{ $childCategory->id }}">
								{{ $childCategory->ime }}</option>
					        @endforeach
				        
				        </select>
					   </div>
					   
					   <div class="form-group">
				        <select class="custom-select form-control" name="debljina" required> 
				        <option disabled>Debljina stjenke</option>

					        @foreach($debljineStjenke as $debljinaStjenke)
					        	<option 
					        	@if($product->debljinaStjenke_id === $debljinaStjenke->id) 
								selected='selected'@endif value="{{ $debljinaStjenke->id }}">{{ $debljinaStjenke->ime }}</option>
					        @endforeach
				        
				        </select>
					   </div>
					   <div class="form-group">
				        <select class="custom-select form-control" name="duv" required> 
				        <option disabled>Dužina/ugao/vrsta</option>

					        @foreach($duvs as $duv)
					        	<option 
					        	@if($product->duv_id === $duv->id) 
								selected='selected'@endif value="{{ $duv->id }}">{{ $duv->ime }}</option>
					        @endforeach
				        
				        </select>
					   </div>
					   <div class="form-group">
				        <select class="custom-select form-control" name="promjer" required> 
				        <option disabled>Promjer</option>

					        @foreach($promjeri as $promjer)
					        	<option 
					        	@if($product->promjer_id === $promjer->id) 
								selected='selected'@endif value="{{ $promjer->id }}">{{ $promjer->ime }}</option>
					        @endforeach
				        
				        </select>
					   </div>
					   <div class="form-group">
				        <select class="custom-select form-control" name="materijal" required> 
				        <option disabled>Materijal</option>
				        <option value="0">Nema</option>

					        @foreach($materijali as $materijal)
					        	<option 
					        	@if($product->materijal_id === $materijal->id) 
								selected='selected'@endif value="{{ $materijal->id }}">{{ $materijal->name }}</option>
					        @endforeach
				        
				        </select>
					   </div>
				   	   <div class="form-group">
			            <select class="custom-select form-control" name="lokacija" required> 
			            <option disabled>Lokacija</option>

				           @foreach($lokacije as $lokacija)
				           	<option 
					        	@if($product->lokacija_id === $lokacija->id) 
								selected='selected'@endif value="{{ $lokacija->id }}">{{ $lokacija->ime }}</option>
				           @endforeach
			           
			            </select>
				   	   </div>
				   	   <div class="form-group">
			            <select class="custom-select form-control" name="vrsta" required> 
			            <option disabled>Vrsta izolacije</option>
			            <option value="0">Nema</option>
				           @foreach($vrsteIzolacije as $vrstaIzolacije)
				           	<option 
					        	@if($product->vrstaIzolacije_id === $vrstaIzolacije->id) 
								selected='selected'@endif value="{{ $vrstaIzolacije->id }}">{{ $vrstaIzolacije->ime }}</option>
				           @endforeach
			           
			            </select>
				   	   </div>
				   	   <div class="form-group">
				   	   		<input type="number" class="form-control" name="kriticnaKolicina" value="{{ $product->kriticnaKolicina }}" placeholder="Kritična količina">
				   	   </div>
				   	   <div class="form-group">
				   	   		<input type="number" class="form-control" name="stariSistem" value="{{ $product->stariSistem }}">
				   	   </div>
				   	   <div class="form-group">
				   	   		<input type="number" class="form-control" name="noviSistem" value="{{ $product->noviSistem }}">
				   	   </div>
				   	   <input type="hidden" name="kategorijaB" value="0">
					  <button type="submit" class="btn btn-success btn-block">Sačuvaj</button>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection