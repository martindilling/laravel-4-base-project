{{--
@param  string  $label
@param  string  $text
--}}

<div class="form-group">
    {{ Form::label(null, $label, ['class' => 'col-sm-2 col-md-2 control-label']) }}
    <div class="col-sm-10 col-md-10">
        <p class="form-control-static">{{ $text }}</p>
    </div>
</div>
