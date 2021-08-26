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
        return view('user.index', compact('users'));
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
            return redirect()->route('user.index')->with(['success_message' => __('message.success_save')]);
        }

        return redirect()->route('user.index')->with(['error_message' => __('message.failed_save')]);
    }

    /**
     * ユーザ退会確認
     *
     * @param DeleteUserPost $request
     * @return RedirectResponse
     */
    public function delete(DeleteUserPost $request): RedirectResponse
    {
        return redirect()->route('user.confirm')->withInput($request);
    }

    /**
     * ユーザ退会
     *
     * @param DeleteUserPost $request
     * @return RedirectResponse
     */
    public function confirm(DeleteUserPost $request): RedirectResponse
    {
        $user = $request->all();
        if ((new UserService())->delete($user)) {
            return redirect()->route('user.delete')->with(['success_message' => __('message.success_save')]);
        }
        return redirect()->route('user.delete')->with(['error_message' => __('message.failed_save')]);
    }
}
