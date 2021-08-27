<?php

namespace App\Http\Requests;

use App\Consts\UserConsts;
use Illuminate\Foundation\Http\FormRequest;

class DeleteUserPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|numeric|exists:users,id',
        ];
    }

    /**
     * trans messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'id.required' => __('validation.required', ['attribute' => UserConsts::LABEL['id']]),
            'id.numeric'  => __('validation.numeric', ['attribute' => UserConsts::LABEL['id']]),
            'id.exists'   => __('validation.exists', ['attribute' => UserConsts::LABEL['id']]),
        ];
    }
}
