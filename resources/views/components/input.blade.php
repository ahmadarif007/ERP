
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
@props(['name', 'label' => '', 'type' => 'text', 'value' => '', 'placeholder' => '', 'divClass' => ''])
<div class="{{ $divClass }}" style="margin-bottom: 8px" for="inputSuccess">
    <input 
        type="{{ $type ?? 'text' }}" 
        name="{{ $name }}"
        class="form-control input-sm" 
        value="{{ $value ?? '' }}"
        placeholder="{{ $placeholder }}"
        >
</div>

