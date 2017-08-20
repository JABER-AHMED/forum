@extends('layouts.authmaster')

@section('title')

@endsection

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Update a discussion
		</div>
		<div class="panel-body">
			<form action="{{route('discussion.update', $discussion->id)}}" method="post">
				<div class="form-group">
					<label for="content">Ask a question</label>
					<textarea class="form-control" name="content" id="content" cols="30" rows="10">{{$discussion->content}}</textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success pull-right">Update discussion</button>
				</div>
				{{csrf_field()}}
			</form>
		</div>
	</div>
@endsection