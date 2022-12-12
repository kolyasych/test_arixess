<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Service\AdminService;

class AdminController extends Controller
{
    /**
     * @var AdminService
     */
    private $service;

    public function __construct(AdminService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $applications = Applications::with('status')->get();
        return view('admin.index')->with([
            'applications' => $applications
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showApplication($id)
    {
        $application = Applications::with(['user', 'status'])->firstWhere('id', $id);
        return view('admin.applications')->with([
            'application' => $application
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus($id)
    {
        $this->service->changeStatus($id);
        return redirect()->route('admin.index');
    }

}
