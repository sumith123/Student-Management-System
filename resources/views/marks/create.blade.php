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
    Add Mark
    <a href="{{route('marks.index')}}" class="btn btn-sm btn-info float-right mb-4">View Marks</a>
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
      <form method="post" action="{{ route('marks.store') }}">
          <div class="form-group">
              @csrf
              <div class="form-group">
                <label for="student">Student</label>
                <select class="form-control" name="student">
                  <option value="">Select Student</option>
                  @foreach($student as $students)
                  <option value={{$students->id}}>{{$students->student_name}}</option>
                  @endforeach
              </select>
            </div>
              <div class="form-group">
                <label for="student_term">Term</label>
                <select class="form-control" name="student_term">
                    <option value="">Select Term</option>
                    <option value="One">One</option>
                    <option value="Two">Two</option>
                    <option value="Three">Three</option>
                    <option value="Four">Four</option>
                    <option value="Five">Five</option>
                    <option value="Six">Six</option>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label for="maths_mark">Maths Mark</label>
            <input type="text" class="form-control" name="maths_mark" value="{{ old('maths_mark') }}"/>
        </div>
          <div class="form-group">
              <label for="science_mark">Science Mark</label>
              <input type="text" class="form-control" name="science_mark" value="{{ old('science_mark') }}"/>
          </div>
          <div class="form-group">
            <label for="history_mark">History Mark</label>
            <input type="text" class="form-control" name="history_mark" value="{{ old('history_mark') }}"/>
        </div>
         <button type="submit" class="btn btn-block btn-danger">Submit</button>
      </form>
  </div>
</div>
@endsection