<?php

namespace App\Repositories;

use App\Entities;
use App\Factories\UserFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    /**
     * インスタンス作成
     *
     * @param array $request_params
     *
     * @return Entities\User
     */
    public function new(array $request_params): Entities\User
    {
        return (new UserFactory())->make(
            $request_params['handle_name'],
            $request_params['email'],
            $request_params['password'],
            $request_params['last_name'],
            $request_params['last_name_kana'],
            $request_params['first_name'],
            $request_params['first_name_kana'],
            $request_params['phone_number'],
            $request_params['sex']
        );
    }

    /**
     * User一覧取得
     *
     * @return Collection
     */
    public function list(): Collection
    {
        return User::all();
    }

    /**
     * store関数で保存した値が正しいか
     *
     * @param Entities\User $user
     *
     * @return bool
     */
    public function store(Entities\User $user): bool
    {
        return (new User([
            'handle_name'     => $user->getHandleName(),
            'email'           => $user->getEmail(),
            'password'        => $user->getPassword(),
            'last_name'       => $user->getLastName(),
            'last_name_kana'  => $user->getLastNameKana(),
            'first_name'      => $user->getFirstName(),
            'first_name_kana' => $user->getFirstNameKana(),
            'phone_number'    => $user->getPhoneNumber(),
            'sex'             => $user->getSex(),
        ]))->save();
    }
}
