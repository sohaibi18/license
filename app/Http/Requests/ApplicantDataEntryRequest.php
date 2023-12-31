<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantDataEntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //Owner Details
            'Applicant_Name' => ['required', 'regex:/^[a-zA-Z\s]+$/i', 'max:20', 'min:3'],
            'Applicant_Father_Name' => ['required', 'regex:/^[a-zA-Z\s]+$/i', 'max:20', 'min:3'],
            'CNIC' => ['required', 'regex:/^\d{5}-\d{7}-\d{1}$/'],
            'Mobile_Number' => ['required', 'regex:/^\d{4}-\d{7}$/'],
            'Email' => ['nullable', 'email'],
            'Personal_Address' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'Gender' => ['required'],
            'Profile_Image' => ['required', 'image'],
            'CNIC_Image' => ['required', 'image'],
            'district_id' => ['required'],

            //Business Details
            'Business_Name' => ['required', 'regex:/^[a-zA-Z\s]+$/i'],
            'Business_Address' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'Contact_Number' => ['required', 'regex:/^\d{4}-\d{7}$/'],
            'Business_Email' => ['nullable', 'email'],
            'Website' => ['nullable', 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'],
            'Start_Date' => ['nullable', 'date', 'before_or_equal:today'],
            'Food_Handlers' => ['nullable', 'numeric'],
            'business_type_id' => ['required'],

            //Application Details
            'license_category_id' => ['required'],
            'Affidavit' => ['nullable', 'image'],
            'Medical_Certificate' => ['nullable', 'image'],
        ];
    }
}
