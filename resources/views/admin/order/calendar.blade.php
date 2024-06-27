<script>
    // let backendCalendarFunc;
function openCustomCalendar() {    
    $('#me-backend-calendar-popup').removeClass('hidden');
    renderBackendCalendar()
    backendCalendarFunc?.refetchEvents();
}
function closeCustomCalendar() {
    $('#me-backend-calendar-popup').addClass('hidden');
}
const backendCalendarData = {
    "merchants": [
        {
            "id": 16,
            "name_en": "Bella merchant 1",
            "name_tc": "Bella merchant 1",
            "name_sc": "Bella merchant 1",
            "email": "bellamerchant1@visibleone.com",
            "phone": "0944553273",
            "email_verified_at": null,
            "is_merchant": 1,
            "banner_img": "https://p238dev.visibleone.io/storage/files/1/05UuGuaC1DeBtIUmi0vstl3-15..v1674505590.jpg",
            "introduction_en": "<p>test</p>",
            "introduction_sc": null,
            "introduction_tc": null,
            "latitude": null,
            "longitude": null,
            "icon": "https://p238dev.visibleone.io/storage/files/1/banner1.png",
            "gallery": null,
            "address_tc": null,
            "address_sc": null,
            "address_en": null,
            "mrt_station_name_en": null,
            "mrt_station_name_sc": null,
            "mrt_station_name_tc": null,
            "mrt_station_exit_en": null,
            "mrt_station_exit_sc": null,
            "mrt_station_exit_tc": null,
            "opening_hour": null,
            "announcement_en": "<p>test</p>",
            "announcement_sc": null,
            "announcement_tc": null,
            "created_at": "2023-07-03T06:46:22.000000Z",
            "updated_at": "2023-07-03T08:38:02.000000Z",
            "merchant_locations": [
                {
                    "id": 3,
                    "area_id": 2,
                    "station_name_en": "asfd",
                    "station_name_tc": null,
                    "station_name_sc": null,
                    "full_address_en": "adasfd",
                    "full_address_tc": null,
                    "full_address_sc": null,
                    "latitude": null,
                    "longitude": null,
                    "merchant_id": 16,
                    "created_at": "2023-07-03T08:36:51.000000Z",
                    "updated_at": "2023-07-03T08:36:51.000000Z",
                    "deleted_at": null,
                    "week_days": [
                        {
                            "id": 5,
                            "booking_times": [
                                "3pm",
                                "2pm"
                            ],
                            "is_time": 1,
                            "week_days": "Mon",
                            "location_id": 3,
                            "created_at": "2023-07-03T08:37:30.000000Z",
                            "updated_at": "2023-07-03T08:38:06.000000Z"
                        },
                        {
                            "id": 6,
                            "booking_times": [
                                "AM",
                                "PM"
                            ],
                            "is_time": 1,
                            "week_days": "Sat",
                            "location_id": 3,
                            "created_at": "2023-07-03T08:37:30.000000Z",
                            "updated_at": "2023-07-03T08:38:06.000000Z"
                        }
                    ],
                    "events": [
                        {
                            "id": 10,
                            "title": "Close",
                            "close_date": "2023-09-07",
                            "week_days": "Mon",
                            "location_id": 3,
                            "created_at": "2023-07-03T08:37:39.000000Z",
                            "updated_at": "2023-07-03T08:37:39.000000Z"
                        },
                        {
                            "id": 11,
                            "title": "Close",
                            "close_date": "2023-09-08",
                            "week_days": "Tue",
                            "location_id": 3,
                            "created_at": "2023-07-03T08:37:41.000000Z",
                            "updated_at": "2023-07-03T08:37:41.000000Z"
                        }
                    ]
                }
            ]
        }
    ]
}
var areaIDBackend=backendCalendarData.merchants[0].merchant_locations[0].area_id;
$('#checkout-branch-address').text('');
var checkoutEventDatesBackend = backendCalendarData.merchants[0].merchant_locations[0].events;
var currentDataID = 0;

