@if (count($popular_questions) > 0)
    @foreach ($popular_questions as $key => $popular)
        <div class="flex items-center mr-5 information-useful-button cursor-pointer" data-like-status="1"
            data-id="{{ $popular->id }}">
            <img src="{{ asset('frontend/img/faq-thumb-up.svg') }}" alt="faq-thumb" class="mr-[10px] thumb-up" />
            <img src="{{ asset('frontend/img/faq-thumb-up-active.svg') }}" alt="faq-thumb"
                class="mr-[10px] thumb-up-active hidden" />
            <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.yes') (10)</span>
        </div>
        <div class="flex items-center information-useful-button cursor-pointer" data-like-status="2"
            data-id="{{ $popular->id }}">
            <img src="{{ asset('frontend/img/faq-thumb-down.svg') }}" alt="faq-thumb" class="mr-[10px] thumb-down" />
            <img src="{{ asset('frontend/img/faq-thumb-down-active.svg') }}" alt="faq-thumb"
                class="mr-[10px] thumb-down-active hidden" />
            <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.no') (1)</span>
        </div>
    @endforeach
@endif
