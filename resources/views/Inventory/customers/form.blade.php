<style>
    .avatar {
        width: 150px !important;
        height: 150px !important;
    }
</style>
<div class="container  input-group-sm">
    <div class="row ">
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="mx-auto w-100">
                <div>
                    <div class="pb-1">
                        <span for="">Vendor Type:</span>
                    </div>
                    <div class="form-group  input-group-sm">
                        <select name="customer_type" id="" class="form-control input-group-sm" required>
                            <option value=""> Select Vendor Type</option>
                            <option value="Business">Business</option>
                            <option value="Individual">Individual</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="pb-1">
                        <span for="">Vendor Primary Contact:</span>
                    </div>
                    <div class="form-group  input-group-sm">
                        <input type="text" name="primary_contact"  required class="form-control" placeholder="full Name">
                    </div>
                </div>
                <div>
                    <div class="pb-1">
                        <span for="">Company Name:</span>
                    </div>
                    <div class="form-group  input-group-sm">
                        <input type="text" name="company_name"   class="form-control" placeholder="Company Name if Any">
                    </div>
                </div>
                <div>
                    <div class="pb-1">
                        <span for="">Vendor Display  Name:</span>
                    </div>
                    <div class="form-group  input-group-sm">
                        <input type="text" name="display_name"   class="form-control" placeholder="Vendor Display Name if Any">
                    </div>
                </div>
                <div>
                    <div class="pb-1">
                        <span for="">Vendor   Email:</span>
                    </div>
                    <div class="form-group  input-group-sm">
                        <input type="email" name="customer_email"   class="form-control" >
                    </div>
                </div>
                <div>
                    <div class="pb-1">
                        <span for="">Vendor   Phone:</span>
                    </div>
                    <div class="form-group  input-group-sm">
                        <input type="text" name="customer_phone"   class="form-control">
                    </div>
                </div>
                <div>
                    <div class="pb-1">
                        <span for="">Website</span>
                    </div>
                    <div class="form-group  input-group-sm">
                        <input type="text" name="website"   class="form-control">
                    </div>
                </div>


            </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12">
            <div>
                <div class="py-3">

                        <input type="file" name="avatar"
                               required
                               onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
                        >
                    {{$errors->first('image')}}
                </div>
                <div class="form-group  input-group-sm">
                    <img class="avatar rounded" id="blah"/>
                </div>
            </div>
        </div>
    </div>

</div>