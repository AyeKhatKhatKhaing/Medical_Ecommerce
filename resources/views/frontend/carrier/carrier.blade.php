@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($carrier_page) ? $carrier_page : ''])
@section('content')
    <div component="me-careers-banner" class="me-careers-banner-container">
        <div class="me-careers-banner-content relative">
            <img src="{{ isset($carrier_page) ? asset($carrier_page->img) : asset('frontend/img/flat-lay-pills-stethoscope-arrangement.png') }}"
                alt="flat-lay-pills-stethoscope-arrangement" class=" min-h-[150px] object-cover w-full" />
            <p class="font-bold me-body32 text-far absolute custom-padding-left left-0 top-1/2 -translate-y-1/2">
                {!! langbind($carrier_page, 'title') !!}</p>
        </div>
    </div>
    <div component-name="me-job-opening-table" class="me-job-opening-table-container mt-[60px] lg:mb-[120px] mb-20">
        <div class="me-job-opening-table-content mb-[60px]">
            <h1 class="me-body32 font-bold text-darkgray text-center">{!! langbind($carrier_page, 'sub_title') !!}</h1>
            <p class="me-body20 font-normal text-darkgray sm:mt-10 mt-7 text-center px-5">
                {!! langbind($carrier_page, 'text') !!}
                <br />
                <a href="mailto:admin@mediq.com.hk" class="text-blueMediq">
                    {{-- {{ $carrier_page->email  }} --}}
                    {{ isset($carrier_page) && isset($carrier_page->email) ? $carrier_page->email : '' }}
                </a>
            </p>
            <div class="sm:mt-10 mt-7">
                <table class="w-full job-opening-table">
                    <thead>
                        <tr>
                            <th
                                class=" border-b border-mee4 font-normal me-body23 text-darkgray text-left 4xl:px-10 px-4 py-5 6xl:min-w-[250px]">
                                @lang('labels.career.title')
                            </th>
                            <th
                                class=" border-b border-mee4 font-normal me-body23 text-darkgray text-left 4xl:px-10 px-4 py-5 6xl:min-w-[250px]">
                                @lang('labels.career.department')
                            </th>
                            <th
                                class=" border-b border-mee4 font-normal me-body23 text-darkgray text-left 4xl:px-10 px-4 py-5 6xl:min-w-[250px]">
                                @lang('labels.career.location')
                            </th>
                            <th
                                class=" border-b border-mee4 font-normal me-body23 text-darkgray text-left 4xl:px-10 px-4 py-5 6xl:min-w-[250px]">
                                @lang('labels.career.employment_type')
                            </th>
                            <th
                                class=" border-b border-mee4 font-normal me-body23 text-darkgray text-left 4xl:px-10 px-4 py-5 6xl:min-w-[250px]">
                                @lang('labels.career.working_experience')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carriers as $carrier)
                            <tr>
                                <td headers="Title"
                                    class="sm:max-w-[250px] font-bold text-blueMediq me-body17 py-5 border-b border-mee4">
                                    <a href="{{ route('carrier.detail',$carrier->id) }}" class="w-full text-left 7xl:max-w-[250px]">
                                        <p class="4xl:px-10 px-4">{{ langbind($carrier, 'name') }}</p>
                                    </a>
                                </td>
                                <td headers="Department"
                                    class="sm:max-w-[250px] font-normal text-darkgray me-body17 py-5 border-b border-mee4">
                                    <a href="{{ route('carrier.detail',$carrier->id) }}" class="w-full text-left 7xl:max-w-[250px]">
                                        <p class="4xl:px-10 px-4">
                                            @if($carrier->department)
                                            {{langbind($carrier->department,'name')}} 
                                            @endif
                                        </p>
                                    </a>
                                </td>
                                <td headers="Location"
                                    class="sm:max-w-[250px] font-normal text-darkgray me-body17 py-5 border-b border-mee4">
                                    <a href="{{ route('carrier.detail',$carrier->id) }}" class="w-full text-left 7xl:max-w-[250px]">
                                        <p class="4xl:px-10 px-4">{{langbind($carrier->area,'name')}}</p>
                                    </a>
                                </td>
                                <td headers="Employment Type"
                                    class="sm:max-w-[250px] lg:min-w-[160px] font-normal text-darkgray me-body17 py-5 border-b border-mee4">
                                    <a href="{{ route('carrier.detail',$carrier->id) }}" class="w-full text-left 7xl:max-w-[250px]">
                                        <p class="4xl:px-10 px-4">
                                            @if($carrier->employment_type)
                                            {{config("mediq.employment_types_".app()->getLocale())[$carrier->employment_type]}}
                                            @endif
                                        </p>
                                    </a>
                                </td>
                                <td headers="Working Experience"
                                    class="sm:max-w-[250px] lg:min-w-[180px] font-normal text-darkgray me-body17 py-5 border-b border-mee4">
                                    <a href="{{ route('carrier.detail',$carrier->id) }}" class="w-full text-left 7xl:max-w-[250px]">
                                        <p class="4xl:px-10 px-4">
                                            {{  langbind($carrier, 'minimum_experience')  }}
                                        </p>
                                    </a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        {!! $carriers->appends([])->links('frontend.pagination')->render() !!}
    </div>
@endsection
@push('scripts')
@endpush
