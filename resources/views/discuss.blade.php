@extends('layouts.authmaster')

@section('title')

@endsection

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Create a New Discussion
		</div>
		<div class="panel-body">
			<form action="{{route('discussion.store')}}" method="post">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control">
				</div>
				<div class="form-group">
					<label for="channel">Pick a Channel</label>
					<select name="channel_id" id="channel_id" class="form-control">
						@foreach($channels as $channel)
							<option value="{{$channel->id}}">{{$channel->title}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="content">Ask a question</label>
					<textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success pull-right">Create Discussion</button>
				</div>
				{{csrf_field()}}
			</form>
		</div>
	</div>
@endsection