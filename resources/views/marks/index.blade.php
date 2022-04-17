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
  <h4 class="mb-4">Student Marks
  <a href="{{route('marks.create')}}" class="btn btn-primary float-right mb-4">+ Add New</a>
</h4>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Maths</td>
          <td>Science</td>
          <td>History</td>
          <td>Term</td>
          <td>Total Marks</td>
          <td>Created On</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($student_mark as $student_mark)
        <tr>
            <td>{{$student_mark->student_mark_id}}</td>
            <td>{{$student_mark->student_name}}</td>
            <td>{{$student_mark->maths_mark}}</td>
            <td>{{$student_mark->science_mark}}</td>
            <td>{{$student_mark->history_mark}}</td>
            <td>{{$student_mark->student_term}}</td>
            <td>{{$student_mark->maths_mark + $student_mark->science_mark + $student_mark->history_mark}}</td>
            <td>{{ date('M d,Y g:i a',strtotime($student_mark->student_mark_created_date))}}</td>
            <td class="text-center">
                <a href="{{ route('marks.edit', $student_mark->student_mark_id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('marks.destroy', $student_mark->student_mark_id)}}" method="post" style="display: inline-block">
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