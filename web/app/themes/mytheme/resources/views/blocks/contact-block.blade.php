<div id="contact"
    class="{{ $block->classes }} side-padding grid gap-8 bg-off-white-950 py-12 md:grid-cols-[1fr,0.9fr] md:py-24 lg:gap-16 xl:gap-24"
    style="{{ $block->inlineStyle }}">

    {{-- Left / Top Col --}}
    <div class="flex flex-col gap-12">

        {{-- Heading --}}
        <h2 class="text-black heading2">
            @field('section_heading')
        </h2>

        {{-- Description --}}
        <p class="body-text">
            @field('section_description')
        </p>

        {{-- Image --}}
        <div class="w-full">
            <img class="min-h-[770px] image" src="@field('section_image', 'url')" alt="@field('section_image', 'alt')">
        </div>

    </div>

    {{-- Right / Bottom Col --}}
    <div class="flex h-full w-full flex-col items-start gap-12 rounded-sm bg-primary p-8 text-white">

        {{-- Form Title & Description --}}
        <div class="flex flex-col gap-8">
            <h3 class="heading3">
                @field('contact_form_title')
            </h3>
            <p class="body-text">
                @field('contact_form_description')
            </p>
        </div>

        {{-- Contact Form  (Alternatively, can use a plugin like gravity form that gives the admin the flexibility to edit the form or change it, for this case we do need to) --}}
        @include('forms.contact')

    </div>

</div>
