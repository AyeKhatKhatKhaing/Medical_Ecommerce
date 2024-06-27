<script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
<script>
var checkoutData = [];
var clocale = {!! json_encode(lang())!!};
if(clocale == 'zh-hk'){
    clocale = 'tc';
}else if(clocale == 'zh-cn'){
    clocale = 'sc';
}else{
    clocale = 'en';
}
var fullAddress = `full_address_${clocale}`;
var areaName = `name_${clocale}`;
//console.log("checkoutData ",$('.location-json-data').val(),JSON.parse($('.location-json-data').val()))
$('.checkout-branch-address').text('');

var checkoutEventDates = [];
var checkoutEventTimes = [];
var currentDataID = 0;
var checkoutCalendarFunc;
var defaultSelectedDate;

function getYMDFormat(dateString) {
    var date = new Date(dateString);
    var year = date.toLocaleString('en-us', {
        year: 'numeric'
    });
    var longDay = date.toLocaleString('en-us', {
        weekday: 'long'
    });
    var shortMonth = date.toLocaleString('en-us', {
        month: '2-digit'
    });
    var twoDigitDate = date.toLocaleString('en-us', {
        day: '2-digit'
    });
    var curDate = `${year}-${shortMonth}-${twoDigitDate}`;
    return curDate;
}

function renderShowDay(date, lang) {
    const longDay = date.toLocaleString(lang, {
        weekday: 'long'
    });
    const shortMonth = date.toLocaleString(lang, {
        month: 'short'
    });
    const twoDigitDate = date.toLocaleString(lang, {
        day: '2-digit'
    });
    const formatShowDay = `${longDay}, ${shortMonth} ${twoDigitDate}`;
    return formatShowDay;

}
function renderShowLongDay(date, lang) {
    const longDay = date.toLocaleString(lang, {
        weekday: 'long'
    });
    const shortMonth = date.toLocaleString(lang, {
        month: 'long'
    });
    const twoDigitDate = date.toLocaleString(lang, {
        day: '2-digit'
    });
    const formatShowDay = (lang=="en"?`${longDay}, ${shortMonth} ${twoDigitDate}`:`${longDay}, ${shortMonth}${twoDigitDate}`);
    return formatShowDay;

}
function getDayName(dateString) {
    var date = new Date(dateString);
    var day = date.toLocaleString('en-us', {
        weekday: 'short'
    });
    return day;
}

function setDefaultLocation() {
    $('.checkout-data-location-id').each(function() {
        var location = checkoutData;
        $(this).val(location[0]?.area.id);
        $('input[value="' + location[0]?.area[areaName] + '"].checkout-branch-list').prop('checked', true)
    })
}

