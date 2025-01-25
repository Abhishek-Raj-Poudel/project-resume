<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        "resume_id",
        "title",
        "url",
    ];
    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
