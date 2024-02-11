<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
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
            'ref_num' => 'required|string|max:50',
            'invoice_date' => 'required|date',
            'payee' => 'required|string|max:255',
            'payee_id' => 'required|integer',
            'total' => 'required|numeric',
            'currency_total' => 'required|numeric',
            'paid' => 'required|numeric',
            'due' => 'required|numeric',
        ];
    }
}
