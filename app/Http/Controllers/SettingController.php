<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\DB;
use Throwable;

class SettingController extends Controller
{
    //
    public function index()
    {
        $settings = SiteSetting::all();
        return view('pages/admin/settings')->with('settings', $settings);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $updated_settings = SiteSetting::find(1);
            $updated_settings->full_address = $request->full_address;
            $updated_settings->phone_number = $request->phone_number;
            $updated_settings->email_address = $request->email_address;
            $updated_settings->twitter_url = $request->twitter_url;
            $updated_settings->facebook_url = $request->facebook_url;
            $updated_settings->rss_url = $request->rss_url;
            $updated_settings->who_are_we_text = $request->who_are_we_text;
            $updated_settings->save();
            DB::commit();
            return redirect()->back()->with('success', 'Site settings saved.');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['Something went wrong. Site settings not saved.']);
        }
    }
}
