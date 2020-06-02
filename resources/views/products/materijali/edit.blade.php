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
        <div class="col-md-8">
            <div class="card">
            	<div class="card-header bg-dark text-white">Uredi materijal {{ $materijal->name }}</b></div>
                <div class="card-body">
					<form action="{{ route('materijal.update', $materijal->id) }}" method="POST">
					  @method('PUT')
					  @csrf
					  <div class="form-group">
					    <label for="name">Ime</label>
					    <input type="text" class="form-control" id="name" value="{{ $materijal->name }}" name="name" required>
					  </div>
					  <button type="submit" class="btn btn-primary">Sačuvaj</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	
@endsection