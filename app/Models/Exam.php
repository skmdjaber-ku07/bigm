<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'level',
    ];

    /**
     * A many-to-many relationship with Applicant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function applicants()
    {
        return $this->belongsToMany(Applicant::class)->withPivot('institute_type', 'institute_id', 'result');
    }
}
