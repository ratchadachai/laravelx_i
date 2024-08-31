<x-bootstrap title="Create a staff">
    <div class="row">
        <div class="col-lg-12">
            <div class="py-4">
                <a class="btn btn-primary" href="{{ route('staff.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>โปรดระวัง</strong> ปัญหาการกรอกข้อมูล<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('staff.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-4">
            <div class="col-md-6">
                <strong>Title: <span class="text-danger">*</span> </strong>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="col-md-6">
                <strong>Birthday:</strong>
                <input class="form-control" type="date" name="birthday" placeholder="Birthdate">
            </div>
            <div class="col-md-6">
                <strong>Salary: <span class="text-danger">*</span> </strong>
                <input type="text" name="salary" class="form-control" required value="0">
            </div>
            <div class="col-md-6">
                <strong>Photo: <span class="text-danger">*</span> </strong>
                <input type="file" name="photo" class="form-control" required>
            </div>

            <div class="col-md-6">
                <strong>Phone: </strong>
                <input type="text" name="phone" class="form-control">
            </div>

        </div>
        <br>
        <hr>
        <br>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</x-bootstrap>
