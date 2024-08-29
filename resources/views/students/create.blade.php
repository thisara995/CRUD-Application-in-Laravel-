@extends('students.layout')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Add Student</h3>    
                </div>
                <div class="col-md-6">
                    <a href="{{ route('student.index') }}" class="btn btn-primary float-end">All Students</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('student.store') }}" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <strong>Full Name</strong>
                <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name" autofocus>
            </div>
            <div class="form-group">
                <strong>Age</strong>
                <input type="number" class="form-control" name="age"  placeholder="Enter Age">
            </div>
            <div class="form-group">
                <strong>Address</strong>
                <textarea name="address" rows="3" class="form-control" placeholder="Enter Address"></textarea>
            </div>
            <div class="form-group">
                <strong>Contact</strong>
                <input type="tel" class="form-control" name="contact"  placeholder="Enter Contact Number">
            </div>
            <button type="submit" class="btn btn-success mt-2">Save</button>
            <button type="reset" class="btn btn-danger mt-2">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection