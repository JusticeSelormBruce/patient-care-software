

<div class="jumbotron">
    <section>
        <form action="/credit-overtime-user" method="post">

            <div class="row no-gutters py-2">
                <div class="col-3"><label for="">select User</label></div>
                <div class="col-9">
                    <div class="input-group-sm">
                        <select name="user_id"  required class="form-control">
                            @foreach($AllUsers as $users)
                                <option value="{{$users->id}}">{{$users->name}} <span class="mx-2">({{$users->email}})</span></option>
                                 @endforeach
                        </select>
                    </div>
                    <div>{{
                    $errors->first('hours')
                    }}</div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-3"><label for="">working Hours:</label></div>
                <div class="col-9">
                    <div class="input-group-sm">
                        <input type="number" name="hours" class="form-control">
                    </div>
                    <div>
                        {{ $errors->first('hours')}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mx-auto w-50">
                    <button  type="submit" class="btn btn-outline-dark btn-sm w-50 mx-5">Save</button>
                </div>
            </div>
            @csrf
        </form>
    </section>
</div>
