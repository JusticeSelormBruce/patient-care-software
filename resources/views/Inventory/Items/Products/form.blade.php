<style>
    .avatar {
        width: 150px !important;
        height: 150px !important;
    }
</style>
<div class="container  input-group-sm ">
    <div class="lead">Add Product</div>
    <div class="row input-group-sm">
        <select name="category" id="fam" required class="form-control w-50 mx-auto" onchange="getFamily()">
            <option value="">Select Product Category</option>
            @foreach($categories as $category)
                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="row input-group-sm mx-auto w-50 py-2">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="row w-50 mx-auto no-gutters ">
        <div class="col-lg-3 col-md-12 col-sm-12 input-group-sm">
            <label for="">Code Prefix</label>
            <input type="text" class="form-control" required name="prefix" value="" readonly id="prefix">
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12 input-group-sm">
            <label for="">Code</label>
            <input type="text" class="form-control" required name="code">
        </div>
    </div>
    <div class="row w-50 mx-auto no-gutters ">
        <div class="col-lg-6 col-md-12 col-sm-12 input-group-sm">
            <label for="">Price</label>
            <input type="text" name="price" class="form-control change" required id="price">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 input-group-sm">
            <label for="">Quantity</label>
            <input type="text" name="number" class="form-control change" required id="number" onmouseout="Sum()">
        </div>
    </div>

    <div class="row w-50 mx-auto no-gutters ">
        <div class="col-lg-3 col-md-12 col-sm-12 input-group-sm">
            <label for="">Currency</label>
            <input type="text" class="form-control" name="currency" value="GHC" required>
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12 input-group-sm">
            <label for="">Amount</label>
            <input type="number" class="form-control" required name="amount" readonly id="amount">
        </div>
    </div>
    <div class="row input-group-sm mx-auto w-50">
        <label for="">Description</label>
        <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
    </div>

</div>
<script type="text/javascript">
    var default_price = 0.00;
    document.getElementById('amount').setAttribute('value', default_price);

    function Sum() {
        var price = document.getElementById("price").value;
        var num = document.getElementById("number").value;

        if (num <= 0) {

            document.getElementById('amount').setAttribute('value', 0);
        } else {
            var result = parseInt(num) * parseInt(price);
            document.getElementById('amount').setAttribute('value', result);

        }
    }

    function getFamily() {
        var family = document.getElementById("fam").value;
        document.getElementById('prefix').setAttribute('value', family);
    }

</script>
