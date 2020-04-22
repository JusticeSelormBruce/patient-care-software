<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong{{$customer->id}}">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$customer->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle{{$customer->id}}">Edit details for {{$customer->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/update-customers-details" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    <input type="hidden" value="{{$customer->id}}" name="id">
                    <div class="row ">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="mx-auto w-100">
                                <div>
                                    <div class="pb-1">
                                        <span for="">Customer Type:</span>
                                    </div>
                                    <div class="form-group  input-group-sm">
                                        <select name="customer_type" id="" class="form-control input-group-sm" required>
                                          @if($customer->customer_type == "Business")
                                                <option value="Business">Business</option>
                                            @else
                                                <option value="Individual">Individual</option>
                                              @endif

                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <div class="pb-1">
                                        <span for="">Customer Primary Contact:</span>
                                    </div>
                                    <div class="form-group  input-group-sm">
                                        <input type="text" name="primary_contact"  required class="form-control" value="{{$customer->primary_contact}}">
                                    </div>
                                </div>
                                <div>
                                    <div class="pb-1">
                                        <span for="">Company Name:</span>
                                    </div>
                                    <div class="form-group  input-group-sm">
                                        <input type="text" name="company_name"   class="form-control" value="{{$customer->company_name}}">
                                    </div>
                                </div>
                                <div>
                                    <div class="pb-1">
                                        <span for="">Customer Display  Name:</span>
                                    </div>
                                    <div class="form-group  input-group-sm">
                                        <input type="text" name="display_name"   class="form-control" value="{{$customer->display_name}}">
                                    </div>
                                </div>
                                <div>
                                    <div class="pb-1">
                                        <span for="">Customer   Email:</span>
                                    </div>
                                    <div class="form-group  input-group-sm">
                                        <input type="email" name="customer_email"   class="form-control" value="{{$customer->customer_email}}" >
                                    </div>
                                </div>
                                <div>
                                    <div class="pb-1">
                                        <span for="">Customer   Phone:</span>
                                    </div>
                                    <div class="form-group  input-group-sm">
                                        <input type="text" name="customer_phone"   class="form-control" value="{{$customer->customer_phone}}">
                                    </div>
                                </div>
                                <div>
                                    <div class="pb-1">
                                        <span for="">Website</span>
                                    </div>
                                    <div class="form-group  input-group-sm">
                                        <input type="text" name="website"   class="form-control" value="{{$customer->website}}">
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div>
                                <div class="py-3">

                                    <input type="file" name="avatar" value="{{asset('storage/'.$customer->avatar)}}"

                                           onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                                    >
                                    {{$errors->first('image')}}
                                </div>
                                <div class="form-group  input-group-sm">
                                    <img src="{{asset('storage/'.$customer->avatar)}}" class="avatar rounded" id="blah"/ >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    </div>
                    @csrf
                </form>


            </div>

        </div>
    </div>
</div>
