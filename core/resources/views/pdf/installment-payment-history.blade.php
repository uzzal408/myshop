<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover zero-configuration">
        <thead>
        <tr>
            <th>SL#</th>
            <th>Repayment Date</th>
            <th>Invoice ID</th>
            <th>Ins Amount</th>
            <th>Pay Amount</th>
            <th>Status</th>
        </tr>
        </thead>

        <tbody>
        @foreach($data as $k => $p)
            <tr class="{{ $p->deleted_at != null ? 'bg-warning white' : '' }}">
                <td>{{ ++$k }}</td>
                <td>{{ \Carbon\Carbon::parse($p->pay_date)->format('dS-F-y') }}</td>
                <td>{{ $p->instalment->custom }}</td>
                <td>{{ $p->amount }} {{ $basic->currency }}</td>
                <td>
                    @if($p->status == 0)
                        <div class="badge badge-warning text-uppercase font-weight-bold"><i class="fa fa-times"></i> Not Yet</div>
                    @else
                        {{ $p->pay_amount }} {{ $basic->currency }}
                    @endif
                </td>
                <td>
                    @if($p->status == 0)
                        <div class="badge badge-warning text-uppercase font-weight-bold"><i class="fa fa-spinner"></i> Pending</div>
                    @else
                        <div class="badge badge-success text-uppercase font-weight-bold"><i class="fa fa-check"></i> Complete</div>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
{{--<table class="table table-bordered">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <td><b>Show Name</b></td>--}}
{{--        <td><b>Series</b></td>--}}
{{--        <td><b>Lead Actor</b></td>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    <tr>--}}
{{--        <td>--}}
{{--            {{$show->show_name}}--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            {{$show->series}}--}}
{{--        </td>--}}
{{--        <td>--}}
{{--            {{$show->lead_actor}}--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--    </tbody>--}}
{{--</table>--}}
</body>
</html>