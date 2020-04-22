

<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-light btn-sm w-100" data-toggle="modal" data-target="#exampleModalLonge">
    My Lab results
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLonge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitlee" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitlee"></h5>
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
                <table  id="table_id111">
                    <thead>
                    <tr>
                        <th>date</th>
                        <th>Reason</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($labResults == null)
                    @else


                    @foreach($labResults as $list)
                        <tr>


                            <td>
                                {{$list->created_at}}
                            </td>
                            <td>
                                {{$list->result}}
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
