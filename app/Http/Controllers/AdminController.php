<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $applications = Applications::all();
        return view('admin.index')->with([
            'applications' => $applications
        ]);
    }

    public function showApplication($id)
    {
        $application = Applications::with('user')->firstWhere('id', $id);
        return view('admin.applications')->with([
            'application' => $application
        ]);
    }
}
