<div class="row">
    <div class="ml-auto">

        <div class="row">
            <div class="ml-auto mx-5">
                <button type="button" class="btn text-success btn-sm" data-toggle="modal"
                        data-target="#exampleModaldelete">
                    <p class="text-success">Vendor +</p>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModaldelete" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabeld" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabeld"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/save-customer-details" method="post" class="yb-5"  enctype="multipart/form-data">
                                    @include('Inventory.customers.form')
                                    <div class="row">
                                        <div class="mx-auto mb-5 py-b-5">
                                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                        </div>
                                    </div>
                                    @csrf
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>