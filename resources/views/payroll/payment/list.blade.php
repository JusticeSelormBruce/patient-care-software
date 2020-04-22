<table id="table_id" >
    <thead>
    <tr>
        <th>#</th>
        <th>Name of Employee</th>
        <th>Amount paid</th>
        <th>Overtime</th>
        <th>Amount Deducted</th>
        <th>Date</th>

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
            <td>GCH <span class="mx-1"></span>{{$list->overtime }}</td>
            <td>GCH <span class="mx-1"></span>{{$list->deduction}}</td>
            <td>{{$list->created_at}}</td>

        </tr>
    @endforeach
    </tbody>
</table>