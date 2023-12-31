
@extends('admin.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h2>Subjects</h2>
    </div>
    <div class="card-body">
    <a href="{{route('addsubject')}}" class="btn btn-success btn-sm" title="Add New course">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <div class="mt-5">
      
        <table class="table table-bordered">
            <thead>
              <tr>
                <th >No</th>
                <th>Subject name</th>
                <th>Edit</th>
                <th> Delete</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $item)
                    
            
              <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{$item->subject_name}}</td>
                <td>
                <a href="{{route('editsubject',$item->id)}}" title="Edit Subject"><button class="btn btn-primary btn-sm"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>

                </td>
                <td>  <a href="{{route('deletesubject',$item->id)}}" onclick="confirmation(event)" title=" Delete subject"><button class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</button></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

    </div>
</div>
    
@endsection