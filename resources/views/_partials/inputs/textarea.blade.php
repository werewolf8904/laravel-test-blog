<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="@propertyToId($name)">@propertyToLabel($name) {{isset($required)&&$required?'*':''}}</label>
    <textarea type="text" id="@propertyToId($name)" name="{{$name}}" class="form-control" {{isset($required)&&$required?'required':''}}>{{ old($name,$model->$name) }}</textarea>
    @if($errors->has($name))
        <p class="label__error text-danger">
            {{ $errors->first($name) }}
        </p>
    @endif
</div>
