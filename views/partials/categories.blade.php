@if(!$parent)
    <nav class="nav-sidebar">
@endif

    <ul class="nav" style="{{ $parent ? 'padding-left:1em' : '' }}">
        @if(!$parent)
            <li>
                <a href="{{ route('product.index') }}">Todos produtos</a>
            </li>
        @endif

        @foreach($categories as $category)
            <li>
                <a href="{{ $category->url }}">{{ $category->name }}</a>
                @if($category->subitems->count() > 0)
                    @include('product::partials.categories', ['categories' => $category->subitems->load('subitems'), 'parent' => $category])
                @endif
            </li>
        @endforeach
    </ul>

@if(!$parent)
    </nav>
@endif