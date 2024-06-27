<section class="faqs" id="faq">
    <div component-name="me-product-detail-faq" class="me-product-detail-faq">
        <div class="plan-option-container text-darkgray pt-8 lg:pt-[56px] pb-8 md:flex justify-between">
            <div
                class="plan-option-content md:w-full md:max-w-[70%] md:mr-4 lg:max-w-[39.063rem] xl:max-w-[71.25rem]  4xl:mr-10">
                <div class="mb-[20px]">
                    <h3 class="helvetica-normal text-darkgray font-bold me-body28 mb-[32px]">@lang('labels.product_detail.faq')</h3>
                </div>
                <div class="">
                    <ul class="faq-container">

                        @if (count($product->merchant->faq) > 0)
                            @foreach ($product->merchant->faq as $faq)
                                <li class="mb-[20px]">
                                    <p class="helvetica-normal font-bold me-body18">{{ langbind($faq, 'question') }}</p>
                                    <p class="helvetica-normal font-normal me-body18">{!! langbind($faq, 'answer') !!}</p>
                                </li>
                            @endforeach
                        @endif

                    </ul>
                    <div class="flex flex-col justify-start items-center mt-[20px] w-full max-w-[130px]">
                        <button class="mb-[25px] w-full flex justify-start items-center faqshow-btn">
                            <span class="moretext me-body18">@lang('labels.product_detail.show_more')</span>
                            <span class="lesstext hidden me-body18">@lang('labels.product_detail.show_less')</span>
                            <img src="{{ asset('frontend/img/me-show-more.svg') }}" alt="show more icon" class="ml-[16px]"/>
                        </button>
                        <a href="{{route('faq')}}" class="font-secondary font-bold me-body16 w-full h-[42px] flex items-center justify-center border border-darkgray text-center hover:bg-blueMediq hover:border-whitez hover:text-whitez rounded-full">@lang('labels.product_detail.help_center')</a>
                        {{-- <button class="mb-[25px] w-full flex justify-start items-center faqshow-btn">
                            <span
                                class="moretext me-body18"> @lang('labels.product_detail.show_more')</a>
                                @lang('labels.product_detail.show_less')</a>
                            </span>
                            <span class="lesstext hidden me-body18"></span><img
                                src="{{ asset('frontend/img/me-show-more.svg') }}" alt="show more icon"
                                class="ml-[16px]" />
                        </button>
                        <a href="#"
                            class="font-secondary font-bold me-body16 w-full h-[42px] flex items-center justify-center border border-darkgray text-center hover:bg-blueMediq hover:border-whitez hover:text-whitez rounded-full">Help
                            Centre
                        </a> --}}
                    </div>
                </div>
            </div>
            <aside
                class="plan-option-sidebar hidden md:block md:w-[44%] xl:w-[44.5%] 2xl:w-[42%] 3xl:w-[39.5%] 5xl:w-[40%] 7xl:w-[30%] mt-[86px] lg:mt-24 4xl:mt-[109px]">
            </aside>
        </div>
    </div>
</section>
