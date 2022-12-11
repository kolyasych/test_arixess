<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\StatusApplication;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $applications = Applications::with('status')->get();
        return view('admin.index')->with([
            'applications' => $applications
        ]);
    }

    public function showApplication($id)
    {
        $application = Applications::with(['user', 'status'])->firstWhere('id', $id);
        return view('admin.applications')->with([
            'application' => $application
        ]);
    }

    public function changeStatus($id)
    {
        $application = Applications::where('id', '=', $id)->first();
        $status = StatusApplication::where('slug', '=', 'read')->first();
        $application['status_id'] = $status['id'];
        $application->save();
        return redirect()->route('admin.index');
    }

}
