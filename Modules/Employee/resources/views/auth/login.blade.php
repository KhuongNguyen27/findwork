@extends('website.layouts.auth')
@section('content')
<!-- Login Form -->
<div class="login-form default-form">
    <div class="form-inner">
        <h3>Đăng Nhập Nhà Tuyển Dụng</h3>
        <!--Login Form-->
        <form action="{{ route('employee.postLogin')}}" method="POST">
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @csrf
            <div class="form-group">
                <label>email</label>
                <input type="email" name="email" placeholder="email" value="{{ old('email') }}">
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Mật Khẩu</label>
                <input id="password-field" type="password" name="password" value="" placeholder="Password" value="{{ old('Password') }}">
                @if ($errors->any())
                <p style="color:red">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="form-group">
                <div class="field-outer">
                    <div class="input-group checkboxes square">
                        <input type="checkbox" name="remember-me" value="" id="remember">
                        <label for="remember" class="remember"><span class="custom-checkbox"></span>Ghi nhớ mật khẩu</label>
                    </div>
                    <a href="{{ route('auth.forgot')}}" class="pwd">Lấy lại mật khẩu?</a>
                </div>
            </div>

            <div class="form-group">
                <button class="theme-btn btn-style-one" type="submit" name="log-in">Đăng Nhập</button>
            </div>
        </form>

        <div class="bottom-box">
            <div class="text">Bạn có muốn đăng ký tài khoản? <a href="{{ route('employee.register')}}">Đăng ký</a></div>
            {{-- <div class="divider"><span>or</span></div>
            <div class="btn-box row">
                <div class="col-lg-6 col-md-12">
                    <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-facebook-f"></i> Log In
                        via Facebook</a>
                </div>
                <div class="col-lg-6 col-md-12">
                    <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> Log In via
                        Gmail</a>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!--End Login Form -->
@endsection