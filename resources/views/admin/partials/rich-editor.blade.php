{{-- Expects: $name, $value, optional $label, optional $height (px) --}}
@php $inputId = 'rich-input-' . str_replace(['[', ']'], '-', $name); @endphp
<div>
    @isset($label)
        <label class="form-label">{{ $label }}</label>
    @endisset
    <div data-rich-editor data-input="{{ $inputId }}" style="height: {{ $height ?? 180 }}px; background:#fff">{!! $value !!}</div>
    <textarea name="{{ $name }}" id="{{ $inputId }}" class="d-none">{{ $value }}</textarea>
</div>
