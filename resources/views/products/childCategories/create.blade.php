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
				    <li class="breadcrumb-item"><a href="#">Kategorije</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Nivo 2</li>
				  </ol>
				</nav>
			</h5>
		</div>
	    <div class="col-md-6">
	        <div class="card">
	            <div class="card-header">Dodaj kategoriju <b>nivoa 2</b></div>
	            <div class="card-body">
					<form method="POST" action="{{ route('childCategories.store') }}">
					   @csrf
					   <div class="form-group">
					   @foreach($parentCategories as $parentCategory)
						   <div class="form-check form-check-inline">
						     <input class="form-check-input" type="radio" name="parent" id="parent" value="{{ $parentCategory->id }}">
						     <label class="form-check-label" for="parent">
						       {{ $parentCategory->ime }}
						     </label>
						   </div>
					   @endforeach
					   </div>
					  <div class="form-group">
					    <input type="text" class="form-control" id="name" name="name" placeholder="Ime">
					  </div>
					  <button type="submit" class="btn btn-success">Sačuvaj</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
	        <div class="card">
	            <div class="card-header bg-dark text-white">Sve kategorije <b>nivoa 2</b></div>
	            <div class="card-body">
			<table class="table">
                <thead>
                  <tr>
                    <th scope="col">Kategorija nivo 2</th>
                    <th scope="col">Kategorija nivo 1</th>
                    <th scope="col">Radnje</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($childCategories as $childCategory)
                      <tr>
                        <td>{{ $childCategory->ime }}</td>
                        <td>{{ $childCategory->categoryParent['ime'] }}</td>
                        <td>
{{--                           @can('edit-users') --}}
                            <a href="{{ route('childCategories.edit', $childCategory->id) }}"><button type="button" class="btn btn-warning float-left">Uredi</button></a>
                          {{-- @endcan --}}
                          {{-- @can('delete-users') --}}
                            <form action="{{ route('childCategories.destroy', $childCategory) }}" method="POST" class="float-left">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class= "btn btn-danger" style="margin-left: 3px">Briši</button>
                            </form>
                          {{-- @endcan --}}
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
				</div>
			</div>
		</div>
	</div>

@endsection