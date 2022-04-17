@extends('layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Add Student
    <a href="{{route('students.index')}}" class="btn btn-sm btn-info float-right mb-4">View Students</a>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('students.store') }}">
          <div class="form-group">
              @csrf
              <label for="student_name">Name</label>
              <input type="text" class="form-control" name="student_name" value="{{ old('student_name') }}"/>
          </div>
          <div class="form-group">
              <label for="student_age">Age</label>
              <input type="text" class="form-control" name="student_age" value="{{ old('student_age') }}"/>
          </div>
          <div class="form-group">
              <label for="student_gender">Gender</label>
              <select class="form-control" name="student_gender">
                  <option value="">Select Gender</option>
                  <option value="M">Male</option>
                  <option value="F">Female</option>
              </select>
          </div>
          <div class="form-group">
              <label for="reporting_teacher">Reporting Teacher</label>
              <select class="form-control" name="reporting_teacher">
                <option value="">Select Teacher</option>
                @foreach($teacher as $teachers)
                <option value={{$teachers->id}}>{{$teachers->teacher_name}}</option>
                @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Create Student</button>
      </form>
  </div>
</div>
@endsection