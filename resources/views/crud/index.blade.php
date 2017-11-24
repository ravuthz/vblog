@extends('layouts.app')

@section('content')

    @php
        $items = $__data[$listName];
    @endphp
    
    <div class="row">
        <div class="col-md-12">
        
            <div class="panel panel-default">
    
                <div class="panel-heading">
                    <h3 class="panel-title">
                        List {{ ucfirst($listName) }}
                        <a class="btn btn-sm btn-success pull-right" href="{{ route($route->create) }}">+</a>
                    </h3>
                </div>

                <div class="panel-body">
                    
                    @if ($items->count())
                    
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    @foreach($fields as $field)
                                        @if (!empty($field['list']))
                                            <th class="{{ isset($field['list_class']) ? $field['list_class'] : '' }}">{!! $field['list'] !!}</th>
                                        @endif
                                    @endforeach
                                </tr>
                                @foreach($items as $row)
                                    <tr>
                                        @foreach($fields as $field)
                                            @if (!empty($field['list']) && !empty($field['name']))
                                                <td>{{ $row[$field['name']] }}</td>
                                            @endif
                                        @endforeach
                                        <td>
                                            <div class="col-md-6">
                                                <a class="btn btn-block btn-sm btn-info" href="{{ route($route->edit, $row->id) }}">
                                                    Modify
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="{{ route($route->destroy, $row->id) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <input type="submit" class="btn btn-block btn-sm btn-danger" value="Delete"/>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        
                        <div class="text-right">
                            {{ $items->links() }}
                        </div>
                    @else
                        <h3>{{ trans('crud.list-items-not-found', ['item' => $itemName]) }}</h3>
                        <a href="{{ route($route->create) }}">{{ trans('crud.go-to-create-new-item', ['item' => $itemName]) }}</a>
                    @endif
                    
                </div>
            </div>
            
        </div>
    </div>

@endsection