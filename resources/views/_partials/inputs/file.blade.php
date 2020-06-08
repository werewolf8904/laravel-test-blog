<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="@propertyToId($name)">@propertyToLabel($name) {{isset($required)&&$required?'*':''}}</label>
   <input type="file" name="@propertyToId($name)" {{isset($required)&&$required?'required':''}}>
    @if($errors->has($name))
        <p class="label__error text-danger">
            {{ $errors->first($name) }}
        </p>
    @endif
    @if($model->$name)
        <a href="{{Storage::url($model->$name)}}">{{Arr::get(pathinfo($model->$name),'filename')}}</a>
    @endif
</div>
