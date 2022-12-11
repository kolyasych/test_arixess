<?php

namespace App\Service;

use App\Jobs\SendApplicationWithQueue;
use App\Models\Applications;
use App\Models\StatusApplication;
use Illuminate\Support\Facades\Storage;

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
        if (isset($data['file'])) {
            $file = $data['file'];
            unset($data['file']);
            $filePath = Storage::disk('public')->put('/images', $file);
            $data['file_path'] = $filePath;
        }
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
