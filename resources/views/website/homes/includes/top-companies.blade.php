<!-- Top Companies -->
<section class="top-companies pt-5 pb-5">
    <div class="auto-container">
        <div class="sec-title">
            <h2 class="">Top Công ty hàng đầu</h2>
        </div>
        <div class="carousel-outer wow fadeInUp">
            <div class="companies-carousel owl-carousel owl-theme default-dots">
                @foreach ($employees as $employee)
                <!-- Company Block -->
                <div class="company-block">
                    <div class="inner-box square-box">
                        <a href="{{ route('employee.show', ['id' => $employee->slug]) }}">
                            <figure class="image"><img src="{{ $employee->image_fm }}" alt=""></figure>
                            <h4 class="name">{{ $employee->name }}</h4>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Top Companies -->