<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    private $menu = 'dashboard';

    public function index()
    {
        return view('admin.dashboard', [
            'menu' => $this->menu
        ]);
    }
}
