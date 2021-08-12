<?php

namespace App\Http\Requests;

use App\Consts\UserConsts;
use App\ValueObjects\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
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
        $name_between = UserConsts::NAME_MIN . ',' . UserConsts::NAME_MAX;
        $pass_between = UserConsts::PASS_MIN . ',' . UserConsts::PASS_MAX;

        return [
            'name'     => 'required|string|between:' . $name_between,
            'email'    => 'required|unique:users|email',
            'password' => 'required|string|between' . $pass_between,
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
            // REF: https://laravel.com/api/8.x/Illuminate/Translation/Translator.html
            'name.required' => __('validation.required', ['attribute' => 'ユーザ名']),
            'name.string'   => __('validation.string', ['attribute' => 'ユーザ名']),
            'name.between'  => __('validation.between', [
                'attribute' => 'ユーザ名',
                'min'       => UserConsts::NAME_MIN,
                'max'       => UserConsts::NAME_MAX,
            ]),
            'email.required'    => __('validation.required', ['attribute' => 'メールアドレス']),
            'email.unique'      => __('validation.unique', ['attribute' => 'メールアドレス']),
            'email.email'       => __('validation.email'),
            'password.required' => __('validation.required', ['attribute' => 'パスワード']),
            'password.string'   => __('validation.string', ['attribute' => 'パスワード']),
            'password.between'  => __('validation.between', [
                'attribute' => 'パスワード',
                'min'       => UserConsts::PASS_MIN,
                'max'       => UserConsts::PASS_MAX,
            ]),
        ];
    }
}
