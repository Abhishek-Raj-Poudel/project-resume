<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{

    protected $fillable = [
        "resume_id",
        "title",
        "skill_category",
    ];
    //
    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
