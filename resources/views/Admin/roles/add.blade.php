
<div class="row">
    <div class="mx-auto w-100">
        <div class="">
            <div class="card-header">
                Add new Role
            </div>
            <div class="card-body card-text">
                <form action="/add-roles" method="post">
                    @include('Admin.roles.form')
                    <div class="row">
                        <button class="btn btn-success btn-sm mx-auto">Add Role</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>

    </div>
</div>
