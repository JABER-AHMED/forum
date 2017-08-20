@extends('layouts.master')

@section('title')

@endsection

@section('content')

<div class="main">
<div class="container">
<center>
<div class="middle">
      <div id="login">

        <form action="{{route('user.login')}}" method="post">

          <fieldset class="clearfix">

            <p >
              <span class="fa fa-envelope"></span>
              <input type="text" name="email"  Placeholder="E-mail" required>
            </p>
            <p>
              <span class="fa fa-lock"></span>
              <input type="password" name="password"  Placeholder="Password" required>
            </p>
             <div>
                <span style="width:48%; text-align:left;  display: inline-block;">
                <a class="small-text" style="font-size: 12px; text-decoration: none;" href="#">Forgot password?</a>
                </span>
                <span style="width:50%; text-align:right;  display: inline-block;">
                <input type="submit" value="Sign In">
                </span>
            </div>

          </fieldset>
              <div class="clearfix"></div>
              {{csrf_field()}}
        </form>

        <div class="clearfix"></div>

      </div> <!-- end login -->
      </div>
</center>
</div>

</div>

@endsection