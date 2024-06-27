<nav component-name="about-us-menu" class="about-us-menu w-full z-[4] ">
    <ul class="about-us-menu-container flex justify-start items-center bg-blueMediq">


        <li class="about-us-menu--item">
            <a href="{{ route('about') }}" data-id="overview"
                class="about-us-menu--link text-light p-2 lg:py-[14px] lg:px-[20px] helvetica-normal me-body18 inline-block
                @if (Route::current()->getName() == 'about')
                active
                @endif
                ">
                @lang('labels.contact.about_mediq')
            </a>
        </li>

        <li class="about-us-menu--item">
            <a href="{{ route('contact') }}" data-id="overview"
                class="about-us-menu--link text-light p-2 lg:py-[14px] lg:px-[20px] helvetica-normal me-body18 inline-block 
                @if (Route::current()->getName() == 'contact')
                active
                @endif
                ">
                @lang('labels.contact_us')
            </a>
        </li>

        <li class="about-us-menu--item hidden">
            <a href="#" data-id="overview"
                class="about-us-menu--link text-light p-2 lg:py-[14px] lg:px-[20px] helvetica-normal me-body18 inline-block ">
                @lang('labels.menu.review')
            </a>
        </li>

        <li class="about-us-menu--item">
            <a href="{{ route('faq') }}" data-id="overview"
                class="about-us-menu--link text-light p-2 lg:py-[14px] lg:px-[20px] helvetica-normal me-body18 inline-block 
                @if (Route::current()->getName() == 'faq')
                active
                @endif">
                @lang('labels.product_detail.help_center')
            </a>
        </li>
    </ul>
</nav>
