@if ($errors->count())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>        
        @endforeach
    </div>
@endif

@if (count($fields) > 0)

    @foreach($fields as $field)

        @if (!empty($field['type']))
            @php
                $value = isset($field['value']) ? $field['value'] : null;
                $attributes = isset($field['attributes']) ? $field['attributes'] : [];            
            @endphp
    
            {!! BootForm::input($field['type'], $field['name'], $field['label'], $value, $attributes) !!}
        @endif
    @endforeach

@endif
