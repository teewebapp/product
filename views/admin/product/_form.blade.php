@include('system::partials.validation')

{{ Form::resource($informationForm->getModel(), "admin.product", ['files' => true]) }}

    <div role="tabpanel" class="nav-tabs-custom">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a id="productInfoTab" href="#tabInformation" aria-controls="tabInformation" role="tab" data-toggle="tab">
                    Informações Básicas
                </a>
            </li>
            <li role="presentation">
                <a href="#tabImages" aria-controls="tabImages" role="tab" data-toggle="tab">
                    Imagens
                </a>
            </li>
            <li role="presentation">
                <a href="#tabOptions" aria-controls="tabOptions" role="tab" data-toggle="tab">
                    Attributos e Opções
                </a>
            </li>
            <li role="presentation">
                <a href="#tabPromotions" aria-controls="tabPromotions" role="tab" data-toggle="tab">
                    Promoções
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="tabInformation">
                @include('product::admin.product._formInformation')
            </div>

            <div role="tabpanel" class="tab-pane" id="tabImages">
                @include('product::admin.product._formImages')
            </div>

            <div role="tabpanel" class="tab-pane" id="tabOptions">
                @include('product::admin.product._formOptions')
            </div>

            <div role="tabpanel" class="tab-pane" id="tabPromotions">
                @include('product::admin.product._formPromotions')
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $('#productInfoTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    </script>

    {{ Form::submit($informationForm->getModel()->exists ? 'Editar' : 'Cadastrar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