function renderCheckoutCalendar(currentID, lang = "en-us") {
    var language=lang;
     if(lang=="zh-hk"){
        language="zh"
    }
    else if(lang=="sc"){
        language="zh"
    }
    if ($('.location-json-data-' + currentID).val() != '[{') {
        checkoutData = JSON.parse($('.location-json-data-' + currentID).val())
    }
    // setDefaultLocation()
    
    var areaID = $('.checkout-location-id' + currentID).val();
    if (areaID == undefined || areaID == null || areaID == "") {

        areaID = checkoutData[0]?.area?.id;

       // $('.checkout-location-id' + currentID).val(areaID)

    }
   // console.log('checkoutDatas',checkoutData,areaID)
    var locationData = checkoutData.find(x => x.area.id == areaID);
    $('#checkout-branch-address-' + currentID).text(locationData?locationData[fullAddress]:'');

    var checkoutEventDates = locationData?.events;
    var checkoutEventTimes = locationData?.week_days;
    currentDataID = currentID;
    var locationID = $('.checkout-location-id' + currentDataID).val();
    bindCalendarEventsData(locationID)
    var location = $('.checkout-location' + currentDataID).val();
    
    var selectedDateData = $('.checkout-date' + currentDataID).val();
    var selectedTimeDuration = $('.checkout-time' + currentDataID).val();
    // initializePreferredTimeData()
    
    if(locationID){
        locationID=locationID;
    }else{
        locationID=checkoutData[0]?.area_id;
        $('.checkout-location-id' + currentDataID).val(locationID);
    }
    renderCheckoutBranch(locationID, currentID)
    var preferredTimeCalendar = document.getElementById("preferred-time-calendar-" + currentID);
    checkoutCalendarFunc = new FullCalendar.Calendar(preferredTimeCalendar, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,title,next',
            center: '',
            right: ''
        },
        firstDay: 0, 
        showNonCurrentDates: false,
        locale: lang === "en" ? "en-us" : lang=="zh-cn"?"zh-cn":'zh-tw',
        height: 'auto',
        events: function(info, successCallback, failureCallback) {
            var areaID = $('.checkout-location-id' + currentID).val();
            var currentDate = $('.checkout-date' + currentID).val();
            //$(`#preferred-time-calendar-${currentID} td`).removeClass('fc-day-current');
            $(`#preferred-time-calendar-${currentID} td`).removeClass('day-with-events');
            var curLocationData = checkoutData.find(x => x.area.id == areaID);
            locationData = curLocationData?curLocationData:locationData;
            checkoutEventTimes = locationData?.week_days;
            checkoutEventDates = locationData?.events;
            checkoutEventDates?.map((x) => {
                $(`#preferred-time-calendar-${currentID} td[data-date="${x.close_date}"]`)
                        .addClass('day-with-events');
            })
            $('.choosedDate-current-' + currentDataID).text(currentDate?renderShowLongDay(new Date(currentDate), language):renderShowLongDay(new Date(), language));
            return successCallback(checkoutEventDates)
        },
        dateClick: function(e) {
            $('.checkout-time' + currentDataID).val('');
            var targetElem = $(e.dayEl);
            var getdateStr = new Date(e.dateStr);
            if (targetElem.hasClass("fc-day-past") || targetElem.hasClass("day-with-events")||getdateStr.getDate()==new Date().getDate()) {
                return;
            }
            var day = getdateStr.toLocaleString('en', {
                weekday: 'short'
            });
            var year = getdateStr.toLocaleString(language, {
                year: 'numeric'
            });
             var yearEn = getdateStr.toLocaleString('en', {
                year: 'numeric'
            });
            var longDay = getdateStr.toLocaleString(language, {
                weekday: 'long'
            });
            var shortMonth = getdateStr.toLocaleString(language, {
                month: 'short'
            });
            var longMonth = getdateStr.toLocaleString(language, {
                month: 'long'
            });
            var shortMonthEn = getdateStr.toLocaleString('en', {
                month: 'short'
            });
            var twoDigitDate = getdateStr.toLocaleString(language, {
                day: '2-digit'
            });
            var twoDigitDateEn = getdateStr.toLocaleString('en', {
                day: '2-digit'
            });
            var formatShowDate = `${twoDigitDate} ${shortMonth} ${year}`;
            var formatShowDateEn = `${twoDigitDateEn} ${shortMonthEn} ${yearEn}`;
            var formatShowDay = `${longDay}, ${shortMonth} ${twoDigitDate}`;
            var formatShowLongDay = (language=="en"?`${longDay}, ${longMonth} ${twoDigitDate}`:`${longDay}, ${longMonth}${twoDigitDate}`);
            bindCheckoutBookingTime(day, 0, currentDataID,checkoutEventTimes);
            $(`#preferred-time-calendar-${currentID} .fc-daygrid-day`).each(function(index) {
                $(this).removeClass("fc-day-today fc-day-current");
            });
            targetElem.addClass("fc-day-current");
            $('.checkout-date').val(formatShowDateEn);
            $('.checkout-date' + currentDataID).val(e.dateStr);
            if (locationID == "") {
                //  $('.checkout-location-id' + currentDataID).val(checkoutData.merchant_locations[0].area_id)
                //  $('.checkout-location' + currentDataID).val(checkoutData.merchant_locations[0].area[areaName])
            }
            $('.choosedDate-current-' + currentDataID).text(formatShowLongDay);

        }
    });
    if (checkoutCalendarFunc) {
        checkoutCalendarFunc.render();
        checkoutCalendarFunc.refetchEvents();
    }
  //  selectedDateData = $('.checkout-date' + currentDataID).val();
    if (selectedDateData) {
        var curDate = getYMDFormat(selectedDateData);
        var isClose=checkoutEventDates.find(x=>x.close_date==curDate);
        $(`#preferred-time-calendar-${currentID} td[data-date="${curDate}"]`).addClass('fc-day-current');
        var selectedDay = getDayName(selectedDateData);
        if(isClose==null || isClose==undefined){
        bindCheckoutBookingTime(selectedDay, selectedTimeDuration, currentDataID,checkoutEventTimes);    
        }
        

        var currentDate = getYMDFormat(new Date());
       $(`#preferred-time-calendar-${currentID} td[data-date="${currentDate}"]`).removeClass('fc-day-today');
    } 
    // else {
    //     var curDate = getYMDFormat(new Date());
    //     $(`#preferred-time-calendar-${currentID} td[data-date="${curDate}"]`).addClass('fc-day-current');
    //     var selectedDay = getDayName(new Date());
    //     bindCheckoutBookingTime(selectedDay, selectedDateData, currentDataID,checkoutEventTimes);
    // }
    $('.preferred-time-popup-' + currentDataID + ' input[name="preferredClockSystem-' + currentDataID + '"][value="' +
        selectedTimeDuration + '"]').prop('checked', true)
    $('.checkout-branches-' + currentDataID + ' input[value="' + location + '"]').prop('checked', true);
    if(location){
        
    }else{
        $('.checkout-location' + currentDataID).val(locationData.area[areaName]);
        $('.checkout-location-id' + currentDataID).val(locationData.area_id);
    }
    
    var decideLater = $('.checkout-decidelater' + currentDataID).val(); 
    if(decideLater==1 || decideLater==true || decideLater=="1" || decideLater =="true"){
      $('.preferred-time-popup-'+currentDataID+' .choose-time-container').css('opacity','0.3');
      $('.preferredTime-placeholder'+currentDataID+' .edit-btn[data-id="'+currentDataID+'"]').removeClass('hidden');
    }else{
      $('.preferredTime-placeholder'+currentDataID+' .edit-btn[data-id="'+currentDataID+'"]').addClass('hidden');  
    }
    checkActiveDefaultDate(renderDateFormatYMD(new Date(),'-'),checkoutEventDates,currentID,checkoutEventTimes)
    //
    //$('.checkout-location' + currentDataID).val(locationData.area[areaName]);
}

