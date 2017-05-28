@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-default">
                
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Create Post
                    </h3>
                </div>
                
                <div class="panel-body">
                    
                    <form class="form form-horizontal" action="{{ $routePath }}" method="POST">
        
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
                                <input type="text" class="form-control" name="title"/>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content">Content: </label>
                                <textarea class="form-control" name="content"></textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-block btn-success" value="Create"/>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-block btn-default" href="{{ $routePath }}">Go to list</a>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
            
        </div>
    </div>

@endsection