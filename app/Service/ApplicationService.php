<?php

namespace App\Service;

use App\Jobs\SendApplicationWithQueue;
use App\Models\Applications;
use App\Models\StatusApplication;

class ApplicationService
{
    /**
     * @var string
     */
    private $defaultStatus = 'not-read';

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        $status = StatusApplication::where('slug', '=', $this->defaultStatus)->first();
        $data['status_id'] = $status['id'];
        return Applications::create($data);
    }

    /**
     * @param $application
     * @return void
     */
    public function SendApplicationToMail($application)
    {
        SendApplicationWithQueue::dispatch($application);
    }
}
