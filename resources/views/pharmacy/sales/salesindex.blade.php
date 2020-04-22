@extends('layouts.pharmacy')
@section('render')

    <div class="container-fluid pt-4">
        <div class="jumbotron">
            @include('pharmacy.sales.form')
        </div>
    </div>


    <script type="text/javascript">
        var default_price = 0.00;
        document.getElementById('amount').setAttribute('value', default_price);
        function  sum(){
            var price  = document.getElementById("price").value;
            var num  = document.getElementById("qty").value;

            if(num <=0){

                document.getElementById('amount').setAttribute('value', 0);
            }
            else {
                var result = parseInt(num) * parseInt(price);
                document.getElementById('amount').setAttribute('value', result);

            }
        }
    </script>
@endsection
