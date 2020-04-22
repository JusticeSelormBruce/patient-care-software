<table id="table_id" >
    <thead>
    <tr>
        <th>#</th>
        <th>Name of Employee</th>
        <th>Amount Deducted</th>
        <th>Status</th>
        <th>Date</th>
        <th>Reason</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $list)
        <tr>
            <td>{{ ($list->id ) - ($list->id - 1)}}</td>
            <td>
                @foreach($AllUsers as $users)
                    @if($users->id == $list->user_id)
                        {{$users->name}}
                    @endif
                @endforeach
            </td>
            <td>GCH <span class="mx-1"></span>{{$list->amount}}</td>
            <td class="text-info">
                @if($list->status ==  0)
                    Pending
                    @else
                    Deducted
                @endif
            </td>
            <td>{{$list->created_at}}</td>
            <td>@include('payroll.deduction.reason')</td>
        </tr>
    @endforeach
    </tbody>
</table>