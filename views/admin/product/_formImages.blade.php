<style type="text/css">
.dashed-box {
    color:#999;
    outline: 1px dashed #999;
    height:201px;
    cursor:pointer;
}

.dashed-box:hover {
    color: #666;
}

.dashed-box-content {
    text-align: center;
    padding-top:6em;
}

.image-upload-box {
    position:relative;
    cursor:pointer;
}

.image-upload-box .image-upload-remove {
    position:absolute;
    right: 0.5em;
    top: 0.5em;
    cursor:pointer;
    color:white;
    font-size:1.5em;
    text-shadow: 0 0 1px black;
    opacity: 0.7;
}

.image-upload-box .image-upload-remove:hover {
    opacity: 1;
    text-shadow: 0 0 4px black;
}

.image-upload-box .image-upload-input {
    display:none;
}

.image-upload-basename {
    background: #888;
    color:white;
    padding:0.5em;
    height:2.5em;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
</style>

<div id="imageFormSetContainer">
    <div class="row">
        <span data-bind="foreach: imageFormSet">
            <div class="col-md-3" style="margin-bottom:10px;">
                <div class="image-upload-box">
                    <img data-bind="attr: {src: imageUrl, id:'ProductImage-'+$index()+'-image'}" style="width:100%;height:12em;" onclick="$(this.parentNode).find('input[type=file]').get(0).click();" />
                    {{ $imageFormSet->knockout->id->hidden() }}
                    {{ $imageFormSet->knockout->image->file(['class' => 'form-control image-upload-input']) }}
                    <div class="image-upload-basename" onclick="$(this.parentNode).find('input[type=file]').get(0).click();"><span data-bind="text: baseName"></span></div>
                    <span class="glyphicon glyphicon-remove image-upload-remove" data-bind="click: $parent.remove"></span>
                </div>
            </div>
        </span>
        <div class="col-md-3">
            <div class="dashed-box" data-bind="click: add">
                <div class="dashed-box-content">
                    <span class="glyphicon glyphicon-plus"></span>
                    Adicionar Imagem
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function ImageFormSetModel() {
        var self = this;
     
        self.imageFormSet = ko.observableArray({{ json_encode($imageFormSet) }});
     
        self.add = function() {
            var newLength = self.imageFormSet.push({{ json_encode($imageFormSet->getDefaultData()) }});
            var inputElement = $('input[name=ImageForm-'+(newLength-1)+'-image]');
            var nameElement = inputElement.parent().find('.image-upload-basename');
            nameElement.html('Selecione um arquivo');
            inputElement.get(0).click();
            inputElement.change(function() {
                if(inputElement.get(0).files) {
                    var files = inputElement.get(0).files;
                    nameElement.html(files[0].name);
                    try {
                        var image = $('#ProductImage-'+(newLength-1)+'-image');
                        var reader = new FileReader();
                        reader.readAsDataURL(files[0]); 
                        reader.onload = function(_file) {
                            image.attr('src', _file.target.result);
                        };
                    } catch(e) {
                        if(console && console.error)
                            console.error(e);
                    }
                } else {
                    nameElement.html('Selecione um arquivo');
                }
            });
        };
     
        self.remove = function() {
            self.imageFormSet.remove(this);
        }
    }
     
    ko.applyBindings(new ImageFormSetModel(), $("#imageFormSetContainer").get(0));

</script>