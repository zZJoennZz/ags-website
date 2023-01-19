<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillable = [
        'vacancy_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'email',
        'contact_number',
        'address',
        'cover_letter',
        'resume',
        'is_delete',
        'added_by'
    ];
}
