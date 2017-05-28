@extends('layouts.app')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="panel panel-default">
    
        @if ($pageTitle)
            <div class="panel-heading">
                <h3 class="panel-title">
                    {{ $pageTitle }}
                    
                    <a class="btn btn-sm btn-success" href="{{ $routePath . 'create' }}">+</a>
                </h3>
            </div>
        @endif
        
        <div class="panel-body">
            <table class="table table-hover table-condensed table-stripped">
    
                    <thead>
                        <tr>
                            <th width="10%">Id</th>
                            <th width="60%">Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
     
                @if (!$posts->count())
                    <p>There are no no any posts.</p>
                @else
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <a href="{{ $routePath . $post->id }}">
                                    {{ $post->id }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ $routePath . $post->id }}">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td>
                                <div class="col-md-6">
                                    <a class="btn btn-block btn-sm btn-info" href="{{ $routePath . $post->id }}/edit">
                                    Modify
                                </a>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{ $routePath . $post->id }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-block btn-sm btn-danger" value="Delete"/>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                
            </table>
            
            @if ($posts->count())
                <div class="text-right">
                    {{ $posts->links() }}
                </div>
            @endif
            
        </div>
    </div>

@endsection