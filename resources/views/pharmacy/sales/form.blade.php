<div class="row w-100 ml-2" style="background-color: #cce5ff">
    <small for="">#Reference ID</small>
    <span class="mx-2"></span>
    <small>  {{$referenceid}}</small>
</div>
<div>

</div>
<div class="offset-xl-1 col-xl-10 pt-3 w-75">
    <form action="/get-items-price" method="post">
        <div class="row py-1 input-group-sm">
            <select name="id" id="" class="form-control mx-auto w-50 " required onchange="this.form.submit()">
                @if(!$product == null)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @else
                    <option value="">Select Item</option>
                    @foreach($items as $list)
                        <option value="{{$list->id}}">{{$list->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        @csrf
    </form>

    <form action="/save-sales" method="post" class="small">
        <div class="row item-field d-flex justify-content-center">

            <div class="col-xl-1">

            </div>
            @if($product == null)
                <div class="col-xl-2">
                    <p>Price<br><br>
                        GH₵ 0.00
                    </p>

                </div>
            @else
                <div class="col-xl-2 input-group-sm">
                    <p>Price GH₵<br><br>
                    <div class="input-group-sm">
                        <input type="number" name="price" readonly value="{{$product->price}}"
                               class="form-control w-75 " id="price">
                    </div>

                    </p>

                </div>

            @endif
            <div class="col-xl-1">

            </div>

            <div class="row input-group-sm mr-5">
                <label for="qty"> Qty.</label>
                <input type="number" class="form-control input-group-sm mr-3" id="qty" name="quantity" placeholder="Enter Quantity"
                       onmouseout="sum()">
            </div>
        </div>


        <div class="row py-1 input-group-sm">
            <input class="form-control mx-auto w-50 " id="amount" name="amount"  style="text-align: center!important;" readonly>


        </div>

        <div class="row">
            <button type="submit" id="submit" class="btn btn-outline-dark mx-auto btn-sm w-50"><small>Submit</small></button>
        </div>
        @csrf
    </form>
    @if(session()->has('message'))
        <div class="row">
            <div class="">
                <div class="alert alert-danger alert" role="alert">
                    <strong>Alert</strong> <span class="mx-5"></span>{{session()->get('message')}}
                </div>
            </div>
            <div class="col-8">
            </div>
        </div>
    @endif

    @include('pharmacy.sales.drug_list')
</div>
