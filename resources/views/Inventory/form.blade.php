<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
    <span class="text-primary">Update Stock Limit</span>
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Stock Limit </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body k">

                <form action="/change-stock-limit" method="post">
                    @method('PATCH')
                    <div class="form-group">
                        <div class="label">Please enter Stock limit</div>
                        <input type="number" class="form-control" name="limit" value="{{$value ?? 0}}" required>
                    </div>
                    <div class="row">
                        <div class="mx-auto">
                            <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                        </div>
                    </div>
                    @csrf

                </form>
            </div>

        </div>
    </div>
</div>
