@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-default">
                
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{ $post->title }}
                    </h3>
                </div>
                
                <div class="panel-body">
                    
                    <p>
                        {{ $post->content }}
                    </p>
                    
                    <hr/>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-sm btn-block btn-info" href="{{ $routePath . $post->id . '/edit' }}">Modify</a>
                        </div>
                    
                    
                    <div class="col-md-3">
                        <a class="btn btn-sm btn-block btn-default" href="{{ $routePath }}">Go to list</a>
                    </div>
                    </div>
                    

                </div>
                
            </div>
            
        </div>
        
    </div>

@endsection