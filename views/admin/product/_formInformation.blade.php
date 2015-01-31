<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {{ $informationForm->category_id->label() }}
            {{ $informationForm->category_id->select(['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ $informationForm->reference->label() }}
            {{ $informationForm->reference->text(['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-10">
        <div class="form-group">
            {{ $informationForm->name->label() }}
            {{ $informationForm->name->text(['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ $informationForm->price->label() }}
            {{ $informationForm->price->decimal(['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ $informationForm->weight->label() }}
            {{ $informationForm->weight->decimal(['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {{ $informationForm->stock->label() }}
            {{ $informationForm->stock->numerical(['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ $informationForm->description->label() }}
            {{ $informationForm->description->text(['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ $informationForm->text->label() }}
            {{ $informationForm->text->editor(['class'=>'form-control']) }}
        </div>
    </div>
</div>