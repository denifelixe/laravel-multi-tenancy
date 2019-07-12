<?php

namespace App\Http\Requests\Master\Auth\TenantSignInController;

use Illuminate\Foundation\Http\FormRequest;

class TenantSignInRequestValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subdomain' => 'required|alpha_num'
        ];
    }
}
