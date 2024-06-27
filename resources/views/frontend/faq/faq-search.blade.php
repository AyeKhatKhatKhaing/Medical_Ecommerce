{{-- @if (count($faqs) > 0)
    @php
        $currentCategory = null;
        $currentSubcategory = null;
    @endphp

    @foreach ($faqs as $faq)
        @if ($currentCategory != $faq->category_id)
            @if ($currentCategory !== null || $currentSubcategory !== null)
                </ul>
                </div>
                </div>
            @endif
            <h3 class="font-bold me-body23 text-darkgray lg:mt-8 mt-4">
                {!! highlightKeywords(langbind($faq, 'category_name'), $keyword) !!} - {!! highlightKeywords(langbind($faq, 'sub_name'), $keyword) !!}
            </h3>
            <div component-name="me-faq-category-list" class="me-faq-category-list-container mt-5 ">
                <div class="me-faq-category-list-content">
                    <ul>
        @endif
        <a class="mr-3 block border-b border-b-mee4 last:border-0" href="{{ route('faq.detail', $faq->id) }}">

            <li id="search_result"
                class="hover:bg-far font-normal me-body20 text-darkgray lg:px-5 px-3 py-4 w-fll flex items-center justify-start">
                <p> {!! highlightKeywords(langbind($faq, 'name'), $keyword) !!} </p>
                <div class="ml-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                        fill="none">
                        <path
                            d="M19.7997 15.3665C19.7997 15.5443 19.7664 15.7167 19.6997 15.8838C19.6331 16.0509 19.5442 16.1896 19.4331 16.2998L13.2997 22.4331C13.0553 22.6776 12.7442 22.7998 12.3664 22.7998C11.9886 22.7998 11.6775 22.6776 11.4331 22.4331C11.1886 22.1887 11.0664 21.8776 11.0664 21.4998C11.0664 21.122 11.1886 20.8109 11.4331 20.5665L16.6331 15.3665L11.4331 10.1665C11.1886 9.92203 11.0664 9.61092 11.0664 9.23314C11.0664 8.85536 11.1886 8.54425 11.4331 8.29981C11.6775 8.05536 11.9886 7.93314 12.3664 7.93314C12.7442 7.93314 13.0553 8.05536 13.2997 8.29981L19.4331 14.4331C19.5664 14.5665 19.6611 14.7109 19.7171 14.8665C19.7731 15.022 19.8006 15.1887 19.7997 15.3665Z"
                            fill="#333333" />
                    </svg>
                </div>
            </li>
        </a>
        @php
            $currentCategory = $faq->category_id;
            $currentSubcategory = $faq->sub_category_id;
        @endphp
    @endforeach

    </ul>
    </div>
    </div>
@endif --}}
<div component-name="faq-header-section" class="faq-header-section-container">
    <div class="faq-header-section-content flex md:flex-nowrap flex-wrap-reverse">
        <div class="md:max-w-[450px] max-w-full md:w-auto w-full lg:mr-10 md:mr-5 md:my-0 my-1">
            <div class="flex flex-wrap 2xl:w-[410px] lg:w-[320px] md:w-[230px] w-full">
                <div class="flex w-full">
                    <div class="border-1 border-meA3 lg:px-5 px-2 py-2 rounded-tl-lg rounded-bl-lg w-full">
                        <form>
                            <input placeholder="@lang('labels.faq.search2')" id="searchKeyword" autocomplete="off"
                                class="placeholder:text-lightgray text-darkgray me-body18 font-normal w-full focus:outline-none border-0 focus-visible:outline-none" />
                        </form>
                        <input type="hidden" value="" id="category_id">
                    </div>
                    <div class="bg-blueMediq rounded-tr-lg rounded-br-lg w-[56px] flex justify-center items-center">
                        <button class="h-full lg:px-5 px-3 search" id="search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 18 18" fill="none">
                                <path
                                    d="M17.0004 17.0004L12.9504 12.9504M12.9504 12.9504C13.6004 12.3003 14.116 11.5286 14.4678 10.6793C14.8196 9.82995 15.0007 8.91966 15.0007 8.00036C15.0007 7.08106 14.8196 6.17076 14.4678 5.32144C14.116 4.47211 13.6004 3.7004 12.9504 3.05036C12.3003 2.40031 11.5286 1.88467 10.6793 1.53287C9.82995 1.18107 8.91966 1 8.00036 1C7.08106 1 6.17076 1.18107 5.32144 1.53287C4.47211 1.88467 3.7004 2.40031 3.05036 3.05036C1.73754 4.36318 1 6.14375 1 8.00036C1 9.85697 1.73754 11.6375 3.05036 12.9504C4.36318 14.2632 6.14375 15.0007 8.00036 15.0007C9.85697 15.0007 11.6375 14.2632 12.9504 12.9504Z"
                                    stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap items-center md:my-0 my-1">
            @if(isset($keyword))
                <h6 class="me-body28"> 
                    @if(count($faqs) != 0 )
                    {{ count($faqs)  }} 
                    @if(count($faqs) < 1) result 
                    @else results @endif found 
                    for "{{ $keyword }}" 
                    @else
                    no result found 
                    @endif
                </h6>
            @else
            <p class="font-normal me-body16 text-darkgray mr-[10px] faq-header-link ">
                <a href="{{ route('faq') }}">
                    @lang('labels.header.help')
                </a>
            </p>
            
            <div class="mr-[10px] ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                    fill="none">
                    <path
                        d="M6.51612 12.4718C6.36455 12.4015 6.2958 12.2249 6.35987 12.0671C6.37705 12.0249 6.86924 11.5249 8.14424 10.2561L9.90674 8.50145L8.14424 6.74833C6.86768 5.47645 6.37705 4.97801 6.35987 4.93583C6.34737 4.90301 6.33643 4.84833 6.33643 4.81395C6.33643 4.58895 6.56455 4.43739 6.76612 4.53114C6.85518 4.57333 10.5802 8.28114 10.6192 8.36864C10.6567 8.44833 10.6567 8.55458 10.6192 8.63426C10.5802 8.72176 6.85518 12.4296 6.76612 12.4718C6.68643 12.5093 6.5958 12.5093 6.51612 12.4718Z"
                        fill="#333333" />
                </svg>
            </div>
            @if(isset($category))
                <a href="{{ langlink('helpcenter-category?category=' . $category->id) }}">
                    <p class="font-normal me-body16 text-darkgray mr-[10px] faq-header-link">
                        {{ langbind($category, 'name') }}
                    </p>
                </a>
            @endif
            @if(isset($subcategory))
                <a href="{{ langlink('helpcenter-category?category=' . $subcategory->category_id) }}">
                <p class="font-normal me-body16 text-darkgray mr-[10px] faq-header-link">
                    {{ langbind($subcategory->category, 'name') }}
                </p>
                </a>
                <div class="mr-[10px] ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                        fill="none">
                        <path
                            d="M6.51612 12.4718C6.36455 12.4015 6.2958 12.2249 6.35987 12.0671C6.37705 12.0249 6.86924 11.5249 8.14424 10.2561L9.90674 8.50145L8.14424 6.74833C6.86768 5.47645 6.37705 4.97801 6.35987 4.93583C6.34737 4.90301 6.33643 4.84833 6.33643 4.81395C6.33643 4.58895 6.56455 4.43739 6.76612 4.53114C6.85518 4.57333 10.5802 8.28114 10.6192 8.36864C10.6567 8.44833 10.6567 8.55458 10.6192 8.63426C10.5802 8.72176 6.85518 12.4296 6.76612 12.4718C6.68643 12.5093 6.5958 12.5093 6.51612 12.4718Z"
                            fill="#333333" />
                    </svg>
                </div>
                <p class="font-normal me-body16 text-darkgray mr-[10px] faq-header-link active">
                    {{ langbind($subcategory, 'sub_name')  }}
                </p>
                <div class="mr-[10px] hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                        fill="none">
                        <path
                            d="M6.51612 12.4718C6.36455 12.4015 6.2958 12.2249 6.35987 12.0671C6.37705 12.0249 6.86924 11.5249 8.14424 10.2561L9.90674 8.50145L8.14424 6.74833C6.86768 5.47645 6.37705 4.97801 6.35987 4.93583C6.34737 4.90301 6.33643 4.84833 6.33643 4.81395C6.33643 4.58895 6.56455 4.43739 6.76612 4.53114C6.85518 4.57333 10.5802 8.28114 10.6192 8.36864C10.6567 8.44833 10.6567 8.55458 10.6192 8.63426C10.5802 8.72176 6.85518 12.4296 6.76612 12.4718C6.68643 12.5093 6.5958 12.5093 6.51612 12.4718Z"
                            fill="#333333" />
                    </svg>
                </div>
            @endif
            @endif
        </div>
    </div>
