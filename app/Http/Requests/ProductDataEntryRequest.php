<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductDataEntryRequest extends FormRequest
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
            'License_No' => ['required', 'numeric'],
            'Product_Name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/i'],
            'Lab_Analysis_Report' => ['required', 'image'],
            'Product_Label' => ['required', 'image'],
            'Affidavit' => ['required', 'image'],
            'licensecategories' => ['required'],
        ];
    }
}
