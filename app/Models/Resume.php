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
        return $this->belongsTo(Social::class);
    }

    public function eductions()
    {
        return $this->belongsTo(Education::class);
    }

    public function certifications()
    {
        return $this->belongsTo(Certification::class);
    }

    public function works()
    {
        return $this->belongsTo(Work::class);
    }

    public function skills()
    {
        return $this->belongsTo(Skill::class);
    }
}
