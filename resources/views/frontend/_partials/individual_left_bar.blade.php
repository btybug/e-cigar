<div class="nav flex-column justify-content-center nav-pills" aria-orientation="vertical">
    <a href="{!! route('blog') !!}" class="nav-link {{ ($type == 'active') ? 'active' : '' }} d-flex flex-column align-items-center">
        <span class="name">News</span></a>
    <a href="#" class="nav-link {{ ($type == 'active') ? 'forums' : '' }} d-flex flex-column align-items-center">
        <span class="name">Forums</span>
    </a>
    <a href="#" class="nav-link {{ ($type == 'active') ? 'socials' : '' }} d-flex flex-column align-items-center">
        <span class="name">Socials</span>
    </a>
</div>