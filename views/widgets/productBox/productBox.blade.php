<div class="{{$cssClass}}">
    <div class="col-item">
        <div class="photo">
            <img src="{{ $product->mainImage->imageUrl }}" class="img-responsive" alt="{{ $product->name }}" style="width:100%;height:170px;" />
        </div>
        <div class="info">
            <div class="row">
                <div class="price col-md-6">
                    <h5>{{ $product->name }}</h5>
                    <h5 class="price-text-color">{{ formatCurrency($product->price) }}</h5>
                </div>
                <div class="rating hidden-sm col-md-6">
                    <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                    </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                    </i><i class="fa fa-star"></i>
                </div>
            </div>
            <div class="separator clear-left">
                <p class="btn-add">
                    <i class="fa fa-shopping-cart"></i><a href="{{ $product->url }}" class="hidden-sm">Adicionar</a></p>
                <p class="btn-details">
                    <i class="fa fa-list"></i><a href="{{ $product->url }}" class="hidden-sm">Detalhes</a></p>
            </div>
            <div class="clearfix">
            </div>
        </div>
    </div>
</div>