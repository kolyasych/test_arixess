<?php

namespace App\Service;

use App\Models\Applications;
use App\Models\StatusApplication;

class AdminService
{
    /**
     * @param $id
     * @return void
     */
    public function changeStatus($id)
    {
        $application = Applications::where('id', '=', $id)->first();
        $status = StatusApplication::where('slug', '=', 'read')->first();
        $application['status_id'] = $status['id'];
        $application->save();
    }
}
