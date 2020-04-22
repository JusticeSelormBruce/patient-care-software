<table id="table_id" >
    <thead>
    <tr>
        <td>#</td>
        <td>Name of Employee</td>
        <td>Amount Paid</td>

        <td>Date</td>
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
            <td>{{$list->created_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>