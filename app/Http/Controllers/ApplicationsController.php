<?php

namespace App\Http\Controllers;

use App\Http\Requests\Applications\StoreRequest;
use App\Models\Applications;
use App\Service\ApplicationService;
use Carbon\Carbon;

class ApplicationsController extends Controller
{

    /**
     * @var ApplicationService
     */
    private $service;

    public function __construct(ApplicationService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = auth()->user();

        $lastMessage = Applications::where('user_id', $user['id'])->latest('created_at')->first();
        if (!empty($lastMessage) && Carbon::parse($lastMessage['created_at'])->diffInHours(Carbon::now()) < 24) {
            return view('waiting-page');
        } else {
            return view('application-form')->with([
                'user' => $user
            ]);
        }
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $application = $this->service->store($data);
        $application = $application->load('user');
        $this->service->SendApplicationToMail($application);
        return redirect()->route('home');
    }
}