function bindCheckoutBookingTime(selectedDay, selectedTimeDuration, currentDataID,eventTimes) {
    var dayname=selectedDay;
    if(!selectedDay){
         var curDate = getYMDFormat($('.checkout-date' + currentDataID).val());
        dayname = getDayName(curDate);   
    }
    
    var currentData = eventTimes?.find(x => x.week_days == selectedDay);
    //console.log("currentData ",currentData,eventTimes)
    var areaID = $('.checkout-location-id' + currentDataID).val();
    renderCheckoutBookingTime(currentData?.booking_times, selectedTimeDuration, currentDataID);
}


function renderCheckoutBranch(locationID, divID) {
    var count = 0;
    var html = '';
    checkoutData?.map((location, i) => {
        html +=
            `<li class="w-full h-auto"><label for="area${location.area.id}-${count}" class="custom-branch-radio-container w-full h-full"><input type="radio" name="area-${count}" id="area${location.area.id}-${count}" value="${location.area[areaName]}" class="checkout-branch-list custom-branch-radio opacity-0 absolute" data-address="" data-area="${location.area.id}" data-id="${count}" ${(locationID == location.area.id) && "checked"}><span class="w-full flex custom-branch-radio-btn transition-colors duration-300 hover:bg-orangeLight p-2 sm:p-4 lg:p-5 cursor-pointer">${location.area[areaName]}</span></label></li>`
    });
    if(locationID){
        $('.checkout-location-id' + currentDataID).val(locationID);
        $('.preferred-time-popup-'+currentDataID+' .choose-time-picker').css('opacity',1);
    $('.preferred-time-popup-'+currentDataID+' .choose-time-picker').css('pointer-events','all');
    }else{
        $('.preferred-time-popup-'+currentDataID+' .choose-time-picker').css('opacity','0.5');
    $('.preferred-time-popup-'+currentDataID+' .choose-time-picker').css('pointer-events','none');
    }
    $('.checkout-branches-' + divID).html(html);
}
$(document).on('change', 'input.checkout-branch-list', function() {
    var areaID = $(this).data('area');
    var locationData = checkoutData.find(x => x.area.id == areaID);
    var eventList = locationData?.events;
    checkoutEventDates = eventList;
    checkoutEventTimes = locationData?.week_days;
    checkoutCalendarFunc.render();
    checkoutCalendarFunc.refetchEvents();
    $('.checkout-location-id' + currentDataID).val(areaID);
    $('#checkout-branch-address-' + currentDataID).text(locationData[fullAddress]);
    $('.checkout-location').val(locationData.area[areaName]);
    $('.checkout-location' + currentDataID).val(locationData.area[areaName]);
    var currentDate = new Date();
    var lang = $('html').attr('lang');
    if(lang=="zh-hk"){
        lang="zh"
    }
    else if(lang=="zh-cn"){
        lang="zh"
    }
    var year = currentDate.toLocaleString(lang, {
        year: 'numeric'
    });
    var shortMonth = currentDate.toLocaleString(lang, {
        month: '2-digit'
    });
    var twoDigitDate = currentDate.toLocaleString('en-us', {
        day: '2-digit'
    });
    
     var longDay = currentDate.toLocaleString(lang, {
                weekday: 'long'
            });
            var shortMonthCust = currentDate.toLocaleString(lang, {
                month: 'short'
            });
            var longMonthCust = currentDate.toLocaleString(lang, {
                month: 'long'
            });
            var twoDigitDateCust = currentDate.toLocaleString(lang, {
                day: '2-digit'
            });
    $(`#preferred-time-calendar-${currentDataID} td[data-date="${year}-${shortMonth}-${twoDigitDate}"]`)
        .addClass('fc-day-current');
    $(`.checkout-booking-time-container-` + currentDataID).html('');
    $('.checkout-time' + currentDataID).val('');
    var formatShowDay = `${longDay}, ${shortMonth} ${twoDigitDate}`;
    var formatShowLongDay = (lang=="en"?`${longDay}, ${longMonthCust} ${twoDigitDate}`:`${longDay}, ${longMonthCust}${twoDigitDate}`);
    $('.preferred-time-popup-'+currentDataID+' .choose-time-picker').css('opacity',1);
    $('.preferred-time-popup-'+currentDataID+' .choose-time-picker').css('pointer-events','all');
    $('.choosedDate-current-' + currentDataID).text(formatShowLongDay);
    checkActiveDefaultDate(renderDateFormatYMD(new Date(),'-'),checkoutEventDates,currentDataID,checkoutEventTimes)
})

