@extends('admintheme::layouts.master')
@section('content')
<!-- Overwrite -->
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-4 row-cols-xxl-4">
    <div class="col">
        <div class="card radius-10 border-0 border-start border-warning border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="">
                        <p class="mb-1">NTD đăng ký mới hôm nay : </p>
                        <h4 class="mb-0 text-warning so-luong-NTD-dang-ky-hom-nay">{{$countRegisterToday->count_employee}}</h4>
                    </div>
                    <div class="ms-auto widget-icon bg-warning text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                            <path
                                d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                        </svg>
                        {{-- <i class="bi bi-people-fill"></i> --}}
                    </div>
                </div>
                <div class="progress mt-3" style="height: 4.5px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 75%;" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-0 border-start border-primary border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="">
                        <p class="mb-1">UV đăng ký mới hôm nay : </p>
                        <h4 class="mb-0 text-primary so-luong-UV-dang-ky-hom-nay">{{$countRegisterToday->count_staff}}</h4>
                    </div>
                    <div class="ms-auto widget-icon bg-primary text-white">
                        {{-- <i class="bi bi-basket2-fill"></i> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-fill-check" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path
                                d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                        </svg>
                    </div>
                </div>
                <div class="progress mt-3" style="height: 4.5px;">
                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-0 border-start border-success border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="">
                        <p class="mb-1">Tổng số NTD : </p>
                        <h4 class="mb-0 text-success tong-so-NTD">{{$countStaffAndEmployee->count_employee}}</h4>
                    </div>
                    <div class="ms-auto widget-icon bg-success text-white">
                        {{-- <i class="bi bi-currency-dollar"></i> --}}
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
                <div class="progress mt-3" style="height: 4.5px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-0 border-start border-danger border-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="">
                        <p class="mb-1">Tổng số UV : </p>
                        <h4 class="mb-0 text-danger tong-so-UV">{{$countStaffAndEmployee->count_staff}}</h4>
                    </div>
                    <div class="ms-auto widget-icon bg-danger text-white">
                        {{-- <i class="bi bi-graph-down-arrow"></i> --}}
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
                <div class="progress mt-3" style="height: 4.5px;">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Chart -->
<div class='row'>
    <div class="col-12">
        <div class="card">
            <div class="card-header row">
                <div class="col-md-4">
                    <label for="">Ngày bắt đầu</label>
                    <input type="time" id="input_start_time" value="00:00" onchange="setting_date()">
                    <input type="date" id="input_start_date" value="{{$firstDayOfMonth}}" onchange="setting_date()">
                </div>
                <div class="col-md-4">
                    <label for="">Ngày kết thúc</label>
                     <input type="time" id="input_end_time" value="23:59" onchange="setting_date()">
                     <input type="date" id="input_end_date" value="{{date('Y-m-d')}}" onchange="setting_date()">
                </div>
                <div class="col-md-4">
                    <label for="">Biểu đồ</label>
                    <select id="dataChart" onchange="setting_date()">
                        <option value="tong-so-NTD">Tổng số NTD</option>
                        <option value="tong-so-UV">Tổng số UV</option>
                        <option value="NTD-dang-ky-moi-hom-nay">NTD đăng ký mới hôm nay</option>
                        <option value="UV-dang-ky-moi-hom-nay">UV đăng ký mới hôm nay</option>
                        <option value="so-luong-khach-truy-cap-website">Số lượng khách truy cập website</option>
                        <option value="tai-khoan-NTD-truy-cap-website">Số lượng tài khoản NTD truy cập website</option>
                        <option value="tai-khoan-UV-truy-cap-website">Số lượng tài khoản UV truy cập website</option>
                        <option value="NTD-truy-cap-website">Số lượng NTD truy cập website</option>
                        <option value="UV-truy-cap-website">Số lượng UV truy cập website</option>
                        <option value="tin-dang-tuyen-dung">Số lượng tin đăng tuyển dụng</option>
                        <option value="so-lan-xem-tin-tuyen-dung">Số lần xem bài tin tuyển dụng</option>
                        <option value="tin-co-luot-nop-ho-so">Số lượng Tin tuyển dụng có lượt nộp hồ sơ</option>
                        <!-- <option value="ti-le-giu-chan-tai-khoan-NTD">Tỉ lệ giữ chân tài khoản NTD</option>
                        <option value="ti-le-giu-chan-tai-khoan-UV">Tỉ lệ giữ chân tài khoản UV</option>
                        <option value="ti-le-roi-bo-NTD">Tỉ lệ rời bỏ của NTD</option>
                        <option value="ti-le-roi-bo-UV">Tỉ lệ rời bỏ của UV</option>
                        <option value="ti-le-tin-co-ho-so-ung-tuyen">Tỉ lệ Tin tuyển dụng có hồ sơ ứng tuyển</option>
                        <option value="ti-le-nguon-truy-cap-website">Tỉ lệ Nguồn truy cập website</option> -->
                       
                       
                    </select>

                </div>
            </div>
            <div class="card-bod">
                <canvas id="myChart" width="800"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- Statistical -->
<div class="row">

    <div class="col-12 col-lg-6 col-xl-6 d-flex">
        <div class="card w-100">
            <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                    <div class="">
                        <h6 class="mb-0 fw-bold">Số lượng</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="team-list">

                    <div
                        class="d-flex align-items-center gap-3 border-start border-info border-4 border-0 px-2 py-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Số lượng khách truy cập website</h6>
                            <span
                                class="so-luong-khach-truy-cap">{{$total_access}}</span>
                        </div>
                    </div>
                    <hr>
                    <div
                        class="d-flex align-items-center gap-3 border-start border-success border-4 border-0 px-2 py-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Số lượng tài khoản NTD truy cập website</h6>
                            <span class="so-luong-tai-khoan-NTD">{{$userCountAccess->count_employee}}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center gap-3 border-start border-danger border-4 border-0 px-2 py-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Số lượng tài khoản UV truy cập website</h6>
                            <span class="so-luong-tai-khoan-UV">{{$userCountAccess->count_staff}}</span>
                        </div>
                    </div>
                    <hr>
                    <div
                        class="d-flex align-items-center gap-3 border-start border-primary border-4 border-0 px-2 py-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Số lượng NTD truy cập website</h6>
                            <span class="so-luong-NTD">{{$userCountAccess->count_employee}}</span>
                        </div>
                    </div>
                    <hr>
                    <div
                        class="d-flex align-items-center gap-3 border-start border-warning border-4 border-0 px-2 py-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Số lượng UV truy cập website</h6>
                            <span class="so-luong-UV">{{$userCountAccess->count_staff}}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center gap-3 border-start border-info border-4 border-0 px-2 py-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Số lượng Tin tuyển dụng có lượt nộp hồ sơ</h6>
                            <span class="so-tin-co-ho-so">{{$countJobApply}}</span>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="d-flex align-items-center gap-3 border-start border-info border-4 border-0 px-2 py-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Số lần xem bài tin tuyển dụng</h6>
                            <span class="so-luot-xem-tin">{{$objectCountJob->sum_views}}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center gap-3 border-start border-info border-4 border-0 px-2 py-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Số lượng tin đăng tuyển dụng</h6>
                            <span class="so-luong-tin-dang">{{$objectCountJob->count_job}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-6 d-flex">
        <div class="card w-100">
            <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                    <div class="">
                        <h6 class="mb-0 fw-bold">Tỷ lệ</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="team-list">
                    <div class="d-flex align-items-center gap-3 border-start border-info border-4 border-0 px-2 py-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Tỉ lệ Nguồn truy cập website</h6>
                            <span class="ti-le-truy-cap">{{$retention_rate_access_source_website}}%</span>
                        </div>
                    </div>
                    <hr>
                    <div
                        class="d-flex align-items-center gap-3 border-start border-success border-4 border-0 px-2 py-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Tỉ lệ giữ chân tài khoản NTD</h6>
                            <span class="ti-le-giu-chan-NTD">{{$ratioHoldEmployee}}%</span>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center gap-3 border-start border-danger border-4 border-0 px-2 py-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Tỉ lệ giữ chân tài khoản UV</h6>
                            <span class="ti-le-giu-chan-UV">{{$ratioHoldStaff}}%</span>
                        </div>
                    </div>
                    <hr>
                    <div
                        class="d-flex align-items-center gap-3 border-start border-primary border-4 border-0 px-2 py-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Tỉ lệ rời bỏ của NTD</h6>
                            <span class="ti-le-roi-bo-NTD">{{number_format(100 - $ratioHoldEmployee,3)}}%</span>
                        </div>
                    </div>
                    <hr>
                    <div
                        class="d-flex align-items-center gap-3 border-start border-warning border-4 border-0 px-2 py-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Tỉ lệ rời bỏ của UV</h6>
                            <span class="ti-le-roi-bo-UV">{{number_format(100 - $ratioHoldStaff,3)}}%</span>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center gap-3 border-start border-info border-4 border-0 px-2 py-1">
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-bold">Tỉ lệ Tin tuyển dụng có hồ sơ ứng tuyển</h6>
                            <span class="ti-le-tin-co-ho-so">{{number_format($ratioJobApply, 3)}}%</span>
                        </div>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
window.myChart = new Chart(document.getElementById('myChart'), {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
setting_date();

function setting_date() {
    if (window.myChart) {
        window.myChart.destroy(); // Xóa biểu đồ hiện tại nếu đã tồn tại
    }
    var data = {
        startDate: $('#input_start_date').val(),
        {{-- startTime: $('#input_start_time').val(), --}}
        endDate: $('#input_end_date').val(),
        {{-- endTime: $('#input_end_time').val(), --}}
        dataChart: $('#dataChart').val(),
    }
    $.ajax({
        url: "{!! route('admin.chartAjax') !!}",
        datatype: "html",
        type: "get",
        data: data,
        success: function(response) {
            // console.log(response);
            window.myChart = new Chart(document.getElementById('myChart'), {
                type: 'line',
                data: {
                    labels: response.labels,
                    datasets: [{
                        label: 'Người',
                        data: response.total_amounts,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function(error) {

        },
    })
};

var timeOutId = 0;
var ajaxFn = function() {
    $.ajax({
        url: '{{route("admin.autoloadAjax")}}',
        success: function(response) {
            $('.so-luong-khach-truy-cap').text(response.total_access);
            $('.so-luong-tai-khoan-NTD').text(response.userCountAccess.count_employee);
            $('.so-luong-tai-khoan-UV').text(response.userCountAccess.count_staff);
            $('.so-luong-NTD').text(response.userCountAccess.count_employee);
            $('.so-luong-UV').text(response.userCountAccess.count_staff);
            $('.so-luong-tin-dang').text(response.objectCountJob.count_job);
            $('.so-luot-xem-tin').text(response.objectCountJob.sum_views);
            $('.so-tin-co-ho-so').text(response.countJobApply);
            $('.so-luong-NTD-dang-ky-hom-nay').text(response.countRegisterToday.count_employee);
            $('.so-luong-UV-dang-ky-hom-nay').text(response.countRegisterToday.count_staff);
            $('.tong-so-NTD').text(response.countStaffAndEmployee.count_employee);
            $('.tong-so-UV').text(response.countStaffAndEmployee.count_staff);

            $('.ti-le-truy-cap').text(response.retention_rate_access_source_website + '%');
            $('.ti-le-giu-chan-NTD').text(response.ratioHoldEmployee + '%');
            $('.ti-le-giu-chan-UV').text(response.ratioHoldStaff + '%');
            $('.ti-le-roi-bo-NTD').text((100 - response.ratioHoldEmployee).toFixed(3) + '%');
            $('.ti-le-roi-bo-UV').text((100 - response.ratioHoldStaff).toFixed(3) + '%');
            $('.ti-le-tin-co-ho-so').text(response.ratioJobApply.toFixed(3) + '%');

            clearTimeout(timeOutId);
            timeOutId = setTimeout(ajaxFn, 1000);
        }
    });
};

ajaxFn();


// var timeOutId = 0;
//         var ajaxFn = function () {
//             $.ajax({
//                 url: '',
//                 success: function (response) {
//                     $('.so-luong-tai-khoan-NTD').text(response.userCountAccess.count_employee)
//                    console.log(response);
//                 }
//             });
//         }
//         timeOutId = setTimeout(ajaxFn, 2000);
</script>
@endpush

@endsection