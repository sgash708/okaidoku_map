<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPost;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $users = (new UserService())->list();
        return view('user.index', ['users' => $users]);
    }

    /**
     * ユーザ作成へページ誘導
     *
     * @return View
     */
    public function create(): View
    {
        return view('user.create', ['user' => \Session::get('_old_input')]);
    }

    /**
     * ユーザ登録処理
     *
     * @param StoreUserPost $request
     *
     * @return RedirectResponse
     */
    public function store(StoreUserPost $request): RedirectResponse
    {
        $user = $request->all();
        // UserServiceクラスを使い登録
        if ((new UserService())->store($user)) {
            return rediwrect('/user/')->with('success_message', __('message.success_save'));
        }

        return redirect('/user/')->with('error_message', trans('message.failed_save'));
    }
}
