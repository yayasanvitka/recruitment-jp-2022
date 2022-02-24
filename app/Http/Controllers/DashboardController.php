<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;

class DashboardController extends Controller
{
    /**
     * Redirect user to dashboard if logged in.
     * If not, redirect to login page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index(): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if (auth()->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return redirect('/login');
    }
}
