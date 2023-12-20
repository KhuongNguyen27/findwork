<!-- Main Header-->
<header class="main-header">
    <div class="main-box">
        <div class="nav-outer">
            <div class="logo-box">
                <div class="logo"><a href="{{ route('home.index') }}"><img
                            src="{{ asset('website-assets/images/logo.svg')}}" alt="" title=""></a></div>
            </div>
            @include('website.includes.header.main-menu')
        </div>
        <div class="outer-box">
            <!-- Add Listing -->
            <a href="{{ route('cv-manager.index')}}" class="upload-cv">Tải lên CV của bạn</a>
            <!-- Login/Register -->
            <div class="btn-box">
                <a href="login-popup.html" class="theme-btn btn-style-three call-modal">Đăng nhập / Đăng ký</a>
                <a href="{{ route('dashboards.index') }}" class="theme-btn btn-style-one">Tin tuyển dụng</a>
            </div>
        </div>
    </div>
    @include('website.includes.header.mobile-menu')
</header>
<!--End Main Header -->