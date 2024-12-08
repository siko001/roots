<form action="/" method="POST" class="flex w-full flex-col items-start gap-8">

    {{-- Name --}}
    @include('partials.form.input', ['label' => 'Name', 'required' => true, 'inputType' => 'text'])

    {{-- Surname --}}
    @include('partials.form.input', ['label' => 'Surname', 'required' => true, 'inputType' => 'text'])

    {{-- Phone Number --}}
    @include('partials.form.input', ['label' => 'Phone Number', 'required' => true, 'inputType' => 'tel'])

    {{-- Email --}}
    @include('partials.form.input', [
        'label' => 'Email Address',
        'required' => true,
        'inputType' => 'email',
    ])

    {{-- Message --}}
    @include('partials.form.input', [
        'label' => 'Message',
        'required' => true,
        'inputType' => 'textarea',
    ])

    {{-- Submit BUtton --}}
    <button class="rounded-sm bg-white p-4 text-[0.9rem] font-medium uppercase text-primary" type="submit">
        {{ __('Send appointment form', 'alogo-theme') }}
    </button>
</form>
