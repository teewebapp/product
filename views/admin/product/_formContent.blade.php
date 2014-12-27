<div role="tabpanel" class="nav-tabs-custom">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a id="productInfoTab" href="#information" aria-controls="information" role="tab" data-toggle="tab">
                Informações Básicas
            </a>
        </li>
        <li role="presentation">
            <a href="#options" aria-controls="options" role="tab" data-toggle="tab">
                Attributos e Opções
            </a>
        </li>
        <li role="presentation">
            <a href="#promotion" aria-controls="promotion" role="tab" data-toggle="tab">
                Promocções
            </a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="information">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        {{ Form::labelModel($model, 'reference') }}
                        {{ Form::text('reference', null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        {{ Form::labelModel($model, 'name') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::labelModel($model, 'price') }}
                        {{ Form::text('price', null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::labelModel($model, 'weight') }}
                        {{ Form::text('weight', null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{ Form::labelModel($model, 'stock') }}
                        {{ Form::text('stock', null, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::labelModel($model, 'description') }}
                        {{ Form::text('description', null, array('class' => 'form-control')) }}
                    </div>
                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="options">
            &nbsp;
        </div>

        <div role="tabpanel" class="tab-pane" id="promotions">
            &nbsp;
        </div>
    </div>

</div>

<script type="text/javascript">
    $('#productInfoTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
</script>