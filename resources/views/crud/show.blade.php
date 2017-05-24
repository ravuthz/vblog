@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-7">
            
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <div class="form form-horizontal">
        
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        
                        @if ($errors->count())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>        
                                @endforeach
                            </div>
                        @endif
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title: </label>
                                <input type="text" class="form-control" name="title" value="{{ $post->title }}"/>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content">Content: </label>
                                <textarea class="form-control" name="content">{{ $post->content }}</textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <a class="btn btn-sm btn-block btn-info" href="{{ $routePath . '/' . $post->id . '/edit' }}">Modify</a>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
        
        <div class="col-md-5">
            @include('crud.table')
        </div>
        
    </div>

@endsection