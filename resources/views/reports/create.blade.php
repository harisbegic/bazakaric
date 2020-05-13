@extends('layouts.app')


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
                <div class="card-header">{{ Auth::user()->name }}</b></div>
                <div class="card-body">
					<form action="{{ route('reports.store') }}" method="POST">
						@csrf
					  <div class="form-group">
					    <label for="title">Title</label>
					    <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
					  </div>
					  <div class="form-group">
					    <label for="body">Body</label>
					    <textarea class="form-control" id="body" rows="3" placeholder="Body" name="body" required></textarea>
					  </div>
					  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					  <button type="submit" class="btn btn-info">Post</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection