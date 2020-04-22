<style>
    table {
        font-family: -apple-system;
        font-size: 15px !important;
    }
    .alert{
        height: 40px!important;
    }
</style>
<div class="container-fluid pt-5">
    <div class="jumbotron pt-2">
        <div class="row">
            <div class="alert alert-success w-100 ">
                <lead>Prescription Details</lead>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Medicine</th>
                <th>Dosage</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($prescription as $list)
                <tr>
                    <td><p>{{$list->name}}</p></td>
                    <td><p>{{$list->dosage}}</p></td>
                    <td>  @include('prescription.show')
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="mx-auto">
                <a href="{{route('preview.prescription')}}" class="btn btn-primary btn-sm text-capitalize"> Preview Prescription</a>
            </div>
        </div>
    </div>

</div>

