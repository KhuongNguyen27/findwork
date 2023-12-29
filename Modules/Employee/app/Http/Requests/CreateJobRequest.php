<?php

namespace Modules\Employee\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateJobRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
   

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'slug' => 'required',
            'career_ids' => 'required',
            'type_work' => 'required',
            'deadline' => 'required',
            'experience' => 'required',
            'wage' => 'required',
            'gender' => 'required',
            'work_address' => 'required',
            'degree' => 'required',
            'description' => 'required',
            'requirements' => 'required',
            'rank' => 'required',
            'number_day' => 'required',
            'start_day' => 'required',
            'job_package' => 'required',
            'price' => 'required',
            'end_dead' => 'required',
            'start_hour' => 'required',
            'end_hour' => 'required',
            
        ];
    }

    public function messages()
    {
        return  [
            'name.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'slug.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'career_ids.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'type_work.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'deadline.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'experience.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'wage.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'gender.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'work_address.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'degree.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'description.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'requirements.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'rank.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'number_day.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'start_day.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'job_package.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'price.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'end_dead.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'start_hour.required' => 'Vui lòng nhập đầy đủ thông tin!',
            'end_hour.required' => 'Vui lòng nhập đầy đủ thông tin!',
            
            ];
    }


}