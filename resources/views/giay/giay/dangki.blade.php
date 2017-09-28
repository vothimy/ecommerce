<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>

  <link href="{{  $adminUrl }}/css/login.css" rel='stylesheet' type='text/css' />

  
</head>

<body>
  <div class="login-wrap">
    <div class="login-html">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Đăng kí</label>
      <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
      <div class="login-form">

        <form action="{{ route('public.giay.dangki') }}" method="POST">
          {{ csrf_field() }}
          <div class="sign-in-htm">
            <div class="group">
              <label for="user" class="label">Tên người dùng</label>
              <input id="user" name="username" type="text" class="input">
            </div>
            <div class="group">
              <label for="user" class="label">Họ và tên</label>
              <input id="user" name="fullname" type="text" class="input">
            </div>
            <div class="group">
              <label for="pass" class="label">Mật khẩu</label>
              <input id="pass" type="password" name="password1" class="input" data-type="password">
            </div>
            <div class="group">
              <label for="pass" class="label">Email</label>
              <input id="pass" name="email" type="text" class="input">
            </div>
            <div class="group">
              <label for="pass" class="label">Địa chỉ</label>
              <input id="pass" name="address" type="text" class="input">
            </div>
            <div class="group">
              <input type="submit" class="button" value="Đăng kí">
            </div>
            <div class="hr"></div>
      </div>
    </form>
  </div>
</html>
