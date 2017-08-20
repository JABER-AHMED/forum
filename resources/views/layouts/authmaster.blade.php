<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

         <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
        <link rel="stylesheet" type="text/css" href="https://bootswatch.com/cerulean/bootstrap.min.css">

         <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

         <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-dark.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('src/main.css')}}">

    </head>
    <body>
    @include('partials.header')
    <div class="container">
    @include('partials.message')
        <div class="col-md-4">
            <a href="{{route('discussion.create')}}" class="form-control btn btn-primary" type="submit">Create a Discussion</a>
            <br>
            <div class="panel panel-default">
                <div class="panel-body">
                @if(Sentinel::getUser()->roles()->first()->slug == 'admin')
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('forum')}}" style="text-decoration: none;">Home</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/forum?filter=me" style="text-decoration: none;">My Discussions</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/forum?filter=answered" style="text-decoration: none;">Answered Discussions</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/forum?filter=UnAnswered" style="text-decoration: none;">UnAnswered Discussions</a>
                        </li>
                         <li class="list-group-item">
                            <a href="{{route('channel.index')}}" style="text-decoration: none;">All Channels</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('channel.create')}}" style="text-decoration: none;">Create Channel</a>
                        </li>
                    </ul>
                    @else

                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('forum')}}" style="text-decoration: none;">Home</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/forum?filter=me" style="text-decoration: none;">My Discussions</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/forum?filter=answered" style="text-decoration: none;">Answered Discussions</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/forum?filter=UnAnswered" style="text-decoration: none;">UnAnswered Discussions</a>
                        </li>
                    </ul>
                    @endif

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Channels
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                    @foreach($channels as $channel)
                        <li class="list-group-item">
                            <a href="{{route('channel', $channel->slug)}}" style="text-decoration: none;">{{$channel->title}}</a>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @yield('content')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"
    integrity="sha256-Xxq2X+KtazgaGuA2cWR1v3jJsuMJUozyIXDB3e793L8="
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    integrity="sha256-HmfY28yh9v2U4HfIXC+0D6HCdWyZI42qjaiCFEJgpo0="
    crossorigin="anonymous"></script>
    <script src="{{asset('src/js/app2.js')}}"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <scirpt src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></scirpt>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
     <script>hljs.initHighlightingOnLoad();</script>

     <!-- <script>
         @if(Session::has('success'))

            toastr.success({{ Session::get('success')}})

         @endif
     </script> -->
    
    </body>

</html>