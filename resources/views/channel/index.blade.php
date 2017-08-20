@extends('layouts.authmaster')

@section('title')

@endsection

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">Channels</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
				    <tr>
						<th>Name</th>
						<th style="text-align:center">Edit</th>
						<th style="text-align: center;">Delete</th>
				    </tr>
				</thead>
				<tbody>
				@foreach($channels as $channel)
					<tr>
						<td>{{$channel->title}}</td>
						<td style="text-align:center">
							<a href="{{route('channel.edit', $channel->id)}}" class="btn btn-xs btn-info">Edit</a>
						</td>
						<td style="text-align:center">
							<a href="{{route('channel.delete', $channel->id)}}" class="btn btn-xs btn-danger">Delete</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
</div>

@endsection