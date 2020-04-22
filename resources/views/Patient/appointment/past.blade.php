<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-light btn-sm w-100" data-toggle="modal" data-target="#exampleModalLong">
    My Past Appointments
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title" id="exampleModalLongTitle">My Appointments</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-dark">
                <div class="row">
                    <div class="ml-auto mx-5">
                        @if($info == null)
                        @else
                            {{$info->name}} <span class="mx-2"></span>     <img
                                    src="{{asset('storage/'.$info->logo) ?? 'logo'}}" alt="Profile" class=" rounded"
                                    width="50">
                        @endif
                    </div>
                </div>
                <hr>
                <table id="table_id11">
                    <thead>
                    <tr>
                        <th>Doctor</th>
                        <th>Reason</th>
                        <th>Date</th>
                        <th>Status</th>

                    </tr>
                    </thead>
                    <tbody>
                    @if($myAppointments == null)
                    @else


                        @foreach($myAppointments as $list)
                            <tr>
                                <td>
                                    @foreach($AllUsers as $user)
                                        @if($user->id == $list->user_id)
                                            {{$user->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$list->reason}}</td>
                                <td>
                                    {{$list->created_at}}
                                </td>
                                <td>
                                    @if( $list->attended_to == 0)
                                        <span class="text-danger">Pending</span>
                                    @else
                                        <span class="text-success"> Completed</span>
                                    @endif
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                    @endif

                </table>
            </div>

        </div>
    </div>
</div>
<hr>
