{{--
@param  string  $name
@param  string  $label
@param  string  $placeholder
@param  int     $rows
--}}

<div class="form-group {{ set_error($name, $errors) }}">
    {{ Form::label($name, $label, ['class' => 'col-sm-2 col-md-2 control-label']) }}
    <div class="col-sm-10 col-md-10">
        {{ Form::textarea($name, null, array('class' => 'form-control',  'placeholder' => $placeholder, 'rows' => $rows)) }}
        {{ get_error($name, $errors) }}
    </div>
</div>
