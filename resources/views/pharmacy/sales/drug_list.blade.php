<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #section-to-print, #section-to-print * {
            visibility: visible;
        }

        #section-to-print {
            position: absolute;
            left: 0;
            top: 0;
        }

        hr {
            margin: 0.1rem;
        }
        thead,th{
            font-size: small!important;
        }
    }
</style>
@if($prescription == null)
@else
    <table class="table small" id="section-to-print" >
        <thead>
        <tr>
            <th>Drug</th>
            <th>Quantity</th>
            <th>Price</th>
            <th></th>
        </tr>
        <tbody>

        @foreach($prescription as $list)
            <tr>
                @foreach($products as $item)
                    @if($list->items_id  == $item->id)
                        <td>{{$item->name}}</td>
                    @endif
                @endforeach
                <td>{{$list->quantity}}</td>
                <td>{{$list->amount}}.00</td>
                <td>@include('pharmacy.sales.delete')</td>
            </tr>

            <hr>

        @endforeach

        </tbody>
        </thead>
    </table>
    @foreach($amount->groupBy('reference_id') as $items)

        <section style="display: none!important;">
            <span>{{$items[0]->id}}</span>
        </section>

        @foreach($items as $list)
            <section style="display: none!important;">
                <span>{{$list->id}}</span>
            </section>
        @endforeach
        <div class="row bg-light small">
            <div class="mx-auto">
                <span>GHC Total:</span> <span class="">({{$amount->sum('amount')}})</span>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="mx-auto mr-5">
            <a href="/preview-invoice" class="btn btn-outline-dark btn-sm"><small class="text-capitalize w-25">Preview</small></a>
        </div>
    </div>
@endif
