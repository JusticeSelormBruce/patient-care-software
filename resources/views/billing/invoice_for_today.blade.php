<table class="table" id="table_id">
    <thead>
    <tr>
        <th>#</th>
        <th>#Refefence ID</th>
        <th>Action</th>


    </tr>
    <tbody>

    @foreach($invoices as $invoice)

        <tr>
            <td>
                {{ ($invoice->count()) -($invoice->id -1)}}
            </td>
            <td>{{$invoice->refid}}</td>
            @if($invoice->status == 0)
            <td><a href="{{route('invoice.view',['invoice_id'=>$invoice->refid])}}">View Invoice</a></td>
                @else
             <td>   <b class="text-info">checked</b></td>
            @endif

        </tr>
    @endforeach
    <hr>

    </tbody>
    </thead>
</table>