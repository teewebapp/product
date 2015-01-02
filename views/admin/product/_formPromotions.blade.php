<div id="promotionFormSetContainer">
    <div data-bind="foreach: promotionFormSet">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {{ $promotionFormSet->knockout->id->hidden() }}
                    {{ $promotionFormSet->knockout->date_begin->label() }}
                    {{ $promotionFormSet->knockout->date_begin->text(['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ $promotionFormSet->knockout->date_end->label() }}
                    {{ $promotionFormSet->knockout->date_end->text(['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ $promotionFormSet->knockout->discount->label() }}
                    {{ $promotionFormSet->knockout->discount->text(['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-md-2">
                <label>&nbsp;</label>
                <button type="button" class="btn btn-danger" data-bind="click: $parent.remove" style="width:100%;">
                    <span class="glyphicon glyphicon-remove"></span>
                    Remover
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-bind="click: add">
                <span class="glyphicon glyphicon-plus"></span>
                Adicionar Promoção
            </button>
        </div>
    </div>
</div>

<script type="text/javascript">

    function PromotionFormSetModel() {
        var self = this;
     
        self.promotionFormSet = ko.observableArray({{ json_encode($promotionFormSet) }});
     
        self.add = function() {
            self.promotionFormSet.push({{ json_encode($promotionFormSet->getDefaultData()) }});
        }
     
        self.remove = function() {
            self.promotionFormSet.remove(this);
        }
    }
     
    ko.applyBindings(new PromotionFormSetModel(), $("#promotionFormSetContainer").get(0));

</script>