@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($best_price) ? $best_price : ''])
@section('content')
    <main>
        <section class="best-price-banner object-cover object-center relative">
            <img src="{{ isset($best_price) && $best_price->banner_img ? asset($best_price->banner_img) : asset('frontend/img/best-price-banner.png') }}"
                class="w-full h-auto aspect-[64/5] object-cover object-center align-middle min-h-[80px]">
            <div class="best-price-container absolute top-1/2 -translate-y-1/2 right-0 left-0">
                <h1 class="text-light me-head32 font-bold">{{ langbind($best_price, 'banner_title') }}</h1>
            </div>
        </section>
        <section class="guarantee-service">
            <div class="best-price-container text-darkgray py-10 xl:py-16 6xl:py-20">
                <h2 class="me-head32 font-bold">{{ langbind($best_price, 'service_title') }}</h2>


                <div class="guarantee-service-items ">

                    <div class="guarantee-service-item md:flex md:items-center py-7 6xl:py-10 last:pb-0 6xl:last:pb-0">
                        <div class="service-item-icon md:mr-10">
                            <img src="{{ isset($best_price) && $best_price->service_img ? asset($best_price->service_img) : asset('frontend/img/guarantee-contact-us.png') }}"
                                alt="We are always here to help"
                                class="w-auto h-auto object-cover object-center align-middle mx-auto md:mx-0">
                        </div>

                        <div class="service-item-body text-center md:text-left mt-3 md:mt-0 md:flex-1">
                            <h3 class="me-body23 font-bold">{{ langbind($best_price, 'service_subtitle') }}</h3>

                            <p class="me-body18 mt-1">{{ langbind($best_price, 'service_description') }}</p>

                            <a href="{{ route('contact') }}"
                                class="me-body16 text-darkgray font-bold border border-solid border-darkgray py-2 xl:py-[10px] px-5 rounded-[50px] inline-block transition-colors hover:bg-blueMediq hover:text-light hover:border-blueMediq mt-4 xl:mt-5">
                                {{ langbind($best_price, 'service_link_text') }}
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <section class="guarantee-service">
            <div class="best-price-container text-darkgray pb-10 xl:pb-16 6xl:pb-20">
                <h2 class="me-head32 font-bold"> {{ langbind($best_price, 'awesome_booking_title') }}</h2>


                <div class="guarantee-service-items ">
                    @if (isset($best_price_detail) && count($best_price_detail) > 0)
                        @foreach ($best_price_detail as $detail)
                            <div
                                class="guarantee-service-item md:flex md:items-center py-7 6xl:py-10 last:pb-0 6xl:last:pb-0">
                                <div class="service-item-icon md:mr-10">
                                    <img src="{{ $detail->best_price_img }}" alt="Best Price Guarantee"
                                        class="w-auto h-auto object-cover object-center align-middle mx-auto md:mx-0">
                                </div>

                                <div class="service-item-body text-center md:text-left mt-3 md:mt-0 md:flex-1">
                                    <h3 class="me-body23 font-bold">{{ langbind($detail, 'best_price_title') }}</h3>

                                            <p class="me-body18 mt-1">
                                                {{ langbind($detail, 'best_price_text') }}
                                            </p>
                                            @if ($detail->best_price_description_en != null)
                                            <a data-href="#{{ Str::slug($detail->best_price_title_en, '-') }}"
                                                class="me-body16 underline text-blueMediq font-bold inline-block transition-colors hover:text-darkgray mt-4 xl:mt-5">
                                                @lang('labels.see_more')
                                            </a>
                                            @endif

                                </div>
                            </div>
                        @endforeach
                    @endif

                    {{-- <div class="guarantee-service-item md:flex md:items-center py-7 6xl:py-10 last:pb-0 6xl:last:pb-0">
                        <div class="service-item-icon md:mr-10">
                            <img src="./img/money-back-guarantee.svg" alt="Money Back Guarantee"
                                class="w-auto h-auto object-cover object-center align-middle mx-auto md:mx-0">
                        </div>

                        <div class="service-item-body text-center md:text-left mt-3 md:mt-0 md:flex-1">
                            <h3 class="me-body23 font-bold">Money Back Guarantee</h3>

                            <p class="me-body18 mt-1">If your order does not suit you for any reason, you can cancel it and
                                receive
                                a full refund.</p>

                            <a href="#money-back"
                                class="me-body16 underline text-blueMediq font-bold inline-block transition-colors hover:text-darkgray mt-4 xl:mt-5">See
                                more</a>

                        </div>
                    </div>

                    <div class="guarantee-service-item md:flex md:items-center py-7 6xl:py-10 last:pb-0 6xl:last:pb-0">
                        <div class="service-item-icon md:mr-10">
                            <img src="./img/vaccine-guarantee.svg" alt="Vaccine Guarantee"
                                class="w-auto h-auto object-cover object-center align-middle mx-auto md:mx-0">
                        </div>

                        <div class="service-item-body text-center md:text-left mt-3 md:mt-0 md:flex-1">
                            <h3 class="me-body23 font-bold">Vaccine Guarantee</h3>

                            <p class="me-body18 mt-1">The merchant meets the mediQ qualification and has an adequate supply
                                in
                                stock.</p>



                        </div>
                    </div>

                    <div class="guarantee-service-item md:flex md:items-center py-7 6xl:py-10 last:pb-0 6xl:last:pb-0">
                        <div class="service-item-icon md:mr-10">
                            <img src="./img/time-slot-guarantee.svg" alt="Time Slot Guarantee"
                                class="w-auto h-auto object-cover object-center align-middle mx-auto md:mx-0">
                        </div>

                        <div class="service-item-body text-center md:text-left mt-3 md:mt-0 md:flex-1">
                            <h3 class="me-body23 font-bold">Time Slot Guarantee</h3>

                            <p class="me-body18 mt-1">The merchant promises to arrange an appointment within the time.</p>



                        </div>
                    </div> --}}

                </div>

            </div>
        </section>
        @if (isset($best_price_detail) && count($best_price_detail) > 0)
            @foreach ($best_price_detail as $detail)
                @if ($detail->best_price_description_en != null)
                    <section class="best-price-content" id="{{ Str::slug($detail->best_price_title_en, '-') }}">
                        <div class="best-price-container text-darkgray py-10 xl:py-16 6xl:py-20">

                            <h2 class="me-head32 font-bold ">{{ langbind($detail, 'best_price_title') }}</h2>

                            {!! langbind($detail, 'best_price_description') !!}

                            {{-- <div class="content-desc me-body18 mt-7 6xl:mt-10">

                            <p class="pt-7 6xl:pt-10 first:pt-0 6xl:first:pt-0">This Best Price Guarantee (this &ldquo;Price
                                Guarantee&rdquo;) is only applicable to the health check services that have been specially
                                remarked
                                for
                                Best Price Guarantee on this website(the &ldquo;Guaranteed Services&rdquo;). We, MediQ
                                Health
                                Service
                                (Asia)
                                Limited, promise to refund the difference if you find a lower price offered by any other
                                company in
                                relation to the relevant Guaranteed Services based on the terms and conditions below! We are
                                committed to
                                providing clear, honest and transparent pricing on all our deals. For this reason, we will
                                list all
                                service-related fees in detail, so you'll never have to worry about additional costs.</p>

                            <p class="pt-7 6xl:pt-10 first:pt-0 6xl:first:pt-0">We are serious and confident in our belief
                                in the
                                Price
                                Guarantee. So if you find the same service is offering a lower price and notify us within 1
                                month of
                                ordering, we will refund double the difference in the form of Q-Dollar Credits into your
                                MediQ
                                account
                                which will be used for purchases again.</p>

                        </div>




                        <div class="content me-body18">

                            <div class="mt-7 6xl:mt-10">
                                <h2 class="me-head32 font-bold">How to request a refund?</h2>



                                <p class="pt-3 6xl:pt-4">You only have to obtain proof of the lower price, such as a
                                    receipt, price
                                    list,
                                    leaflet, website link, screenshot etc. provide 1. Orderer name and 2. Order number,
                                    email to
                                    enquiry@mediq.com.hk. When we receive the email, we will review and refund DOUBLE the
                                    difference
                                    value
                                    as Q-Dollar Credits to your member account after verification of your eligibility. The
                                    general
                                    refund
                                    process takes least fourteen (14) working days to complete.</p>


                            </div>

                            <div class="mt-7 6xl:mt-10">
                                <h2 class="me-head32 font-bold">Terms & Conditions</h2>

                                <ul class="pt-3 6xl:pt-4 list-decimal ml-4">

                                    <li class="mt-1 first:mt-0">Regarding the same service (&ldquo;Same Service&rdquo;), it
                                        means
                                        that all
                                        included content must be consistent with the Guaranteed Services by our Platform.
                                        This
                                        includes same
                                        servicing content, Supplier, duration of service (valid period or specified day),
                                        number of
                                        service it
                                        ems, etc.</li>

                                    <li class="mt-1 first:mt-0">This Same Service must be obtained from the retail channel
                                        that the
                                        supplier
                                        provides to the public.</li>

                                </ul>


                            </div>

                        </div> --}}

                        </div>
                    </section>


                    <div class="best-price-container">
                        <hr class="h-[1px] bg-mee4">
                    </div>
                @endif
            @endforeach
        @endif



        {{-- <section class="best-price-content" id="money-back">
            <div class="best-price-container text-darkgray py-10 xl:py-16 6xl:py-20">
                <h2 class="me-head32 font-bold ">Money Back Guarantee</h2>


                <div class="content-desc me-body18 mt-7 6xl:mt-10">

                    <p class="pt-7 6xl:pt-10 first:pt-0 6xl:first:pt-0">This Best Price Guarantee (this &ldquo;Price
                        Guarantee&rdquo;) is only applicable to the health check services that have been specially remarked
                        for
                        Best Price Guarantee on this website(the &ldquo;Guaranteed Services&rdquo;). We, MediQ Health
                        Service
                        (Asia) Limited, promise to refund the difference if you find a lower price offered by any other
                        company in
                        relation to the relevant Guaranteed Services based on the terms and conditions below! We are
                        committed to
                        providing clear, honest and transparent pricing on all our deals. For this reason, we will list all
                        service-related fees in detail, so you'll never have to worry about additional costs.</p>

                    <p class="pt-7 6xl:pt-10 first:pt-0 6xl:first:pt-0">We are serious and confident in our belief in the
                        Price
                        Guarantee. So if you find the same service is offering a lower price and notify us within 1 month of
                        ordering, we will refund double the difference in the form of Q-Dollar Credits into your MediQ
                        account
                        which will be used for purchases again.</p>

                </div>




                <div class="content me-body18">

                    <div class="mt-7 6xl:mt-10">
                        <h2 class="me-head32 font-bold">How to request a refund?</h2>



                        <p class="pt-3 6xl:pt-4">You only have to obtain proof of the lower price, such as a receipt, price
                            list,
                            leaflet, website link, screenshot etc. provide 1. Orderer name and 2. Order number, email to
                            enquiry@mediq.com.hk. When we receive the email, we will review and refund DOUBLE the difference
                            value
                            as Q-Dollar Credits to your member account after verification of your eligibility. The general
                            refund
                            process takes least fourteen (14) working days to complete.</p>


                    </div>

                    <div class="mt-7 6xl:mt-10">
                        <h2 class="me-head32 font-bold">Terms & Conditions</h2>

                        <ul class="pt-3 6xl:pt-4 list-decimal ml-4">

                            <li class="mt-1 first:mt-0">Regarding the same service (&ldquo;Same Service&rdquo;), it means
                                that all
                                included content must be consistent with the Guaranteed Services by our Platform. This
                                includes same
                                servicing content, Supplier, duration of service (valid period or specified day), number of
                                service it
                                ems, etc.</li>

                            <li class="mt-1 first:mt-0">This Same Service must be obtained from the retail channel that the
                                supplier
                                provides to the public.</li>

                        </ul>


                    </div>

                </div>

            </div>
        </section> --}}
        @include('frontend.include.product-compare-box')
    </main>
@endsection
@push('scripts')
<script src="{{ asset('frontend/custom/product-compare.js') }}"></script>
@endpush
