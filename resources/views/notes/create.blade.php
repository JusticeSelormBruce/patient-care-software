<div class="container">
    <div class="card mx-auto">
        <div class="card-body ">
            <form action="/my-notes-store" method="POST">

                <div class="">
                    @include('notes.form')
                </div>
                <div class=" row container ml-auto">
                    <button type="submit" class=" row btn btn-dark ">Add Personal Notes</button>
                </div>
                @csrf
            </form>
        </div>

    </div>
</div>




