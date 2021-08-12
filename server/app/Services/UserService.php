<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    /** @var UserRepository */
    private $user_repos;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->user_repos = new UserRpository();
    }

    /**
     * UserServiceクラスから、データ一覧の取得
     *
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->user_repos->list();
    }

    /**
     * UserServiceクラスから、store関数を呼び出す
     *
     * @param array $request_params
     *
     * @return bool
     */
    public function store(array $request_params): bool
    {
        try {
            $user = $this->user_repos->nwe($request_params);
            return $this->user_repos->store($user);
        } catch (\Exception $e) {
            report($e);
            return false;
        }
    }
}