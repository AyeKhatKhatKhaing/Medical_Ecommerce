<div component-name="mediq-service-solution"
    class="bg-white me-container180px py-[60px] lg:py-[0px] mediq-service-solution">
    <h1 class="capitalize font-secondary font-bold text-darkgray me-title32 pb-10">
        @lang('labels.service_solution.healthcare')</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:gap-[42px]">
        @if (isset($service_solutions) && count($service_solutions)>0)
        @foreach ( $service_solutions as $key=>$service_solution )
        <div
            class="mss-card bg-far flex items-end rounded-[20px] relative h-[180px] htzxs:h-[226px] md:h-[200px] xl:h-[250px]">
            <div class="mss-card--content pl-5 lg:pl-10 py-5 max-w-[280px] lg:max-w-[380px]">
                <h3 class="font-secondary font-bold me-title26 text-darkgray leading-[31.2px]">
                    {{ langbind($service_solution,'main_title') }}</h3>
                <p class="font-secondary font-medium me-title16 text-lightgray py-2">
                    {{ langbind($service_solution,'main_sub_title') }}</p>
                <button data-id="service-solution-modal{{ $key }}" type="button"
                    class="capitalize font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full service-learnbtn">@lang('labels.learn_more')</button>
            </div>
            <p class="mss-card--img absolute bottom-0 right-0 sm:-right-[12px] md:-right-[18px]"><img
                    src="{{isset($service_solution->img) ? $service_solution->img : asset('frontend/img/before-vaccine.png')}}"
                    alt="service image"></p>
        </div>
        @endforeach
        @endif
    </div>
</div>

