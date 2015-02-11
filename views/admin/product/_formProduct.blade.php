<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {{ $productForm->category_id->label() }}
            {{ $productForm->category_id->select(['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ $productForm->reference->label() }}
            {{ $productForm->reference->text(['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-10">
        <div class="form-group">
            {{ $productForm->name->label() }}
            {{ $productForm->name->text(['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ $productForm->price->label() }}
            {{ $productForm->price->decimal(['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ $productForm->weight->label() }}
            {{ $productForm->weight->decimal(['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ $productForm->stock->label() }}
            {{ $productForm->stock->numerical(['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ $productForm->description->label() }}
            {{ $productForm->description->text(['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ $productForm->text->label() }}
            {{ $productForm->text->editor(['class'=>'form-control']) }}
        </div>
    </div>
</div>