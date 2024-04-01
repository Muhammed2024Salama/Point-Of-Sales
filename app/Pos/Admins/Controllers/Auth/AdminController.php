<?php

namespace Pos\Admins\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Pos\Admins\Requests\Auth\LoginRequestAdmin;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('auth.admin_login');
    }

    /**
     * @param LoginRequestAdmin $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequestAdmin $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::ADMIN);
    }
}
