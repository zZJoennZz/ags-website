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
        $total_applicants = count(Applicant::where('is_delete', '=', 0)->get());
        $total_job_vacancies = count(JobVacancy::where('is_delete', '=', 0)->where('is_active', '=', 1)->get());
        return view('pages/dashboard')
            ->with('total_job_vacancies', $total_job_vacancies)
            ->with('total_applicants', $total_applicants);
    }
}
