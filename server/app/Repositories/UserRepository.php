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
            $request_params['name'],
            $request_params['email'],
            $request_params['password'],
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
            'name'     => $user->getName(),
            'email'    => $user->getEmail(),
            'password' => $user->getPassword(),
        ]))->save();
    }
}
