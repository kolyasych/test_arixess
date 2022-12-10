<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request\Applications\StoreRequest;
use App\Models\Applications;

class ApplicationsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = auth()->user();

        return view('application-form')->with([
            'user' => $user
        ]);
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Applications::create($data);

        return redirect()->route('home');
    }
}
