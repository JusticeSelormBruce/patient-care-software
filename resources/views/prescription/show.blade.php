<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal{{$list->id}}">
    <h6 class="text-info">More Details</h6>
</button>

<div class="modal fade" id="exampleModal{{$list->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel{{$list->id}}" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{$list->id}}"> Prescription Details for <span
                            class="mx-2">{{$list->name}}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-secondary text-light">
                <div class="row  py-2">
                    <div class="col-4">
                        <span>Medicine:</span>
                    </div>
                    <div class="col-8">
                        <span>{{$list->name}}</span>
                    </div>
                </div>
                <hr>
                <div class="row  py-2 no-gutters">
                    <div class="col-4">
                        <span>Dosage Plan:</span>
                    </div>
                    <div class="col-8">
                        <span>{{$list->dosage}}</span>
                    </div>
                </div>
                <hr>
                <div class="row  py-2 no-gutters">
                    <div class="col-4 ">
                        <span>Dosage Strength:</span>
                    </div>
                    <div class="col-8">
                        <span>{{$list->strength}}</span>
                    </div>
                </div>
                <hr>
                <div class="row  py-2 no-gutters">
                    <div class="col-4">
                        <span>Alleges:</span>
                    </div>
                    <div class="col-8">
                        <span>{{$list->allegies}}</span>
                    </div>
                </div>
                <hr>
                <div class="row  py-2 no-gutters">
                    <div class="col-4">
                        <span>Note:</span>
                    </div>
                    <div class="col-8">
                        <span>{{$list->note}}</span>
                    </div>
                </div>
                <div class="row  py-2 no-gutters">
                    <div class="col-4">
                        <span>Patient:</span>
                    </div>
                    <div class="col-8">
                        @foreach($patients  as $item)
                            @if($item->id == $list->patient_id)
                                <span class="mx-2">{{$item->fname}}</span>
                                <span class="mx-2">{{$item->mname}}</span>
                                <span class="mx-2">{{$item->lname}}</span>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="row  py-2 no-gutters">
                    <div class="col-4">
                        <span>Date:</span>
                    </div>
                    <div class="col-8">
                        <span>{{$list->created_at}}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