function renderCheckoutBookingTime(timesData, selectedTime, currentDataID) {
    var html = '';
    var locationID = $('.checkout-location-id' + currentDataID).val();
    timesData?.map((x, index) => {
        $('.checkout-time' + currentDataID).val(selectedTime?selectedTime:timesData[0]);
        var isChecked = selectedTime == x ? 'checked' :index==0?'checked': '';
        let showTime = previewTime(x);
        html += `<label for="${x}" class="inline-block custom-radio-container checkout-booking-time mb-2 last:mb-0 w-[calc(100%-7px)]">  
      <input type="radio" name="preferredClockSystem-${currentDataID}" id="${x}" value="${x}" class="preferredClockSystem preferredClockSystem-${currentDataID} opacity-0 absolute" ${isChecked}/>  
      <span class="border-1 border-darkgray flex custom-radio-btn outlined-btn-hover rounded-lg py-2 px-4 justify-center">${showTime}</span>
    </label>`;
    });
    $(`.checkout-booking-time-container-` + currentDataID).html(html);
}
function checkoutDateConfirm(id){
    var isError=false;
    var lang = $('html').attr('lang');
    if(lang=="zh-hk"){
        lang="zh"
    }
    else if(lang=="zh-cn"){
        lang="zh"
    }
    var time = $('.checkout-time' + currentDataID).val();
    var date = $('.checkout-date' + currentDataID).val();
    var currentDateData = new Date(date);
    let setTime = previewTime(time);
    const longDay = currentDateData.toLocaleString(lang, { weekday: 'short' });
    const shortMonth = currentDateData.toLocaleString(lang, { month: 'short' });
    const longMonth = currentDateData.toLocaleString(lang, { month: 'long' });
    const twoDigitDate = currentDateData.toLocaleString(lang, { day: '2-digit' });
    const year = currentDateData.toLocaleString(lang, { year: 'numeric' });
    var customDate = `${twoDigitDate} ${longMonth} ${year}`;
    var decideLater = $('input[name="decide-later-' + id + '"]').prop('checked');
    if(decideLater==true){
        $('.custom-remark-title[data-id="' + currentDataID + '"]').removeClass('underline');
    }
    if (decideLater !== true) {
        $('.preferredTime-placeholder'+id+' .edit-btn[data-id="'+id+'"]').addClass('hidden');
        var label = $('.custom-remark-title[data-id="' + id + '"]').attr('data-orglabel');
        $('.custom-remark-title[data-id="' + id + '"]').addClass('underline');
        $('.custom-remark-title[data-id="' + id + '"]').text(label)
        $('.booking-selected-dayno-' + id).text(twoDigitDate);
        $('.booking-selected-month-day-' + id).text(shortMonth + ' ' + longDay);
        $('.booking-selected-time-' + id).text(setTime);
        var location = $('.checkout-location' + currentDataID).val();
        $('#checkout-time-popup[data-id="'+id+'"]').attr('data-date',date)
        $('#checkout-time-popup[data-id="'+id+'"]').attr('data-decide_later',false)
        if (location) {
            $('.preferred-name-' + currentDataID).text(location);
            $('.preferredTime-placeholder' + currentDataID).addClass('hidden');
            $('.preferred-date-' + currentDataID).removeClass('hidden');
            $('.preferredTime-detail' + currentDataID).removeClass('hidden');
        } else {
            //  $('.preferred-name-' + currentDataID).text(checkoutData[0]?.station_name_en);
            $('.preferredTime-placeholder' + currentDataID).removeClass('hidden')
            $('.preferredTime-detail' + currentDataID).addClass('hidden')
        }
        $('.custom-remark-title[data-id="' + currentDataID + '"]').text();
        $('.preferred-timeDesc-' + currentDataID).text(setTime);        
        if(lang == "en"){
            $('.preferred-date-' + currentDataID).text(date ? changeLanguageForCustomDateYMD(date, lang) : '');
            $('.preferred-date-custom-' + currentDataID).text(date ? changeLanguageForCustomDateYMD(date, lang) : '');
        }else{
            $('.preferred-date-' + currentDataID).text(date ? changeLanguageForCustomDateYMDForChinese(date, lang) : '');
            $('.preferred-date-custom-' + currentDataID).text(date ? changeLanguageForCustomDateYMDForChinese(date, lang) : '');
        }
        $('.custom-remark-title[data-id="' + currentDataID + '"]').removeClass('underline');
        if(checkIsValidate(location)==false){
            isError=true;
            var errorMessage = $('.location-required-message-' + currentDataID).attr('data-text');
            showToast(errorMessage);     
        }else if(date=="" || date==undefined || date==null){
            isError=true;
            var errorMessage = $('.location-date-required-message-' + currentDataID).attr('data-text');
            showToast(errorMessage);
        }
        else if(setTime=="" || setTime==undefined || setTime==null){
            isError=true;
            var errorMessage = $('.location-time-required-message-' + currentDataID).attr('data-text');
            showToast(errorMessage);
        }
    } else {
        $('.booking-selected-dayno-' + id).text('');
        $('.booking-selected-month-day-' + id).text('');
        $('.booking-selected-time-' + id).text('');
        $('.preferredTime-placeholder' + currentDataID).removeClass('hidden')
        $('.preferredTime-detail' + currentDataID).addClass('hidden');
        $('.custom-remark-title[data-id="' + id + '"]').addClass('remove-red-dot');
        var label = $('.custom-remark-title[data-id="' + id + '"]').attr('data-label');
        $('.custom-remark-title[data-id="' + id + '"]').text(label)
        $('.custom-remark-title[data-id="' + id + '"]').removeClass('underline');
        $('#checkout-time-popup[data-id="'+id+'"]').attr('data-decide_later',true)
        $('#checkout-time-popup[data-id="'+id+'"]').attr('data-date','');
        $('.preferredTime-placeholder'+id+' .edit-btn[data-id="'+id+'"]').removeClass('hidden');
    }
    $('.preferred-time-popup-'+currentDataID).css('pointer-events','all');
    var isErrorShow=false;
    if (decideLater == false) {
              if (isError == false) {
                $('.available-card .preferred-name-' + id).parent().css('color', '#333');
                $('.available-card .preferred-date-' + id).parent().css('color', '#333');
                $('.available-card .preferred-timeDesc-' + id).parent().css('color', '#333');
                  $('#preferred-time-popup').addClass('hidden');
                  hideTimePopup(id);
              }else{
                  isErrorShow=true;
              }
    }else{
        hideTimePopup(id);
    }
    $('.checkout-decidelater' + id).val(decideLater);
    if(isError==true){
        $('.preferred-timeDesc-' + currentDataID).text('');        
        $('.preferred-date-' + currentDataID).text('');
        $('.preferred-name-' + currentDataID).text('');
        $('.preferredTime-placeholder' + currentDataID).removeClass('hidden')
        $('.preferredTime-detail' + currentDataID).addClass('hidden')
    }
    return isErrorShow;
}
$(document).on('click', '.preferred-time-calendar .fc-next-button', function() {
    const date_data=renderDateFormatYMD(new Date(checkoutCalendarFunc.getDate()),'-');
    var id = $(this).parent().parent().parent().parent().data('id');
    var areaID = $('.checkout-location-id' + id).val();
    bindCalendarEventsData(areaID);
    $(`#preferred-time-calendar-${id} td[data-date="${defaultSelectedDate}"]`).addClass('fc-day-current');
   // checkActiveDefaultDate(renderDateFormatYMD(new Date(date_data),'-'),checkoutEventDates,id,checkoutEventTimes)
});
$(document).on('click', '.preferred-time-calendar .fc-prev-button', function() {
    const date_data=renderDateFormatYMD(new Date(checkoutCalendarFunc.getDate()),'-');
    var id = $(this).parent().parent().parent().parent().data('id');
    var areaID = $('.checkout-location-id' + id).val();
    bindCalendarEventsData(areaID);
    $(`#preferred-time-calendar-${id} td[data-date="${defaultSelectedDate}"]`).addClass('fc-day-current');
   // checkActiveDefaultDate(renderDateFormatYMD(new Date(date_data),'-'),checkoutEventDates,id,checkoutEventTimes)
});

