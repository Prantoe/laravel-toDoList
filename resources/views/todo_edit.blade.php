@extends('layouts.app')

@section('content')

<div class="container">
      <div class="card mt-5">
            <div class="card-header text-center">
                   <strong>EDIT DATA</strong>
            </div>

            <div class="card-body">
                  <a href="/home" class="btn btn-primary">Kembali</a>
                  <br />
                  <br />
                  <form method="post" action="/home/update/{{ $todo->id }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                              <label>title</label>
                              <input type="text" name="title" class="form-control" placeholder="title todo ..." value=" {{ $todo->title }}">
                              @if($errors->has('title'))
                              <div class="text-danger">
                                    {{ $errors->first('title')}}
                              </div>
                              @endif
                        </div>

                        <div class="form-group">
                              <label>description</label>
                              <input type="text" name="description" class="form-control" placeholder="description todo ..." value=" {{ $todo->description }}">
                              @if($errors->has('description'))
                              <div class="text-danger">
                                    {{ $errors->first('description')}}
                              </div>
                              @endif
                        </div>

                        {{-- <div class="form-group">
                              <label>status</label>
                              <textarea name="status" class="form-control" placeholder="status todo ..."> {{ $todo->status }} </textarea>
                              @if($errors->has('status'))
                              <div class="text-danger">
                                    {{ $errors->first('status')}}
                              </div>
                              @endif
                        </div> --}}

                        <div class="form-group">
                              <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
                  </form>
            </div>
      </div>
</div>
@endsection

