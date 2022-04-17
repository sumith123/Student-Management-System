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
    Edit Mark <a href="{{route('marks.index')}}" class="btn btn-sm btn-info float-right mb-4">View Marks</a>
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
      <form method="post" action="{{ route('marks.update', $student_mark->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
                <label for="student">Student</label>
                <select class="form-control" name="student">
                  <option value="">Select Student</option>
                  @foreach($student as $students)
                  <option value={{$students->id}} @if($students->id==$student_mark->student_id) {{'selected'}} @endif>{{$students->student_name}}</option>
                  @endforeach
              </select>
          
          </div>
          <div class="form-group">
            <label for="student_term">Term</label>
            <select class="form-control" name="student_term">
                <option value="">Select Term</option>
                <option value="One" @if($student_mark->student_term=="One") {{'selected'}} @endif>One</option>
                <option value="Two" @if($student_mark->student_term=="Two") {{'selected'}} @endif>Two</option>
                <option value="Three" @if($student_mark->student_term=="Three") {{'selected'}} @endif>Three</option>
                <option value="Four" @if($student_mark->student_term=="Four") {{'selected'}} @endif>Four</option>
                <option value="Five" @if($student_mark->student_term=="Five") {{'selected'}} @endif>Five</option>
                <option value="Six" @if($student_mark->student_term=="Six") {{'selected'}} @endif>Six</option>
              </select>
        </div>
        <div class="form-group">
          <label for="maths_mark">Maths Mark</label>
          <input type="text" class="form-control" name="maths_mark" value="{{ $student_mark->maths_mark }}"/>
      </div>
        <div class="form-group">
            <label for="science_mark">Science Mark</label>
            <input type="text" class="form-control" name="science_mark" value="{{ $student_mark->science_mark }}"/>
        </div>
        <div class="form-group">
          <label for="history_mark">History Mark</label>
          <input type="text" class="form-control" name="history_mark" value="{{ $student_mark->history_mark }}"/>
      </div>
        
       
          <button type="submit" class="btn btn-block btn-danger">Update Mark</button>
      </form>
  </div>
</div>
@endsection