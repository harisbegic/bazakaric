@extends('layouts.app')

@section('content')


@section('content')
<div class="container">
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
                <div class="card-header">Dodaj kategoriju nivoa 1</b></div>
                <div class="card-body">
					<form action="{{ route('tasks.store') }}" method="POST">
						@csrf
					  <div class="form-group">
					    <label for="name">Task</label>
					    <input type="text" class="form-control" id="name" placeholder="Contribute to to-do list" name="name" required>
					  </div>
					  <input type="hidden" name="status" value="0">
					  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					  <button type="submit" class="btn btn-info">Post</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@endsection