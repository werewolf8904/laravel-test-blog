<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="@propertyToId($name)">@propertyToLabel($name) {{isset($required)&&$required?'*':''}}</label>
    <input type="text" id="@propertyToId($name)" name="{{$name}}"
           class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}"
           {{isset($required)&&$required?'required':''}}
           value="{{ old($name, $model->$name) }}">
    @if($errors->has($name))
        <p class="label__error text-danger">
            {{ $errors->first($name) }}
        </p>
    @endif
</div>
