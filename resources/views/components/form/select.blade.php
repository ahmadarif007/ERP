
<!-- When there is no desire, all things are at peace. - Laozi -->
<div class="form-group col-xs-4">
    @if($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    <select name="{{ $name }}" id="{{ $name }}" type="text" class="form-control input-sm has-success">
        @foreach($options as $key => $value)
            <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>
                {{ $value }}
            </option>
        @endforeach
    </select>
</div>