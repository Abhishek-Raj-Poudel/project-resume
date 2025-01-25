<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        "resume_id",
        "institution_name",
        "course_name",
        "started_at",
        "is_current",
        "ended_at",
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
