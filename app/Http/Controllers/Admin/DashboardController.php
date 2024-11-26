<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use HasFactory;

    public function index()
    {
        return view('admin.dashboard');
    }
}