</div>
<div class="flex md:flex-row flex-col">
    <div component-name="me-faq-category-sidebar"
        class="me-faq-category-sidebar-container md:max-w-[450px] max-w-full lg:mr-10 mr-5">
        <div class="me-faq-category-sidebar-content 2xl:w-[410px] lg:w-[320px] md:w-[230px] w-full">
            <div class="mt-8">
                @php
                    $categories = App\Models\FaqCategory::get();
                @endphp
                @if (count($categories) > 0)
                    @foreach ($categories as $key => $category)
                        @include('frontend.faq.sidebar')
                    @endforeach
                @endif

            </div>
        </div>
    </div>
    <div component-name="me-faq-category-content"
        class="me-faq-category-content-container w-full lg:mt-0 md:mt-5 md:mb-10">
        <div>
            <div class="mt-8">
                {{-- <h1 class="font-bold me-body29 text-darkgray">Sub Cap name</h1> --}}

                <div class="">
                    @if (count($faqs) > 0)
                    @php
                        $currentCategory = null;
                        $currentSubcategory = null;
                    @endphp
                
                    @foreach ($faqs as $faq)
                        @if ($currentCategory != $faq->category_id)
                            @if ($currentCategory !== null || $currentSubcategory !== null)
                                </ul>
                                </div>
                                </div>
                            @endif
                            <h3 class="font-bold me-body23 text-darkgray lg:mt-8 mt-4">
                                @if(isset($keyword))
                                {!! highlightKeywords(langbind($faq, 'category_name'), $keyword) !!} - {!! highlightKeywords(langbind($faq, 'sub_name'), $keyword) !!}
                                @else
                                {{ langbind($faq, 'category_name')  }} - {{ langbind($faq, 'sub_name') }}
                                @endif
                            </h3>
                            <div component-name="me-faq-category-list" class="me-faq-category-list-container mt-5 ">
                                <div class="me-faq-category-list-content">
                                    <ul>
                        @endif
                        <a class="mr-3 block border-b border-b-mee4 last:border-0" href="{{ route('faq.detail', $faq->id) }}">
                
                            <li id="search_result"
                                class="hover:bg-far font-normal me-body20 text-darkgray lg:px-5 px-3 py-4 w-fll flex items-center justify-start">
                                @if(isset($keyword))
                                <p> {!! highlightKeywords(langbind($faq, 'name'), $keyword) !!} </p>
                                @else
                                {{ langbind($faq, 'name') }}
                                @endif
                                <div class="ml-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                                        fill="none">
                                        <path
                                            d="M19.7997 15.3665C19.7997 15.5443 19.7664 15.7167 19.6997 15.8838C19.6331 16.0509 19.5442 16.1896 19.4331 16.2998L13.2997 22.4331C13.0553 22.6776 12.7442 22.7998 12.3664 22.7998C11.9886 22.7998 11.6775 22.6776 11.4331 22.4331C11.1886 22.1887 11.0664 21.8776 11.0664 21.4998C11.0664 21.122 11.1886 20.8109 11.4331 20.5665L16.6331 15.3665L11.4331 10.1665C11.1886 9.92203 11.0664 9.61092 11.0664 9.23314C11.0664 8.85536 11.1886 8.54425 11.4331 8.29981C11.6775 8.05536 11.9886 7.93314 12.3664 7.93314C12.7442 7.93314 13.0553 8.05536 13.2997 8.29981L19.4331 14.4331C19.5664 14.5665 19.6611 14.7109 19.7171 14.8665C19.7731 15.022 19.8006 15.1887 19.7997 15.3665Z"
                                            fill="#333333" />
                                    </svg>
                                </div>
                            </li>
                        </a>
                        @php
                            $currentCategory = $faq->category_id;
                            $currentSubcategory = $faq->sub_category_id;
                        @endphp
                    @endforeach
                
                    </ul>
                    </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>



