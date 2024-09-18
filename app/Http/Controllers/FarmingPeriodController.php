<?php

namespace App\Http\Controllers;

use App\Models\FarmingPeriod;
use App\Models\Farm;
use App\Models\users;
use Illuminate\Http\Request;

class FarmingPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = users::where('role', 'farm_user')->get();
        $farming_pr = FarmingPeriod::all();

        return view('farming_periods', compact('users', 'farming_pr'));
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
        $farm = FarmingPeriod::create($request->all());

        return redirect()->back()->with('message', 'Farming Perioad Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FarmingPeriod  $farmingPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(FarmingPeriod $farmingPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FarmingPeriod  $farmingPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(FarmingPeriod $farmingPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FarmingPeriod  $farmingPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FarmingPeriod $farmingPeriod)
    {
        $FarmingPeriod = FarmingPeriod::find($farmingPeriod->id);
        $FarmingPeriod->update($request->all());

        return redirect()->back()->with('message', 'Farming Perioad Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FarmingPeriod  $farmingPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(FarmingPeriod $farmingPeriod)
    {
        try {
            FarmingPeriod::destroy($farmingPeriod->id);
            return redirect()->back()->with('message', 'Farming Period Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('something_wrong', 'This Farm May Also In Other Module Or Something Went Wrong');

        }
    }
}
