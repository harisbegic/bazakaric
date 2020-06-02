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
				    <li class="breadcrumb-item active" aria-current="page">Debljina stjenke</li>
				  </ol>
				</nav>
			</h5>
		</div>
	    <div class="col-md-6">
	        <div class="card">
	            <div class="card-header">Dodaj debljinu stjenke</div>
	            <div class="card-body">
					<form method="POST" action="{{ route('debljinaStjenke.store') }}">
					   @csrf
					  <div class="form-group">
					    <input type="text" class="form-control" id="name" name="name" placeholder="Debljina">
					  </div>
					  <button type="submit" class="btn btn-success">Sačuvaj</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
	        <div class="card">
	            <div class="card-header bg-dark text-white">Sve debljine</div>
	            <div class="card-body">
						<table class="table">
                <thead>
                  <tr>
                    <th scope="col">Debljine</th>
                    <th scope="col">Radnje</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($debljineStjenke as $debljinaStjenke)
                      <tr>
                        <td>{{ $debljinaStjenke->ime }}</td>
                        <td>
{{--                           @can('edit-users') --}}
                            <a href="{{ route('debljinaStjenke.edit', $debljinaStjenke->id) }}"><button type="button" class="btn btn-warning float-left">Uredi</button></a>
                          {{-- @endcan --}}
                          {{-- @can('delete-users') --}}
                            <form action="{{ route('debljinaStjenke.destroy', $debljinaStjenke) }}" method="POST" class="float-left">
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