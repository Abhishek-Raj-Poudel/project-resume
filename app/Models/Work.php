<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'resume_id',
        'job_title',
        'content',
        'location',
        'started_at',
        'is_current',
        'ended_at'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
