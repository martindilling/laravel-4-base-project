{{--
@param  string  $name
@param  string  $label
@param  string  $placeholder
--}}

<div class="form-group {{ set_error($name, $errors) }}">
    {{ Form::label($name, $label, ['class' => 'col-sm-2 col-md-2 control-label']) }}
    <div class="col-sm-10 col-md-10">
        {{ Form::text($name, null, array('class' => 'form-control', 'placeholder' => $placeholder)) }}
        {{ get_error($name, $errors) }}
    </div>
</div>
