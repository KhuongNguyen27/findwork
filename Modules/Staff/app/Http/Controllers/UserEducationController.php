<?php

namespace Modules\Staff\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Staff\app\Models\UserEducation;
use Modules\Staff\app\Http\Requests\StoreUserEducationRequest;

use Illuminate\Support\Facades\Auth;


class UserEducationController extends Controller
{
    
    public function store(StoreUserEducationRequest $request): RedirectResponse
    {
        // dd($request->all());    
        $user = Auth::user();
        $education = new UserEducation([
            'user_id' => $user->id,
            'cv_id' => $request->cv_id,
            'numerical' => $request->numerical,
            'education_level' => $request->education_level,
            'school_course' => $request->school_course,
            'graduation_date' => $request->graduation_date,
            'language' => $request->language,
            'major' => $request->major,
        ]);
        // dd($education);
        $education->save();
        return redirect()->back()->with('success', 'Education information has been added successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $education = UserEducation::findOrFail($id);
        $education->update([
            'numerical' => $request->numerical,
            'education_level' => $request->education_level,
            'school_course' => $request->school_course,
            'graduation_date' => $request->graduation_date,
            'language' => $request->language,
            'major' => $request->major,
        ]);
        return redirect()->back()->with('success', 'Education information has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $education = UserEducation::findOrFail($id);
        // dd($education);
        $education->delete();
        return redirect()->back()->with('success', 'Education information has been deleted successfully.');
    }

}