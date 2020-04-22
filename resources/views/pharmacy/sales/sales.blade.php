<table class="table" id="table_id1">
        <thead>
        <tr>
            <th>Drug</th>
            <th>Quantity</th>
            <th>Price</th>
           
        </tr>
        <tbody>

        @foreach($sales as $list)
            <tr>
                @foreach($products as $item)
                    @if($list->items_id  == $item->id)
                        <td>{{$item->name}}</td>
                    @endif
                @endforeach
                <td>{{$list->quantity}}</td>
                <td>{{$list->amount}}.00</td>
              
            </tr>

          

        @endforeach

        </tbody>
        </thead>
    </table>