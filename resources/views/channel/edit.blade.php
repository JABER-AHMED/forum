@extends('layouts.authmaster')

@section('title')

@endsection

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">Update Channel: {{$channel->title}}</div>
		<div class="panel-body">
			<form action="{{route('channel.update', $channel->id)}}" method="POST">
				<div class="form-group">
					<input type="text" name="channel" value="{{$channel->title}}" class="form-control">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button type="submit" class="btn btn-success">Update Channel</button>
					</div>
				</div>
				{{csrf_field()}}
			</form>
		</div>
</div>
@endsection