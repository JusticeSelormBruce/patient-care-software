

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-light btn-sm w-100" data-toggle="modal" data-target="#exampleModalLong2">
    My Past Prescription
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle2" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle2"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <div class="row">
                    <div class="ml-auto mx-5">
                        @if($info == null)
                        @else
                            {{$info->name}} <span class="mx-2"></span>     <img
                                    src="{{asset('storage/'.$info->logo) ?? 'logo'}}" alt="Profile" class=" rounded"
                                    width="50">
                        @endif

                    </div>
                </div>
                <hr>
                <table id="table_id">
                    <thead>
                    <tr>
                        <th>Medicine</th>
                        <th>Dosage</th>
                        <th>description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($prescriptions == null)
                    @else


                    @foreach($prescriptions as $list)
                        <tr>
                            <td><p>{{$list->name}}</p></td>
                            <td><p>{{$list->dosage}}</p></td>
                            <td>  @include('prescription.show')
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
            </div>

        </div>
    </div>
</div>
<hr>
