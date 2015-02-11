@extends('layouts.main')

@section('content')
    {{ Tee\System\Asset::add(moduleAsset('front', 'js/thumbelina.js')) }}
    {{ Tee\System\Asset::add(moduleAsset('front', 'js/easyzoom.js')) }}
    {{ Tee\System\Asset::add(moduleAsset('front', 'css/easyzoom.css')) }}
    {{ Tee\System\Asset::add(moduleAsset('front', 'css/thumbelina.css')) }}
    {{ Tee\System\Asset::addStyle("
        #product-image-slide {
            position:relative;
            margin-top:20px;
            width:93px;
            height:256px;
            border-left:1px solid #aaa;
            border-right:1px solid #aaa;
            margin-bottom:20px;

            position:absolute;
            right:-18px;
            top:0;
        }

        #product-image-slide img {
            width:100%;
            cursor:pointer;
        }

        #product-image-container {
            position:relative;
            padding-right: 85px;
            min-height:296px;
        }

        #product-image-show a img {
            width:100%;
        }
    ")}}
    {{ Tee\System\Asset::addScript('
        $("#product-image-slide").Thumbelina({
            orientation:"vertical",         // Use vertical mode (default horizontal).
            $bwdBut:$("#product-image-slide .top"),     // Selector to top button.
            $fwdBut:$("#product-image-slide .bottom")   // Selector to bottom button.
        });

        $("#product-image-show").easyZoom();

        $("#product-image-slide img").each(function() {
            var $img = $(this);
            $img.click(function() {
                $("#product-image-show").data("easyZoom").swap(
                    $img.data("medium-image"),
                    $img.data("big-image")
                );
            });
        });
    ') }}


    <div class="row">

        <div class="col-md-4" itemscope itemtype="http://schema.org/Product">
            <div id="product-image-container">
                @if($product->images->count() > 0)
                    <div id="product-image-show" class="easyzoom easyzoom--overlay">
                        <a href="{{ URL::to($product->mainImage->image->url('big')) }}">
                            <img itemprop="image" src="{{ URL::to($product->mainImage->image->url('thumbnail')) }}" />
                        </a>
                    </div>

                    <div id="product-image-slide">
                        <div class="thumbelina-but vert top disabled">˄</div>
                        <div style="position:absolute;overflow:hidden;width:100%;height:100%;">
                            <ul class="thumbelina" style="top: 0px;">
                                @foreach($product->images as $image)
                                    <li style="display: block;"><img src="{{ URL::to($image->image->url('small')) }}" data-big-image="{{ URL::to($image->image->url('big')) }}" data-medium-image="{{ URL::to($image->image->
                                    url('thumbnail')) }}"></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="thumbelina-but vert bottom">˅</div>
                    </div>
                @else
                    <img src="{{ $product->mainImage->imageUrl }}" style="width:100%;" />
                @endif
            </div>
        </div>
            
        <div class="col-md-8">
            <div class="product-title">
                <span itemprop="name">{{ $product->name }}</span>
                (Ref: <span itemprop="productID">{{ $product->reference }}</span>)

                <span class="fb-share-button" data-href="{{ URL::full() }}" data-layout="button_count"></span>
            </div>
            
            <div class="product-desc" itemprop="description">{{ $product->description }}</div>
            <div class="product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                <meta itemprop="ratingValue" content="">
                <meta itemprop="reviewCount" content="0">
                <i class="fa fa-star gold"></i>
                <i class="fa fa-star gold"></i>
                <i class="fa fa-star gold"></i>
                <i class="fa fa-star gold"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <hr>
            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <div class="product-price" itemprop="price">{{ formatCurrency($product->price) }}</div>
            </div>
            <div class="product-stock">Em estoque</div>
            <hr>
            <div class="btn-group cart">
                <button type="button" class="btn btn-success">
                    Adicionar ao carrinho
                </button>
            </div>
            <div class="btn-group wishlist">
                <button type="button" class="btn btn-danger">
                    Adicionar a lista de desejos
                </button>
            </div>
        </div>
    </div>
    <div class="product-info">
        <ul id="myTab" class="nav nav-tabs nav_tabs">
            
            <li class="active"><a href="#service-one" data-toggle="tab">DESCRIÇÃO</a></li>
            <li><a href="#service-two" data-toggle="tab">INFORMAÇÕES</a></li>
            <li><a href="#service-three" data-toggle="tab">COMENTÁRIOS</a></li>
            
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="service-one">
                <section class="section">
                    {{ $product->text }}
                </section>
            </div>
            <div class="tab-pane fade" id="service-two">
                @if($product->attributes->count() > 0)
                    <table class="table table-striped">
                        @foreach($product->attributes as $attribute)
                            <tr>
                                <th width="30%">
                                    {{{ $attribute->name }}}
                                </th>
                                <td>
                                    {{{ $attribute->value }}}
                                </td>
                            </tr>
                        @endforeach  
                    </table>
                @else
                    <div class="alert alert-info" role="alert" style="margin-top:1em;">
                        Não há mais nenhuma informação deste produto.
                    </div>
                @endif
            </div>
            <div class="tab-pane fade" id="service-three">
                <div class="alert alert-info" role="alert" style="margin-top:1em;">
                    Não há nenhum comentário deste produto
                </div>               
            </div>
        </div>
        <hr>
    </div>
@stop