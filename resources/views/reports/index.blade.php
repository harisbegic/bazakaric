@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	@foreach($reports as $report)
		<div class="col-sm-4">
			<h3>{{ $report->title }}</h3>
			<p>{{ $report->body }}</p>
			<small>Posted by: {{ $report->user->name }} at {{ date('d M Y', strtotime($report->created_at)) }}</small>
			<p>
			@can('edit-reports')
				<a href="{{ route('reports.edit', $report->id) }}"><button class="btn btn-sm btn-warning">Edit</button></a>
			@endcan
			@can('delete-reports')
				<form action="{{ route('reports.destroy', $report) }}" method="POST" class="float-left">
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