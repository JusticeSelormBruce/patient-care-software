<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalLong{{$list->id}}">
read more
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong{{$list->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLongTitle{{$list->id}}"
     aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle{{$list->id}}">Reason for Deduction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <div class="jumbotron">
                   <div class="row">
                       <div class="mx-5">
                           {{$list->reason}}
                       </div>
                   </div>
               </div>
            </div>

        </div>
    </div>
</div>
