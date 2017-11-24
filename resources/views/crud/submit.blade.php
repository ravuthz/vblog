<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <a class="btn btn-sm btn-block btn-default" href="{{ route($route->index) }}">
                {!! trans('crud.back_to_list') !!}
            </a>
        </div>
    </div>
    
    <div class="col-md-offset-6 col-md-3">
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-block btn-success" value="{!! $submit !!}"/>
        </div>
    </div>
</div>