function bindCalendarEventsData(areaID) {

var locationData = checkoutData.find(x => x.area.id == areaID);

var eventList = locationData?.events;

checkoutEventDates = eventList;

checkoutEventTimes = locationData?.week_days;

checkoutCalendarFunc?.refetchEvents();

}
initializePreferredTimeData();

function initializePreferredTimeData() {

    $('.checkout-data-location').each(function() {

        var id = $(this).data('id');
var datalabel = $('.custom-remark-title[data-id="' + id + '"]').attr('data-label');

        if (id != "@id") {

            var lang = $('html').attr('lang');
            if(lang=="zh-hk"){
        lang="zh"
    }
    else if(lang=="zh-cn"){
        lang="zh"
    }

            var locationID = $('.checkout-location-id' + id).val();

            var locationDate = $('.checkout-date' + id).val();

            var locationTime = previewTime($('.checkout-time' + id).val());

            var location = $('.checkout-location' + id).val();

            var decideLater = $('.checkout-decidelater' + id).val();

            $('input[name="decide-later-' + id + '"]').prop('checked', decideLater == "1" ? true : false);
            //console.log("location && locationDate ",location && locationDate)
            if (location && locationDate) {

                $('.preferredTime-placeholder' + id).addClass('hidden');

                $('.preferredTime-detail' + id).removeClass('hidden');

                $('.preferred-name-' + id).text(location);

                if(locationDate){
                    $('.preferred-date-' + id).removeClass('hidden');
                }else{
                    $('.preferred-date-' + id).addClass('hidden');
                }
                if(lang == 'en'){
                    $('.preferred-date-' + id).text(locationDate?changeLanguageForCustomDateYMD(locationDate,lang):'');
                }else{
                    $('.preferred-date-' + id).text(locationDate?changeLanguageForCustomDateYMDForChinese(locationDate,lang):'');
                }

                $('.preferred-timeDesc-' + id).text(locationTime);

            } else {

                // setDefaultLocation();
                var isCheckedDecideLater = $('#decideLater-' + id).is(":checked");
                if (decideLater == 1) {
                    $('.custom-remark-title[data-id="' + id + '"]').removeClass('underline');
                }
                $('.preferredTime-placeholder' + id).removeClass('hidden');

                $('.preferredTime-detail' + id).addClass('hidden');

            }

            // $('input[name="decide-later-' + id + '"]').prop('checked', decideLater == "true" ? true : false);

            $('.checkout-branch-list').each(function() {

                $(this).removeAttr('checked')

            })
          //  console.log("decideLater ",decideLater,location,locationDate,location && locationDate,currentDataID)
            if(decideLater=="1" || decideLater=="true" || decideLater==1 || decideLater==true){
                $('.custom-remark-title[data-id="' + id + '"]').text(datalabel);
            $('.custom-remark-title[data-id="' + id + '"]').removeClass('underline');   
                    $('.custom-remark-title[data-id="' + id + '"]').removeClass('underline');
                    $('.custom-remark-title[data-id="' + id + '"]').addClass('remove-red-dot');
                    $('.preferredTime-placeholder'+id+' .edit-btn[data-id="'+id+'"]').removeClass('hidden');
            }else{
                $('.preferredTime-placeholder'+id+' .edit-btn[data-id="'+id+'"]').addClass('hidden');
            }
            
            // $('.checkout-branches-' + id + ' input[value="' + location + '"]').prop('checked', true);

            $('.preferred-time-popup-' + id + ' input[name="preferredClockSystem-' + id + '"][value="' +
                locationTime + '"]').prop('checked', true);

        }

    })


}

