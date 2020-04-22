<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal{{$list->id}}delete">
    <h6 class="text-danger">Delete</h6>
</button>

<div class="modal fade" id="exampleModal{{$list->id}}delete" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel{{$list->id}}delete" aria-hidden="true">

<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content modal-lg">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel{{$list->id}}delete"> Prescription Details for <span
                        class="mx-2">{{$list->name}}</span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body bg-secondary text-dark">
            <div class="row">

                  <div class="">
                      <button type="button" class="close  btn " data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="h3">&times;</span>
                      </button>
                  </div>
                <span class=""></span> <a href="" class="btn btn-sm btn-danger">delete</a>
                </div>

        </div>

    </div>
</div>
</div>
