<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong{{$list->id}}">
    Patient Details
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong{{$list->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLongTitle{{$list->id}}" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle{{$list->id}}"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="jumbotron py-2">
                    <div class="row py-2">
                        <div class="mx-auto"><img src="{{'storage/'.$patient->image}}" alt="Patient Photo"
                                                  class="rounded profile"></div>
                    </div>
                    <hr>
                    <div class="row no-gutters">
                        <div class="col-4">Full Name:</div>
                        <div class="col-8">
                            <span class="mx-2">{{$patient->lname}}</span> <span class="mx-2">{{$patient->fname}}</span> <span class="mx-2">{{$patient->mname}}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row no-gutters">
                        <div class="col-4">Email:</div>
                        <div class="col-8">
                            <a href="mailto: {{$patient->email}}">{{$patient->email}}</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row no-gutters">
                        <div class="col-4">Phone:</div>
                        <div class="col-8">
                            <a href="tel: {{$patient->cellphone}}">{{$patient->cellphone}}</a>
                        </div>
                    </div>
                    <hr>

                </div>
            </div>

        </div>
    </div>
</div>

