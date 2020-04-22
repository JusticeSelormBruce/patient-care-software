<div class="container">
    <div class="">
        <form action="/my-notes/edit" method="POST">
            @method('PATCH')
            <div class="">


                <div class="form-group ">
                    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
                    <div>
                        <input name="title" class="form-control" placeholder="Note Title" required value="{{$notes->title}}">
                        <div>{{$errors->first('title')}}</div>
                    </div>
                    <div>
                        <label for="description">Notes Description</label>
                        <textarea name="description" id="description"
                                  class="form-control">{!!$notes->description!!}</textarea>
                        <div>{{$errors->first('description')}}</div>
                    </div>
                    <script>
                        CKEDITOR.replace('description', {
                            removePlugins: 'image'
                        });
                    </script>


                </div>


            </div>
            <div class=" row container ml-auto">
                <button type="submit" class=" row btn btn-dark ">Update Note</button>
            </div>
            @csrf
        </form>
    </div>
</div>


