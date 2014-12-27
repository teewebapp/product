<div class="form-group">
    {{ Form::labelModel($model, 'name') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::labelModel($model, 'description') }}
    {{ Form::text('description', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::labelModel($model, 'category_id') }}
    {{ Form::select('category_id', $selectOtherCategories, null, [
        'class' => 'form-control',
    ]) }}
</div>