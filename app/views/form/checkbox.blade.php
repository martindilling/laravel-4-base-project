{{--
@param  string   $name
@param  string   $label
@param  mixed    $value
@param  boolean  $checked
--}}

<div class="form-group {{ set_error($name, $errors) }}">
    {{ Form::label($name, $label, ['class' => 'col-sm-2 col-md-2 control-label']) }}
    <div class="col-sm-8 col-md-8">
        <div class="checkbox">
            <label>
                {{ Form::checkbox($name, $value, $checked) }}
            </label>
        </div>
        {{ get_error($name, $errors) }}
    </div>
</div>
