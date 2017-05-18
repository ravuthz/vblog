<form action="/post/{{ $post->id }}" method="POST">
    
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
    
    <input type="submit" value="Update"/>
    
</form>