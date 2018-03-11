

<div class="form-group {{ !$errors->has($name) ? ' ' : 'has-error' }}">
    {{ Form::label($name, null, ['class' => 'control-label']) }}
    @if ($type === 'password')
        {{ Form::$type($name, array_merge(['class' => 'form-control'], $attributes?:[])) }}
    @else
        {{ Form::$type($name, $value, array_merge(['class' => 'form-control'], $attributes?:[])) }}
    @endif

    @if ($errors->has($name))
    <span class="help-block">{{ $errors->first($name) }}</span>
    @else
    @endif
</div>