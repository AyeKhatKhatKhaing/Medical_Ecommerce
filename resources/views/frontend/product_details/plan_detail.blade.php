<section class="onecoltable" id="plan-detail">
    <div component-name="me-plan-detail-table" class="me-plan-detail-table-container">
        <div class="plan-option-container text-darkgray py-8 md:flex justify-between">
            <div
                class="plan-option-content md:w-full md:max-w-[70%] md:mr-4 lg:max-w-[39.063rem] xl:max-w-[46.75rem] 2xl:max-w-[51.5rem] 3xl:max-w-[55.75rem] 4xl:max-w-[71.25rem]  4xl:mr-10">
                <div class="plan-detail-title">
                    <h3 class="helvetica-normal me-body28 font-bold mb-[32px]">@lang('labels.product_detail.plan_detail')</h3>
                </div>

                @foreach ($checkupTypes as $type)
                    <table class="onecoltable border w-full bg-whitez text-left mb-[1.875rem]">
                        @php
                            $checkupGroupId = $type->checkUpTypeTables->pluck('check_up_group_id');
                            $tableGroups = App\Models\CheckUpGroup::whereIn('id', $checkupGroupId)->get();
                        @endphp
                        <thead>
                            <tr class="bg-blueMediq">
                                <th colspan="4"
                                    class="helvetica-normal font-bold me-body20 text-whitez text-left px-[20px] py-[12px]">
                                    {{ langbind($type, 'name') }}</th>
                            </tr>
                        </thead>
                        @php
                            $tableGroupIds = App\Models\CheckUpTableType::where('check_up_table_id', $checkuptable->id)
                                ->where('check_up_type_id', $type->id)
                                ->pluck('check_up_group_id')
                                ->toArray();
                        @endphp
                        <tbody class="fourcol-tr">
                            @foreach ($tableGroupIds as $gkey => $groupId)
                                @php
                                    $group = App\Models\CheckUpGroup::where('id', $groupId)->first();
                                    $checkupItemId = App\Models\CheckTableItem::where('check_up_type_id', $type->id)
                                        ->where('check_up_group_id', $group->id)
                                        ->whereIn('check_up_table_type_id', $tablePriIds)
                                        ->pluck('check_up_item_id')
                                        ->toArray();

                                    $totalItems = App\Models\CheckUpItem::whereIn('id', $checkupItemId)->sum('equivalent_number');

                                    $itemIds = count($checkupItemId) <= 3 ? $checkupItemId : [];
                                    $keyCount = count($checkupItemId) > 3 ? count(array_keys(array_chunk($checkupItemId, 3))) : 0;
                                @endphp

                                @if (count($checkupItemId) > 3)
                                    @foreach (array_keys(array_chunk($checkupItemId, 3)) as $keyVal)
                                        @if ($keyVal == 0)
                                            <tr class="cursor-pointer">
                                                <th rowspan="{{ $keyCount }}"
                                                    class="p-[20px] helvetica-normal me-body18 text-darkgray w-full">
                                                    <p>{{ langbind($group, 'name') }}</p>
                                                    {{-- {{$type->id == 2 ? '(Choose '.$group->minimum_item. ' out of '. $totalItems .')' : ''}} --}}
                                                </th>

                                                @foreach (array_chunk($checkupItemId, 3)[$keyVal] as $ikey => $item)
                                                    @php
                                                        $item = App\Models\CheckUpItem::where('id', $item)->first();
                                                    @endphp
                                                    <td
                                                        class="p-[20px] helvetica-normal me-body18 text-darkgray w-full">
                                                        <div class="flex items-baseline relative ">
                                                            <div class="pb-[3px]">
                                                                <span class="block cus-dot"></span>
                                                            </div>
                                                            <p
                                                                class="{{ langbind($item, 'content') != null ? 'has-tooltips' : 'remove-tooltips' }}">
                                                                <span><span class="underline-orange">{{ langbind($item, 'name') }}</span>
                                                                    @if (isset($item['gender']) && $item['gender'] == 0)
                                                                        <img src="{{ asset('frontend/img/male-gen.svg') }}"
                                                                            alt="male" class="gen-icon" />
                                                                    @elseif(isset($item['gender']) && $item['gender'] == 1)
                                                                        <img
                                                                            src="{{ asset('frontend/img/female-gen.svg') }}"
                                                                            alt="female" class="gen-icon" />
                                                                    @endif
                                                                </span>
                                                            </p>
                                                            <div class="tooltipbox">
                                                                <span
                                                                    class="block relative">{!! langbind($item, 'content') != null ? langbind($item, 'content') : '' !!}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @elseif($keyVal != 0)
                                            <tr class="cursor-pointer">
                                                <th rowspan="2"
                                                    class="p-[20px] helvetica-normal me-body18 text-darkgray w-full remove-th hidden">
                                                    <p></p>
                                                </th>

                                                @foreach (array_chunk($checkupItemId, 3)[$keyVal] as $ikey => $item)
                                                    @php
                                                        $item = App\Models\CheckUpItem::where('id', $item)->first();
                                                    @endphp
                                                    <td
                                                        class="p-[20px] helvetica-normal me-body18 text-darkgray w-full">
                                                        <div class="flex items-baseline relative ">
                                                            <div class="pb-[3px]">
                                                                <span class="block cus-dot"></span>
                                                            </div>
                                                            <p
                                                                class="{{ langbind($item, 'content') != null ? 'has-tooltips' : 'remove-tooltips' }}">
                                                                <span><span class="underline-orange">{{ langbind($item, 'name') }}</span>
                                                                    @if (isset($item['gender']) && $item['gender'] == 0)
                                                                        <img src="{{ asset('frontend/img/male-gen.svg') }}"
                                                                            alt="male" class="gen-icon" />
                                                                    @elseif(isset($item['gender']) && $item['gender'] == 1)
                                                                        <img src="{{ asset('frontend/img/female-gen.svg') }}"
                                                                            alt="female" class="gen-icon" />
                                                                    @endif
                                                                </span>
                                                            </p>
                                                            <div class="tooltipbox">
                                                                <span
                                                                    class="block relative">{!! langbind($item, 'content') != null ? langbind($item, 'content') : '' !!}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif

                                @if (count($itemIds) > 0)
                                    <tr class="cursor-pointer">
                                        <th rowspan="1"
                                            class="p-[20px] helvetica-normal me-body18 text-darkgray w-full">
                                            <p>{{ langbind($group, 'name') }}</p>
                                            {{-- {{$type->id == 2 ? '(Choose '.$group->minimum_item. ' out of '. $totalItems .')' : ''}} --}}
                                        </th>

                                        @foreach ($itemIds as $ikey => $item)
                                            @php
                                                $item = App\Models\CheckUpItem::where('id', $item)->first();
                                            @endphp
                                            <td class="p-[20px] helvetica-normal me-body18 text-darkgray w-full">
                                                <div class="flex items-baseline relative ">
                                                    <div class="pb-[3px]">
                                                        <span class="block cus-dot"></span>
                                                    </div>
                                                    <p
                                                        class="{{ langbind($item, 'content') != null ? 'has-tooltips' : 'remove-tooltips' }}">
                                                        <span><span class="underline-orange">{{ langbind($item, 'name') }}</span>
                                                            @if (isset($item['gender']) && $item['gender'] == 0)
                                                                <img src="{{ asset('frontend/img/male-gen.svg') }}"
                                                                    alt="male" class="gen-icon" />
                                                            @elseif(isset($item['gender']) && $item['gender'] == 1)
                                                            <img src="{{ asset('frontend/img/female-gen.svg') }}"
                                                                    alt="female" class="gen-icon" />
                                                            @endif
                                                        </span>
                                                    </p>
                                                    <div class="tooltipbox">
                                                        <span class="block relative">{!! langbind($item, 'content') != null ? langbind($item, 'content') : '' !!}</span>
                                                    </div>
                                                </div>
                                            </td>
                                        @endforeach
                                        @if (count($itemIds) == 2)
                                            <td></td>
                                        @elseif(count($itemIds) == 1)
                                            <td></td>
                                            <td></td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                @endforeach
                {{-- {!! $product->package->content_en !!} --}}

                <!-- tables -->
                @if (isset($product->package->tableHeaders) && count($product->package->tableHeaders) > 0)
                    <table class="twocoltable w-full text-left mb-3 max-w-[1140px]">
                        <thead>
                            <tr class="">

                                <th
                                    class="helvetica-normal font-bold me-body18 text-whitez text-center px-[20px] py-[12px] ">
                                </th>

                                @foreach ($product->package->tableHeaders as $header)
                                    <th
                                        class="helvetica-normal font-bold me-body18 text-whitez text-center px-[20px] py-[12px] bg-blueMediq">
                                        {{ langbind($header, 'header') }}
                                    </th>
                                @endforeach

                            </tr>
                        </thead>

                        @if (count($product->package->tableTitles) > 0)

                            <tbody class="desktop-body bg-whitez">

                                @foreach ($product->package->tableTitles as $title)
                                    <tr>
                                        <th class="p-[20px] helvetica-normal me-body20 text-darkgray w-full">
                                            {{ langbind($title, 'title') }}</th>

                                        @if (count($title->tableColumns) > 0)
                                            @foreach ($title->tableColumns as $col)
                                                <td class="p-[20px] helvetica-normal me-body18 text-darkgray w-full">
                                                    {{ langbind($col, 'col_name') }} </td>
                                            @endforeach
                                        @endif

                                    </tr>
                                @endforeach

                            </tbody>
                        @endif
                        @if (count($product->package->tableHeaders) > 0)
                            <tbody class="mobile-body">
                            @foreach ($product->package->tableHeaders as $hkey => $header)
                                <tr>
                                    <td class="p-[20px] helvetica-normal me-body18 text-darkgray w-full">
                                    {{ langbind($header, 'header') }}
                                    </td>
                                    @if (count($product->package->tableTitles) > 0)
                                    @foreach ($product->package->tableTitles as $tkey => $title)
                                    <td headers="{{ langbind($title, 'title') }}"
                                        class="p-[20px] helvetica-normal me-body18 text-darkgray w-full">
                                       
                                        @if (count($title->tableColumns) > 0)
                                            @foreach ($title->tableColumns as $ckey => $col)
                                             
                                            @if($col->table_title_id ==   $title->id && $hkey == $ckey)
                                                    {{ langbind($col, 'col_name') }} 
                                            @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    @endforeach
                                    @endif
                                        
                                </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                @endif
                <!-- end tables -->

                <!-- card  -->
                @if (isset($product->package->is_table) && $product->package->is_table == 1 && count($product->package->tableTitles) > 0)
                    <table class="onecoltable border w-full bg-whitez text-left mb-[1.875rem]">
                        <thead>
                            <tr class="bg-blueMediq">
                                <th colspan="4"
                                    class="helvetica-normal font-bold me-body20 text-whitez text-left px-[20px] py-[12px]">
                                    {{ langbind($product->package, 'card_name') }}</th>
                            </tr>
                        </thead>
                        <tbody class="fourcol-tr">
                            @foreach ($product->package->tableTitles as $tkey => $title)
                                @php 
                                    $tableColumns = count($title->tableColumns) <= 3 ? $title->tableColumns : [];  
                                    $tableKey = count($title->tableColumns) > 3 ? count(array_keys(array_chunk($title->tableColumns->toArray(), 3))) : 0 ;
                                @endphp
                                @if(count($title->tableColumns) > 3 )
                                    @foreach(array_keys(array_chunk($title->tableColumns->toArray(), 3)) as $val)
                                    @if ($val == 0)
                                    <tr class="cursor-pointer">
                                        <th rowspan="{{$tableKey}}"
                                            class="p-[20px] helvetica-normal me-body18 text-darkgray w-full">
                                            <p>{{ langbind($title, 'title') }}</p>
                                        </th>
                                        @if (count($title->tableColumns) > 0)
                                            @foreach (array_chunk($title->tableColumns->toArray(), 3)[$val] as $ckey => $col)
                                                @php $colVal = (object) $col; @endphp
                                                <td class="p-[20px] helvetica-normal me-body18 text-darkgray w-full">
                                                    <div class="flex items-baseline relative ">
                                                        <div class="pb-[3px]">
                                                            <span class="block cus-dot"></span>
                                                        </div>
                                                        <p class="remove-tooltips">
                                                        {{ langbind($colVal,'col_name') }}
                                                        </p>
                                                        <div class="tooltipbox">
                                                            <span class="block relative"></span>
                                                        </div>
                                                    </div>

                                                </td>
                                            @endforeach
                                        @endif

                                    </tr>
                                    @elseif($val != 0)
                                    <tr class="cursor-pointer">
                                        <!-- <th rowspan="2"
                                            class="p-[20px] helvetica-normal me-body18 text-darkgray w-full ">
                                            <p></p>
                                        </th> -->
                                        @foreach (array_chunk($title->tableColumns->toArray(), 3)[$val] as $ckey => $col)
                                        @php $colVal = (object) $col; @endphp
                                            <td class="p-[20px] helvetica-normal me-body18 text-darkgray w-full">
                                                <div class="flex items-baseline relative ">
                                                    <div class="pb-[3px]">
                                                        <span class="block cus-dot"></span>
                                                    </div>
                                                    <p class="remove-tooltips">
                                                        <span>{{ langbind($col, 'col_name') }}</span>
                                                    </p>
                                                    <div class="tooltipbox">
                                                        <span class="block relative"></span>
                                                    </div>
                                                </div>

                                            </td>
                                        @endforeach

                                    </tr>
                                    @endif
                                    @endforeach
                                @endif

                                @if(count($tableColumns) > 0)
                                <tr class="cursor-pointer">
                                        <th rowspan="1"
                                            class="p-[20px] helvetica-normal me-body18 text-darkgray w-full ">
                                            <p>{{ langbind($title, 'title') }}</p>
                                        </th>
                                        @foreach ($title->tableColumns as $ckey => $col)
                                        @php $colVal = (object) $col; @endphp
                                            <td class="p-[20px] helvetica-normal me-body18 text-darkgray w-full">
                                                <div class="flex items-baseline relative ">
                                                    <div class="pb-[3px]">
                                                        <span class="block cus-dot"></span>
                                                    </div>
                                                    <p class="remove-tooltips">
                                                        <span>{{ langbind($colVal,'col_name') }}</span>
                                                    </p>
                                                    <div class="tooltipbox">
                                                        <span class="block relative"></span>
                                                    </div>
                                                </div>

                                            </td>
                                        @endforeach

                                    </tr>
                                @endif
                            @endforeach

                        </tbody> 
                    </table>
                @endif
                <!-- end card -->

                <!-- content -->
                {!! langbind($product->package, 'content') !!}
                <div class="explain-section hidden">
                    <!-- <div class="explaination-section pt-[37px] pb-[20px] hidden">
                  <div class="explain-header bg-tagbg rounded-[6px] hidden">
                    <h3 class="helvetica-normal me-body20 text-darkgray font-bold p-[10px]">Vaccine Detail</h3>
                  </div>
                  <div class="pt-[22px]">

                  </div>
                </div>
                <div class="explaination-image-section pt-[20px]">

                  <div class="pb-[40px] explaination-img-div">
                    <h6 class="helvetica-normal me-body20 text-darkgray font-bold mb-[12px]">What is theY-Chromosome DNA
                      Test?</h6>
                    <p class="helvetica-normal me-body18 text-darkgray font-normal mb-[12px]">
                      In the 1970’s scientists discovered that fetal DNA passes through the placenta and enters the
                      maternal blood circulatory system in the form of fetal metabolites or fetal DNA fragments. Experts
                      point out that, the longer the fetus stays in the womb, the more concentrated the fetal DNA
                      fragments will be in the maternal blood. In addition, the faster the diffusion process, the more
                      fetal DNA fragments will be found in the maternal blood.To summarize, a longer gestation period
                      and faster diffusion process, results in more fetal DNA fragments in the maternal circulatory
                      system. Nowadays, fetal sex can be determined through the application of advanced maternal blood
                      DNA testing technology as early as 5 gestation weeks. The test involves isolating the fetal DNA
                      fragments from the maternal serum, and then extracting and amplifying them. Once millions or
                      possibly billions of copies have been made, the male DNA will be tested with the Sex-determining
                      Region Y (SRY) markers.<br />In males, Y DNA is the genetic material that is inherited from the
                      father only, which is crucial material for the fetus to develop as a male. Since Y DNA is
                      inherited from the father and then passed on to the son, it can be used in paternity confirmation
                      by simple comparison.
                    </p>
                    <div class="">
                      <img src=" ./img/explain1.png" alt="image" class="">
                    </div>
                  </div>

                  <div class="pb-[40px] explaination-img-div">
                    <h6 class="helvetica-normal me-body20 text-darkgray font-bold mb-[12px]">Why should maternal blood Y
                      chromosome test be done?</h6>
                    <p class="helvetica-normal me-body18 text-darkgray font-normal mb-[12px]">
                      If the mother is a carrier of an X-chromosomal genetic disease gene, a male fetus (containing a
                      Y-chromosome) has a 50% chance of being sick, amblyopia, epilepsy, mental retardation and other
                      diseases, so a Y-chromosome test is needed to detect whether the fetus is a male fetus (
                      Containing Y chromosome), in order to do a good job in dealing with X chromosome genetic diseases.
                    </p>
                    <div class="">
                      <img src=" ./img/explain1.png" alt="image" class="">
                    </div>
                  </div>

                  <div class="pb-[40px] explaination-img-div">
                    <h6 class="helvetica-normal me-body20 text-darkgray font-bold mb-[12px]">Available for 4 weeks
                      Exclusive in Hong Kong</h6>
                    <p class="helvetica-normal me-body18 text-darkgray font-normal mb-[12px]">
                      Due to the advancement of technology, the Y chromosome test report has 64 DNA markers, which is 48
                      more than other tests that only have 16 DNA markers. It can be seen that this test can detect a
                      wider and more subtle range, enabling it to be detected earlier Results; In addition, we also
                      introduced a new Medtimes unique cell-free gene DNA blood collection tube for sample collection.
                      Higher-standard containers can ensure sample quality and maintain test accuracy.
                    </p>
                    <div class="">
                      <img src=" ./img/explain1.png" alt="image" class="">
                    </div>
                  </div>

                  <div class="pb-[40px] explaination-img-div">
                    <h6 class="helvetica-normal me-body20 text-darkgray font-bold mb-[12px]">6 hour Express Report</h6>
                    <p class="helvetica-normal me-body18 text-darkgray font-normal mb-[12px]">
                      Customers only need to complete the appointment sampling at the Times Medical Service Center
                      before the appointed appointment time, and the test report will be issued before 6:00 p.m. on the
                      same day. When the customer makes an appointment, please indicate to upgrade to the 6-hour express
                      report. This service is only applicable to customers who make an appointment with our center from
                      Monday to Saturday.
                    </p>
                    <div class="">
                      <img src=" " alt="image" class="">
                    </div>
                  </div>

                </div> -->
                </div>
                <!-- end content -->


            </div>
            <aside
                class="plan-option-sidebar block w-full md:w-[30%] lg:w-[44%] xl:w-[44.5%] 2xl:w-[42%] 3xl:w-[39.5%] 5xl:w-[40%] 7xl:w-[30%]">
            </aside>
        </div>

    </div>
</section>
