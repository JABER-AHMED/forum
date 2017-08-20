<header>
	
	<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('forum')}}">Forum</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- <ul class="nav navbar-nav">
        <li class="active"><a style="font-size: 15px;" href="{{'/forum'}}">Home <span class="sr-only">(current)</span></a></li>
      </ul> -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a style="font-size: 15px; position: relative; padding-left: 50px;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
           <img src="/uploads/avatars/{{Sentinel::getUser()->avatar}}" style="width: 32px; height: 32px; position:absolute; border-radius: 50%; top:2px; left: 10px; ">
          {{Sentinel::getUser()->first_name}} <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
             <form action="{{route('logout')}}" method="post" id="logout-form">
             {{csrf_field()}}
             <li><a href="{{route('profile')}}">Profile</a></li>
            <li><a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a></li>
          </form>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


</header>