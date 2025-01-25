<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        "resume_id",
        "title",
        "subtitle",
        "content",
        "demo_url",
        "started_at"
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
