<!-- Input -->
<div class="flex w-full flex-col gap-0.5">
    <label class="body-text" for="{{ $label }}">
        {{ __($label, 'alogo-theme') }}
        <sup class="text-xs">
            {{ $required ? '*' : '' }}
        </sup>
    </label>

    @if ($inputType === 'textarea')
        <textarea style="height:200px;resize:none;" class="rounded-sm p-4 text-black placeholder:text-off-white-600"
            name="{{ $label }}" {{ $required ?: 'required' }} placeholder="Insert {{ $label }}..."></textarea>
    @else
        <input class="w-full rounded-sm p-4 text-black placeholder:text-off-white-600" name="{{ $label }}"
            {{ $required ?: 'required' }} placeholder="Insert {{ $label }}..." type="text">
    @endif
</div>
