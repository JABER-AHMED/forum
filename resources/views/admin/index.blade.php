@extends('layouts.authmaster')

@section('title')

@endsection

@section('content')
			<a href="{{route('channel', $discussion->channel->slug)}}" class="btn btn-default btn-xs pull-right">{{$discussion->channel->title}}</a>
@endsection