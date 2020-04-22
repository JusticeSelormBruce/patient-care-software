<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal{{$list->id}}">
    <h6 class="text-info">Read More</h6>
</button>

<div class="modal fade" id="exampleModal{{$list->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel{{$list->id}}" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{$list->id}}"> Reason for Visiting <span
                            class="mx-2">{{$list->name}}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-secondary text-light">
             <p>
                 {{$list->reason}}
             </p>
            </div>

        </div>
    </div>
</div>
