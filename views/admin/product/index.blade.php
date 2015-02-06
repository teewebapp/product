@extends('admin::layouts.main')

@section('content')
    <table class="table table-hover table-banner-list">
        <tbody>
            <tr>
                <th>REF</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Valor</th>
                <th>Opções</th>
            </tr>
        
            @if($models->count() > 0)
                @foreach($models as $model)
                    <tr data-id="{{{ $model->id }}}">
                        <td>{{{ $model->reference }}}</td>
                        <td>{{{ $model->name }}}</td>
                        <td>{{{ $model->category->fullName }}}</td>
                        <td>{{{ $model->price }}}</td>
                        <td>
                            {{ HTML::updateButton('Editar', route("admin.product.edit", ['id'=>$model->id, 'category'=>Input::get('category')])) }}
                            {{ HTML::deleteButton('Remover', route("admin.product.destroy", ['id'=>$model->id, 'category'=>Input::get('category')])) }}
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

    {{ $models->addQuery('category', Input::get('category'))->links() }}

    <div style="clear:both;"></div>

    <a class="btn btn-primary" href="{{ route("admin.product.create", ['category'=>Input::get('category')]) }}">
        Adicionar Produto
    </a>
@stop