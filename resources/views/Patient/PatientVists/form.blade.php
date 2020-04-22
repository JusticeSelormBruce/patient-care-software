<div class="container py-3 w-50">
    <div class="row py-3">
        <label for=""> Patient Name</label>
        <select name="patientid" id="" class="form-control" required readonly>
            <option value="{{$patient->patientid}}">
                {{$patient->fname}}
                <span class="mx-2">{{$patient->mname}}</span>
                <span class="mx-2">{{$patient->lname}}</span>
            </option>
        </select>
    </div>
    <div class="row py-3">
        <label for=""> Visiting Department Name</label>
        <select name="department_id" id="" class="form-control" required>
            <option value="">Select Visiting Department</option>
            @foreach($departments as $list)
                <option value="{{$list->id}}">{{$list->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="row py-3">
        <label for=""> Visiting Department Name</label>
        <textarea name="reason" id="" cols="30" rows="10" class="form-control" required>

        </textarea>
    </div>
</div>

