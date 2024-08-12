@extends('master') @section('title', 'Daily Report') @section('content')
<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daily report table</h3>
            <a a href="" data-toggle="modal" data-target="#add-modal" class="btn btn-success float-right">
                <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Report</a>
        </div>

        <div class="card-body">
            <table id="table" class="table table-bordered table-striped">
                <thead>
                    <tr>

                        <th>S.NO</th>
                        <th>User</th>
                        <th>Hen Deaths</th>
                        <th>Feed consumed</th>
                        <th>Water consumed</th>
                        <th>Extra expense/th>
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
                            <td>{{ $row->hen_deaths }}</td>
                            <td>{{ $row->feed_consumed }}</td>
                            <td>{{ $row->water_consumed }}</td>
                            <td>{{ $row->extra_expense }}</td>
                            <td>
                                <div class="table-data-feature">
                                    <a href="#" data-toggle="modal" data-target="#edit_modal{{ $row->id }}"
                                        class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
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
                            <input type="number" class="form-control" id="hen_deaths" name="hen_deaths"
                                placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Feed consumed (Kg)</label>
                            <input type="number" class="form-control" id="feed_consumed" name="feed_consumed"
                                placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Water consumed (liters)</label>
                            <input type="number" class="form-control" id="water_consumed" name="water_consumed"
                                placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Extra expense(optional)</label>
                            <input type="number" class="form-control" id="extra_expense" name="extra_expense"
                                placeholder="">
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
                            <div class="form-group">
                            <label for="username">hen deaths</label>
                            <input type="number" class="form-control" id="hen_deaths" name="hen_deaths"
                                placeholder="" required value="{{ $row->hen_deaths }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Feed consumed (Kg)</label>
                            <input type="number" class="form-control" id="feed_consumed" name="feed_consumed"
                                placeholder="" required value="{{ $row->feed_consumed }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Water consumed (liters)</label>
                            <input type="number" class="form-control" id="water_consumed" name="water_consumed"
                                placeholder="" required value="{{ $row->water_consumed }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Extra expense(optional)</label>
                            <input type="number" class="form-control" id="extra_expense" name="extra_expense"
                                placeholder="" value="{{ $row->extra_expense }}">
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