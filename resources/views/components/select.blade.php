
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->

@props(['name', 'label' => '', 'type' => 'text', 'value' => '', 'placeholder' => '', 'divClass' => ''])

<div class="divClass" style="margin-bottom: 8px">
    <select type="{{ $type ?? 'text' }}" class="form-control input-sm">
        <option>Buyer Country</option>
        <option value="{{ $value ?? '' }}">Bangladesh</option>
        <option value="2">Australia</option>
        <option value="3">America</option>
        <option value="4">China</option>
        <option value="5">Japan</option>
        <option value="6">Malyasia</option>
    </select>
</div>

<input 
    type="{{ $type ?? 'text' }}" 
    name="{{ $name }}"
    class="form-control input-sm" 
    value="{{ $value ?? '' }}"
    placeholder="{{ $placeholder }}"
>