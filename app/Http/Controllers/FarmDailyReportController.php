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
        if ($role == 'admin') {
            $farm_daily_reports = FarmDailyReport::orderByDesc('id')->get();
            return view('daily_report_admin', compact('farm_daily_reports'));
        } elseif ($role == 'farm_user') {
            $farm_daily_reports = FarmDailyReport::where('user_id', $user_id)->orderByDesc('id')->get();
            return view('daily_report', compact('farm_daily_reports'));
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
        $narration = new FarmDailyReport;
        $narration->hen_deaths = $request->input('hen_deaths');
        $narration->feed_consumed = $request->input('feed_consumed');
        $narration->water_consumed = $request->input('water_consumed');
        $narration->extra_expense_narration = $request->input('extra_expense_narration');
        $narration->extra_expense_amount = $request->input('extra_expense_amount');
        $narration->user_id = session()->get('user_id')['user_id'];
        $narration->save();

        return redirect()->back();
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
        $narration = FarmDailyReport::find($id);
        $narration->hen_deaths = $request->input('hen_deaths');
        $narration->feed_consumed = $request->input('feed_consumed');
        $narration->water_consumed = $request->input('water_consumed');
        $narration->extra_expense_narration = $request->input('extra_expense_narration');
        $narration->extra_expense_amount = $request->input('extra_expense_amount');
        $narration->user_id = $request->input('user_id');
        $narration->save();

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
