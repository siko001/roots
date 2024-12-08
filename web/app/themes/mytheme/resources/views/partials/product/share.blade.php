{{-- links to share on socials --}}
<div class="flex items-center gap-2">
    <a class="-mr-1 h-5 w-5 text-[#ACACAC] hover:text-primary"
        href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank"
        rel="noopener noreferrer" class="btn btn-primary">
        <x-svg-icon name="meta" />
    </a>
    <a class="h-5 w-5 text-[#ACACAC] hover:text-primary" href="https://instagram.com/yourprofile" target="_blank"
        rel="noopener noreferrer" class="btn btn-primary">
        <x-svg-icon name="instagram" />
    </a>
    <a class="h-5 w-5 text-[#ACACAC] hover:text-primary"
        href="https://www.linkedin.com/shareArticle?url={{ url()->current() }}" target="_blank"
        rel="noopener noreferrer" class="btn btn-primary">
        <x-svg-icon name="linkedin" />
    </a>
</div>
