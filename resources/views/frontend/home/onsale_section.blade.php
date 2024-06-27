<div component-name="me-onsale-banner" class="onsale-banner-container">
    <p class="onsale-banner-title text-center">On Sale Banner Title</p>
</div>
<div component-name="me-health-care-tab" class="bg-white me-health-care-tab">
    <div class="hcc-header flex items-center justify-between pt-[48px] pb-[32px]">
        <div>
            <p class="hcc-header-title">On Sale</p>
        </div>
        <div class="">
            <button
                class="hcc-shop-now-btn border border-darkgray text-darkgray rounded-[50px] flex items-center justify-center py-[5px] px-[20px]">Shop
                Now</button>
        </div>
    </div>
    <div class="me-tab-container">
        <div class="hcc-container">
            <div class="onsale-tab flex flex-col">
                <button class="onsale-item selected" data-id="recommendation"><span>Recommendations</span></button>
                @if(count($saleCategories) > 0)
                @foreach($saleCategories as $key => $scate)
                <button class="onsale-item"
                    data-id="scate{{$scate->id}}"><span>{{langbind($scate,'name')}}</span></button>
                @endforeach
                @endif
                <!-- <button class="onsale-item" data-id="two-to-enjoy"><span>2 to Enjoy</span></button>
            <button class="onsale-item" data-id="member-offer"><span>Member Offer</span></button>
            <button class="onsale-item" data-id="secondoff"><span>2nd 50% Off</span></button>
            <button class="onsale-item" data-id="tenoff"><span>2 or More 10% Off</span></button>
            <button class="onsale-item" data-id="fiveoff"><span>2 Selected Items 5% Off</span></button>
            <button class="onsale-item" data-id="buyoffer"><span>Buy 3 Offer</span></button> -->
            </div>
        </div>
        <div class="hcc-items-box md:w-[80%]">
            <div id="recommendation" class="tabcontent hidden">
                <div class="flex flex-wrap justify-start">

                    @if(count($recommendOnSaleProducts) > 0)
                    @foreach($recommendOnSaleProducts as $key => $product)
                    @include('frontend.home.onsale_home_card')
                    @endforeach
                    @endif
                </div>
            </div>
            @if(count($saleCategories) > 0)
            @foreach($saleCategories as $key => $scate)
            <div id="scate{{$scate->id}}" class="tabcontent hidden">
                <div class="flex flex-wrap justify-start">
                    @if(count($allOnSaleProducts) > 0)
                    @foreach($allOnSaleProducts as $key => $product)
                    @include('frontend.home.onsale_home_card')
                    @endforeach
                    @endif

                </div>
            </div>
            @endforeach
            @endif
            <div id="two-to-enjoy" class="tabcontent hidden">
                <div class="flex flex-wrap justify-start">
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="member-offer" class="tabcontent hidden">
                <div class="flex flex-wrap justify-start">
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="secondoff" class="tabcontent hidden">
                <div class="flex flex-wrap justify-start">
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tenoff" class="tabcontent hidden">
                <div class="flex flex-wrap justify-start">
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="fiveoff" class="tabcontent hidden">
                <div class="flex flex-wrap justify-start">
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="buyoffer" class="tabcontent hidden">
                <div class="flex flex-wrap justify-start">
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mehc-card rounded-[20px] flex items-center hover:bg-whitez hover:shadow-cardshadow">
                        <div class="mehc-card-left p-[10px] relative">
                            <div class="px-[10px] pt-[10px] bg-white mehc-top-card relative">
                                <div
                                    class="mehc-top-line flex justify-between items-center absolute top-0 left-0 w-full px-[10px]">
                                    <div class="discount-circle">-35%</div>
                                    <div>
                                        <img src="{{asset('frontend/img/me-health-care-heart-icon.svg')}}"
                                            class="mehc-heart-icon" />
                                    </div>
                                </div>
                                <img src="{{asset('frontend/img/image 11.png')}}" alt="health-care" class="bg-image" />
                            </div>
                            <div class="progress">
                                <span class="label-title">2 Selected Items 5% Off</span>
                                <span class="value" style="width: 100%"></span>
                            </div>
                            <div class="two-button-container flex justify-between items-center mt-[10px] px-[6px]">
                                <button class="mehc-preview-btn bg-white w-[144px] flex items-center justify-center">
                                    preview
                                </button>
                                <button class="mehc-compare-btn bg-white w-[64px] flex items-center justify-center">
                                    <img src="{{asset('frontend/img/switch-icon.svg')}}" />
                                </button>
                            </div>
                        </div>
                        <div class="mehc-card-right px-[10px] pt-[23px] pb-[18px]">
                            <div class="">
                                <div class="categories flex flex-wrap justify-start items-center">
                                    <span class="mr-[4px] me-purple px-[10px] py-[3px] text-center rounded-[50px]">Free
                                        Gift</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">72
                                        Items</span>
                                    <span
                                        class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Pfizer</span>
                                    <span class="mr-[4px] me-gray px-[10px] py-[3px] text-center rounded-[50px]">Report
                                        Explained By Doctor</span>
                                </div>
                                <p class="categories-title">
                                    Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)
                                </p>
                            </div>
                            <div class="flex justify-between mt-[15px]">
                                <div class="">
                                    <p class="discount-price mb-[9px]">
                                        <span class="now-price">$3,185 <sub class="low-text">up</sub></span>
                                        <del class="old-price ml-[10px]">$4900</del>
                                    </p>
                                    <p class="rating-text">
                                        <img src="{{asset('frontend/img/health-rating-star.svg')}}"
                                            class="inline-block" /> 4.8
                                        <span class="book-no-text">(50) . 120+ booked</span>
                                    </p>
                                </div>
                                <div>
                                    <button
                                        class="me-addcart-btn bg-[#2FA9B5] w-[50px] h-[40px] rounded-[8px] flex items-center justify-center">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M25.3365 5.47137C25.2701 5.39165 25.1869 5.32752 25.093 5.2835C24.999 5.23949 24.8966 5.21667 24.7928 5.21667H5.57083L4.96115 1.85604C4.89208 1.47546 4.69154 1.13122 4.39455 0.883382C4.09755 0.635548 3.72296 0.499861 3.33613 0.5H1.20756C1.0199 0.5 0.839932 0.57454 0.707239 0.707222C0.574546 0.839904 0.5 1.01986 0.5 1.2075C0.5 1.39514 0.574546 1.5751 0.707239 1.70778C0.839932 1.84046 1.0199 1.915 1.20756 1.915H3.33023C3.38608 1.91409 3.44044 1.93303 3.48363 1.96844C3.52682 2.00385 3.55604 2.05344 3.56608 2.10838L6.57438 18.6521C6.66981 19.1798 6.92696 19.6648 7.31024 20.04C6.84742 20.4101 6.5018 20.9065 6.31521 21.469C6.12863 22.0314 6.10907 22.6359 6.25891 23.2093C6.40875 23.7826 6.72156 24.3003 7.15949 24.6996C7.59743 25.0989 8.14171 25.3627 8.72647 25.4591C9.31123 25.5556 9.91141 25.4805 10.4544 25.2429C10.9973 25.0054 11.4598 24.6156 11.7858 24.1207C12.1119 23.6258 12.2875 23.0471 12.2914 22.4545C12.2953 21.8619 12.1274 21.2808 11.808 20.7817H17.9661C17.5994 21.3554 17.4342 22.0349 17.4965 22.713C17.5588 23.391 17.845 24.029 18.3101 24.5264C18.7752 25.0237 19.3926 25.3521 20.065 25.4598C20.7374 25.5674 21.4265 25.4482 22.0236 25.1209C22.6207 24.7936 23.0919 24.2768 23.3627 23.6521C23.6336 23.0274 23.6888 22.3303 23.5196 21.6708C23.3504 21.0112 22.9665 20.4267 22.4283 20.0096C21.8902 19.5924 21.2284 19.3662 20.5475 19.3667H9.12867C8.85249 19.3667 8.58506 19.2698 8.373 19.0929C8.16094 18.916 8.01771 18.6703 7.96827 18.3986L7.54374 16.065H21.5027C22.1103 16.0652 22.6986 15.8521 23.1652 15.4629C23.6318 15.0737 23.947 14.5331 24.0558 13.9354L25.4886 6.05034C25.5071 5.94858 25.5031 5.844 25.4768 5.74397C25.4505 5.64394 25.4026 5.55089 25.3365 5.47137ZM10.8775 22.4325C10.8775 22.759 10.7807 23.0782 10.5993 23.3497C10.4179 23.6211 10.16 23.8327 9.85834 23.9577C9.55667 24.0826 9.22472 24.1153 8.90446 24.0516C8.5842 23.9879 8.29003 23.8307 8.05913 23.5998C7.82824 23.3689 7.671 23.0748 7.6073 22.7546C7.5436 22.4343 7.57629 22.1024 7.70125 21.8008C7.82621 21.4991 8.03782 21.2413 8.30932 21.0599C8.58082 20.8785 8.90002 20.7817 9.22655 20.7817C9.66441 20.7817 10.0843 20.9556 10.394 21.2652C10.7036 21.5748 10.8775 21.9947 10.8775 22.4325ZM22.1984 22.4325C22.1984 22.759 22.1016 23.0782 21.9202 23.3497C21.7388 23.6211 21.4809 23.8327 21.1793 23.9577C20.8776 24.0826 20.5456 24.1153 20.2254 24.0516C19.9051 23.9879 19.611 23.8307 19.3801 23.5998C19.1492 23.3689 18.9919 23.0748 18.9282 22.7546C18.8645 22.4343 18.8972 22.1024 19.0222 21.8008C19.1471 21.4991 19.3587 21.2413 19.6302 21.0599C19.9017 20.8785 20.2209 20.7817 20.5475 20.7817C20.9853 20.7817 21.4053 20.9556 21.7149 21.2652C22.0245 21.5748 22.1984 21.9947 22.1984 22.4325ZM22.6631 13.6819C22.6136 13.9536 22.4704 14.1993 22.2583 14.3762C22.0463 14.5532 21.7789 14.65 21.5027 14.65H7.28666L5.82909 6.63167H23.9449L22.6631 13.6819Z"
                                                fill="white" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>