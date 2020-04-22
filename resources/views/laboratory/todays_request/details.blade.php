<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal{{$list->id}}">
    <span class="text-light">More Details</span>
</button>

<div class="modal fade" id="exampleModal{{$list->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel{{$list->id}}" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{$list->id}}"> Details on Lab Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-secondary text-dark">
                <div class="row">

                   <p class="text-light mx-2">{{$list->description}}</p>
                </div>

            </div>
            <div class="modal-footer">

            </div>

        </div>
    </div>
</div>
