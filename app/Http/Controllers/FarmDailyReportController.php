<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\FarmDailyReport;
use App\Models\FarmingPeriod;
use App\Models\users;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FarmDailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $user_id = session()->get('user_id')['user_id'];
    //     $role = session()->get('user_id')['role'];
    //     $today = date('Y-m-d');

    //     $hasSubmittedToday = FarmDailyReport::where('user_id', $user_id)
    //         ->where('date', $today)
    //         ->exists();

    //     if ($role == 'admin') {
    //         $farm_daily_reports = FarmDailyReport::orderByDesc('id')->get();
    //         return view('daily_report_admin', compact('farm_daily_reports', 'today'));
    //     } elseif ($role == 'farm_user') {
    //         $farm_daily_reports = FarmDailyReport::where('user_id', $user_id)->orderByDesc('id')->get();
    //         return view('daily_report', compact('farm_daily_reports', 'hasSubmittedToday', 'today'));
    //     }
    // }

    public function index()
    {
        $role = session()->get('user_id')['role'];
        $today = Carbon::now()->format('Y-m-d'); // Use Carbon consistently
        if ($role == 'admin') {
            $farms = Farm::all();
            $farm_daily_reports = FarmDailyReport::orderBy('date', 'asc')->get();
            return view('daily_report_admin', compact('farm_daily_reports', 'today', 'farms'));
        } elseif ($role == 'farm_user') {
            $user_id = session()->get('user_id')['user_id'];
            $farming_period = FarmingPeriod::where('assign_user_id', $user_id)->first();
            $farm = Farm::where('user_id', $user_id)->first();

            if ($farming_period) { // Ensure $farming_period exists
                $user = Users::where('user_id', $user_id)->where('role', 'farm_user')->first();
                $startDate = Carbon::createFromFormat('Y-m-d', $farming_period->start_date);
                $endDate = Carbon::createFromFormat('Y-m-d', $farming_period->end_date);

                if (Carbon::createFromFormat('Y-m-d', $today)->between($startDate, $endDate)) {
                    $farm_daily_reports = FarmDailyReport::where('user_id', $user_id)
                        ->orderBy('date', 'asc')
                        ->get();

                    $earliestDate = $startDate->copy()->addDay()->format('Y-m-d');
                    $hasSubmittedToday = $farm_daily_reports->contains('date', $today);
                    $submittedDates = $farm_daily_reports->pluck('date');
                    $missingDates = collect();

                    $currentDate = Carbon::createFromFormat('Y-m-d', $earliestDate);
                    while ($currentDate->format('Y-m-d') <= $today) {
                        $dateStr = $currentDate->format('Y-m-d');
                        if (!$submittedDates->contains($dateStr)) {
                            $missingDates->push($dateStr);
                        }
                        $currentDate->addDay();
                    }

                    $nextSubmissionDate = $missingDates->first();

                    return view('daily_report', compact(
                        'user',
                        'farm_daily_reports',
                        'hasSubmittedToday',
                        'nextSubmissionDate',
                        'missingDates',
                        'role',
                        'today',
                        'farm' // Changed 'farm' to 'farms'
                    ));
                } else {
                    return redirect()->back()->with('something_error', 'Something went wrong. Please try again.');
                }
            } else {
                return redirect()->back()->with('something_error', 'No farming period found for this user.');
            }
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
        $today = date('Y-m-d');

        if ($role == 'admin') {
            $report = new FarmDailyReport;
            $report->hen_deaths = $request->input('hen_deaths');
            $report->feed_consumed = $request->input('feed_consumed');
            $report->water_consumed = $request->input('water_consumed');
            $report->extra_expense_narration = $request->input('extra_expense_narration');
            $report->extra_expense_amount = $request->input('extra_expense_amount');
            $report->user_id = $user_id;
            $report->date = $today;
            $report->farm = $request->input('farm');
            $report->save();

            return redirect()->back()->with('message', 'Report submitted successfully.');

        } elseif ($role == 'farm_user') {
            $existingReport = FarmDailyReport::where('user_id', $user_id)
                ->where('date', $today)
                ->first();

            if ($existingReport) {
                return redirect()->back()->with('something_error', 'You have already submitted the report for today.');
            }

            $report = new FarmDailyReport;
            $report->hen_deaths = $request->input('hen_deaths');
            $report->feed_consumed = $request->input('feed_consumed');
            $report->water_consumed = $request->input('water_consumed');
            $report->extra_expense_narration = $request->input('extra_expense_narration');
            $report->extra_expense_amount = $request->input('extra_expense_amount');
            $report->user_id = $request->input('user_id');
            $report->date = $request->input('date');
            $report->farm = $request->input('farm');
            $report->save();

            return redirect()->back()->with('message', 'Report submitted successfully.');
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
        $today = date('Y-m-d');
        $role = session()->get('user_id')['role'];
        $user_id = session()->get('user_id')['user_id'];

        if ($role == 'admin') {
            $report = FarmDailyReport::find($id);
            $report->hen_deaths = $request->input('hen_deaths');
            $report->feed_consumed = $request->input('feed_consumed');
            $report->water_consumed = $request->input('water_consumed');
            $report->extra_expense_narration = $request->input('extra_expense_narration');
            $report->extra_expense_amount = $request->input('extra_expense_amount');
            $report->user_id = $user_id;
            $report->farm = $request->input('farm');
            $report->save();
        } elseif ($request->input('date') == $today && $role == 'farm_user') {
            $report = FarmDailyReport::find($id);
            $report->hen_deaths = $request->input('hen_deaths');
            $report->feed_consumed = $request->input('feed_consumed');
            $report->water_consumed = $request->input('water_consumed');
            $report->extra_expense_narration = $request->input('extra_expense_narration');
            $report->extra_expense_amount = $request->input('extra_expense_amount');
            $report->user_id = $request->input('user_id');
            $report->farm = $request->input('farm');
            $report->save();
        }

        return redirect()->back()->with('message', 'Report updated successfully.');
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
