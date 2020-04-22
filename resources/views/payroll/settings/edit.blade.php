<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalLong{{$list->id}}">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong{{$list->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLongTitle{{$list->id}}"
     aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle{{$list->id}}"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/edit-overtime-details" method="post">
                    @method('PATCH')
                    <input type="hidden" name="id" value="{{$list->id}}">
                    <div class="row no-gutters py-2">
                        <div class="col-3"><label for="">No of hours:</label></div>
                        <div class="col-9">
                            <div class="input-group-sm">
                                <input type="number" name="hours" class="form-control" value="{{$list->hours}}"
                                       required>
                            </div>
                            <div>{{$errors->first('hours') }}</div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-3"><label for="">Amount:</label></div>
                        <div class="col-9">
                            <div class="input-group-sm">
                                <input type="number" name="amount" class="form-control" value="{{$list->amount}}"
                                       required>
                            </div>
                            <div>
                                {{ $errors->first('amount')}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mx-auto w-50">
                            <button type="submit" class="btn btn-outline-dark btn-sm w-50 mx-5">update</button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>

        </div>
    </div>
</div>
