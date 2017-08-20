@extends('layouts.authmaster')

@section('title')

@endsection

@section('content')
	<div class="panel panel-default">
			<div class="panel-heading">
				<img src="/uploads/avatars/{{$discussion->user->avatar}}" alt="" width="40px;" height="40px;" style="border-radius: 50%;">&nbsp;&nbsp;&nbsp;
				<span>{{$discussion->user->first_name}}&nbsp;&nbsp;<b>{{$discussion->created_at->diffForHumans()}}</b></span>

				@if($discussion->hasBestAns())
					<a class="btn btn-success btn-xs pull-right" style="margin-left: 5px;">closed</a>
				@else
					<a class="btn btn-danger btn-xs pull-right" style="margin-left: 5px;">open</a>
				@endif

				@if(Sentinel::getUser()->id == $discussion->user->id)

					@if(!$discussion->hasBestAns())
						<a href="{{route('discussion.edit', $discussion->slug)}}" class="btn btn-info pull-right btn-xs" style="margin-left: 5px;">Edit</a>
					@endif

				@endif
				
				@if($discussion->is_being_watched_by_auth_user())

					<a href="{{route('discussion.unwatch', $discussion->id)}}" class="btn btn-default pull-right btn-xs">unwatch</a>

				@else

					<a href="{{route('discussion.watch', $discussion->id)}}" class="btn btn-default pull-right btn-xs">watch</a>

				@endif
			</div>
			<div class="panel-body">
				<h5 style="font-weight: bold;">{{$discussion->title}}</h5>
				<hr>
				{!! Markdown::convertToHtml($discussion->content) !!}
			</div>
			<hr>
			@if($best_answer)
			<div class="text-center" style="padding: 40px;">
				<h3 class="text-center">Best Answer</h3>
				<div class="panel panel-success">
					<div class="panel-heading">
						<img src="/uploads/avatars/{{$best_answer->user->avatar}}" alt="" width="40px;" height="40px;" style="border-radius: 50%;">&nbsp;&nbsp;&nbsp;
						<span>{{$best_answer->user->first_name}}&nbsp;&nbsp;<b>{{$discussion->created_at->diffForHumans()}}</b></span>
					</div>
					<div class="panel-body">
						{!! Markdown::convertToHtml($best_answer->content) !!}
					</div>
				</div>
			</div>
			@endif
			<div class="panel-footer">
				<span>
					{{$discussion->replies->count() }} Replies
				</span>
				<a href="{{route('channel', $discussion->channel->slug)}}" class="btn btn-default btn-xs pull-right">{{$discussion->channel->title}}</a>
			</div>
	</div>
	@foreach($discussion->replies as $r)
	<div class="panel panel-default">
			<div class="panel-heading">
				<img src="/uploads/avatars/{{$r->user->avatar}}" alt="" width="40px;" height="40px;" style="border-radius: 50%;">&nbsp;&nbsp;&nbsp;
				<span>{{$r->user->first_name}}&nbsp;&nbsp;<b>{{$r->created_at->diffForHumans()}}</b></span>
				@if(!$best_answer)
				<a href="{{route('discussion.best.answer', $r->id)}}" class="btn btn-info btn-xs pull-right" style="margin-left: 5px;">Mark as best answer</a>
				@endif

				@if(Sentinel::getUser()->id == $r->user->id)
					@if(!$r->best_answer)

						<a href="{{route('reply.edit', $r->id)}}" class="btn btn-info btn-xs pull-right">Edit</a>

					@endif
				@endif
			</div>
			<div class="panel-body">
				<p>{!! Markdown::convertToHtml($r->content) !!}</p>
			</div>

			<div class="panel-footer">
				@if($r->is_liked_by_auth_user())
					<a href="{{route('reply.unlike', $r->id)}}" class="btn btn-danger btn-xs">Unlike&nbsp;<span class="badge">{{$r->likes->count()}}</span></a>
				@else
					<a href="{{route('reply.like', $r->id)}}" class="btn btn-success btn-xs">Like&nbsp;<span class="badge">{{$r->likes->count()}}</span></a>
				@endif
			</div>
		</div>

	@endforeach

	 @if(Sentinel::check())

	 	<div class="panel panel-default">
		<div class="panel-body">
			<form action="{{route('discussion.reply', $discussion->id)}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
				<label for="reply">Leave a reply...</label>
					<textarea name="reply" id="reply" rows="4" cols="30" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-info pull-right">Leave a reply</button>
				</div>
			</form>
		</div>
	</div>

	 @else

	 	<div class="text-center">
	 		<h2>Sign in to leave a reply..</h2>
	 	</div>

	 @endif

		
@endsection