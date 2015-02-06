<div id="carousel-product" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @foreach($frames as $i => $products)
            <div class="item {{$i==0?'active':''}}">
                <div class="row">
                    @foreach($products as $product)
                        {{ Widget::productBox([
                            'product' => $product,
                            'cssClass' => 'col-md-4'
                        ]) }}
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="row">
    <!-- Controls -->
    <div class="col-md-12">
        <div class="controls">
            <a class="left fa fa-chevron-left btn btn-success" href="#carousel-product" data-slide="prev"></a>
            <a class="right fa fa-chevron-right btn btn-success" href="#carousel-product" data-slide="next"></a>
        </div>
    </div>
</div>