function changeLanguageForDate(date, lang) {
    var getdateStr = new Date(date);
    const longDay = getdateStr.toLocaleString(lang, {
        weekday: 'long'
    });
    const shortMonth = getdateStr.toLocaleString(lang, {
        month: 'short'
    });
    const twoDigitDate = getdateStr.toLocaleString(lang, {
        day: '2-digit'
    });
    let year = getdateStr.toLocaleString(lang, {
        year: 'numeric'
    });
    const formatShowDate = `${twoDigitDate} ${shortMonth} ${year}`;
    return formatShowDate;
}

function changeLanguageForDateMonth(date, lang) {
    var getdateStr = new Date(date);
    const longDay = getdateStr.toLocaleString(lang, {
        weekday: 'long'
    });
    const shortMonth = getdateStr.toLocaleString(lang, {
        month: 'short'
    });
    const twoDigitDate = getdateStr.toLocaleString(lang, {
        day: '2-digit'
    });
    const formatShowDay = `${longDay}, ${shortMonth} ${twoDigitDate}`;
    return formatShowDay;
}
function changeLanguageForDateLongMonth(date,lang){
    var getdateStr=new Date(date);
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
    var customDate = `${twoDigitDate} ${shortMonth} ${year}`;
    return customDate;
}

function changeLanguageForCustomDateYMD(date, lang) {
    var currentDateData = new Date(date);
    const longDay = currentDateData.toLocaleString(lang, { weekday: 'short' });
    const shortMonth = currentDateData.toLocaleString(lang, { month: 'long' });
    const longMonth = currentDateData.toLocaleString(lang, { month: 'long' });
    const twoDigitDate = currentDateData.toLocaleString(lang, { day: '2-digit' });
    const year = currentDateData.toLocaleString(lang, { year: 'numeric' });
    var customDate = `${twoDigitDate} ${shortMonth} ${year}`;
    return customDate;
}

