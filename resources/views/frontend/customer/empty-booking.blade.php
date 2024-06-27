<div component-name="me-member-no-booking-state" class="me-member-no-booking-state mb-16">
    <div>
        <img src="{{asset('frontend/img/health check 1.svg')}}" alt="health check"
            class="mx-auto w-auto max-w-[200px]">
        <div class="mt-[22px]">
            <p class="font-bold me-body-26 text-darkgray text-center">@lang('labels.booking.no_booking')</p>
            <p class="font-normal me-body-16 text-darkgray mt-3 text-center">@lang('labels.booking.first_booking')</p>
        </div>
        <div class="mt-12 md:max-w-[660px] max-w-[300px] mx-auto">
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