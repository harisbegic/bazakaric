@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
	@foreach($tasks as $task)
		<div class="col-sm-4">
			<h3>{{ $task->name }}</h3>
			<p>
			{{-- @can('edit-tasks') --}}
				<a href="{{ route('tasks.edit', $task->id) }}"><button class="btn btn-sm btn-warning">Edit</button></a>
			{{-- @endcan --}}
			@can('delete-tasks')
				<form action="{{ route('tasks.destroy', $task) }}" method="POST" class="float-left">
				  @csrf
				  {{ method_field('DELETE') }}
				  <button type="submit" class="btn btn-sm btn-danger" style="margin-left: 3px">Delete</button>
				</form>
			@endcan
			</p>
		</div>
	@endforeach
</div>

@endsection