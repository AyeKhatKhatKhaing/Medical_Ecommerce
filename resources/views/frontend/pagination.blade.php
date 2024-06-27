<div component-name="product-pagination"
    class="product-list-pagination w-full flex flex-row items-center justify-center py-[30px]">
    @if ($paginator->hasPages())
    @if (!$paginator->onFirstPage())
    <a class="flex flex-row items-center text-darkgray me-body15 leading-[26px] opacity-60 helvetica-normal arrow"
        href="{{ $paginator->previousPageUrl() ? $paginator->previousPageUrl() : '#' }}" id="prev">
        <span class="rotate-180">
            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9.89792 8.18177C9.89792 8.27066 9.88125 8.35688 9.84792 8.44044C9.81458 8.52399 9.77014 8.59333 9.71458 8.64844L6.64792 11.7151C6.52569 11.8373 6.37014 11.8984 6.18125 11.8984C5.99236 11.8984 5.83681 11.8373 5.71458 11.7151C5.59236 11.5929 5.53125 11.4373 5.53125 11.2484C5.53125 11.0595 5.59236 10.904 5.71458 10.7818L8.31458 8.18177L5.71458 5.58177C5.59236 5.45955 5.53125 5.30399 5.53125 5.1151C5.53125 4.92622 5.59236 4.77066 5.71458 4.64844C5.83681 4.52622 5.99236 4.4651 6.18125 4.4651C6.37014 4.4651 6.52569 4.52622 6.64792 4.64844L9.71458 7.7151C9.78125 7.78177 9.82858 7.85399 9.85658 7.93177C9.88458 8.00955 9.89836 8.09288 9.89792 8.18177Z"
                    fill="#333333" />
            </svg>

        </span>
    </a>
    @endif

    <div class="flex flex-row flex-wrap items-center mx-2 2xs:mx-[29px] products-pagination">
        @foreach ($elements as $element)
        @if (is_string($element))
        <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag active"
            data-id="1" id="pag-1" href="#">{{ $element }}</a>
        @endif
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag active"
            data-id="1" id="pag-1" href="#">{{ $page }}</a>
        @else
        <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag"
            data-id="2" id="pag-2" href="{{ $url }}">{{ $page }}</a>
        @endif
        @endforeach
        @endif
        @endforeach
    </div>

    @if ($paginator->hasMorePages())
    <a class="flex flex-row items-center text-darkgray me-body15 leading-[26px] helvetica-normal arrow"
        href="{{ $paginator->nextPageUrl() ? $paginator->nextPageUrl() : '#' }}" id="next">
        <span class="">
            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9.89792 8.18177C9.89792 8.27066 9.88125 8.35688 9.84792 8.44044C9.81458 8.52399 9.77014 8.59333 9.71458 8.64844L6.64792 11.7151C6.52569 11.8373 6.37014 11.8984 6.18125 11.8984C5.99236 11.8984 5.83681 11.8373 5.71458 11.7151C5.59236 11.5929 5.53125 11.4373 5.53125 11.2484C5.53125 11.0595 5.59236 10.904 5.71458 10.7818L8.31458 8.18177L5.71458 5.58177C5.59236 5.45955 5.53125 5.30399 5.53125 5.1151C5.53125 4.92622 5.59236 4.77066 5.71458 4.64844C5.83681 4.52622 5.99236 4.4651 6.18125 4.4651C6.37014 4.4651 6.52569 4.52622 6.64792 4.64844L9.71458 7.7151C9.78125 7.78177 9.82858 7.85399 9.85658 7.93177C9.88458 8.00955 9.89836 8.09288 9.89792 8.18177Z"
                    fill="#333333" />
            </svg>

        </span>
    </a>
    @endif
    @endif
</div>