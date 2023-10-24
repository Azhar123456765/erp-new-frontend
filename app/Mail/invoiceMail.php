<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;


use App\Models\users;
use App\Models\customization;
use App\Models\buyer;
use App\Models\seller;

use App\Models\warehouse;
use App\Models\zone;
use App\Models\sales_officer;



use App\Models\accounts;
use App\Models\Expense;
use App\Models\Income;
use App\Models\p_voucher;
use App\Models\sell_invoice;
class invoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if (session()->has("user_id")) {

            $today = Carbon::now()->format('Y-m-d');
            $sell_invoice_qty = sell_invoice::whereDate(DB::raw('DATE(sell_invoice.created_at)'), $today)->whereIn('sell_invoice.id', function ($subQuery) {
                $subQuery->select(DB::raw('MIN(id)'))
                    ->from('sell_invoice')
                    ->groupBy('unique_id');
            })->sum("qty_total");

            $earning_y = Income::select(
                DB::raw('MONTH(updated_at) as month'),
                DB::raw('SUM(amount) as total_earning')
            )
                ->whereYear('updated_at', 2023)
                ->groupBy(DB::raw('MONTH(updated_at)'))
                ->orderBy(DB::raw('MONTH(updated_at)'))
                ->get();

            $chartData = [];
            foreach ($earning_y as $item) {
                $chartData[] = [

                    $chartData[$item->month] = $item->total_earning
                ];
            }


            $expense_y = Expense::select(
                DB::raw('MONTH(updated_at) as month'),
                DB::raw('SUM(amount) as total_earning')
            )
                ->whereYear('updated_at', 2023)
                ->groupBy(DB::raw('MONTH(updated_at)'))
                ->orderBy(DB::raw('MONTH(updated_at)'))
                ->get();

            $chartData2 = [];
            foreach ($expense_y as $item) {
                $chartData2[] = [

                    $chartData2[$item->month] = $item->total_earning
                ];
            }

            $si = Income::whereDate('updated_at', $today)->sum('amount');
            $earning = $si;

            $expense =  Expense::whereDate('updated_at', $today)->sum('amount');


            $onlineUsersCount = Cache::get('user_last_seen', []);

            // Count the number of "true" values in the array
            $onlineUsersCount = count(array_filter($onlineUsersCount, function ($value) {
                return $value === true;
            }));

            // Now $onlineUsersCount contains the count of online users



            $data = compact('sell_invoice_qty', 'earning', 'expense', 'chartData', 'chartData2', 'onlineUsersCount');
          
            return $this->view('dashboard')->with($data)
            ->subject('Sample Subject');
        } 

    }
}
