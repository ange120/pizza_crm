<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\DriverHomeController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $admin = new MainController();
        $driver = new DriverHomeController();

         if (auth()->user()->hasRole('admin')) {
            return $admin->index();
        }
        return $driver->index();

    }

}
