<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\DeleteUserPost;
use App\Http\Requests\User\StoreUserPost;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
     *
     * @return View
     */
    public function deleteConfirm(DeleteUserPost $request): View
    {
        $user = $request->all();

        return view('user.delete.confirm', compact('user'));
    }

    /**
     * ユーザ退会
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        $user = $request->all();
        if ((new UserService())->delete($user) != 0) {
            return redirect()->route('user.index')->with(['success_message' => __('message.success_delete')]);
        }

        return redirect()->route('user.index')->with(['error_message' => __('message.failed_delete'), 'user' => \Session::get('_old_input')]);
    }
}
