<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\JobVacancy;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        $total_applicants = count(Applicant::all());
        $total_job_vacancies = count(JobVacancy::all());
        return view('pages/dashboard')
            ->with('total_job_vacancies', $total_job_vacancies)
            ->with('total_applicants', $total_applicants);
    }
}
