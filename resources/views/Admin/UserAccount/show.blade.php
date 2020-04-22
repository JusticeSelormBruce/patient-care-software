<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$list->id}}delete">
User Details
</button>

<div class="modal fade" id="exampleModal{{$list->id}}delete" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel{{$list->id}}delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{$list->id}}">Details for {{$list->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="model-body">
             <div class="card mx-2 py-2">
                 <div class="car-body shadow-lg">
                     <div class="row">
                         <div class="mx-auto">
                             <img src="{{asset('storage/'.$list->avatar)}}" alt="{{$list->avatar}}" width="150">
                         </div>
                     </div>
                     <div class="row mx-2 py-2">
                         <div class="col-4">
                             Name
                         </div>
                         <div class="col-8">
                             <b>{{$list->name}}</b>
                         </div>
                     </div>
                     <div class="row mx-2 py-2">
                         <div class="col-4">
                           Email
                         </div>
                         <div class="col-8">
                             <b>{{$list->email}}</b>
                         </div>
                     </div>
                     <div class="row mx-2 py-2">
                         <div class="col-4">
                             Phone
                         </div>
                         <div class="col-8">
                             <b>{{$list->phone}}</b>
                         </div>
                     </div>
                     <div class="row mx-2 py-2">
                         <div class="col-4">
                             Department
                         </div>
                         <div class="col-8">
                             <b>{{$list->name}}</b>
                         </div>
                     </div>
                     <div class="row mx-2 py-2">
                         <div class="col-4">
                           Gender
                         </div>
                         <div class="col-8">
                             <b>{{$list->gender}}</b>
                         </div>
                     </div>
                     <div class="row mx-2 py-2">
                         <div class="col-4">
                             Address
                         </div>
                         <div class="col-8">
                             <b>{{$list->address}}</b>
                         </div>
                     </div>
                     <div class="row mx-2 py-2">
                         <div class="col-4">
                             Date of Birth
                         </div>
                         <div class="col-8">
                             <b>{{$list->dob}}</b>
                         </div>
                     </div>
                 </div>
             </div>
            </div>

            </div>
        </div>
    </div>
</div>
