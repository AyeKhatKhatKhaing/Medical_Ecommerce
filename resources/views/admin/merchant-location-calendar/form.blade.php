@extends('admin.layouts.master')
@section('title', 'Merchants Location Calendar')
@section('breadcrumb', 'Merchants')
@section('breadcrumb-info', 'Create Merchant Location Calendar')

@php
$week_days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
@endphp

@section('content')


<div class="container">

     <div class="row">
          <div class="row mb-5">
               <div class="col-md-8">

               </div>
               <div class="col-md-4">
                    <div class="form-group">
                         <div class="float-end">
                              <a href="{{ route('users.list', 'merchant') }}" title="Back">
                                   <button type="button" class="btn btn-secondary btn-sm cancel">
                                        <i class="bi bi-home" aria-hidden="true"></i> Merchant Lists
                                   </button>
                              </a>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <div class="card p-4 mb-5">
          <div class="card-title">
               Merchant Name : {{ $merchant_user->name_en }}
          </div>
          <div class="card-body">

               <!--begin::Accordion-->
               <div class="accordion" id="kt_accordion_1">
                    @foreach($merchant_user->locations as $key=>$location)
                    <div class="accordion-item">
                         <h2 class="accordion-header" id="accordion_header_{{ $location->id }}">
                              <button class="accordion-button fs-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#accordion_body_{{ $location->id }}" aria-expanded="{{ $key == 0 ? true : false }}" aria-controls="accordion_body_{{ $location->id }}">
                                   {{ $location->area->name_en }} 
                              </button>
                         </h2>
                         <div id="accordion_body_{{ $location->id }}" class="accordion-collapse collapse show" aria-labelledby="accordion_header_{{ $location->id }}" data-bs-parent="#kt_accordion_1">
                              <div class="accordion-body">
                                   <div class="row">
                                        <div class="col-6">
                                             <table class="table align-middle table-row-dashed fs-6 gy-5 requestDelete" id="user_table">
                                                  <thead>
                                                       <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th class="text-start min-w-25px">Week Days</th>
                                                            <td>AM/PM</td>
                                                            <th>Booking Time</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @foreach($week_days as $day)
                                                       <tr>
                                                            <td class="min-w-25px">{{ $day }}</td>
                                                            <td>
                                                                 <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                                      <input id="kt_modal_{{ $location->id }}_{{ $day }}" data-id="{{ $day }}" class="form-check-input" type="checkbox" value="" onclick="addTime('{{ $location->id }}_{{ $day }}')" />
                                                                      <span class="form-check-label fw-semibold text-muted" for="kt_modal_{{ $location->id }}_{{ $day }}"></span>
                                                                 </label>
                                                            </td>
                                                            <td>
                                                                 <input type="text" class="form-control form-control-solid" value="" id="kt_tagify_{{ $location->id }}_{{ $day }}" location_id="{{ $location->id }}" week_day="{{ $day }}" />
                                                            </td>
                                                       </tr>
                                                       @endforeach
                                                  </tbody>
                                             </table>
                                        </div>
                                        <div class="col-6">
                                             <div id="kt_docs_fullcalendar_{{ $location->id }}"></div>
                                        </div>
                                   </div>

                              </div>
                         </div>
                    </div>
                    @endforeach
               </div>
               <!--end::Accordion-->

          </div>
     </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
     $.ajaxSetup({
          headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
     });

     toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toastr-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
     };

     // AM/PM
     function addTime(id) {
          inputId = `#kt_tagify_${id}`;
          var is_check = $(`#kt_modal_${id}`).is(':checked')

          if (is_check) {
               var input = document.querySelector(`${inputId}`)
               new Tagify(input)
               input.value = "AM, PM"
               $(`${inputId}`).attr = "readonly"
          } else {
               var input = document.querySelector(`${inputId}`)
               new Tagify(input)
               input.value = ""

               var inputVal = $(`${inputId}`).val();
               var locationId = $(`${inputId}`).attr('location_id')
               var weekDay = $(`${inputId}`).attr('week_day')
               $.ajax({
                    url: "/weekday",
                    data: {
                         bookingtimes: inputVal ? inputVal : [],
                         weekDay: weekDay,
                         location_id: locationId
                    },
                    type: "POST",
                    success: function(data) {
                         // toastr.info(`${close_date} Closed!`);


                    }
               });
          }
     }


     $("input[type='text']").on("change", function(e) {
          var inputVal = $(this).val();
          var locationId = $(this).attr('location_id')
          var weekDay = $(this).attr('week_day')


          // console.log('Input Value ...', inputVal)
          // console.log('Location Id ...', locationId)
          // console.log('Week Day ...', weekDay)

          $.ajax({
               url: "/weekday",
               data: {
                    bookingtimes: inputVal,
                    weekDay: weekDay,
                    location_id: locationId
               },
               type: "POST",
               success: function(data) {
                    // toastr.info(`${close_date} Closed!`);
               }
          });

     });



     $(document).ready(function() {
          let locations = <?= json_encode($merchant_user->locations); ?>;
          let weekdays = <?= json_encode($week_days) ?>;

          if (locations.length < 1) {
               return
          }

          locations.forEach(location => {
               weekdays.forEach(day => {
                    var input = document.querySelector(`#kt_tagify_${location.id}_${day}`)
                    var checkId = `#kt_modal_${location.id}_${day}`
                    new Tagify(input);

                    location.weekdays.forEach(week => {
                         // console.log(week.weekDay, day)
                         if (week.week_days == day) {
                              // console.log(week.booking_times.join(","), typeof(week.week_days))
                              input.value = week.booking_times.join(",")

                              if (week.is_time == 0) {
                                   console.log(week)
                                   $(`${checkId}`).attr('checked', 'checked')
                              }
                         }
                    })

               });
          })

          // bind data



          // Calendar
          locations.forEach(location => {
               loadCalendar(location)
          });

          function loadCalendar(location) {
               var calendarEl = document.getElementById(`kt_docs_fullcalendar_${location.id}`);
               var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                         left: "prev,next today",
                         center: "title",
                         right: "dayGridMonth"
                    },
                    themeSystem: 'bootstrap5',
                    editable: true,
                    events: `/fullcalender?location_id=${location.id}`,
                    displayEventTime: false,
                    editable: true,
                    selectable: true,
                    displayEventTime: false,
                    isMirror: true,
                    dateClick: function(info) {
                         if (info.view.type == "dayGridMonth") {
                              var check = moment(info.date, 'DD.MM.YYYY').format('YYYY-MM-DD');
                              var today = moment(new Date(), 'DD.MM.YYYY').format('YYYY-MM-DD');
                              if (check < today) {
                                   Swal.fire({
                                        text: "Can't select previous dates!",
                                        icon: "warning",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Close",
                                        customClass: {
                                             confirmButton: "btn btn-primary"
                                        },
                                   });
                                   return
                              }

                              var weekDay = moment(info.date).format('ddd')
                              var close_date = moment(info.date, 'DD.MM.YYYY').format('YYYY-MM-DD');

                              $.ajax({
                                   url: "/fullcalenderAjax",
                                   data: {
                                        title: 'Close',
                                        close_date: close_date,
                                        week_days: weekDay,
                                        location_id: location.id,
                                        type: 'add'
                                   },
                                   type: "POST",
                                   success: function(data) {
                                        toastr.info(`${close_date} Closed!`);

                                        calendar.addEvent({
                                             id: data.id,
                                             allDay: true,
                                             title: data.title,
                                             start: check,
                                             end: data.close_date,
                                             backgroundColor: "#ff595f",
                                             borderColor: "#ff595f",
                                             display: "block"
                                        });
                                   }
                              });
                         }
                    },
                    eventClick: function(eventClickInfo) { // 
                         console.log(eventClickInfo)
                         var eventId = eventClickInfo.event.id;
                         $.ajaxSetup({
                              headers: {
                                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                         });
                         $.ajax({
                              url: "/fullcalenderAjax",
                              data: {
                                   id: eventId,
                                   type: 'delete'
                              },
                              type: "POST",
                              success: function(response) {
                                   eventClickInfo.event.remove();
                              },
                              error: function(err) {
                                   eventClickInfo.event.remove();
                              }
                         });
                         // 
                    },
               });
               calendar.render();
          }
     });
</script>
@endpush