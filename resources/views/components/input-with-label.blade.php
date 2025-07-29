
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->

<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700">{{ $label }}</label>
    <input 
        type="{{ $type ?? 'text' }}" 
        name="{{ $name }}" 
        id="{{ $name }}" 
        class="border border-gray-300 p-2 w-full rounded" 
        value="{{ $value ?? '' }}"
    >
</div>