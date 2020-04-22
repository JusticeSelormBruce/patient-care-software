<style>
    table,th,td{
        font-size: small!important;
    }
</style>
<div class="jumbotron py-1">

    <table  class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Hours</th>
            <th>Amount</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($overtimesDetails as $list)
            <tr>
                <td>{{$list->id}}</td>
                <td>{{$list->hours}}</td>
                <td>{{$list->amount}}</td>
                <td>@include('payroll.settings.edit')</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>