<div class="row">
    <div class="col-md-12">
    
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">
                    {!! trans($form_title, ['item' => ucfirst($itemName)]) !!}
                </h3>
            </div>
            
            <div class="panel-body">
                {!! BootForm::vertical(['model' => $__data[$itemName], 'store' => $route->store, 'update' => $route->update]) !!}
    
                    @include($partial->fields)
                    
                    @include('crud.submit', ['submit' => trans($button_text)])

                {!! BootForm::close() !!}
            </div>
        </div>
        
    </div>
</div>