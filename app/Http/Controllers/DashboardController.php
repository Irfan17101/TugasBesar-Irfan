<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;

        if ($role === 'admin') {
            return view('dashboardAdmin.admin');
        } elseif ($role === 'pelanggan') {
            return view('dashboard.customer');
        } else {
            return abort(403, 'Unauthorized role.');
        }
    }

    public function create()
    {
        return view('dashboard.create'); 
    }
}
