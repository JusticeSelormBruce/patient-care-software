<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong{{$category->id}}">
    Edit
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$category->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle{{$category->id}}">Edit details for {{$category->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/update-category-details" method="post">
                    @method('PATCH')
                    <input type="hidden" value="{{$category->id}}" name="id">
                    <div class="row input-group-sm mx-auto w-50 py-2">
                        <div class="label">Category Name</div>
                        <input type="text" name="category_name" class="form-control" required value="{{$category->category_name}}">
                    </div>
                    <div class="row input-group-sm mx-auto w-50">
                        <div class="label">Category Description</div>
                        <textarea name="category_description" cols="30" rows="10"  class="form-control">
                            {{$category->category_description}}
                        </textarea>
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
