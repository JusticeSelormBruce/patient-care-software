<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLongr{{$list->id}}">
    Reason
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLongr{{$list->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLongTitler{{$list->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitler{{$list->id}}"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="jumbotron">
                    {{$list->reason}}
                </div>
            </div>

        </div>
    </div>
</div>

