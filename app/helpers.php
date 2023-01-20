<?php

use App\Models\SiteSetting;
use App\Models\JobVacancy;

function getDefaults()
{
    return SiteSetting::all();
}

function getJobPostings()
{
    return JobVacancy::where('is_active', '=', 1)->where('is_delete', '=', 0)->get();
}
