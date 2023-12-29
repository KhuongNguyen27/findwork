<div class="ls-widget">
    <div class="tabs-box">
        <div class="widget-title">
            <h4>Thông tin công việc</h4>
        </div>

        <div class="widget-content">
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
            <form class="default-form" method="POST" action="{{ route('staff.cv.update',['cv'=>$cv_id,'tab'=>$tab]) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="tab" value="{{ request()->tab }}">
                <div class="row">
                    <!-- Thông tin cá nhân -->
                    <div class="form-group col-lg-6 col-md-12">
                        <label>Tên CV</label>
                        <input type="text" name="cv_file" value="{{ old('cv_file') ?? $item->cv_file }}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('cv_file') }}</p>
                        @endif
                    </div>
                    <!-- Thông tin công việc -->
                    <div class="form-group col-lg-6 col-md-12">
                        <label>Nhập vị trí muốn ứng tuyển</label>
                        <select name="desired_position[]" class="chosen-select js-example-basic-multiple" id=""
                            multiple="multiple">
                            <option value="1">Nhân viên</option>
                            <option value="2">Giám đốc</option>
                        </select>
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('desired_position') }}</p>
                        @endif
                    </div>
                    <script>
                    $(document).ready(function() {
                        $('.js-example-basic-multiple').select2();
                    });
                    </script>
                    <div class="form-group col-lg-6 col-md-12">
                        <label>Cấp bậc mong muốn</label>
                        <input type="text" name="desired_rank" value="{{ old('desired_rank') ?? $item->desired_rank }}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('desired_rank') }}</p>
                        @endif
                    </div>

                    <div class="form-group col-lg-6 col-md-12">
                        <label>Hình thức làm việc</label>
                        <input type="text" name="employment_type"
                            value="{{ old('employment_type') ?? $item->employment_type }}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('employment_type') }}</p>
                        @endif
                    </div>

                    <div class="form-group col-lg-6 col-md-12">
                        <label>Ngành nghề</label>
                        <input type="text" name="industry" value="{{ old('industry') ?? $item->industry }}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('industry') }}</p>
                        @endif
                    </div>

                    <div class="form-group col-lg-6 col-md-12">
                        <label>Nơi làm việc mong muốn</label>
                        <input type="text" name="desired_location"
                            value="{{ old('desired_location') ?? $item->desired_location }}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('desired_location') }}</p>
                        @endif
                    </div>

                    <div class="form-group col-lg-6 col-md-12">
                        <label>Mức lương mong muốn</label>
                        <input type="number" name="desired_salary"
                            value="{{ old('desired_salary') ?? $item->desired_salary }}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('desired_salary') }}</p>
                        @endif
                    </div>

                    <div class="form-group col-lg-6 col-md-12">
                        <label>Mục tiêu nghề nghiệp</label>
                        <input type="text" name="career_objective"
                            value="{{ old('career_objective') ?? $item->career_objective }}">
                        @if ($errors->any())
                        <p style="color:red">{{ $errors->first('career_objective') }}</p>
                        @endif
                    </div>

                    <div class="form-group col-lg-6 col-md-12">
                        <button class="theme-btn btn-style-one">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>