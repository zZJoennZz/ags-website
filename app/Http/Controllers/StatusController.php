<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\ApplicantStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class StatusController extends Controller
{
    public function index()
    {
        $applicant_status = ApplicantStatus::all();
        return view('pages/admin/applicant_status')->with('applicant_status', $applicant_status);
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $new_status = new ApplicantStatus();
            $new_status->description = $request->description;
            $new_status->added_by = Auth::user()->id;
            $new_status->save();
            DB::commit();
            return redirect()->route('applicant-status.show')->with('success', 'Applicant status successfully saved.');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('applicant-status.show')->withErrors(['Something went wrong. Applicant status is not saved.']);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required|min:2|max:100'
        ]);

        DB::beginTransaction();
        try {
            $status = ApplicantStatus::find($request->id);
            $status->description = $request->description;
            $status->save();
            DB::commit();
            return redirect()->route('applicant-status.show')->with('success', 'Applicant change saved.');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('applicant-status.show')->withErrors(['Something went wrong. Applicant status changes is not saved.']);
        }
    }

    public function delete($status_id)
    {
        DB::beginTransaction();
        try {
            $status = ApplicantStatus::find($status_id);
            $status->is_delete = 1;
            $status->save();
            DB::commit();
            return redirect()->route('applicant-status.show')->with('success', 'Applicant status deleted.');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('applicant-status.show')->withErrors(['Something went wrong. Applicant status is not deleted.']);
        }
    }

    public function api_single($status_id)
    {
        $status = ApplicantStatus::find($status_id);

        return response()->json([
            'success' => true,
            'data' => $status,
        ], 200);
    }
}
