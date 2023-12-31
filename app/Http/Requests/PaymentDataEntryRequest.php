<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentDataEntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $dueAmount = $this->input('Due_Amount');
        $dueDate = $this->input('Due_Date');
        return [
            'Paid_Amount' => ['required', Rule::greaterThanOrEqual($dueAmount)],
            'Deposit_Date' => ['required', Rule::greaterThanOrEqual($dueDate)],
            'Challan_Image' => ['required', 'image'],
            'Challan_No' => ['required'],
            'Remarks' => ['nullable', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'Transaction_Id' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'Bank_Name' => ['required', 'in:1'],
            'Branch_Code' => ['required'],
        ];
    }
}
