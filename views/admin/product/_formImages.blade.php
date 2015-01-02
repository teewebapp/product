<div id="imageFormSetContainer">
    <div class="row">
        <div data-bind="foreach: imageFormSet">
            <div class="col-md-2" style="margin-bottom:10px;">
                <img data-bind="attr: {src: imageUrl}" style="width:100%;height:113px;" />
                {{ $imageFormSet->knockout->id->hidden() }}
                {{ $imageFormSet->knockout->image->file(['class' => 'form-control']) }}
                <button type="button" class="btn btn-danger" data-bind="click: $parent.remove" style="width:100%;">
                    <span class="glyphicon glyphicon-remove"></span>
                    Remover Imagem
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <button type="button" class="btn btn-primary" data-bind="click: add">
                <span class="glyphicon glyphicon-plus"></span>
                Adicionar Imagem
            </button>
        </div>
    </div>
</div>

<script type="text/javascript">

    function ImageFormSetModel() {
        var self = this;
     
        self.imageFormSet = ko.observableArray({{ json_encode($imageFormSet) }});
     
        self.add = function() {
            self.imageFormSet.push({{ json_encode($imageFormSet->getDefaultData()) }});
        };
     
        self.remove = function() {
            self.imageFormSet.remove(this);
        }
    }
     
    ko.applyBindings(new ImageFormSetModel(), $("#imageFormSetContainer").get(0));

</script>