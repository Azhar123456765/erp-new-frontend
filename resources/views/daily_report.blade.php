@extends('master') @section('title', 'Daily Report') @section('content')
<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">My Report table</h3>
            @if (!$hasSubmittedToday)
                <a a href="" data-toggle="modal" data-target="#add-modal" class="btn btn-success float-right">
                    <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Report</a>
            @endif
        </div>

        <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>User Name</th>
                        <th>Hen Deaths</th>
                        <th>Feed consumed</th>
                        <th>Water consumed</th>
                        <th>Extra expense</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $serial = 1;
                    @endphp
                    @forelse ($farm_daily_reports as $row)
                        <tr class="tr-shadow">
                            <td>{{ $serial }}</td>
                            <td>{{ $row->user->username }}</td>
                            <td class="text-right">{{ $row->hen_deaths }}</td>
                            <td class="text-right">{{ $row->feed_consumed }}</td>
                            <td class="text-right">{{ $row->water_consumed }}</td>
                            <td class="text-right">{{ $row->extra_expense_amount }}</td>
                            <td class="text-center">{{ $row->date }}</td>
                            <td>
                                <div class="table-data-feature">
                                    @if ($row->date == $today)
                                        <a href="#" data-toggle="modal"
                                            data-target="#edit_modal{{ $row->id }}" class="item"
                                            data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @else
                                        <span class="badge badge-warning">NOT EDITABLE</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <!-- <tr class="spacer"></tr> -->
                        @php
                            $serial++;
                        @endphp
                    @empty
                        <td>No Report available.</td>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="add-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Add Report</h4>
                <div class="modal-body">
                    <form method="POST" action="{{ Route('store_daily_report') }}">
                        @csrf
                        @method('post')

                </div>
                <div class="form-group">
                    <label for="username">hen deaths</label>
                    <input type="number" step="any" class="form-control" id="hen_deaths" name="hen_deaths"
                        placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="username">Feed consumed (Kg)</label>
                    <input type="number" step="any" class="form-control" id="feed_consumed" name="feed_consumed"
                        placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="username">Water consumed (liters)</label>
                    <input type="number" step="any" class="form-control" id="water_consumed" name="water_consumed"
                        placeholder="" required>
                </div>
                <div class="form-group">
                    <h4 class="text-center">Extra expense(optional)</h4>
                    <div class="row justify-content-between my-4">
                        <div class="col-6">
                            <label for="username fs-5">Narration</label>
                            <input type="text" step="any" class="form-control" id="extra_expense_narration"
                                name="extra_expense_narration" placeholder="">
                        </div>
                        <div class="col-6">
                            <label for="username">Amount</label>
                            <input type="number" step="any" class="form-control" id="extra_expense_amount"
                                name="extra_expense_amount" placeholder="">
                        </div>
                    </div>
                </div>



                <button type="submit" class="btn btn-primary" id="btn">Submit</button>

                </form>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

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
                                <label for="username">hen deaths</label>
                                <input type="number" step="any" class="form-control" id="hen_deaths"
                                    name="hen_deaths" placeholder="" required value="{{ $row->hen_deaths }}">
                            </div>
                            <div class="form-group">
                                <label for="username">Feed consumed (Kg)</label>
                                <input type="number" step="any" class="form-control" id="feed_consumed"
                                    name="feed_consumed" placeholder="" required value="{{ $row->feed_consumed }}">
                            </div>
                            <div class="form-group">
                                <label for="username">Water consumed (liters)</label>
                                <input type="number" step="any" class="form-control" id="water_consumed"
                                    name="water_consumed" placeholder="" required
                                    value="{{ $row->water_consumed }}">
                            </div>
                            <div class="form-group">
                                <h4 class="text-center">Extra expense(optional)</h4>
                                <div class="row justify-content-between my-4">
                                    <div class="col-6">
                                        <label for="username fs-5">Narration</label>
                                        <input type="text" step="any" class="form-control"
                                            id="extra_expense_narration" name="extra_expense_narration"
                                            value="{{ $row->extra_expense_narration }}">
                                    </div>
                                    <div class="col-6">
                                        <label for="username">Amount</label>
                                        <input type="number" step="any" class="form-control"
                                            id="extra_expense_amount" name="extra_expense_amount"
                                            value="{{ $row->extra_expense_amount }}">
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ $row->user_id }}">
                                    <input type="hidden" name="date" value="{{ $row->date }}">
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
