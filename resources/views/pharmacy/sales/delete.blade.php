<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{$list->id}}delete">
    Delete
</button>

<div class="modal fade" id="exampleModal{{$list->id}}delete" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel{{$list->id}}delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{$list->id}}delete"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer mx-auto">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">cancel</button>
                <a href="{{route('sales.delete',['id'=>$list->id])}}" class="btn btn-danger btn-sm">Delete</a>
            </div>
        </div>
    </div>
</div>
