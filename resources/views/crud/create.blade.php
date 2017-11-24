@extends('layouts.app')

@section('content')

    @include($partial->form, ['form_title' => 'crud.sub-title.create', 'button_text' => 'crud.button.create'])

@endsection