function changeLanguageForCustomDateYMDForChinese(date, lang) {
    var currentDateData = new Date(date);
    const longDay = currentDateData.toLocaleString('zh', { weekday: 'short' });
    const shortMonth = currentDateData.toLocaleString('zh', { month: 'short' });
    const longMonth = currentDateData.toLocaleString('zh', { month: 'long' });
    const twoDigitDate = currentDateData.toLocaleString('zh', { day: '2-digit' });
    const year = currentDateData.toLocaleString('zh', { year: 'numeric' });
    var customDate = `${year}${shortMonth}${twoDigitDate}`;
    return customDate;
}

function setLocationIDCustom(id, location) {
    var locationID = $('.checkout-location-id' + id).val();
    if ($('.location-json-data-' + id).val() != '[{') {
        var jsonData = JSON.parse($('.location-json-data-' + id).val());
    // if(window.location.hostname=="devhtml.visibleone.io" || window.location.hostname=="localhost"){
    // jsonData = JSON.parse($('.location-json-data-' + id).val());
    // }

       // console.log("jsonData ", jsonData)
        var lang = $('html').attr('lang');
        var locationData = jsonData.find(x => x.area[areaName] == location).id;

        if (locationID) {
            $('.checkout-location-id' + id).val(locationID)
        } else {
            $('.checkout-location-id' + id).val(locationData)
        }

    }
}


