<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        "resumeName",
        "name",
        "contactName",
        "email",
        "socialLinks",
        "education",
        "technicalSkill",
        "projectExperience",
        "workExperience",
        "certification",
        "achievements",
    ];
}
