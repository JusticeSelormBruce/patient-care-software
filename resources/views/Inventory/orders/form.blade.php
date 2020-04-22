<style>
    hr{
        color: #000!important;
    }
</style>
<div class="container py-3 ">
    <div class="row input-group-sm">
        <div class="col-lg-2 col-md-12 col-sm-12 input-group-sm">
            <label for="vendor_name">Vendor Name</label>
        </div>
        <div class="col-lg-8 col-md-11 col-sm-11 input-group-sm">
            <select name="vendor" id="" class="form-control">
                <option value="">Select Vendor</option>
                @foreach($vendors as $vendor)
                    <option value="{{$vendor->primary_contact}}"> {{$vendor->primary_contact}}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-2 col-md-12 col-sm-12 input-group-sm">
            <label for="delivery_address">Deliver To (Delivering Address)</label>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 input-group-sm">
            <textarea name="delivery_address" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>
    </div>
    <div class="row py-3">
        <div class="col-lg-2 col-md-12 col-sm-12 input-group-sm">
            <label for="">Purchase Order #</label>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 input-group-sm">
            <input type="text" class="form-control" required name="order_code" value="PO-00001">
        </div>
    </div>
    <div class="row py-3">
        <div class="col-lg-2 col-md-12 col-sm-12 input-group-sm">
            <label for="">Reference #</label>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 input-group-sm">
            <input type="text" class="form-control" required name="reference_code">
        </div>
    </div>
    <div class="row py-3">
        <div class="col-lg-2 col-md-12 col-sm-12 input-group-sm">
            <label for="">Date</label>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 input-group-sm">
            <input  value="{{$todaysDate}}" type="text" class="form-control" required name="date">
        </div>
    </div>

    <div class="row py-3">
        <div class="col-lg-2 col-md-12 col-sm-12 input-group-sm">
            <label for="">Expected Delivery Date</label>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 input-group-sm">
            <input  type="date" class="form-control" required name="delivery_date">
        </div>
    </div>


    <div class="row input-group-sm">
        <div class="col-lg-8 col-md-11 col-sm-11 input-group-sm">
                <input type="hidden" class="form-control change" required id="price" value="{{$price}}">
        </div>
    </div>
    <div class="row py-3">
        <div class="col-lg-2 col-md-12 col-sm-12 input-group-sm">
            <label for="">Quantity</label>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 input-group-sm">
            <input type="text" name="quantity" class="form-control change" required id="number" onmouseout="Sum()" >
        </div>
    </div>

    <div class="row py-3">
        <div class="col-lg-2 col-md-12 col-sm-12 input-group-sm">
            <input type="text" class="form-control" name="currency" value="GHC" required>
        </div>

        <div class="col-lg-2 col-md-12 col-sm-12 input-group-sm">
            <label for="">Amount</label>        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 input-group-sm">
            <input type="number" class="form-control" required name="amount" readonly id="amount">
        </div>
    </div>

</div>
