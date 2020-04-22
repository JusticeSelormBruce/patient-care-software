<div class="mb-3 row">
    <label for="name" class="col-lg-3 col-form-label">Full name</label>
    <div class="col-lg-9">
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $employee->name }}">
        @if ($errors->has('name'))
            <small class="text-danger">{{ $errors->first('name') }}</small>
        @endif
    </div>
</div>


<div class="mb-3 row">
    <label for="phone" class="col-lg-3 col-form-label">Phone</label>
    <div class="col-lg-9">
        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') ?? $employee->phone }}">
        @if ($errors->has('phone'))
            <small class="text-danger">{{ $errors->first('phone') }}</small>
        @endif
    </div>
</div>


<div class="mb-3 row">
    <label for="email" class="col-lg-3 col-form-label">Email</label>
    <div class="col-lg-9">
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ?? $employee->email }}">
        @if ($errors->has('email'))
            <small class="text-danger">{{ $errors->first('email') }}</small>
        @endif
    </div>
</div>


<div class="mb-3 row">
    <label for="address" class="col-lg-3 col-form-label">Address</label>
    <div class="col-lg-9">
        <input type="text" name="address" id="address" class="form-control" value="{{ old('address') ?? $employee->address }}">
        @if ($errors->has('address'))
            <small class="text-danger">{{ $errors->first('address') }}</small>
        @endif
    </div>
</div>


<div class="mb-3 row">
    <label for="dob" class="col-lg-3 col-form-label">Date of Birth</label>
    <div class="col-lg-9">
        <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob') ?? $employee->dob->toDateString() }}">
        @if ($errors->has('dob'))
            <small class="text-danger">{{ $errors->first('dob') }}</small>
        @endif
    </div>
</div>



<div class="mb-3 row">
    <label class="col-lg-3 col-form-label">Gender</label>
    <div class="col-lg-9">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="gender-male" name="gender" value="Male" class="custom-control-input" {{ $employee->gender == "Male" ? 'checked' : '' }}>
            <label class="custom-control-label" for="gender-male">Male</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="gender-female" name="gender" value="Female" class="custom-control-input" {{ $employee->gender == "Female" ? 'checked' : '' }}>
            <label class="custom-control-label" for="gender-female">Female</label>
        </div>

        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="gender-other" name="gender" value="Other" class="custom-control-input" {{ $employee->gender == "Other" ? 'checked' : '' }}>
            <label class="custom-control-label" for="gender-other">Other</label>
        </div>
        
        @if ($errors->has('address'))
            <small class="text-danger">{{ $errors->first('address') }}</small>
        @endif
    </div>
</div>


<div class="mb-3 row">
    <label for="department_id" class="col-lg-3 col-form-label">Department</label>
    <div class="col-lg-9">
        <select class="custom-select" name="department_id">
            <option disabled>Select a department</option>
            @if ($departments->count())
                @foreach ($departments as $dept)
                    <option value="{{ $dept->id }}" {{ $employee->department_id == $dept->id ? 'selected' : '' }}>
                        {{ $dept->name }}
                    </option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('department_id'))
            <small class="text-danger">{{ $errors->first('department_id') }}</small>
        @endif
    </div>
</div>



<div class="mb-3 row">
    <label for="role_id" class="col-lg-3 col-form-label">Employee Role</label>
    <div class="col-lg-9">
        <select class="custom-select" name="role_id">
            <option selected disabled>Select a role</option>
            @if ($roles->count())
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ $employee->role_id == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('role_id'))
            <small class="text-danger">{{ $errors->first('role_id') }}</small>
        @endif
    </div>
</div>





<div class="mb-3 text-right">
    <button type="submit" class="btn btn-dark">
        <i class="fas fa-save"></i>
        Save
    </button>
</div>