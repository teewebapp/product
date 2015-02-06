@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('product::partials.categories')
        </div>
        <div class="col-md-9">
            <h1 style="margin-top:0;">{{ $pageTitle }}</h1>
            <div class="row">
                @foreach($products as $product)
                    {{ Widget::productBox([
                        'product' => $product,
                        'cssClass' => 'col-md-4 margin-bottom-1'
                    ]) }}
                @endforeach
            </div>
            {{ $products->addQuery('category', Input::get('category'))->links() }}
        </div>
    </div>
@stop