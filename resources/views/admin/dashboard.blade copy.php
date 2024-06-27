@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('breadcrumb', 'Admin Dashboard')
@section('breadcrumb-info', 'Admin Dashboard')
@section('content')
   <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Row-->
                <h1 style="margin-bottom: 25px;">Hi <span style="color: #3699FF;">Admin</span>, Welcome to Dashboard</h1>
                <div class="row gy-5 g-xl-8">
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$totalUserOneDay}}</div>
                                <div class="fw-bold text-gray-400">Active User Last 7 Days</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                                <span class="svg-icon svg-icon-gray-100 svg-icon-3x ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5">{{$totalUserOneDay}}</div>
                                <div class="fw-bold text-gray-100">Visitor Right Now</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{$totalPageByDay}}</div>
                                <div class="fw-bold text-white">Total views last 7 days</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Statistics Widget 5-->
                        <a href="#" class="card bg-dark hoverable card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Svg Icon | path: icons/duotune/graphs/gra007.svg-->
                                <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="text-white fw-bolder fs-2 mb-2 mt-5">
                                    {{ Carbon\Carbon::parse($averageBrowser)->format('i:s')}}
                                </div>
                                <div class="fw-bold text-white">Average Engagement Time</div>
                            </div>
                            <!--end::Body-->
                        </a>
                        <!--end::Statistics Widget 5-->
                    </div>
                </div>
                <div class="row gy-5 g-xl-8">
                    <div class="col-xl-3">
                        <div class="row g-4 g-xl-8">
                            <div class="col-xl-12">
                                <!--begin::Statistics Widget 4-->
                                <div class="card card-xl-stretch mb-5 mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-stack card-p flex-grow-1">
                                            <span class="symbol symbol-50px me-2">
                                                <span class="symbol-label bg-light-primary">
                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                                    <span class="svg-icon svg-icon-2x svg-icon-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                                            <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                            <div class="d-flex flex-column text-end">
                                                <span class="text-dark fw-bolder fs-2">{{$totalUserByDay}}</span>
                                                <span class="text-muted fw-bold mt-1">Total Visitors</span>
                                            </div>
                                        </div>
                                        <div class="statistics-totalVisitor" data-kt-chart-color="primary" style="height: 150px;"></div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Statistics Widget 4-->
                            </div>
                        </div>
                        <div class="row g-5 g-xl-8">
                            <div class="col-xl-12">
                                <!--begin::Statistics Widget 4-->
                                <div class="card card-xl-stretch mb-5 mb-xl-8">
                                    <!--begin::Body-->
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-stack card-p flex-grow-1">
                                            <span class="symbol symbol-50px me-2">
                                                <span class="symbol-label bg-light-primary">
                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                                    <span class="svg-icon svg-icon-2x svg-icon-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </span>
                                            <div class="d-flex flex-column text-end">
                                                <span class="text-dark fw-bolder fs-2">{{$totalPageByDay}}</span>
                                                <span class="text-muted fw-bold mt-1">Total Page Views</span>
                                            </div>
                                        </div>
                                        <div class="statistics-pageview-year card-rounded-bottom" data-kt-chart-color="primary" style="height: 150px"></div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Statistics Widget 4-->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <!--begin::Col-->
                        <!-- <div class="col-xl-8 mb-5 mb-xl-10"> -->
                        <!--begin::Chart widget 11-->
                        <div class="card card-xl-stretch mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder text-dark">Visitor Status</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <ul class="nav" id="kt_chart_widget_11_tabs">
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder test1 px-4 me-1" onclick="kt_chartval(1)" data-bs-toggle="tab" id="kt_chart_widget_11_tab_1" href="#kt_chart_widget_11_tab_content_1">Year</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder test2 px-4 me-1 active" onclick="kt_chartval(2)" data-bs-toggle="tab" id="kt_chart_widget_11_tab_2" href="#kt_chart_widget_11_tab_content_2">Month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder test3 px-4 me-1" onclick="kt_chartval(3)" data-bs-toggle="tab" id="kt_chart_widget_11_tab_3" href="#kt_chart_widget_11_tab_content_3">Week</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <input type="hidden" class="kt_chart" value="">
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pb-0 pt-4">
                                <!--begin::Tab content-->
                                <div class="tab-content">
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_1" role="tabpanel">
                                        <!--begin::Statistics-->
                                        <!--end::Statistics-->
                                        <!--begin::Chart-->
                                        <div id="kt_chart_widget_11_chart_1" class="ms-n5 me-n3 min-h-auto w-100" style="height: 300px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tab pane-->
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade active show" id="kt_chart_widget_11_tab_content_2" role="tabpanel">
                                        <!--begin::Chart-->
                                        <div id="kt_chart_widget_11_chart_2" class="ms-n5 me-n3 min-h-auto" style="height: 300px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tab pane-->
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade" id="kt_chart_widget_11_tab_content_3" role="tabpanel">
                                        <!--begin::Chart-->
                                        <div id="kt_chart_widget_11_chart_3" class="ms-n5 me-n3 min-h-auto" style="height: 300px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tab pane-->
                                </div>
                                <!--end::Tab content-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Chart widget 11-->
                        <!-- </div> -->
                        <!--end::Col-->
                        {{-- 
                        <div class="card card-xl-stretch mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Visitor Status</span>
                                </h3>
                                <!--begin::Toolbar-->
                                <div class="card-toolbar" data-kt-buttons="true">
                                    <a class="btn btn-sm btn-color-muted btn-active btn-active-primary active px-4 me-1" id="getpage_year">Year</a>
                                    <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4 me-1" id="getpage_month">Month</a>
                                    <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4" id="getpage_week">Week</a>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Chart-->
                                <div id="kt_charts_viewPage" style="height: 350px"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::Body-->
                        </div>
                        --}}
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-xl-stretch mb-xl-8">
                            <!--begin::Beader-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Website Visit by Devices</span>
                                    <!-- <span class="text-muted fw-bold fs-7">個瀏覽者</span> -->
                                </h3>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column">
                                <div class="flex-grow-1"  >
                                    <div id="device_category" data-kt-chart-color="success" style="height: 200px"></div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!--begin::Col-->
                        <div class="col-xl-12">
                            <!--begin::Maps widget 1-->
                            <div class="card card-flush h-md-100">
                                <!--begin::Header-->
                                <div class="card-header pt-7">
                                    <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder text-dark">Website Visit by Countries</span>
                                    </h3>
                                    <!--end::Title-->
                                    <!--begin::Toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Menu-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body d-flex flex-center">
                                    <!--begin::Map container-->
                                    <div id="kt_maps_widget_1_map" class="w-100 h-350px"></div>
                                    <!--end::Map container-->
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Maps widget 1-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="col-md-6">
                        <div class="col-xl-12">
                            <!--begin::Table Widget 5-->
                            <div class="card card-flush h-xl-100">
                                <!--begin::Card header-->
                                <div class="card-header pt-7">
                                    <!--begin::Title-->
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder text-dark">Top Visit by Countries</span>
                                        <!-- <span class="text-gray-400 mt-1 fw-bold fs-6">Total 2,356 Items in the Stock</span> -->
                                    </h3>
                                    <!--end::Title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Table-->
                                    <div id="kt_table_widget_5_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable no-footer" id="kt_table_widget_5_table">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <!--begin::Table row-->
                                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                        <!-- <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1" aria-label="Item: activate to sort column ascending" style="width: 100px;">#</th> -->
                                                        <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1" aria-label="Item: activate to sort column ascending" style="width: 100px;">COUNTRY</th>
                                                        <th class="text-end pe-3 min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Product ID" style="width: 100px;">COUNTRY ID</th>
                                                        <th class="text-end pe-3 min-w-150px sorting" tabindex="0" aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1" aria-label="Date Added: activate to sort column ascending" style="width: 150px;">VIEWS PER USER </th>
                                                        <!--end::Table row-->
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody class="fw-bolder text-gray-600">
                                                    @foreach($userMostVisitCountry as $key => $item)
                                                    <tr class="odd">
                                                        <!-- <td class="">{{$key+1}}</td> -->
                                                        <td class="">{{$item['country']}}</td>
                                                        <!--end::Product ID-->
                                                        <!--begin::Date added-->
                                                        <td class="text-end">{{$item['countryId']}}</td>
                                                        <!--end::Date added-->
                                                        <!--begin::Price-->
                                                        <td class="text-end">{{$item['totalUsers']}}</td>
                                                        <!--end::Price-->
                                                        <!--begin::Status-->
                                                        <!--end::Qty-->
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
                                            <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"></div>
                                        </div>
                                    </div>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Table Widget 5-->
                        </div>
                        <!--end::Row-->
                    </div>
                </div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <!--end::Row-->
            <!--begin::Modals-->
            <!--begin::Modal - New Product-->
            <!--end::Modal - New Product-->
            <!--begin::Modal - New Product-->
            <!--end::Modal - New Product-->
            <!--end::Modals-->
        </div>
        <!--end::Container-->
    </div>
