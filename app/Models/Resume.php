<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        "client_id",
        "resume_name",
        "full_name",
        "contact_number",
        "email",
        "achievements",
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'client_id');
    }

    public function socials()
    {
        return $this->hasMany(Social::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function certifications()
    {
        return $this->hasMany(Certification::class);
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
