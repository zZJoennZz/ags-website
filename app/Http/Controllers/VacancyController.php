<?php

namespace App\Http\Controllers;

use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class VacancyController extends Controller
{
    public function index()
    {
        $all_vacancy = JobVacancy::all();
        return view('pages/admin/vacancies')->with('all_vacancies', $all_vacancy);
    }

    public function new(Request $request)
    {
        $request->validate([
            'position_name' => 'required|min:2|max:100',
            'availability' => 'required|numeric',
            'description' => 'required|min:1|max:255',
        ]);
        DB::beginTransaction();
        try {
            $new_vacancy = new JobVacancy();
            $new_vacancy->position_name = $request->position_name;
            $new_vacancy->availability = $request->availability;
            $new_vacancy->description = $request->description;
            $new_vacancy->added_by = Auth::user()->id;
            $new_vacancy->save();
            DB::commit();
            return redirect()->route('vacancies.show')->with('success', 'Job vacancy successfully added.');
        } catch (Throwable $e) {
            DB::rollBack();
            // return $e;
            return redirect()->back()->withErrors(["Something went wrong. Vacancy not saved."]);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'position_name' => 'required|min:2|max:100',
            'availability' => 'required|numeric',
            'description' => 'required|min:1|max:255',
        ]);
        // return $request->all();
        DB::beginTransaction();
        try {
            $new_vacancy = JobVacancy::find($request->id);
            $new_vacancy->position_name = $request->position_name;
            $new_vacancy->availability = $request->availability;
            $new_vacancy->description = $request->description;
            $new_vacancy->is_active = !isset($request->is_active) ? 0 : 1;
            $new_vacancy->save();
            DB::commit();
            return redirect()->route('vacancies.show')->with('success', 'Job vacancy changes successfully saved.');
        } catch (Throwable $e) {
            DB::rollBack();
            // return $e;
            return redirect()->back()->withErrors(["Something went wrong. Vacancy changes not saved."]);
        }
    }

    public function delete($vacancy_id)
    {
        $to_delete = JobVacancy::find($vacancy_id);
        $to_delete->is_delete = 1;
        $to_delete->save();
        return redirect()->route('vacancies.show')->with('success', 'Job vacancy deleted.');
    }

    public function api_single($vacancy_id)
    {
        $get_vacancy = JobVacancy::find($vacancy_id);

        return response()->json([
            'success' => true,
            'data' => $get_vacancy
        ]);
    }
}
