@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="page-title">My Todo List</h1>
        </div>
        <div class="col-lg-12 mt-5">
            <form action="{{ route('todo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <input class="form-control" name="title" placeholder="Enter task" >
                    </div>
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>

            </div>
        </form>

        </div>
        <div class="col-lg-12 mt-5">
            <div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $tasks as $key => $task )
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $task->title }}</td>
                            <td>
                                @if ( $task->done ==0)
                                <span class="badge bg-warning"> Not completed </span>
                                @else
                                <span class="badge bg success"> Completed </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger"><i class="far fa-trash-alt">delete</i></a>
                                <a href="{{ route('todo.done', $task->id) }}" class="btn btn-success"><i class="fas fa-check-circle">done</i></a> 
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>


    </div>
</div>
@endsection
@push('css')
 <style>
    .page-title{
        padding-top: 5vh;
        font-size: 5rem;
        color: dimgrey
    }
 </style>



@endpush
