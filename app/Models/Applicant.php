<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_vacancy',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'email',
        'contact_number',
        'address',
        'applicant_status',
        'cover_letter',
        'resume',
        'is_delete',
        'added_by'
    ];

    public function job_vacancy_record()
    {
        return $this->hasOne(JobVacancy::class, 'id', 'job_vacancy');
    }

    public function status()
    {
        return $this->hasOne(ApplicantStatus::class, 'id', 'applicant_status');
    }
}
