@extends('layouts.authmaster')

@section('title')

@endsection

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			Update a reply
		</div>
		<div class="panel-body">
			<form action="{{route('reply.update', $reply->id)}}" method="post">
				<div class="form-group">
					<label for="content">Answer a Question</label>
					<textarea class="form-control" name="content" id="content" cols="30" rows="10">{{$reply->content}}</textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success pull-right">Update reply</button>
				</div>
				{{csrf_field()}}
			</form>
		</div>
	</div>
@endsection