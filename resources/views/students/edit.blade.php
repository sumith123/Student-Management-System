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
    Edit Student <a href="{{route('students.index')}}" class="btn btn-sm btn-info float-right mb-4">View Students</a>
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
      <form method="post" action="{{ route('students.update', $student->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="student_name">Name</label>
              <input type="text" class="form-control" name="student_name" value="{{ $student->student_name }}"/>
          </div>
          <div class="form-group">
            <label for="student_age">Age</label>
            <input type="text" class="form-control" name="student_age" value="{{ $student->student_age }}"/>
        </div>
        <div class="form-group">
            <label for="student_gender">Gender</label>
            <select class="form-control" name="student_gender">
                <option value="">Select Gender</option>
                <option value="M" @if($student->student_gender=="M") {{'selected'}} @endif>Male</option>
                <option value="F" @if($student->student_gender=="F") {{'selected'}} @endif>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="reporting_teacher">Reporting Teacher</label>
            <select class="form-control" name="reporting_teacher">
              <option value="">Select Teacher</option>
              @foreach($teacher as $teachers)
              <option value={{$teachers->id}} @if($teachers->id==$student->reporting_teacher) {{'selected'}} @endif>{{$teachers->teacher_name}}</option>
              @endforeach
          </select>
        </div>
          <button type="submit" class="btn btn-block btn-danger">Update Student</button>
      </form>
  </div>
</div>
@endsection