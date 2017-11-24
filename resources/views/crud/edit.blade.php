@extends('layouts.app')

@section('content')
    
    @include($partial->form, ['form_title' => 'crud.sub-title.update', 'button_text' => 'crud.button.update'])
    
@endsection