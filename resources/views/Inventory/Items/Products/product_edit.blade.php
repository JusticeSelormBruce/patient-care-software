<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong{{$product->id}}">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$product->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle{{$product->id}}">Edit details for {{$product->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/update-product-details" method="post">
                    @method('PATCH')
                    <input type="hidden" value="{{$product->id}}" name="id">
                    <div class="container  input-group-sm ">

                        <div class="row input-group-sm">
                            <select name="category" id="" required class="form-control w-50 mx-auto">

                                @foreach($categories as $category)
                                    <option value="{{$category->category_name}}
                                    @if($product->category == $category->category_name) selected  @endif
                                            ">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row input-group-sm mx-auto w-50 py-2">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required value="{{$product->name}}">
                        </div>

                        <div class="row w-50 mx-auto no-gutters ">

                            <div class="col-lg-9 col-md-12 col-sm-12 input-group-sm">
                                <label for="">Stoke Keeping Unit</label>
                                <input type="text" class="form-control" required name="sku" value="{{$product->sku}}">
                            </div>
                        </div>
                        <div class="row w-50 mx-auto no-gutters ">
                            <div class="col-lg-6 col-md-12 col-sm-12 input-group-sm">
                                <label for="">Price</label>
                                <input type="text" name="price" class="form-control change" required id="price" value="{{$product->price}}">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 input-group-sm">
                                <label for="">Total Number</label>
                                <input type="text" name="number" class="form-control change" required id="number" onmouseout="Sum()" value="{{$product->number}}" >
                            </div>
                        </div>

                        <div class="row w-50 mx-auto no-gutters ">
                            <div class="col-lg-3 col-md-12 col-sm-12 input-group-sm">
                                <label for="">Currency</label>
                                <input type="text" class="form-control" name="currency" value="{{$product->currency}}" required va>
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12 input-group-sm">
                                <label for="">Amount</label>
                                <input type="number" class="form-control" required name="amount" readonly id="amount" value="{{$product->amount}}">
                            </div>
                        </div>
                        <div class="row input-group-sm mx-auto w-50">
                            <label for="">Description</label>
                            <textarea name="description" cols="30" rows="10" class="form-control">
                                {{$product->description}}
                            </textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    </div>
                    @csrf
                </form>


            </div>

        </div>
    </div>
</div>
<script type="text/javascript">

    function  Sum(){
        var price  = document.getElementById("price").value;
        var num  = document.getElementById("number").value;

        if(num <=0){

            document.getElementById('amount').setAttribute('value', 0);
        }
        else {
            var result = parseInt(num) * parseInt(price);
            document.getElementById('amount').setAttribute('value', result);

        }
    }
</script>
