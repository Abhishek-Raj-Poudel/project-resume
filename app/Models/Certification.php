<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{

    protected $fillable = [
        "title",
        "institution_name",
        "completed_at",
        "certification_link",
    ];
    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
