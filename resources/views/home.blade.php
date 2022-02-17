@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <a href="/home/tambah" type="button" class="btn btn-primary btn-sm float-right">add todo</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @include('flash')
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todo as $t)

                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            @if($t->status == 1)

                            <td><del>{{ $t->title }}</del></td>
                            <td><del>{{ $t->description }}</del></td>

                            @else
                            <td>{{ $t->title }}</td>
                            <td>{{ $t->description }}</td>
                            @endif
                            <td>
                                @if ($t->status)
                                <a type="button" class="btn btn-danger" onclick="event.preventDefault();
                                    document.getElementById('form-incomplete-{{$t->id}}').submit()">Completed</a>

                                <form method="post" id="{{'form-incomplete-'.$t->id}}"
                                    action="{{route('todo.incomplete',$t->id)}}" style="display: none">
                                    @csrf
                                    @method('delete')
                                </form>

                                @else
                                <a type="button" class="btn btn-success" onclick="event.preventDefault();
                                    document.getElementById('form-complete-{{$t->id}}').submit()">Check</a>

                                <form method="post" id="{{'form-complete-'.$t->id}}"
                                    action="{{route('todo.complete',$t->id)}}" style="display: none">
                                    @csrf
                                    @method('put')
                                </form>
                                @endif


                                <a href="/home/edit/{{ $t->id }}" class="btn btn-warning"> Edit </a>
                                <a href="/home/hapus/{{ $t->id }}" class="btn btn-danger"> Hapus </a>

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
