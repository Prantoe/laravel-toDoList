@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>Add your todo list</strong>
        </div>

        <div class="card-body">


            <form method="post" action="/home/simpan">
                {{ csrf_field() }}



                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="title ...">
                    @if($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title')}}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>description</label>
                    <textarea name="description" class="form-control" placeholder="description ..."></textarea>
                    @if($errors->has('description'))
                    <div class="text-danger">
                        {{ $errors->first('description')}}
                    </div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