<!--end::Post-->
<!--end::Content-->
@endsection
@push('scripts')
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<!--end::Page Vendors Javascript-->
<script>
    $(document).ready(function(){
        var e=document.querySelectorAll(".statistics-totalVisitor");
    [].slice.call(e).map((function(e){
        var t=parseInt(KTUtil.css(e,"height"));
    if(e){var a=e.getAttribute("data-kt-chart-color"),
    o=KTUtil.getCssVariableValue("--bs-gray-800"),
    s=KTUtil.getCssVariableValue("--bs-"+a),
    r=KTUtil.getCssVariableValue("--bs-light-"+a);
    
    new ApexCharts(e,
        {
    series:[{
        name:"Visitors",
        data:{!! json_encode($usertotal) !!}
    }
    ],
    chart:{
    fontFamily:"inherit",
    type:"area",
    height:t,
    toolbar:{show:!1},
    zoom:{enabled:!1},
    sparkline:{enabled:!0}},
    plotOptions:{},
    legend:{show:!1},
    dataLabels:{enabled:!1},
    fill:{type:"solid",opacity:.3},
    stroke:{
        curve:"smooth",show:!0,width:3,colors:[s]},
    xaxis:{
        categories:{!! json_encode($userDate) !!},
        axisBorder:{show:!1},
        axisTicks:{show:!1},
        labels:{show:!1,style:{colors:o,fontSize:"12px"}},
        crosshairs:{show:!1,position:"front",
        stroke:{color:"#E4E6EF",width:1,dashArray:3}},
        tooltip:{enabled:!0,formatter:void 0,offsetY:0,style:{fontSize:"12px"}}
    },
        yaxis:{
            min:0,max:60,labels:{show:!1,style:{colors:o,fontSize:"12px"}}
        },
        states:{
            normal:{filter:{type:"none",value:0}
            },
            hover:{
                filter:{type:"none",value:0}
            },
            active:{
                allowMultipleDataPointsSelection:!1,filter:{type:"none",value:0}
            }
        },
        tooltip:{
            style:{fontSize:"12px"},
            y:{formatter:function(e){return e}}
        },
        colors:[s],markers:{colors:[s],strokeColor:[r],strokeWidth:3}}).render()
    }
    }));
    });
    $(document).ready(function(){
        var e=document.querySelectorAll(".statistics-pageview-year");
    [].slice.call(e).map((function(e){
        var t=parseInt(KTUtil.css(e,"height"));
    if(e){var a=e.getAttribute("data-kt-chart-color"),
    o=KTUtil.getCssVariableValue("--bs-gray-800"),
    s=KTUtil.getCssVariableValue("--bs-"+a),
    r=KTUtil.getCssVariableValue("--bs-light-"+a);
    new ApexCharts(e,
        {
    series:[{
        name:"PageViews",
        data:{!! json_encode($pageTotal) !!}
    }
    ],
    chart:{
    fontFamily:"inherit",
    type:"area",
    height:t,
    toolbar:{show:!1},
    zoom:{enabled:!1},
    sparkline:{enabled:!0}},
    plotOptions:{},
    legend:{show:!1},
    dataLabels:{enabled:!1},
    fill:{type:"solid",opacity:.3},
    stroke:{
        curve:"smooth",show:!0,width:3,colors:[s]},
    xaxis:{
        categories:{!! json_encode($pageDate) !!},
        axisBorder:{show:!1},
        axisTicks:{show:!1},
        labels:{show:!1,style:{colors:o,fontSize:"12px"}},
        crosshairs:{show:!1,position:"front",
        stroke:{color:"#E4E6EF",width:1,dashArray:3}},
        tooltip:{enabled:!0,formatter:void 0,offsetY:0,style:{fontSize:"12px"}}
    },
        yaxis:{
            min:0,max:100,labels:{show:!1,style:{colors:o,fontSize:"12px"}}
        },
        states:{
            normal:{filter:{type:"none",value:0}
            },
            hover:{
                filter:{type:"none",value:0}
            },
            active:{
                allowMultipleDataPointsSelection:!1,filter:{type:"none",value:0}
            }
        },
        tooltip:{
            style:{fontSize:"12px"},
            y:{formatter:function(e){return e}}
        },
        colors:[s],markers:{colors:[s],strokeColor:[r],strokeWidth:3}}).render()
    }
    }));
    });
    
    $(document).ready(function(){
        
    
    var e=document.getElementById("device_category");
    
    var t=parseInt(KTUtil.css(e,"height"));
    if(e){
    var a=e.getAttribute("data-kt-chart-color"),
    o=KTUtil.getCssVariableValue("--bs-"+a),
    s=KTUtil.getCssVariableValue("--bs-light-"+a),
    r=KTUtil.getCssVariableValue("--bs-gray-700");
    var options =   
    {
    plotOptions: {
      pie: {
        donut: {
          labels: {
            show: true,
            name: {
                show: true,
            },
            value: {
                show: true,
            },
            total:{
                show:true,
            }
          }
        }
      }
    },
    chart: {
        height: 380,
        width: "100%",
        type: "donut",
    },
    
    series: {!! json_encode($userCount) !!},
    labels: {!! json_encode($deviceName) !!},
    legend: {
    // Show the legend
        show: true,
        markers: {
        // Set the legend colors as the ones passed in
        
        }
    },
    tooltip: {
        enabled: true,
        fillSeriesColor: true
    },
    colors: {!! json_encode($colourCode) !!} //Add this line
    };
    
       };
       var chart = new ApexCharts(e, options);
      
       chart.render();
       
    });
    
    
    // Class definition
    $(document).ready(function(){
    var KTChartsWidget11 = function () {
        // Private methods
        var initChart = function(tabSelector, chartSelector, data, chatDate,initByDefault) {
            var element = document.querySelector(chartSelector);
            var height = parseInt(KTUtil.css(element, 'height'));
            if (!element) {
                return;
            }        
            // var cate_data = {!! json_encode($userDateMonth)!!};
            var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
            var borderColor = KTUtil.getCssVariableValue('--bs-border-dashed-color');
            var baseColor = KTUtil.getCssVariableValue('--bs-success');
            var lightColor = KTUtil.getCssVariableValue('--bs-success');
    
            var options = {
                series: [{
                    name: 'visitor',
                    data: data
                }],            
                chart: {
                    fontFamily: 'inherit',
                    type: 'area',
                    height: height,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
    
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: true
                },
                fill: {
                    type: "gradient",
                    gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.3,
                    opacityTo: 0.7,
                    stops: [0, 90, 100]
                    }
                },
                stroke: {
                    curve: 'smooth',
                    show: true,
                    width: 3,
                    colors: [baseColor]
                },
                xaxis: {
                    categories: chatDate,
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false
                    },
                    tickAmount: 5,
                    labels: {
                        rotate: 0,
                        rotateAlways: true,
                        style: {
                            colors: labelColor,
                            fontSize: '13px'
                        }
                    },
                    crosshairs: {
                        position: 'front',
                        stroke: {
                            color: baseColor,
                            width: 1,
                            dashArray: 3
                        }
                    },
                    tooltip: {
                        enabled: true,
                        formatter: undefined,
                        offsetY: 0,
                        style: {
                            fontSize: '13px'
                        }
                    }
                },
                yaxis: {
                    tickAmount: 5,
                    max: 50,
                    min: 0,
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: '13px'
                        }                     
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: false,
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px'
                    },
                    y: {
                        formatter: function (val) {
                            return + val  
                        }
                    }
                },
                colors: [lightColor],
                grid: {
                    borderColor: borderColor,
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }
                },
                markers: {
                    strokeColor: baseColor,
                    strokeWidth: 3
                }
            };
    
            var chart = new ApexCharts(element, options);
            var init = false;
            var tab = document.querySelector(tabSelector);
            if (initByDefault === true) {
                chart.render();
                init = true;
            }        
    
            tab.addEventListener('shown.bs.tab', function (event) {
                if (init == false) {
                    chart.render();
                    init = true;
                }
            })   
        }
    
        // Public methods
        return {
            init: function () {           
                initChart('#kt_chart_widget_11_tab_1', '#kt_chart_widget_11_chart_1', [{!! json_encode($usertotalyear) !!}],{!! json_encode($userDateYear)!!}, false);
                initChart('#kt_chart_widget_11_tab_2', '#kt_chart_widget_11_chart_2', {!! json_encode($usertotalmonth) !!},{!! json_encode($userDateMonth)!!}, true); 
                initChart('#kt_chart_widget_11_tab_3', '#kt_chart_widget_11_chart_3', {!! json_encode($usertotal) !!},{!! json_encode($userDate)!!}, false); 
            }   
        }
    }();
    
    // Webpack support
    if (typeof module !== 'undefined') {
        module.exports = KTChartsWidget11;
    }
    
    // On document ready
    KTUtil.onDOMContentLoaded(function() {
        KTChartsWidget11.init();
    });
    })
    
    
    // Class definition
    var KTMapsWidget1 = (function () {
    // Private methods
    var initMap = function () {
        // Check if amchart library is included
        if (typeof am5 === 'undefined') {
            return;
        }
    
        var element = document.getElementById("kt_maps_widget_1_map");
    
        if (!element) {
            return;
        }
    
        // On amchart ready
        am5.ready(function () {
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new(element);
    
            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([am5themes_Animated.new(root)]);
    
            // Create the map chart
            // https://www.amcharts.com/docs/v5/charts/map-chart/
            var chart = root.container.children.push(
                am5map.MapChart.new(root, {
                    panX: "translateX",
                    panY: "translateY",
                    projection: am5map.geoMercator(),
    	paddingLeft: 0,
    	paddingrIGHT: 0,
    	paddingBottom: 0
                })
            );
    
            // Create main polygon series for countries
            // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
            var polygonSeries = chart.series.push(
                am5map.MapPolygonSeries.new(root, {
                    geoJSON: am5geodata_worldLow,
                    exclude: ["AQ"],
                })
            );
    
            polygonSeries.mapPolygons.template.setAll({
                tooltipText: "{name}",
                toggleKey: "active",
                interactive: true,
    fill: am5.color(KTUtil.getCssVariableValue('--bs-gray-300')),
            });
    
            polygonSeries.mapPolygons.template.states.create("hover", {
                fill: am5.color(KTUtil.getCssVariableValue('--bs-success')),
            });
    
            polygonSeries.mapPolygons.template.states.create("active", {
                fill: am5.color(KTUtil.getCssVariableValue('--bs-success')),
            });
    
            // Highlighted Series
            // Create main polygon series for countries
            // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
            var polygonSeriesHighlighted = chart.series.push(
                am5map.MapPolygonSeries.new(root, {
                    //geoJSON: am5geodata_usaLow,
    	geoJSON: am5geodata_worldLow,
    	include: {!! json_encode($userMostVisitCountryMap)!!}
                })
            );
    
            polygonSeriesHighlighted.mapPolygons.template.setAll({
                tooltipText: "{name}",
                toggleKey: "active",
                interactive: true,
            });
    
            var colors = am5.ColorSet.new(root, {});
    
            polygonSeriesHighlighted.mapPolygons.template.set(
                "fill",
    am5.color(KTUtil.getCssVariableValue('--bs-primary')),
            );
    
            polygonSeriesHighlighted.mapPolygons.template.states.create("hover", {
                fill: root.interfaceColors.get("primaryButtonHover"),
            });
    
            polygonSeriesHighlighted.mapPolygons.template.states.create("active", {
                fill: root.interfaceColors.get("primaryButtonHover"),
            });
    
            // Add zoom control
            // https://www.amcharts.com/docs/v5/charts/map-chart/map-pan-zoom/#Zoom_control
            //chart.set("zoomControl", am5map.ZoomControl.new(root, {}));
    
            // Set clicking on "water" to zoom out
            chart.chartContainer
                .get("background")
                .events.on("click", function () {
                    chart.goHome();
                });
    
            // Make stuff animate on load
            chart.appear(1000, 100);
        }); // end am5.ready()
    };
    
    // Public methods
    return {
        init: function () {
            initMap();
        },
    };
    })();
    
    // Webpack support
    if (typeof module !== "undefined") {
    module.exports = KTMapsWidget1;
    }
    
    // On document ready
    KTUtil.onDOMContentLoaded(function () {
    KTMapsWidget1.init();
    });
    
</script>
@endpush