function getYMDFormat(dateString) {
    var date = new Date(dateString);
    let year = date.toLocaleString('en-us', { year: 'numeric' });
    const longDay = date.toLocaleString('en-us', { weekday: 'long' });
    const shortMonth = date.toLocaleString('en-us', { month: '2-digit' });
    const twoDigitDate = date.toLocaleString('en-us', { day: '2-digit' });
    var curDate = `${year}-${shortMonth}-${twoDigitDate}`;
    return curDate;
}
function renderShowDay(date, lang) {
    const longDay = date.toLocaleString(lang, { weekday: 'long' });
    const shortMonth = date.toLocaleString(lang, { month: 'short' });
    const twoDigitDate = date.toLocaleString(lang, { day: '2-digit' });
    const formatShowDay = `${longDay}, ${shortMonth} ${twoDigitDate}`;
    return formatShowDay;
}
function getDayName(dateString) {
    var date = new Date(dateString);
    let day = date.toLocaleString('en-us', { weekday: 'short' });
    return day;
}
function renderBackendCalendar(lang = "en-us") {
    var locationID=backendCalendarData.merchants[0].merchant_locations[0].area_id;
    renderCalendarBranch(locationID);
    const preferredTimeCalendar = document.getElementById("custom-preferred-time-calendar");
    backendCalendarFunc = new FullCalendar.Calendar(preferredTimeCalendar, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,title,next',
            center: '',
            right: ''
        },
        firstDay: 1,
        locale: lang === "en" ? "en-us" : "zh-cn",
        showNonCurrentDates: false,
        height: 'auto',
        events: function (info, successCallback, failureCallback) {
            $(`#custom-preferred-time-calendar td`).removeClass('fc-day-current');
            $(`#custom-preferred-time-calendar td`).removeClass('day-with-events');
            var currentDate = $('.checkout-date').val();
            locationData = backendCalendarData.merchants[0].merchant_locations.find(x => x.area_id == areaIDBackend);
            checkoutEventDatesBackend = locationData?.events;
            checkoutEventDatesBackend?.map((x) => {
                $(`#custom-preferred-time-calendar td[data-date="${x.close_date}"]`).addClass('day-with-events');
            });
            $('.choosedDate-current-' + currentDataID).text(renderShowDay(new Date(currentDate), lang));
            return successCallback(checkoutEventDatesBackend)
        },
        dateClick: function (e) {
            var targetElem = $(e.dayEl);
            let getdateStr = new Date(e.dateStr);
            if (targetElem.hasClass("fc-day-past") || targetElem.hasClass("day-with-events")) {
                return;
            }
            let day = getdateStr.toLocaleString('en-us', { weekday: 'short' });
            let year = getdateStr.toLocaleString('en-us', { year: 'numeric' });
            const longDay = getdateStr.toLocaleString('en-us', { weekday: 'long' });
            const shortMonth = getdateStr.toLocaleString('en-us', { month: 'short' });
            const twoDigitDate = getdateStr.toLocaleString('en-us', { day: '2-digit' });
            const formatShowDate = `${twoDigitDate} ${shortMonth} ${year}`;
            const formatShowDay = `${longDay}, ${shortMonth} ${twoDigitDate}`;
            $(`#custom-preferred-time-calendar .fc-daygrid-day`).each(function (index) {
                $(this).removeClass("fc-day-today fc-day-current");
            });
            targetElem.addClass("fc-day-current");
            $('.choosedDate-current-' + currentDataID).text(changeLanguageForDateBackendMonth(formatShowDay, lang));
        }
    });   
    
    backendCalendarFunc?.render();    
    
   // backendCalendarFunc?.refetchEvents();
    
}
function renderCalendarBranch(locationID) {
    var count = 0;
    var html = '';
    backendCalendarData?.merchants[0]?.merchant_locations?.map((location, i) => {
        html += `<li class="w-full h-auto"><label for="area${location?.id}-${count}" class="custom-branch-radio-container w-full h-full"><input type="radio" name="area-${count}" id="area${location?.id}-${count}" value="${location?.station_name_en}" class="checkout-branch-list custom-branch-radio opacity-0 absolute" data-address="" data-area="${location?.area_id}" data-id="${count}" ${(i === 0 || locationID == location?.area_id) && "checked"}><span class="w-full flex custom-branch-radio-btn transition-colors duration-300 hover:bg-orangeLight p-2 sm:p-4 lg:p-5 cursor-pointer">${location?.station_name_en}</span></label></li>`
    });
    $('.custom-checkout-branches').html(html);
}
$(document).on('click', '.checkout-date-confirm', function () {
    var id = $(this).data("id");
    var lang = $('html').attr('lang');
    var time = $('.checkout-time' + currentDataID).val();
    var date = $('.checkout-date' + currentDataID).val();
    var currentDateData = new Date(date);
    const longDay = currentDateData.toLocaleString(lang, { weekday: 'short' });
    const shortMonth = currentDateData.toLocaleString(lang, { month: 'short' });
    const longMonth = currentDateData.toLocaleString(lang, { month: 'long' });
    const twoDigitDate = currentDateData.toLocaleString(lang, { day: '2-digit' });
    const year = currentDateData.toLocaleString(lang, { year: 'numeric' });
    var customDate = `${twoDigitDate} ${longMonth} ${year}`;
    var decideLater = $('input[name="decide-later-' + id + '"]').prop('checked');
    if (decideLater == false) {
        $('.booking-selected-dayno-' + id).text(twoDigitDate);
        $('.booking-selected-month-day-' + id).text(shortMonth + ' ' + longDay);
        $('.booking-selected-time-' + id).text(time);
        var location = $('.checkout-location' + currentDataID).val();
        if (location) {
            $('.preferred-name-' + currentDataID).text(location);
            $('.preferredTime-placeholder' + currentDataID).addClass('hidden');
            $('.preferred-date-' + currentDataID).removeClass('hidden');
            $('.preferredTime-detail' + currentDataID).removeClass('hidden');
        } else {
            $('.preferredTime-placeholder' + currentDataID).removeClass('hidden')
            $('.preferredTime-detail' + currentDataID).addClass('hidden')
        }
        $('.custom-remark-title[data-id="' + currentDataID + '"]').text();
        $('.preferred-timeDesc-' + currentDataID).text(time);
        $('.preferred-date-' + currentDataID).text(date ? changeLanguageForCustomDate(date, lang) : '');
        $('.preferred-date-custom-' + currentDataID).text(date ? changeLanguageForCustomDate(date, lang) : '');
    } else {
        $('.booking-selected-dayno-' + id).text('');
        $('.booking-selected-month-day-' + id).text('');
        $('.booking-selected-time-' + id).text('');
        $('.preferredTime-placeholder' + currentDataID).removeClass('hidden')
        $('.preferredTime-detail' + currentDataID).addClass('hidden')
    }

    $('#preferred-time-popup').addClass('hidden');
    hideTimePopup(id);
    $('.checkout-decidelater' + id).val(decideLater);
});
$(document).on('click', '#custom-preferred-time-calendar .fc-next-button', function () {
    bindBackendEventsData(areaIDBackend);
});
$(document).on('click', '#custom-preferred-time-calendar .fc-prev-button', function () {
    bindBackendEventsData(areaIDBackend);
});
function bindBackendEventsData(areaIDBackend) {
    var locationData = backendCalendarData.merchants[0].merchant_locations.find(x => x.area_id == areaIDBackend);
    var eventList = locationData?.events;
    checkoutEventDatesBackend = eventList;
    checkoutEventDatesBackend?.map((x) => {
        $(`#custom-preferred-time-calendar td[data-date="${x.close_date}"]`).addClass('day-with-events');
    });
    backendCalendarFunc?.refetchEvents();
}
function changeLanguageForDateBackend(date, lang) {
    var getdateStr = new Date(date);
    const longDay = getdateStr.toLocaleString(lang, { weekday: 'long' });
    const shortMonth = getdateStr.toLocaleString(lang, { month: 'short' });
    const twoDigitDate = getdateStr.toLocaleString(lang, { day: '2-digit' });
    let year = getdateStr.toLocaleString(lang, { year: 'numeric' });
    const formatShowDate = `${twoDigitDate} ${shortMonth} ${year}`;
    return formatShowDate;
}
function changeLanguageForDateBackendMonth(date, lang) {
    var getdateStr = new Date(date);
    const longDay = getdateStr.toLocaleString(lang, { weekday: 'long' });
    const shortMonth = getdateStr.toLocaleString(lang, { month: 'short' });
    const twoDigitDate = getdateStr.toLocaleString(lang, { day: '2-digit' });
    const formatShowDay = `${longDay}, ${shortMonth} ${twoDigitDate}`;
    return formatShowDay;
}
function changeLanguageForDateBackendLongMonth(date, lang) {
    var getdateStr = new Date(date);
    const longDay = getdateStr.toLocaleString(lang, { weekday: 'short' });
    const shortMonth = getdateStr.toLocaleString(lang, { month: 'long' });
    const twoDigitDate = getdateStr.toLocaleString(lang, { day: '2-digit' });
    const formatShowDay = `${longDay} ${shortMonth} ${twoDigitDate}`;
    return formatShowDay;
}
function changeLanguageForCustomDate(date, lang) {
    var currentDateData = new Date(date);
    const longDay = currentDateData.toLocaleString(lang, { weekday: 'short' });
    const shortMonth = currentDateData.toLocaleString(lang, { month: 'short' });
    const longMonth = currentDateData.toLocaleString(lang, { month: 'long' });
    const twoDigitDate = currentDateData.toLocaleString(lang, { day: '2-digit' });
    const year = currentDateData.toLocaleString(lang, { year: 'numeric' });
    var customDate = `${twoDigitDate} ${longMonth} ${year}`;
    return customDate;
}
</script>