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
				    <li class="breadcrumb-item active" aria-current="page">Dodaj novi</li>
				  </ol>
				</nav>
			</h5>
		</div>
	    <div class="col-md-6">
	        <div class="card">
	            <div class="card-header">Dodaj novi <b>artikal</b></div>
	            <div class="card-body">
					<form method="POST" action="{{ route('products.store') }}">
					   @csrf
					  <div class="form-group">
					    <input type="text" class="form-control" id="name" name="ime" placeholder="Ime artikla">
					  </div>
					  <div class="form-group">
				        <select class="custom-select form-control" name="kategorija" required> 
				        <option selected="true" disabled>Kategorija nivo 1</option>

					        @foreach($parentCategories as $parentCategory)
					        	<option value="{{ $parentCategory->id }}">{{ $parentCategory->ime }}</option>
					        @endforeach
				        
				        </select>
					   </div>
					   
					   <div class="form-group">
				        <select class="custom-select form-control" name="debljina" required> 
				        <option selected="true" disabled>Debljina stjenke</option>

					        @foreach($debljineStjenke as $debljinaStjenke)
					        	<option value="{{ $debljinaStjenke->id }}">{{ $debljinaStjenke->ime }}</option>
					        @endforeach
				        
				        </select>
					   </div>
					   <div class="form-group">
				        <select class="custom-select form-control" name="duv" required> 
				        <option selected="true" disabled>Dužina/ugao/vrsta</option>

					        @foreach($duvs as $duv)
					        	<option value="{{ $duv->id }}">{{ $duv->ime }}</option>
					        @endforeach
				        
				        </select>
					   </div>
					   <div class="form-group">
				        <select class="custom-select form-control" name="promjer" required> 
				        <option selected="true" disabled>Promjer</option>

					        @foreach($promjeri as $promjer)
					        	<option value="{{ $promjer->id }}">{{ $promjer->ime }}</option>
					        @endforeach
				        
				        </select>
					   </div>
					   <div class="form-group">
				        <select class="custom-select form-control" name="materijal" required> 
				        <option selected="true" disabled>Materijal</option>
				        <option value="0">Nema</option>

					        @foreach($materijali as $materijal)
					        	<option value="{{ $materijal->id }}">{{ $materijal->name }}</option>
					        @endforeach
				        
				        </select>
					   </div>
				   	   <div class="form-group">
			            <select class="custom-select form-control" name="lokacija" required> 
			            <option selected="true" disabled>Lokacija</option>

				           @foreach($lokacije as $lokacija)
				           	<option value="{{ $lokacija->id }}">{{ $lokacija->ime }}</option>
				           @endforeach
			           
			            </select>
				   	   </div>
				   	   <div class="form-group">
			            <select class="custom-select form-control" name="vrsta" required> 
			            <option selected="true" disabled>Vrsta izolacije</option>
			            <option value="0">Nema</option>
				           @foreach($vrsteIzolacije as $vrstaIzolacije)
				           	<option value="{{ $vrstaIzolacije->id }}">{{ $vrstaIzolacije->ime }}</option>
				           @endforeach
			           
			            </select>
				   	   </div>
				   	   <div class="form-group">
				   	   		<input type="number" class="form-control" name="stariSistem" placeholder="Kolicina - stari sistem">
				   	   </div>
				   	   <div class="form-group">
				   	   		<input type="number" class="form-control" name="noviSistem" placeholder="Kolicina - novi sistem">
				   	   </div>
				   	   <input type="hidden" name="kategorijaB" value="0">
					  <button type="submit" class="btn btn-success btn-block">Sačuvaj</button>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection