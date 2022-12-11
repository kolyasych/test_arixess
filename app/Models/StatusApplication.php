<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusApplication extends Model
{
    use HasFactory;

    protected $table = 'status_applications';
    protected $guarded = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications()
    {
        return $this->hasMany(Applications::class, 'user_id', 'id');
    }
}
