<?php

namespace App\Http\Requests;

use App\ValueObjects\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
{
    /** @var int */
    private $user_name_min;
    /** @var int */
    private $user_name_max;
    /** @var int */
    private $user_pass_min;
    /** @var int */
    private $user_pass_max;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->user_name_min = User\Name::MIN_LENGTH;
        $this->user_name_max = User\Name::MAX_LENGTH;
        $this->user_pass_min = User\Password::MIN_LENGTH;
        $this->user_pass_max = User\Password::MAX_LENGTH;
    }

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
        $name_between = $this->user_name_min . ',' . $this->user_name_max;
        $pass_between = $this->user_pass_min . ',' . $this->user_pass_max;

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
                'min'       => $this->user_name_min,
                'max'       => $this->user_name_max,
            ]),
            'email.required'    => __('validation.required', ['attribute' => 'メールアドレス']),
            'email.unique'      => __('validation.unique', ['attribute' => 'メールアドレス']),
            'email.email'       => __('validation.email'),
            'password.required' => __('validation.required', ['attribute' => 'パスワード']),
            'password.string'   => __('validation.string', ['attribute' => 'パスワード']),
            'password.between'  => __('validation.between', [
                'attribute' => 'パスワード',
                'min'       => $this->user_pass_min,
                'max'       => $this->user_pass_max,
            ]),
        ];
    }
}
