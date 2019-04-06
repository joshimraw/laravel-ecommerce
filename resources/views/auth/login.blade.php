<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Eghuri.com</title>

    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>
<body>
  
   <section class="material-half-bg">
      <div class="cover"></div>
    </section>

    <section class="login-content">
      <div class="logo">
        <h1>Welcome to Eghuri</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="{{route('login')}}" method="post">
          @csrf
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">Email Address</label>
            <input type="email" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email"  required autofocus>

            @if($errors->has('email'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif

          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input type="password" name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : '' }}"  placeholder="Password">
            @if($errors->has('password'))
            <span class="invalid-feedback">
              <strong>{{$errors->first('password')}}</strong>
            </span>
            @endif

          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Remember Me</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
      </div>
    </section>


<script src="{{asset('backend/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('backend/js/popper.min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/js/main.js')}}"></script>
</body>
</html>