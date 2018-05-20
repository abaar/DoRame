@if (isset($label))
    <label for="{{ $name }}" class="control-label">{{ $label }}</label>
@endif
<div style="margin-bottom: 10px;">
    <input id="{{ $name }}"
           type="{{ isset($type) ? $type : 'text' }}"
           class="form-control"
           name="{{ $name }}"
           placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
           value="{{old($name) ?: (isset($object) ? $object->{$name} : '')}}"
            {{ isset($attributes) ? $attributes : '' }}>

    @if ($errors->has($name))
        <span class="help-block">
        <strong>{{ $errors->first($name) }}</strong>
    </span>
    @endif
</div>

