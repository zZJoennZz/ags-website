<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\JobVacancy;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class ApplicantController extends Controller
{
    //
    private $storage_folder = 'app/public/resume';
    public function all_applicants()
    {
        $all_applicants = Applicant::all();
        $job_vacancies = JobVacancy::where('is_delete', '=', 0)->where('is_active', '=', 1)->get();
        return view('pages/admin/applicants')->with('all_applicants', $all_applicants)->with('job_vacancies', $job_vacancies);
    }

    public function add_applicant(Request $request)
    {
        $request->validate(
            [
                'job_vacancy' => 'numeric',
                'first_name' => 'string|required|min:2|max:50',
                'middle_name' => 'string|required|min:1|max:50',
                'last_name' => 'string|required|min:2|max:50',
                'gender' => 'required',
                'email' => 'email|required',
                'contact_number' => 'required',
                'address' => 'required|min:5|max:150',
                'cover_letter' => 'max:255',
                'resume' => 'required|mimes:pdf'
            ],
            [
                'job_vacancy.numeric' => 'Please select job vacancy',
            ]
        );

        DB::beginTransaction();

        try {

            $mytime = Carbon::now();
            $resume = $request->file('resume');
            $path = storage_path($this->storage_folder);
            $resume_name = date('d-m-Y H-i-s', strtotime($mytime)) . ' - ' . $resume->getClientOriginalName();

            $new_applicant = new Applicant();
            $new_applicant->job_vacancy = $request->job_vacancy;
            $new_applicant->first_name = $request->first_name;
            $new_applicant->middle_name = $request->middle_name;
            $new_applicant->last_name = $request->last_name;
            $new_applicant->gender = $request->gender;
            $new_applicant->email = $request->email;
            $new_applicant->contact_number = $request->contact_number;
            $new_applicant->address = $request->address;
            $new_applicant->cover_letter = $request->cover_letter;
            $new_applicant->resume = $resume_name;
            $new_applicant->applicant_status = 1;
            $new_applicant->added_by = Auth::user()->id;
            //Block 7, Lot 14, SRV1, Mabalas-balas, San Rafael, Bulacan

            $new_applicant->save();

            $resume->move($path, $resume_name);
            DB::commit();

            return redirect()->back()->with('success', 'Applicant successfully recorded.');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['Something went wrong. The applicant is not saved.']);
        }
    }

    public function update(Request $request)
    {
        $hasResume = $request->hasFile('resume') || isset($request->resume);

        $request->validate(
            [
                'job_vacancy' => 'numeric',
                'first_name' => 'string|required|min:2|max:50',
                'middle_name' => 'string|required|min:1|max:50',
                'last_name' => 'string|required|min:2|max:50',
                'gender' => 'required',
                'email' => 'email|required',
                'contact_number' => 'required',
                'address' => 'required|min:5|max:150',
                'cover_letter' => 'max:255',
                'resume' => 'nullable|mimes:pdf'
            ],
            [
                'job_vacancy.numeric' => 'Please select job vacancy',
            ]
        );
        $resume_name = "";
        $mytime = Carbon::now();
        if ($hasResume) {
            $resume = $request->file('resume');
            $path = storage_path($this->storage_folder);
            $resume_name = date('d-m-Y H-i-s', strtotime($mytime)) . ' - ' . $resume->getClientOriginalName();
            $resume->move($path, $resume_name);
        }
        DB::beginTransaction();
        try {


            $new_applicant = Applicant::find($request->id);
            $new_applicant->job_vacancy = $request->job_vacancy;
            $new_applicant->first_name = $request->first_name;
            $new_applicant->middle_name = $request->middle_name;
            $new_applicant->last_name = $request->last_name;
            $new_applicant->gender = $request->gender;
            $new_applicant->email = $request->email;
            $new_applicant->contact_number = $request->contact_number;
            $new_applicant->address = $request->address;
            $new_applicant->cover_letter = $request->cover_letter;
            if ($hasResume) {
                $new_applicant->resume = $resume_name;
            }
            $new_applicant->applicant_status = 1;
            $new_applicant->added_by = Auth::user()->id;
            //Block 7, Lot 14, SRV1, Mabalas-balas, San Rafael, Bulacan

            $new_applicant->save();

            DB::commit();

            return redirect()->back()->with('success', 'Applicant successfully recorded.');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['Something went wrong. The applicant is not saved.']);
        }
    }

    public function delete($applicant_id)
    {
        DB::beginTransaction();
        try {
            $applicant_to_delete = Applicant::find($applicant_id);
            $applicant_to_delete->is_delete = 1;
            $applicant_to_delete->save();
            DB::commit();
            return redirect()->back()->with('success', 'Applicant successfully deleted.');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['Something went wrong. The applicant is not deleted.']);
        }
    }

    public function get_single_api($applicant_id)
    {
        $get_applicant = Applicant::find($applicant_id);
        return response()->json([
            'success' => true,
            'data' => $get_applicant,
        ], 200);
    }
}
