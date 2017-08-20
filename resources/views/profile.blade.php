@extends('layouts.authmaster')

@section('title')

@endsection

@section('content')

		<div class="row">
			<div class="col-md-10 col-md-offset-1">
			<img src="/uploads/avatars/{{$user->avatar}}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
				<h2>{{ $user->first_name}}'s Profile</h2>
				<form enctype="multipart/form-data" action="{{route('user.profile')}}" method="post">
					<label>Update Profile Image</label>
					<input type="file" name="avatar">
					<input type="submit" class="btn btn-primary btn-sm">
					{{csrf_field()}}
				</form>
			</div>
		</div>

@endsection