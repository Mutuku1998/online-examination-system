@extends('student.layout')

@section('content')
<div class="card">

<div class="card-body">
    <h3 class="card-title">Free Exams</h3>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>SN</th>
                <th>Exam Name</th>
                <th>Subject Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Maximum Attempts</th>
                <th>Completed Attempts</th>
                <th>Remaining  Attempts</th>
                <th>Copy Exam link</th>
            </tr>
        </thead>
        <tbody>
            @if(count($exams) > 0)
                @php
                    $count = 1;
                @endphp
                @foreach ($exams as $exam)
                    <tr>
                        <td style="display: none;"> {{$exam->id}} </td>
                        <td>{{$count++}}</td>
                        <td>{{$exam->exam_name}}</td>
                        <td>{{$exam->subject_name}}</td>
                        <td>{{$exam->date}}</td>
                        <td>{{$exam->time}} Hrs</td>
                        <td>{{$exam->attempt}}</td>
                        <td> {{$exam->attempt_counter}}</td>
                        <td> {{$exam->attempt - $exam->attempt_counter }}</td>
                        <td><a href="#" data-code="{{$exam->id}}" class="copy"><i class="fa fa-copy"></i></a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">No available Exams </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
