<div class="form-group">
    <div class="row">

        <select name="patient_id" id="" class="form-control" required>
            <option value="">Select Patient</option>
            @foreach( $patients as $list)
                <option value="{{$list->id}}">{{$list->fname}} <span class="mx-2"></span>{{$list->mname}} <span
                            class="mx-2"></span>{{$list->lname}}</option>
            @endforeach
        </select>
    </div>
    <div class="row pt-2">
        <select name="department_id" id="" class="form-control" required>
            <option value="">Select Department</option>
            @foreach($departments as $list)
                <option value="{{$list->id}}">{{$list->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="row pt-4">
        <textarea name="description" id="" cols="30" rows="10" class="form-control" required
                  placeholder="Request Description"></textarea>
    </div>
</div>