<!-- The Modal -->
@if(count($service_solutions) > 0)
@foreach ( $service_solutions as $key=>$service_solution )
<div id="service-solution-modal{{ $key }}"
    class="modal hidden fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] service-solution-box flex justify-center items-center">
    <!-- Modal content -->
    <div class="modal-content max-w-[90%] lg:max-w-[700px] shadow-shadow02 my-[15%] mx-auto">
        <div class="relative rounded-[12px] bg-white overflow-hidden">
            {{-- <button class="flex ml-auto w-5 h-5 absolute right-8 top-12 ssbox-close">
                <span data-id="service-solution-modal{{ $key }}"
                    class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-service-solution-modal flex items-center justify-center text-[24px] w-full cursor-pointer text-[#1A1818] focus:no-underline">&times;</span>
            </button> --}}
            <button class="flex ml-auto w-5 h-5 absolute right-8 top-12 ssbox-close">
                <div  data-id="service-solution-modal{{ $key }}"  class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-service-solution-modal flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline">
                    <img src="{{ asset('frontend/img/custom-close.svg') }}" alt="custom-close"/>
                </div>
            </button>
            <div class="modal-content-plan">
                <div class="preview-bgradient pb-[50px] p-5 sm:p-10 flex justify-between ssbox relative" style="background-image: url('{{isset($service_solution->title_img) ? $service_solution->title_img : asset('frontend/img/iStock.png')}}');
                background-repeat: no-repeat;background-size: cover;">
                    <div class="relative ssbox-top">
                        <h2 class="helvetica-normal font-bold text-darkgray me-title29 pb-2">
                            {{ langbind($service_solution,'title') }}</h2>
                        <p class="helvetica-normal font-medium text-lightgray me-body16">
                            {{ langbind($service_solution,'sub_title') }}</p>
                    </div>
                    {{-- <img src="{{isset($service_solution->title_img) ? $service_solution->title_img : asset('frontend/img/iStock.png')}}"
                        alt="stock" class="stock-image"> --}}
                </div>

                <div class="bg-white px-5 sm:px-10 pb-10 health-main-box max-h-[400px] 6xl:max-h-64 7xl:max-h-80 overflow-auto custom-scrollbar-service-solution">
                    <div
                        class="p-5 border border-mee4 rounded-[12px] relative bg-white boxtext">
                        <p class="font-se font-medium me-body16 text-lightgray"> {!!
                            langbind($service_solution,'description') !!}</p>
                    </div>

                    <div
                        class="services-lists-container mt-4">
                        @php
                        $check_items =
                        App\Models\HomeCheckingItem::where('service_solution_id',$service_solution->id)->where('deleted_at',null)->get();
                        @endphp
                        @if (isset($check_items) && count($check_items) > 0)
                        @foreach ( $check_items as $key=>$check_item )
                        <div class="pt-6 border-b border-b-mee4 pb-3 px-5 services-item">
                            <div class="flex items-center justify-between services-item--lists-title">
                                <div class="ss-filter-layout">
                                    <h5 class="font-secondary font-medium me-body20 text-blueMediq">
                                        {{ langbind($check_item,'title')}}</p>
                                    </h5>
                                    <div class="flex tag-filter">
                                        {{-- @if(isset($check_item->dose_tag) && $check_item->dose_tag != null)
                                                   @foreach(json_decode($check_item->dose_tag) as $tag )
                                                        @php
                                                            $tag_name = App\Models\DoseTag::where('id',$tag)->get('name_en');
                                                        @endphp
                                                        <p class="text-center font-secondary font-medium me-body14 text-lightgray py-[3px] px-[10px] rounded-full bg-far mr-3">{{ $tag_name[0]->name_en }}
                                        </p>
                                        @endforeach
                                        @endif --}}
                                        {{-- @if(isset($check_item->recommend_tag) && $check_item->recommend_tag != null)
                                                    @foreach(json_decode($check_item->recommend_tag) as $tag )
                                                    @php
                                                        $tag_name = App\Models\RecommendTag::where('id',$tag)->first('name_en');
                                                    @endphp
                                                    @if(isset($tag_name))
                                                        <p class="text-center font-secondary font-medium me-body14 text-lightgray py-[3px] px-[10px] rounded-full bg-far mr-3">{{ $tag_name->name_en }}
                                        </p>
                                        @endif
                                        @endforeach
                                        @endif
                                        @if(isset($check_item->vaccine_factory_tag) && $check_item->vaccine_factory_tag
                                        != null)
                                        @foreach(json_decode($check_item->vaccine_factory_tag) as $tag )
                                        @php
                                        $tag_name = App\Models\VaccineFactoryTag::where('id',$tag)->first('name_en');
                                        @endphp
                                        @if(isset($tag_name))
                                        <p
                                            class="text-center font-secondary font-medium me-body14 text-lightgray py-[3px] px-[10px] rounded-full bg-far mr-3">
                                            {{ $tag_name->name_en }}</p>
                                        @endif
                                        @endforeach
                                        @endif --}}
                                        @php
                                        $key_item_filter = [];
                                        $highlight_tag_filter = [];
                                        $sub_category_filter =[];
                                        @endphp
                                        @if(isset($check_item->key_item_tag) && $check_item->key_item_tag != null)

                                        @foreach(json_decode($check_item->key_item_tag) as $tag )
                                        @php
                                        $key_item_filter[] = $tag;
                                        $tag_name =
                                        \App\Models\KeyItemTag::where('id',$tag)->whereNull('deleted_at')->whereIsPublished(true)->first();
                                        // $tag_name = App\Models\KeyItemTag::where('id',$tag)->first('name_en');
                                        @endphp
                                        @if(isset($tag_name))
                                        <p
                                            class="text-center font-secondary font-medium me-body14 text-lightgray py-[3px] px-[10px] rounded-full bg-far mr-3">
                                            {{ langbind($tag_name,'name')}}</p>
                                        @endif
                                        @endforeach
                                        @endif

                                        @if(isset($check_item->highlight_tag) && $check_item->highlight_tag != null)
                                        @foreach(json_decode($check_item->highlight_tag) as $tag )
                                        @php
                                        $highlight_tag_filter[] = $tag;
                                        $tag_name = App\Models\HighlightTag::where('id',$tag)->first();
                                        @endphp
                                        @if(isset($tag_name))
                                        <p
                                            class="text-center font-secondary font-medium me-body14 text-lightgray py-[3px] px-[10px] rounded-full bg-far mr-3">
                                            {{ langbind($tag_name,'name')}}</p>
                                        @endif


                                      
                                       
                                        {{-- <p class="text-center font-secondary font-medium me-body14 text-lightgray py-[3px] px-[10px] rounded-full bg-far mr-3">{{ $tag_name[0]->name_en }}
                                        </p> --}}
                                        @endforeach
                                        @endif

                                        @if(isset($check_item->sub_category) && $check_item->sub_category != null)
                                        @foreach(json_decode($check_item->sub_category) as $tag )
                                        @php
                                        $sub_category_filter[] = $tag;
                                        $tag_name = App\Models\SubCategory::where('id',$tag)->first();
                                        @endphp
                                        @if(isset($tag_name))
                                        <p
                                            class="text-center font-secondary font-medium me-body14 text-lightgray py-[3px] px-[10px] rounded-full bg-far mr-3 hidden">
                                            {{ langbind($tag_name,'name')}}</p>
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                @php
                                $key_item_filter = implode('%2C', $key_item_filter);
                                $highlight_tag_filter = implode('%2C', $highlight_tag_filter);
                                $sub_cat_filter = implode('%2C', $sub_category_filter);
                                // service-learnbtn
                                @endphp
                                <div class="lookup-link">
                                <a href="{{ langlink('products?ss=1&ki=' . $key_item_filter."&ht=".$highlight_tag_filter."&pc=".$sub_cat_filter) }}"
                                    class="capitalize font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full lookup-btn">@lang('labels.service_solution.check_plan')</a>
                                </div>
                            </div>
                                {!! langbind($check_item,'content') !!}
                        </div>
                        @endforeach

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endforeach
@endif