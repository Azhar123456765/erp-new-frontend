@extends('master')

@section('title', 'Daily Report')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">My Report Table</h3>
                @if ($farm_daily_report->date)
                    <a href="" data-toggle="modal" data-target="#add-modal" class="btn btn-success float-right">
                        <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Report for {{ $farm_daily_report->date }}
                    </a>
                @endif
            </div>
            <div class="d-flex justify-content-center align-items-center my-3 px-5">
                <h5>Select Farm</h5>
                <select class="form-control account-select m-auto w-50" id="head_account" onchange="sub_head()">
                    @foreach ($all_farms as $row)
                        <option value="{{ $row->id }}" {{ $farm_id == $row->id ? 'selected' : '' }}>{{ $row->name }}
                        </option>
                    @endforeach
                </select>
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
                            <th>Extra Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $serial = 1;
                        @endphp
                        @forelse ($all_farm_daily_reports as $report)
                            <tr class="tr-shadow">
                                <td>{{ $serial }}</td>
                                <td class="text-center">{{ $report->date }}</td>
                                <td class="text-right">{{ $report->hen_deaths }}</td>
                                <td class="text-right">{{ $report->feed_consumed }}</td>
                                <td class="text-right">{{ $report->water_consumed }}</td>
                                <td class="text-right">
                                    {{ $report->extra_expense_narration }}</td>
                                <td class="text-right">
                                    {{ $report->extra_expense_amount }}Rs</td>
                                <td>
                                    <div class="table-data-feature">
                                        @if ($farm_daily_report->date == $today)
                                            <a href="#" data-toggle="modal"
                                                data-target="#edit_modal{{ $farm_daily_report->id }}" class="item"
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

    @if ($farm_daily_report)
        <div class="modal fade" id="add-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Add Report for {{ $farm_daily_report->date }}</h4>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('store_daily_report') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $farm_daily_report->id }}">

                                <div class="form-group">
                                    <label for="hen_deaths">chicken deaths / چکن کی موت
                                        / مرغي جو موت</label>
                                    <input type="number" step="any" class="form-control" id="hen_deaths"
                                        name="hen_deaths" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="feed_consumed">Feed consumed (Bags) / استعمال شدہ فیڈ (بیگ) / کاڌ خوراڪ
                                        (بيگ)</label>
                                    <input type="number" step="any" class="form-control" id="feed_consumed"
                                        name="feed_consumed" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="water_consumed">Water consumed (liters) / استعمال شدہ پانی (لیٹر) / استعمال
                                        ٿيل پاڻي (ليٽر)</label>
                                    <input type="number" step="any" class="form-control" id="water_consumed"
                                        name="water_consumed" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <h4 class="text-center">Extra expense (optional) / اضافی اخراجات (اختیاری) / اضافي خرچ
                                        (اختياري)</h4>
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

    @if ($farm_daily_report->date == $today)
        <div class="modal fade" id="edit_modal{{ $farm_daily_report->id }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Edit Report</h4>
                        <div class="modal-body">
                            <form method="POST" action="{{ Route('update_daily_report', $farm_daily_report->id) }}">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="username">chicken deaths / چکن کی موت
                                        / مرغي جو موت</label>
                                    <input type="number" step="any" class="form-control" id="hen_deaths"
                                        name="hen_deaths" placeholder="" required
                                        value="{{ $farm_daily_report->hen_deaths }}">
                                </div>
                                <div class="form-group">
                                    <label for="username">Feed consumed (Bags) / استعمال شدہ فیڈ (بیگ) / کاڌ خوراڪ
                                        (بيگ)
                                    </label>
                                    <input type="number" step="any" class="form-control" id="feed_consumed"
                                        name="feed_consumed" placeholder="" required
                                        value="{{ $farm_daily_report->feed_consumed }}">
                                </div>
                                <div class="form-group">
                                    <label for="username">Water consumed (liters) / استعمال شدہ پانی (لیٹر) / استعمال ٿيل
                                        پاڻي (ليٽر)</label>
                                    <input type="number" step="any" class="form-control" id="water_consumed"
                                        name="water_consumed" placeholder="" required
                                        value="{{ $farm_daily_report->water_consumed }}">
                                </div>
                                <div class="form-group">
                                    <h4 class="text-center">Extra expense(optional)</h4>
                                    <div class="row justify-content-between my-4">
                                        <div class="col-6">
                                            <label for="username fs-5">Narration / بیانیہ / داستان</label>
                                            <input type="text" step="any" class="form-control"
                                                id="extra_expense_narration" name="extra_expense_narration"
                                                value="{{ $farm_daily_report->extra_expense_narration }}">
                                        </div>
                                        <div class="col-6">
                                            <label for="username">Amount / رقم</label>
                                            <input type="number" step="any" class="form-control"
                                                id="extra_expense_amount" name="extra_expense_amount"
                                                value="{{ $farm_daily_report->extra_expense_amount }}">
                                        </div>
                                        <input type="hidden" name="user_id" value="{{ $farm_daily_report->user_id }}">
                                        <input type="hidden" name="date" value="{{ $farm_daily_report->date }}">
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
    @endif

    <script>
        function sub_head() {

            var head_id = $("#head_account").find('option:selected').val();
            var sub_head_id = $("#sub_head_account").find('option:selected').val();

            window.location.href = '{{ route('daily_reports', [':farm']) }}'.replace(':farm', sub_head_id)
                .replace(':head', head_id);
        }
    </script>

@endsection
