@extends('admin::layouts.main')

@section('content')
    <table class="table table-hover table-banner-list">
        <tbody>
            <tr>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Valor</th>
                <th>Opções</th>
            </tr>
        
            @if($models->count() > 0)
                @foreach($models as $model)
                    <tr data-id="{{{ $model->id }}}">
                        <td>{{{ $model->name }}}</td>
                        <td>{{{ $model->category->fullName }}}</td>
                        <td>{{{ $model->price }}}</td>
                        <td>
                            {{ HTML::updateButton('Editar', route("admin.product.edit", $model->id)) }}
                            {{ HTML::deleteButton('Remover', route("admin.product.destroy", $model->id)) }}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">
                        Nenhum resultado encontrado
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    <a class="btn btn-primary" href="{{ route("admin.product.create") }}">
        Adicionar Produto
    </a>
@stop