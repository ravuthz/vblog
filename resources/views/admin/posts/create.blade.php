<form action="/post" method="POST">
    
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
    
    <input type="submit" value="Create"/>
    
</form>