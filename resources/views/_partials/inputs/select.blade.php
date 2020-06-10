<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
    <label for="@propertyToId($name)">@propertyToLabel($name) {{isset($required)&&$required?'*':''}}</label>
    <select id="@propertyToId($name)" name="{{$name}}"
            class="form-control">
        @foreach($array as $key => $item)
            <option value="{{ $key }}" {{  ($key ===old($name, $model->$name)? 'selected' : '') }}>{{ $item}} </option>
        @endforeach
    </select>
    @if($errors->has($name))
        <p class="label__error text-danger">
            {{ $errors->first($name) }}
        </p>
    @endif
</div>
