<style>
    span.flaticon-bookmark.active {
    color: red;
}
</style>
<div class="job-block">
    <div class="inner-box">
        <div class="content">
        <span class="company-logo"><img src="{{ asset($job->getImage($job->user_id)) }}" alt=""></span>
            <h4><a href="{{ route('website.jobs.show', $job->id) }}">{{$job->name}}</a></h4>
            <div>
                {{$job->description}}
            </div>
            @if($job_info)
            <ul class="job-info">
                <li><span class="icon flaticon-briefcase"></span> Ngành nghề (Career)</li>
                <li><span class="icon flaticon-map-locator"></span>{{$job->work_address}}</li>
                <li><span class="icon flaticon-clock-3"></span>{{ $job->time_create }}</li>
                <li><span class="icon flaticon-money"></span>{{$job->wage_fm}} đ</li>
            </ul>
            @endif
            @if($job_other_info)
            <ul class="job-other-info">
                <li class="time">Thời gian làm việc (Type_work)</li>
                <li class="privacy">Private</li>
                <li class="required">Urgent</li>
            </ul>
            @endif
            @if($bookmark)
            <a href="javascript:;" class="bookmark-btn" data-href="{{ route('staff.job-favorite',['id'=> $job->id]) }}">
                @if( in_array($job->id,$cr_user_favorites) ) 
                <span class="flaticon-bookmark active"></span>
                @else
                <span class="flaticon-bookmark"></span>
                @endif
            </a>
            @endif

        </div>
    </div>
</div>