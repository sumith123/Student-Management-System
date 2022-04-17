@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div><br />
  @endif
  <h4 class="mb-4">Students
  <a href="{{route('students.create')}}" class="btn btn-primary float-right mb-4">+ Add New</a>
</h4>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Age</td>
          <td>Gender</td>
          <td>Reporting Teacher</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($student as $students)
        <tr>
            <td>{{$students->student_id}}</td>
            <td>{{$students->student_name}}</td>
            <td>{{$students->student_age}}</td>
            <td>{{$students->student_gender}}</td>
            <td>{{$students->teacher_name}}</td>
            <td class="text-center">
                <a href="{{ route('students.edit', $students->student_id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('students.destroy', $students->student_id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection