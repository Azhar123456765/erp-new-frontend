@extends('master')

@section('title', 'Daily Report')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">My Report Table</h3>
                @if ($nextSubmissionDate)
                    <a href="" data-toggle="modal" data-target="#add-modal" class="btn btn-success float-right">
                        <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Report for {{ $nextSubmissionDate }}
                    </a>
                @endif
            </div>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Date</th>
                            <th>chicken deaths / چکن کی موت
/ مرغي جو موت</th>
                            <th>Feed Consumed</th>
                            <th>Water Consumed</th>
                            <th>Extra Expense</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $serial = 1;
                        @endphp
                        @forelse ($farm_daily_reports as $report)
                            <tr class="tr-shadow">
                                <td>{{ $serial }}</td>
                                <td class="text-center">{{ $report->date }}</td>
                                <td class="text-right">{{ $report->hen_deaths }}</td>
                                <td class="text-right">{{ $report->feed_consumed }}</td>
                                <td class="text-right">{{ $report->water_consumed }}</td>
                                <td class="text-right">
                                    {{ $report->extra_expense_narration }}, {{ $report->extra_expense_amount }}Rs</td>
                                <td>
                                    <div class="table-data-feature">
                                        @if ($report->date == $today)
                                            <a href="#" data-toggle="modal"
                                                data-target="#edit_modal{{ $report->id }}" class="item"
                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @php
                                $serial++;
                            @endphp
                        @empty
                            <tr>
                                <td colspan="8">No Reports Available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal for Adding Report -->
    @if ($nextSubmissionDate)
        <div class="modal fade" id="add-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Add Report for {{ $nextSubmissionDate }}</h4>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('store_daily_report') }}">
                                @csrf
                                <input type="hidden" name="farm" value="{{ $farm->id }}">
                                <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                <input type="hidden" name="date" value="{{ $nextSubmissionDate }}">

                                <div class="form-group">
                                    <label for="hen_deaths">chicken deaths / چکن کی موت
/ مرغي جو موت</label>
                                    <input type="number" step="any" class="form-control" id="hen_deaths"
                                        name="hen_deaths" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="feed_consumed">Feed consumed (Bags) / استعمال شدہ فیڈ (بیگ) / کاڌ خوراڪ (بيگ)</label>
                                    <input type="number" step="any" class="form-control" id="feed_consumed"
                                        name="feed_consumed" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="water_consumed">Water consumed (liters) / استعمال شدہ پانی (لیٹر) / استعمال ٿيل پاڻي (ليٽر)</label>
                                    <input type="number" step="any" class="form-control" id="water_consumed"
                                        name="water_consumed" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <h4 class="text-center">Extra expense (optional) / اضافی اخراجات (اختیاری) / اضافي خرچ (اختياري)</h4>
                                    <div class="row justify-content-between my-4">
                                        <div class="col">
                                            <label for="extra_expense_narration">Narration / بیانیہ / داستان</label>
                                            <input type="text" class="form-control" id="extra_expense_narration"
                                                name="extra_expense_narration" placeholder="">
                                        </div>
                                        <div class="col">
                                            <label for="extra_expense_amount">Amount / رقم</label>
                                            <input type="number" step="any" class="form-control"
                                                id="extra_expense_amount" name="extra_expense_amount" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @foreach ($farm_daily_reports as $row)
        <div class="modal fade" id="edit_modal{{ $row->id }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Edit Report</h4>
                        <div class="modal-body">
                            <form method="POST" action="{{ Route('update_daily_report', $row->id) }}">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="username">chicken deaths / چکن کی موت
/ مرغي جو موت</label>
                                    <input type="number" step="any" class="form-control" id="hen_deaths"
                                        name="hen_deaths" placeholder="" required value="{{ $row->hen_deaths }}">
                                </div>
                                <div class="form-group">
                                    <label for="username">Feed consumed (Bags) / استعمال شدہ فیڈ (بیگ) / کاڌ خوراڪ (بيگ)</label>
                                    <input type="number" step="any" class="form-control" id="feed_consumed"
                                        name="feed_consumed" placeholder="" required value="{{ $row->feed_consumed }}">
                                </div>
                                <div class="form-group">
                                    <label for="username">Water consumed (liters) / استعمال شدہ پانی (لیٹر) / استعمال ٿيل پاڻي (ليٽر)</label>
                                    <input type="number" step="any" class="form-control" id="water_consumed"
                                        name="water_consumed" placeholder="" required
                                        value="{{ $row->water_consumed }}">
                                </div>
                                <div class="form-group">
                                    <h4 class="text-center">Extra expense(optional)</h4>
                                    <div class="row justify-content-between my-4">
                                        <div class="col-6">
                                            <label for="username fs-5">Narration / بیانیہ / داستان</label>
                                            <input type="text" step="any" class="form-control"
                                                id="extra_expense_narration" name="extra_expense_narration"
                                                value="{{ $row->extra_expense_narration }}">
                                        </div>
                                        <div class="col-6">
                                            <label for="username">Amount / رقم</label>
                                            <input type="number" step="any" class="form-control"
                                                id="extra_expense_amount" name="extra_expense_amount"
                                                value="{{ $row->extra_expense_amount }}">
                                        </div>
                                        <input type="hidden" name="user_id" value="{{ $row->user_id }}">
                                        <input type="hidden" name="date" value="{{ $row->date }}">
                                        <input type="hidden" name="farm" value="{{ $farm->id }}">
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