function previewTime(sctedTime){
  let prevTime = '';
    if(clocale == "en" && sctedTime == "AM"){
      prevTime = "AM";
    }else if(clocale == "tc" && sctedTime == "AM"){
      prevTime = "上午";
    }else if(clocale == "sc" && sctedTime == "AM"){
      prevTime = "上午";
    }else if(clocale == "en" && sctedTime == "PM"){
      prevTime = "PM";
    }else if(clocale == "tc" && sctedTime == "PM"){
      prevTime = "下午";
    }else if(clocale == "sc" && sctedTime == "PM"){
      prevTime = "下午";
    }else{
        prevTime = sctedTime;
    }
    return prevTime;
}
function checkActiveDefaultDate(date, list,currentID,timelist) {
    let tomorrow = new Date(date);
    tomorrow.setDate(tomorrow.getDate() + 1);
    let tmrDate=renderDateFormatYMD(tomorrow,'-');
    var selectedDateData = $('.checkout-date' + currentDataID).val();
    var curDate = selectedDateData?getYMDFormat(selectedDateData):'';
    const closeDate=list?.find(x=>x.close_date==tmrDate)
    $(`#preferred-time-calendar-${currentID} td`).removeClass('fc-day-current');
    if(closeDate){
        $(`#preferred-time-calendar-${currentID} td[data-date="${tmrDate}"]`)
                        .addClass('day-with-events');
        if(getDays(tomorrow.getYear(),tomorrow.getMonth()+1)==getDays(new Date().getYear(),new Date().getMonth()+1)){
          checkActiveDefaultDate(tomorrow, list,currentID,timelist)
      }
    }else{
        if(tmrDate){
        defaultSelectedDate=curDate?curDate:tmrDate;    
        }
       // console.log("defaultSelectedDate ",defaultSelectedDate)
        $(`#preferred-time-calendar-${currentID} td[data-date="${defaultSelectedDate}"]`)
                        .addClass('fc-day-current');
        var day = tomorrow.toLocaleString('en', {
                weekday: 'short'
            });
        $('.checkout-date' + currentID).val(defaultSelectedDate);
        var time=$('.checkout-time' + currentDataID).val();
        bindCheckoutBookingTime(day, time, currentID,timelist);
    }
}
function renderDateFormatYMD(date, character) {
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();
    return (
        year +
        character +
        (month.toString().length < 2 ? "0" + month : month) +
        character +
        (day.toString().length < 2 ? "0" + day : day)
    );
};
function getDays(year, month){
    return new Date(year, month, 0).getDate();
};
</script>