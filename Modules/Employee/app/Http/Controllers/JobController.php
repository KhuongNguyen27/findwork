<?php

namespace Modules\Employee\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Employee\app\Models\Job;
use Illuminate\Support\Facades\Auth;
use Modules\Employee\app\Http\Requests\CreateJobRequest;
use Modules\Employee\app\Http\Requests\UpdateJobRequest;
use App\Models\Career;
use App\Models\Level;
use App\Models\Rank;
use App\Models\Wage;
use App\Models\FormWork;
use App\Models\JobPackage;
use Modules\Employee\app\Models\UserJobApply;
use Illuminate\Support\Facades\Log;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        $countID = [];
        foreach ($jobs as $job) {
            $count = UserJobApply::where('job_id', $job->id)->count();
            $countID[$job->id] = $count;   
        }

        return view('employee::job.index',compact(['jobs','countID']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $careers = Career::where('status',Career::ACTIVE)->get();
        $degrees = Level::where('status',Level::ACTIVE)->get();
        $ranks = Rank::where('status',Rank::ACTIVE)->get();
        $formworks = FormWork::where('status',FormWork::ACTIVE)->get();
        $wages = Wage::where('status',Wage::ACTIVE)->get();
        $job_packages = JobPackage::where('status',JobPackage::ACTIVE)->get();
        $param = [
            'careers' => $careers,
            'degrees' => $degrees,
            'ranks' => $ranks,
            'formworks' => $formworks,
            'wages' => $wages,
            'job_packages' => $job_packages
        ];
        return view('employee::job.create',compact('param'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateJobRequest $request): RedirectResponse
    {
        
        try {
            $job = new Job();
            $job->name = $request->name;
            $job->slug = $request->slug;
            $job->career = implode(',', $request->input('career'));
            $job->type_work = $request->type_work;
            $job->deadline = $request->deadline;
            $job->start_day = $request->start_day;
            $job->experience = $request->experience;
            $job->wage = $request->wage;
            $job->gender = $request->gender;
            $job->rank = $request->rank;
            $job->job_package = $request->job_package;
            $job->price = $request->price;
            $job->number_day = $request->number_day;
            $job->work_address = $request->work_address;
            $job->degree = $request->degree;
            $job->description = $request->description;
            $job->requirements = $request->requirements;
            $job->end_dead = $request->end_dead;
            $job->start_hour = $request->start_hour;
            $job->end_hour = $request->end_hour;
            $job->user_id = Auth::id();
            $job->status = Job::INACTIVE;
            $job->save();

            $message = "Thêm mới thành công!";
            return redirect()->route('employee.job.index')->with('success', $message);
        } catch (\Exception $e) {
            Log::error('Lỗi xảy ra: ' . $e->getMessage());
            return redirect()->route('employee.job.create')->with('error', 'Thêm mới bị lỗi!');
        }
    }

    /**
     * Show the specified resource.
     */
    public function show(Request $request,$id)
    {
        $careers = Career::where('status',Career::ACTIVE)->get();
        $degrees = Level::where('status',Level::ACTIVE)->get();
        $ranks = Rank::where('status',Rank::ACTIVE)->get();
        $formworks = FormWork::where('status',FormWork::ACTIVE)->get();
        $wages = Wage::where('status',Wage::ACTIVE)->get();
        $job_packages = JobPackage::where('status',JobPackage::ACTIVE)->get();
        $job = Job::findOrFail($request->id);
        $param = [
            'careers' => $careers,
            'degrees' => $degrees,
            'ranks' => $ranks,
            'formworks' => $formworks,
            'wages' => $wages,
            'job_packages' => $job_packages
        ];
        return view('employee::job.show',compact(['job','param']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $careers = Career::where('status',Career::ACTIVE)->get();
        $degrees = Level::where('status',Level::ACTIVE)->get();
        $ranks = Rank::where('status',Rank::ACTIVE)->get();
        $formworks = FormWork::where('status',FormWork::ACTIVE)->get();
        $wages = Wage::where('status',Wage::ACTIVE)->get();
        $job_packages = JobPackage::where('status',JobPackage::ACTIVE)->get();
        $job = Job::findOrFail($request->id);
        $param = [
            'careers' => $careers,
            'degrees' => $degrees,
            'ranks' => $ranks,
            'formworks' => $formworks,
            'wages' => $wages,
            'job_packages' => $job_packages
        ];
        return view('employee::job.edit',compact(['job','param']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, $id): RedirectResponse
    {
        try {
            $job = Job::findOrFail($request->id);
            $job->name = $request->name;
            $job->slug = $request->slug;
            $job->career = implode(',', $request->input('career'));
            $job->type_work = $request->type_work;
            $job->deadline = $request->deadline;
            $job->start_day = $request->start_day;
            $job->experience = $request->experience;
            $job->wage = $request->wage;
            $job->gender = $request->gender;
            $job->rank = $request->rank;
            $job->job_package = $request->job_package;
            $job->price = $request->price;
            $job->number_day = $request->number_day;
            $job->work_address = $request->work_address;
            $job->degree = $request->degree;
            $job->description = $request->description;
            $job->requirements = $request->requirements;
            $job->end_dead = $request->end_dead;
            $job->start_hour = $request->start_hour;
            $job->end_hour = $request->end_hour;
            $job->status = $request->status;
            $job->user_id = Auth::id();

            $job->save();

            $message = "Cập Nhật thành công!";
            return redirect()->route('employee.job.index')->with('success', $message);
        } catch (\Exception $e) {
            DB::rollback(); // Hoàn tác giao dịch nếu có lỗi
            Log::error('Lỗi xảy ra: ' . $e->getMessage());
            return redirect()->route('employee.job.show')->with('error', 'Cập Nhật bị lỗi!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            $job =  Job::find($request->id);
            $job->delete();
            $message = "Xóa thành công!";
            return redirect()->route('employee.job.index')->with('success', $message);
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()->route('employee.job.index')->with('error', 'Xóa thất bại!');
        }
    }

    public function showjobcv(Request $request, $id){
        $cv_apllys = UserJobApply::where('job_id', $request->id)->get();
        $count_job = UserJobApply::where('job_id', $request->id)->count();
        $count_cv_appled = UserJobApply::where('status', 1)->count();
        $count_not_applly = UserJobApply::where('status', 0)->count();
        $param_count = [
            'count_job' => $count_job,
            'count_cv_appled' => $count_cv_appled,
            'count_not_applly' => $count_not_applly
        ];
        $job = Job::findOrFail($request->id);
        return view('employee::job.show_cvJob',compact('cv_apllys','job','param_count'));
    }
}
