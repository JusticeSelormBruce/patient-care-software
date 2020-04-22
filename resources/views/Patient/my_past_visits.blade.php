<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-light btn-sm w-100" data-toggle="modal" data-target="#exampleModalLong1">
    My Previous Visits
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
     aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle1"></h5>
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
                <table  id="table_id1">
                    <thead>
                    <tr>

                        <th>Department</th>
                        <th>Reason</th>
                        <th>date</th>

                    </tr>
                    </thead>
                    <tbody>
                    @if($visits == null)
                    @else


                    @foreach($visits as $list)
                        <tr>


                            <td>
                                @foreach($departments as $dpt)
                                    @if($dpt->id ==$list->department_id)
                                        {{$dpt->name}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                {{$list->reason}}
                            </td>
                            <td>
                                {{$list->created_at}}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                @endif
            </div>

        </div>
    </div>
</div>
<hr>
