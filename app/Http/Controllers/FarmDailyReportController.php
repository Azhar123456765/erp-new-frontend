<?php

namespace App\Http\Controllers;

use App\Models\FarmDailyReport;
use Illuminate\Http\Request;

class FarmDailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = session()->get('user_id')['user_id'];
        $role = session()->get('user_id')['role'];
        $today = date('d-m-Y');

        $hasSubmittedToday = FarmDailyReport::where('user_id', $user_id)
            ->where('date', $today)
            ->exists();

        if ($role == 'admin') {
            $farm_daily_reports = FarmDailyReport::orderByDesc('id')->get();
            return view('daily_report_admin', compact('farm_daily_reports', 'today'));
        } elseif ($role == 'farm_user') {
            $farm_daily_reports = FarmDailyReport::where('user_id', $user_id)->orderByDesc('id')->get();
            return view('daily_report', compact('farm_daily_reports', 'hasSubmittedToday', 'today'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = session()->get('user_id')['user_id'];
        $role = session()->get('user_id')['role'];
        $today = date('d-m-Y');

        if ($role == 'admin') {
            $report = new FarmDailyReport;
            $report->hen_deaths = $request->input('hen_deaths');
            $report->feed_consumed = $request->input('feed_consumed');
            $report->water_consumed = $request->input('water_consumed');
            $report->extra_expense_narration = $request->input('extra_expense_narration');
            $report->extra_expense_amount = $request->input('extra_expense_amount');
            $report->user_id = $user_id;
            $report->date = $today;
            $report->save();

            return redirect()->back()->with('success', 'Report submitted successfully.');

        } elseif ($role == 'farm_user') {
            $existingReport = FarmDailyReport::where('user_id', $user_id)
                ->where('date', $today)
                ->first();

            if ($existingReport) {
                return redirect()->back()->with('error', 'You have already submitted the report for today.');
            }

            $report = new FarmDailyReport;
            $report->hen_deaths = $request->input('hen_deaths');
            $report->feed_consumed = $request->input('feed_consumed');
            $report->water_consumed = $request->input('water_consumed');
            $report->extra_expense_narration = $request->input('extra_expense_narration');
            $report->extra_expense_amount = $request->input('extra_expense_amount');
            $report->user_id = $user_id;
            $report->date = $today;
            $report->save();

            return redirect()->back()->with('success', 'Report submitted successfully.');
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FarmDailyReport  $farmDailyReport
     * @return \Illuminate\Http\Response
     */
    public function show(FarmDailyReport $farmDailyReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FarmDailyReport  $farmDailyReport
     * @return \Illuminate\Http\Response
     */
    public function edit(FarmDailyReport $farmDailyReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FarmDailyReport  $farmDailyReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $today = date('d-m-Y');
        $role = session()->get('user_id')['role'];

        if ($role == 'admin') {
            $report = FarmDailyReport::find($id);
            $report->hen_deaths = $request->input('hen_deaths');
            $report->feed_consumed = $request->input('feed_consumed');
            $report->water_consumed = $request->input('water_consumed');
            $report->extra_expense_narration = $request->input('extra_expense_narration');
            $report->extra_expense_amount = $request->input('extra_expense_amount');
            $report->user_id = $request->input('user_id');
            $report->save();
        } elseif ($request->input('date') == $today && $role == 'farm_user') {
            $report = FarmDailyReport::find($id);
            $report->hen_deaths = $request->input('hen_deaths');
            $report->feed_consumed = $request->input('feed_consumed');
            $report->water_consumed = $request->input('water_consumed');
            $report->extra_expense_narration = $request->input('extra_expense_narration');
            $report->extra_expense_amount = $request->input('extra_expense_amount');
            $report->user_id = $request->input('user_id');
            $report->save();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FarmDailyReport  $farmDailyReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(FarmDailyReport $farmDailyReport)
    {
        //
    }
}
