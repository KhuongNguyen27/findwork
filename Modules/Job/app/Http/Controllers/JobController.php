<?php

namespace Modules\Job\app\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

use Modules\Staff\app\Models\UserStaff;
use Modules\Staff\app\Models\UserCv;
use Modules\Job\app\Models\Job;
use Modules\Employee\app\Models\UserEmployee;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Career;
use App\Models\Post;
use Modules\Employee\app\Models\CareerJob;
use Modules\Job\app\Models\Country;
use Modules\Staff\app\Models\UserJobAplied;
use Illuminate\Support\Facades\DB;
use App\Traits\SEOTrait;

class JobController extends Controller
{
    use SEOTrait;
    /**
     * Display a listing of the resource.
     */
    protected $model = Job::class;
    protected $link_view = "job::jobs.";


    public function index(Request $request)
    {

        $sidebarBanners = Banner::where('group_banner', 'Sidebar Banner')->orderBy('position')->get();
        $path = request()->getPathInfo();
        $segment = Str::after($path, '/jobs');
        $query = $this->model::query();
        if ($request->pagination) {
            $paginate = $request->pagination;
        } else {
            $paginate = 3;
        }
        if ($request->name) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->address_work) {
            $query->where('work_address', 'LIKE', '%' . $request->address_work . '%');
        }
        if ($segment) {
            $query->where('country', 'LIKE', '%vietnam%');
        } else {
            $query->where('country', 'NOT LIKE', '%vietnam%')
                ->orWhereNull('country');
        }
        if ($request->career_search) {
            $query->whereHas('careers', function ($query) use ($request) {
                foreach ($request->career_search as $index => $career) {
                    if ($index === 0) {
                        $query->where('career_id', $career);
                    } else {
                        $query->orWhere('career_id', $career);
                    }
                }
            });
        }

        $items = $query->where('status', 1)->orderBy('id', 'desc')->distinct()->get();


        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = $paginate;
        $offset = ($currentPage - 1) * $perPage;

        $paginatedItems = new LengthAwarePaginator(
            $items->slice($offset, $perPage),
            $items->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );

        $careers = Career::all();
        $param = [
            'items' => $paginatedItems,
            'request' => $request,
            'careers' => $careers,
            'sidebarBanners' => $sidebarBanners,
        ];
        return view($this->link_view . 'index', $param);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $slug)
    // {
    //     // dd(123);
    //     $model = new Job;
    //     $user_id = Auth::id();
    //     $job = Job::where('slug', $slug)->with('userEmployee', 'careers')->firstOrFail();
    //     $job->views =  $job->views + 1;
    //     $job->save();
    //     $international = Country::where('id', $job->country_id)->first();
    //     $career_id = CareerJob::where('job_id', $job->id)->first();
    //     $job_relate_to = [];
    //     if ($career_id) {
    //         $job_relate_to = $model->getJobforCareerId($career_id->career_id);
    //     }
    //     $sidebarBanners = Banner::where('group_banner', 'Sidebar Banner')->orderBy('position')->get();
    //     $job_employ = Job::where('user_id', $job->user_id)->get();
    //     $moreInformation = $job->more_information ?? null;
    //     $params = [
    //         'job' => $job,
    //         'user_id' => $user_id,
    //         'job_relate_to' => $job_relate_to,
    //         'job_employ' => $job_employ,
    //         'moreInformation'=>$moreInformation,
    //         'international'=> $international,
    //         'sidebarBanners'=> $sidebarBanners,
            
            
    //     ];
    //     return view('job::jobs.show', $params);
    // }

    public function show(string $slug)
{
    // $model = new Job;
    $user_id = Auth::id();

    $job = Job::where('slug', $slug)->with( 'careers')->firstOrFail();
    // Tăng số lượt xem của công việc
   // Chỉ tăng số lượt xem nếu người dùng không phải là chủ sở hữu của công việc
        if (Auth::check() && Auth::id() !== $job->user_id) {
            // dd(123);
            $job->views = $job->views + 1;
            $job->save();
        };
    if (Auth::user() && Auth::user()->type === 'staff') {
        // Kiểm tra xem user đã xem job này chưa
        $jobView = DB::table('job_views')->where('job_id', $job->id)->where('user_id', $user_id)->first();
        if (!$jobView) {    
            // Lưu thông tin vào bảng job_views
            DB::table('job_views')->insert([
                'job_id' => $job->id,
                'user_id' => $user_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } 
    }

    $international = Country::where('id', $job->country_id)->first();

    $career_id = CareerJob::where('job_id', $job->id)->first();
    $job_relate_to = [];
    if ($career_id) {
        $job_relate_to = $job->getJobforCareerId($career_id->career_id);
    }


     // Chuyển đổi $job_relate_to thành Collection nếu cần
     $job_relate_to = collect($job_relate_to);

     // Lấy các công việc của cùng một công ty
     $job_employ = Job::where('user_id', $job->user_id)->get();
 
     // Lọc các công việc liên quan không trùng với công việc của cùng một công ty
     $companyJobIds = $job_employ->pluck('id')->toArray();
     $filteredRelatedJobs = $job_relate_to->filter(function ($job) use ($companyJobIds) {
         return $job && !in_array($job->id, $companyJobIds);
     });

    $sidebarBanners = Banner::where('group_banner', 'Sidebar Banner')->orderBy('position')->get();
    $job_employ = Job::where('user_id', $job->user_id)->get();
    $moreInformation = $job->more_information ?? null;
    $params = [
        'job' => $job,
        'user_id' => $user_id,
        'job_relate_to' => $filteredRelatedJobs,
        'job_employ' => $job_employ,
        'moreInformation' => $moreInformation,
        'international' => $international,
        'sidebarBanners' => $sidebarBanners,
    ];

    $plainText = strip_tags($job->description);
    $plainText = html_entity_decode($plainText);
    $summaryText = mb_substr($plainText, 0, 160);
    $summaryText = preg_replace('/\s+/', ' ', $summaryText);
    $summaryText = trim($summaryText);
    // Cấu hình SEO
		$keywords = $summaryText;
        $title = $job->name;
        $description = $summaryText;
        $canonical = config('seo.canonical').'jobs/'.$slug;
        $og_url = config('seo.canonical').'jobs/'.$slug;

        $this->setSEO(
						$title,
						$description,
						$canonical,
						$keywords,
                        $og_url
					);
    return view('job::jobs.show', $params);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function aplication($slug)
    {
        if (auth()->check()) {
            $job = Job::where('slug', $slug)->first();
            $userCvs = UserCv::where('user_id', auth()->user()->id)->get();
            $user_employee = UserEmployee::find($job->user_id);
            $job_applies = UserJobAplied::all();
            $params = [
                'userCvs' => $userCvs,
                'user_employee' => $user_employee,
                'job' => $job,
                'job_applies' => $job_applies
            ];
            return view('job::aplications.index', $params);
        } else {
            // Lưu URL trang hiện tại vào session trước khi chuyển hướng đến trang đăng nhập
            session(['previous_url' => url()->previous()]);
            // Người dùng chưa đăng nhập, thực hiện các hành động khác, ví dụ: chuyển hướng đến trang đăng nhập
            return redirect()->route('staff.login')->with('error', 'Bạn phải đăng nhập để ứng tuyển!');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}