<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-light btn-sm w-100" data-toggle="modal" data-target="#exampleModalLong22">
    make New Appointment
</button>

<!-- Modal -->
<div class="modal fade text-dark" id="exampleModalLong22" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLongTitle22"
     aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" id="exampleModalLongTitle22">  Make Appointment</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <div class="jumbotron py-2">
                    <form action="/make-appointment" method="post">
                        @csrf
                        <span class="pt-1">Choose Appointment Date</span>
                        <div class="input-group-sm">
                            <input type="date" class="form-control" required name="date">
                        </div>
                        <span class="pt-1">Choose Appointment Time</span>
                        <div class="input-group-sm">
                            <input type="text" class="form-control" required value="{{$time}}" name="time">
                        </div>

                        <div class="input-group-sm py-2">
                            <select name="user_id" id="" required class="form-control">
                                <option value="">Select Doctor To Visit</option>
                                @foreach($users  as $user)
                                    <option value="{{$user->id}}">{{$user->name}} <span
                                                class="mx-2">({{$user->email}})</span></option>
                                @endforeach
                            </select>
                        </div>
                        <span class="pt-1">Reason</span>
                        <div class="input-group-sm">
                            <textarea name="reason" id="" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        <div class="row">
                            <div class="mx-auto">
                                <button class="btn btn-outline-dark btn-sm" type="submit"><span class="mx-5">Make Appointment</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<hr>
