@extends('layouts.authmaster')

@section('title')

@endsection

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">Create a new Channel</div>
		<div class="panel-body">
			<form action="{{route('channel.store')}}" method="POST">
				<div class="form-group">
					<input type="text" name="channel" class="form-control">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button type="submit" class="btn btn-success">Save Channel</button>
					</div>
				</div>
				{{csrf_field()}}
			</form>
		</div>
</div>

@endsection