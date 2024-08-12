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
        $farm_daily_reports = FarmDailyReport::orderByDesc('id')->get();
        return view('daily_report', compact('farm_daily_reports'));
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
        //
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
    public function update(Request $request, FarmDailyReport $farmDailyReport)
    {
        //
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
