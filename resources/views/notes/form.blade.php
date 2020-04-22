
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<div class="form-group">
    <div>
        <input name="title" class="form-control" placeholder="Note Title" required>
        <div>{{$errors->first('title')}}</div>
    </div>
    <div>
        <textarea name="description" id="description"  class="form-control" required ></textarea>
        <div>{{$errors->first('description')}}</div>
    </div>

    <script>
        CKEDITOR.replace( 'description' ,{
            removePlugins:'image'
        });

    </script>
</div>
