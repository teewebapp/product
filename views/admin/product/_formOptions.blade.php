<div id="optionFormSetContainer">
    <div data-bind="foreach: optionFormSet">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {{ $optionFormSet->knockout->id->hidden() }}
                    {{ $optionFormSet->knockout->name->label() }}
                    {{ $optionFormSet->knockout->name->text(['class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ $optionFormSet->knockout->value->label() }}
                    {{ $optionFormSet->knockout->value->text(['class' => 'form-control']) }}
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
                Adicionar Opção
            </button>
        </div>
    </div>
</div>

<script type="text/javascript">

    function OptionFormSetModel() {
        var self = this;
     
        self.optionFormSet = ko.observableArray({{ json_encode($optionFormSet) }});
     
        self.add = function() {
            self.optionFormSet.push({{ json_encode($optionFormSet->getDefaultData()) }});
        }
     
        self.remove = function() {
            self.optionFormSet.remove(this);
        }
    }
     
    ko.applyBindings(new OptionFormSetModel(), $("#optionFormSetContainer").get(0));

</script>