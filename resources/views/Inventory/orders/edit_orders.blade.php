<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong{{$order->id}}">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$order->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle{{$order->id}}">Edit details for {{$order->reference_code}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/get-product-price-for-update" method="post">
                    <div class="row input-group-sm">
                        <div class="col-lg-2 col-md-12 col-sm-12 input-group-sm">
                            <label for=""></label>
                        </div>

                        <div class="col-lg-8 col-md-11 col-sm-11 input-group-sm">
                            <select name="product_id" id="" class="form-control" onchange="this.form.submit();">
                                @if($product == null)
                                    <option value="">Select Item</option>
                                    @foreach($items as $list)
                                        <option value="{{$list->id}}"> {{$list->name}}</option>
                                    @endforeach
                                @else
                                    @foreach($items as $list)
                                        <option value="{{$list->id}}" @if($product->id == $list->id) selected @endif> {{$list->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        @csrf


                    </div>
                </form>
                <form action="/update-order-details" method="post" id="update">
                    @method('PATCH')
                    <div class="row">
                        <div class="mr-auto mx-2">Item Details</div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm" onclick="document.getElementById('update').submit();">Save changes</button>
                    </div>
                    @csrf
                </form>


            </div>

        </div>
    </div>
</div>
