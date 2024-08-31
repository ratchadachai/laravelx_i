<x-bootstrap title="Edit Staff Id:{{ $staff->id }}">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="py-4">
                <a class="btn btn-primary" href="{{ route('staff.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row g-4">
            <div class="col-md-6">
                <strong>Title: <span class="text-danger">*</span> </strong>
                <input type="text" name="title" class="form-control" value="{{ $staff->title }}" required>
            </div>
            <div class="col-md-6">
                <strong>Birthdate: <span class="text-danger">*</span> </strong>
                <input type="date" name="birthdate" class="form-control" value="{{ $staff->birthdate }}" required>
            </div>
            <div class="col-md-6">
                <strong>Salary:</strong>
                <input class="form-control" type="number" name="salary" value="{{ $staff->salary }}">
            </div>
            <div class="col-md-6">
                <strong>Phone: </strong>
                <input type="text" name="phone" class="form-control" value="{{ $staff->phone }}">
            </div>
            <div class="col-md-6">
                <strong>Photo: </strong>
                <input type="file" name="photo" class="form-control " value="{{ $staff->photo }}">
                <br>
                <img src="{{ $staff->photo }}" height="150" class="rounded" />
            </div>

        </div>
        <br>
        <hr>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>


    </form>
</x-bootstrap>
