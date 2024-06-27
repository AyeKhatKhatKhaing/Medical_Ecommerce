<div class="is_empty hidden">
    <div component-name="me-checkout-no-items-card" class="me-checkout-no-items-card mb-12 mt-[144px]">
          <img src="{{asset('frontend/img/empty-cart.svg')}}" alt="empty-cart" class="mx-auto sm:max-w-full max-w-[250px]" />
          <div class="px-5">
            <p class="mt-[22px] font-bold text-darkgray me-body-26 text-center">@lang("labels.order_details.empty_card")</p>
            <p class="font-normal me-body-16 text-darkgray mt-3 text-center">@lang("labels.order_details.first_booking")</p>
          </div>
    </div>
    <div class="mb-[98px]">
        <div component-name="me-member-no-booking-bottom" class="mt-12 md:max-w-[660px] max-w-[300px] mx-auto">
            <div class="grid md:grid-cols-3 grid-cols-1 lg:gap-9 gap-4">
                @foreach($main_categories as $category)
                @php
                $cate = [];
                foreach($category->subCategory as $key => $subCate){
                    $zkey = $key == 0 ? '?pc=' : '';
                    $cate[$key] = $zkey.$subCate->id.'%2C';
                }
                @endphp
                <div class="bg-whitez rounded-[20px] no-booking-card relative">
                    <a href="{{langlink('products'.implode('',$cate))}}">
                        <div class="flex flex-col items-center p-6 z-[1] relative">
                        @if($loop->index == 0)
                        <img src="{{asset('frontend/img/insurance 1.svg')}}" alt="insurance" />
                        @elseif($loop->index == 1)
                        <img src="{{asset('frontend/img/syringe 1.svg')}}" alt="insurance" />
                        @elseif($loop->index == 2)
                        <img src="{{asset('frontend/img/dna-icon.svg')}}" alt="insurance" />
                        @endif
                        <p class="font-bold me-body-16 text-darkgray mt-1">{{langbind($category,'name')}}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
