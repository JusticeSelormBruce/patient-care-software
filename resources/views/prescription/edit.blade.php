<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal{{$list->id}}edit">
    <h6 class="text-success">Edit</h6>
</button>

<div class="modal fade" id="exampleModal{{$list->id}}edit" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel{{$list->id}}edit" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{$list->id}}edit"> Prescription Details for <span
                            class="mx-2">{{$list->name}}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-secondary text-dark">
                <form action="/preview-prescription" method="post" py-5>

                    <div>
                        <section style="background-color: #f0efeb">
                            <div class="row py-2">
                                <div class="col-6 input-group-sm">
                                    <label for="" class="mx-5">Name of Medicine</label>
                                    <div class="mx-2">
                                        <input type="text" class="form-control" name="name" required>
                                    </div>

                                </div>
                                <div class="col-6 input-group-sm">
                                    <label for="" class="mx-5">Strength of Medicine</label>
                                    <div class="mx-2">
                                        <input type="text" class="form-control" name="strength">
                                    </div>

                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-6 input-group-sm">
                                    <label for="" class="mx-5">Medicine Dosage</label>
                                    <div class="mx-2">
                                    <textarea name="dosage" id="" cols="30" rows="10" class="form-control" required>

                                    </textarea>
                                    </div>

                                </div>
                                <div class="col-6 input-group-sm">
                                    <label for="" class="mx-5">Note/description</label>
                                    <div class="mx-2">
                            <textarea name="note" id="" cols="30" rows="10" class="form-control">

                            </textarea>
                                    </div>

                                </div>
                            </div>

                        </section>
                    </div>
                    <div >
                        <section style="background-color: #f0efeb">
                            <div class="row py-2">
                                <div class="col-12 input-group-sm">
                                    <label for="" class="mx-5">Select Patient</label>
                                    <div class="mx-2">
                                        <select name="patient_id" id="" class="form-control" required>
                                            @foreach($patients as $list)
                                                <option value="{{$list->id}}">
                                                    <span class="mx-2">{{$list->fname}}</span>
                                                    <span class="mx-2">{{$list->mname}}</span>
                                                    <span class="mx-2">{{$list->lname}}</span>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-12 input-group-sm py-2">
                                    <label for="" class="mx-5">Allergies</label>
                                    <div class="mx-2">
                                        <textarea name="allegies" id="" cols="30" rows="10"
                                                  class="form-control"></textarea>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>



                    <div class="row pt-3">
                        <div class="mx-auto ">
                            <button class="btn  btn-primary   h2" type="submit"> Submit</button>
                        </div>
                    </div>

                    @csrf
                </form>
            </div>

        </div>
    </div>
</div>
