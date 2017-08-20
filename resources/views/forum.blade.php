@extends('layouts.authmaster')

@section('title')

@endsection

@section('content')
	
	@foreach($discussions as $discussion)
		<div class="panel panel-default">
			<div class="panel-heading">
				<img src="/uploads/avatars/{{$discussion->user->avatar}}" style="width: 40px; height: 40px;border-radius: 50%;">&nbsp;&nbsp;&nbsp;
				<span>{{$discussion->user->first_name}}&nbsp;&nbsp;<b>{{$discussion->created_at->diffForHumans()}}</b></span>
				@if($discussion->hasBestAns())
					<a class="btn btn-success btn-xs pull-right">closed</a>
				@else
					<a class="btn btn-danger btn-xs pull-right">open</a>
				@endif
				<a style="margin-right: 5px;" href="{{route('discussion', $discussion->slug)}}" class="btn btn-default pull-right btn-xs">View</a>
			</div>
			<div class="panel-body">
				<h5 style="font-weight: bold;">{{$discussion->title}}</h5>
				<hr>
				<p>{{ str_limit($discussion->content, 150) }}</p>
			</div>
			<div class="panel-footer">
				<span>
					{{ $discussion->replies->count() }} Replies
				</span>
				<a href="{{route('channel', $discussion->channel->slug)}}" class="btn btn-default btn-xs pull-right">{{$discussion->channel->title}}</a>
			</div>
		</div>

	@endforeach

	<div class="text-center">
		{{ $discussions->links() }}
	</div>

@endsection