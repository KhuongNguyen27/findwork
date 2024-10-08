@extends('employee::layouts.master')
@section('content')
<!-- Dashboard -->
<style>
.with-border {
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
    font-weight: 700;
    padding-top: 15px;
}

.ls-widget .widget-content {
    position: relative;
    padding: 0px 0px 10px;
}

.ls-widget .widget-content p {
    margin-bottom: 15px;
}

.form-select-lg {
    font-size: 1rem;
}
</style>
<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h5>Thông tin hồ sơ</h5>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box p-3">
                        <div class="profile-header p-3 bg-primary text-white">
                            <div class="media d-flex align-items-center">
                                <div class="avatar avatar-xxl mr-3">
                                    <img src="{{ asset('website-assets/images/default.jpg')}}" alt="Image"
                                        style="width: 150px; height: 150px;" class="avatar-img rounded-circle">
                                </div>
                                <div class="media-body ml-3">
                                    <h2 style="margin-left: 20px !important;">{{ $item->user->name ?? ''}}</h2>
                                    <!-- <p class="text-white" style="margin-left: 20px !important;">
                                        {{ $item->desired_position ?? '' }}</p> -->
                                </div>
                            </div>
                        </div>

                        
                        <div class="widget-content">
                            <div class="profile-body p-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="profile-group-info">
                                            <h5 class="profile-group-title with-border">Thông tin cá nhân</h5>
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <p class="profile-item"><strong>Họ và tên :</strong>
                                                        {{ $item->user->name ?? '' }}</p>
                                                    <p class="profile-item"><strong>Giới tính :</strong>
                                                        {{ $item->gender ?? '' }}</p>
                                                    <p class="profile-item"><strong>Năm sinh :</strong>
                                                        {{ isset($item->birthdate) ? \Carbon\Carbon::parse($item->birthdate)->format('d/m/Y') : '' }}
                                                    </p>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <p class="profile-item"><strong>Số điện thoại :</strong>
                                                        {{ $item->phone ?? '' }}</p>
                                                    <p class="profile-item"><strong>Địa chỉ :</strong>
                                                        {{ $userStaff->address ?? '' }}</p>
                                                    <p class="profile-item"><strong>Mã hồ sơ :</strong>
                                                        {{ $item->id ?? '' }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="profile-group-info">
                                            <h5 class="profile-group-title with-border">Thông tin công việc</h5>
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <p class="profile-item"><strong>Ngành nghề:</strong>
                                                        {{ $item->career->name ?? '' }}</p>
                                                    <p class="profile-item"><strong>Hình thức làm việc:</strong>
                                                        {{ $item->formwork->name ?? ''}} gian</p>
                                                    <p class="profile-item"><strong>Cấp bậc mong muốn:</strong>
                                                        {{ $item->rank->name ?? '' }}</p>
                                                    <p class="profile-item"><strong>Ngày cập nhật:</strong>
                                                        {{ isset($item->created_at) ? $item->created_at->format('d/m/Y') : '' }}
                                                    </p>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <p class="profile-item"><strong>Nơi làm việc:</strong>
                                                        {{ $item->address ?? '' }}</p>
                                                    <p class="profile-item"><strong>Tỉnh/Thành phố:</strong>
                                                        {{ $item->city }}</p>
                                                    <p class="profile-item"><strong>Mã hồ sơ:</strong>
                                                        {{ $item->id ?? '' }}</p>
                                                    <p class="profile-item"><strong>Mức lương mong muốn:</strong>
                                                        {{ $item->wage->name ?? '' }}</p>
                                                    <!-- <p class="profile-item"><strong>Số năm kinh nghiệm:</strong> {{ $item->experience_years ?? '' }}</p> -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="profile-group-info">
                                            <h5 class="profile-group-title with-border">Học vấn / Bằng cấp</h5>
                                            <ul class="timeline">
                                                @if ($educations->isEmpty())
                                                <p>Không có dữ liệu</p>
                                                @else
                                                @foreach ($educations as $key => $education)
                                                <li class="lili">
                                                    <p><strong>{{ $key + 1 }}. </strong><strong> Trường :
                                                        </strong>{{ $education->school_course ?? '' }}
                                                    </p>
                                                    <p><strong>Chuyên ngành : </strong>{{ $education->major ?? ''}}</p>
                                                    <p><strong>Ngày tốt nghiệp :
                                                        </strong>{{ $education->graduation_date ?? ''}}</p>
                                                </li>
                                                @endforeach
                                                <div class="profile-group-info">
                                                    <p><i class="la flaticon-star"></i> <strong>Thành tích nổi bật :
                                                        </strong>{{ $item->outstanding_achievements ?? '' }}</p>
                                                    <p><i class="la flaticon-star"></i> <strong>Ngoại ngữ :
                                                        </strong>{{ $education->language ?? '' }}</p>
                                                </div>
                                                @endif
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="profile-group-info">
                                            <h5 class="profile-group-title with-border">Kinh nghiệm việc làm</h5>
                                            <ul class="timeline">
                                                @if ($userExperiences->isEmpty())
                                                <p>Không có dữ liệu</p>
                                                @else
                                                @foreach($userExperiences as $key => $experience)
                                                <li>
                                                    <p><strong>{{ $key + 1 }}. </strong><strong>Vị trí:</strong>
                                                        {{ $experience->position ?? '' }}</p>
                                                    <p><strong>Thời gian : </strong> {{ $experience->start_date ?? '' }}
                                                        -{{ $experience->end_date ?? '' }}</p>
                                                    <p> <strong>Công việc :
                                                        </strong>{{ $experience->job_description ?? '' }}
                                                    </p>
                                                </li>
                                                @endforeach
                                                <div class="profile-group-info">
                                                    <p><i class="la flaticon-star"></i> <strong>Mục tiêu nghề nghiệp :
                                                        </strong> {{ $experience->position ?? '' }}
                                                    </p>
                                                </div>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="profile-group-info">
                                        <h5 class="profile-group-title with-border">Kỹ năng chuyên môn</h5>
                                        <div class="profile-group-body">
                                            <ul class="profile-skills">
                                                @if ($userSkills->isEmpty())
                                                <p>Không có dữ liệu</p>
                                                @else
                                                @foreach($item->userSkills as $key => $skill)
                                                <p><strong>{{ $key + 1 }}. </strong><strong>Kĩ năng chuyên môn :
                                                    </strong>{{ $skill->special_skill ?? ''}}</p>
                                                <p><strong>Mô tả : </strong>{{ $skill->description ?? ''}}</p>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <form action="{{route('employee.cv.update',$cv_job_apply->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select form-select-lg mb-3" name="status"
                                            aria-label=".form-select-lg example">
                                            <option @selected($cv_job_apply->status == $cv_job_apply::ACTIVE)
                                                value="{{ $cv_job_apply::ACTIVE }}">Duyệt</option>
                                            <option @selected($cv_job_apply->status == $cv_job_apply::INACTIVE)
                                                value="{{ $cv_job_apply::INACTIVE }}">Không duyệt
                                            </option>
                                            <option @selected($cv_job_apply->status == $cv_job_apply::DRAFT)
                                                value="{{ $cv_job_apply::DRAFT }}">Chờ duyệt
                                            </option>
                                        </select>
                                        <div class="form-group col-lg-12 col-md-12 text-right">
                                            <button class="theme-btn btn-style-one">Cập Nhật</button>
                                            <a style="background-color: red !important;"
                                                href="{{route('employee.cv.index')}}"
                                                class="theme-btn btn-style-one danger">Trở về</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- End Dashboard -->
@endsection