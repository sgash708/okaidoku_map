<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    /** @var UserRepository */
    private $user_repos;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->user_repos = new UserRepository();
    }

    /**
     * UserRepositoryクラスから、データ一覧の取得
     *
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->user_repos->list();
    }

    /**
     * UserRepositoryクラスから、store関数を呼び出す
     *
     * @param array $request_params
     *
     * @return bool
     */
    public function store(array $request_params): bool
    {
        try {
            // entityを返り値として持つ
            $user = $this->user_repos->new($request_params);

            return $this->user_repos->store($user);
        } catch (\Exception $e) {
            report($e);

            return false;
        }
    }

    /**
     * 削除処理
     *
     * @param array $user
     *
     * @return int
     */
    public function delete(array $user): int
    {
        try {
            return $this->user_repos->delete($user);
        } catch (\Exception $e) {
            report($e);

            return 0;
        }
    }
}
