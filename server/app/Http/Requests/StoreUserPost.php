<?php

namespace App\Http\Requests;

use App\Consts\UserConsts;
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
        $sex_between  = UserConsts::SEX_MIN . ',' . UserConsts::SEX_MAX;

        return [
            'handle_name'     => 'required|string|unique:users|between:' . $name_between,
            'last_name'       => 'required|string',
            'last_name_kana'  => 'required|string|regex:/^[ァ-ヶー]+$/u',
            'first_name'      => 'required|string',
            'first_name_kana' => 'required|string|regex:/^[ァ-ヶー]+$/u',
            'phone_number'    => 'regex:/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/u',
            'email'           => 'required|unique:users|email',
            'password'        => 'required|string|between:' . $pass_between,
            'sex'             => 'required|numeric|between:' . $sex_between,
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
            'handle_name.required' => __('validation.required', ['attribute' => UserConsts::LABEL['handle_name']]),
            'handle_name.string'   => __('validation.string', ['attribute' => UserConsts::LABEL['handle_name']]),
            'handle_name.unique'   => __('validation.unique', ['attribute' => UserConsts::LABEL['handle_name']]),
            'handle_name.between'  => __('validation.between', [
                'attribute' => UserConsts::LABEL['handle_name'],
                'min'       => UserConsts::NAME_MIN,
                'max'       => UserConsts::NAME_MAX,
            ]),
            'last_name.required'      => __('validation.required', ['attribute' => UserConsts::LABEL['last_name']]),
            'last_name.string'        => __('validation.string', ['attribute' => UserConsts::LABEL['last_name']]),
            'last_name_kana.required' => __('validation.required', [
                'attribute' => UserConsts::LABEL['last_name_kana'],
            ]),
            'last_name_kana.string' => __('validation.string', ['attribute' => UserConsts::LABEL['last_name_kana']]),
            'last_name_kana.regex'  => __('validation.regex', ['attribute' => UserConsts::LABEL['last_name_kana']]),
            'first_name.required'   => __('validation.required', [
                'attribute' => UserConsts::LABEL['first_name'],
            ]),
            'first_name.string' => __('validation.string', [
                'attribute' => UserConsts::LABEL['first_name'],
            ]),
            'first_name_kana.required' => __('validation.required', [
                'attribute' => UserConsts::LABEL['first_name_kana'],
            ]),
            'first_name_kana.string' => __('validation.string', [
                'attribute' => UserConsts::LABEL['first_name_kana'],
            ]),
            'first_name_kana.regex' => __('validation.regex', [
                'attribute' => UserConsts::LABEL['first_name_kana'],
            ]),
            'phone_number.regex' => __('validation.regex', ['attribute' => UserConsts::LABEL['phone_number']]),
            'email.required'     => __('validation.required', ['attribute' => UserConsts::LABEL['email']]),
            'email.unique'       => __('validation.unique', ['attribute' => UserConsts::LABEL['email']]),
            'email.email'        => __('validation.email'),
            'password.required'  => __('validation.required', ['attribute' => UserConsts::LABEL['password']]),
            'password.string'    => __('validation.string', ['attribute' => UserConsts::LABEL['password']]),
            'password.between'   => __('validation.between', [
                'attribute' => UserConsts::LABEL['password'],
                'min'       => UserConsts::PASS_MIN,
                'max'       => UserConsts::PASS_MAX,
            ]),
            'sex.required' => __('validation.required', ['attribute' => UserConsts::LABEL['sex']]),
            'sex.numeric'  => __('validation.numeric', ['attribute' => UserConsts::LABEL['sex']]),
            'sex.between'  => __('validation.between', [
                'attribute' => UserConsts::LABEL['sex'],
                'min'       => UserConsts::SEX_MIN,
                'max'       => UserConsts::SEX_MAX,
            ]),
        ];
    }
}
