<div id="contact"
    class="{{ $block->classes }} side-padding grid gap-8 bg-off-white-950 py-12 md:grid-cols-[1fr,0.9fr] md:py-24 lg:gap-16 xl:gap-24"
    style="{{ $block->inlineStyle }}">

    {{-- Left / Top Col --}}
    <div class="flex flex-col gap-12">
        {{-- heading --}}
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
        <div class="flex flex-col gap-8">
            <h3 class="heading3">
                @field('contact_form_title')
            </h3>
            <p class="body-text">
                @field('contact_form_description')
            </p>
        </div>
        <form action="/" method="POST" class="flex w-full flex-col items-start gap-8">
            {{-- Name --}}
            <div class="flex w-full flex-col gap-0.5">
                <label class="body-text" for="name">
                    {{ __('Name', 'alogo-theme') }}
                    <sup class="text-xs">
                        *
                    </sup>
                </label>
                <input class="w-full rounded-sm p-4 text-black placeholder:text-off-white-600" name="name" required
                    placeholder="Insert Name..." type="text">
            </div>

            {{-- Surname --}}
            <div class="flex w-full flex-col gap-0.5">
                <label class="body-text" for="name">
                    {{ __('Surname', 'alogo-theme') }}
                    <sup class="text-xs">
                        *
                    </sup>
                </label>
                <input class="rounded-sm p-4 text-black placeholder:text-off-white-600" name="name" required
                    placeholder="Insert Surname..." type="text">
            </div>

            {{-- Phone Number --}}
            <div class="flex w-full flex-col gap-0.5">
                <label class="body-text" for="name">
                    {{ __('Phone Number', 'alogo-theme') }}
                    <sup class="text-xs">
                        *
                    </sup>
                </label>
                <input class="rounded-sm p-4 text-black placeholder:text-off-white-600" name="name" required
                    placeholder="Insert Phone Number..." type="text">
            </div>

            {{-- Email --}}
            <div class="flex w-full flex-col gap-0.5">
                <label class="body-text" for="name">
                    {{ __('Email Address', 'alogo-theme') }}
                    <sup class="text-xs">
                        *
                    </sup>
                </label>
                <input class="rounded-sm p-4 text-black placeholder:text-off-white-600" name="name" required
                    placeholder="Insert Email address..." type="text">
            </div>


            {{-- Message --}}
            <div class="flex w-full flex-col gap-0.5">
                <label class="body-text" for="name">
                    {{ __('Message', 'alogo-theme') }}
                    <sup class="text-xs">
                        *
                    </sup>
                </label>
                <textarea style="height:200px;resize:none;" class="rounded-sm p-4 text-black placeholder:text-off-white-600"
                    name="name" required placeholder="Insert Message..."></textarea>
            </div>

            {{-- Submit BUtton --}}
            <button class="rounded-sm bg-white p-4 text-[0.9rem] font-medium uppercase text-primary" type="submit">
                {{ __('Send appointment form', 'alogo-theme') }}
            </button>
        </form>
    </div>
</div>
