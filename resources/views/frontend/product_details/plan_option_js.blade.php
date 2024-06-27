<script>
const checkedBranch = (event) => {
  const target = event.target;
  const getAddress = target.dataset.address;
  const getID = target.dataset.id;
  const addressContent = document.querySelector(`#branch-address-${getID}`);
  addressContent.textContent = getAddress;
}


const data = {!! json_encode($productLocations) !!}
const eventDates = {
  1: [],
  2: [],
  3: [],
  4: [],
  5: [],
};

const specificTimes = {
  1: [],
  2: [],
  3: [],
  4: [],
  5: [],
};
const fullCalendarObj = {
  1: {},
  2: {},
  3: {},
  4: {},
  5: {},
};

let lang = getLocalizedText("zh-cn", "zh-tw", "en-us");
let isThisMonth = true;
const locale = {!! json_encode(lang())!!};
    // const locale = $('html').attr('lang');
// const lang = locale === "en" ? "en-us" : "zh-hk";
let inputlng = locale === "en" ? "en" : (locale == 'zh-hk' ? 'tc' : 'sc');
const fullAddress = `full_address_${inputlng}`;

function renderBookingTime(timesData, count) {
  var html = '';
  timesData?.map((x, index) => {
    let showTime = previewTime(x);
    
    html += `<label for="${x}-${count}" class="custom-radio-container mb-2 last:mb-0 w-[calc(100%-7px)]">  
    <input type="radio" name="clockSystem-${count}" id="${x}-${count}" value="${x}" ${index === 0 && "checked"} />  
    <span class="custom-radio-btn outlined-btn-hover rounded-lg py-2 px-4 justify-center">${showTime}</span>
  </label>`;
  });
  $(`#booking-time-${count}`).html(html);
}

const getArea = (count, lang = "en-us") => {
  const addressElem = document.querySelector(`#branch-address-${count}`);
  const selectAreas = document.querySelector(`#select-branch-${count}`);
  const areaList = data;
  const defaultArea = areaList.length > 0 && areaList[0]; 
  
  let areaListItem = "";
  areaList.map((area, i) => {
    const areaName = `name_${inputlng}`;
    areaListItem += `<li class="w-full h-auto"><label for="area${area.area.id}-${count}" class="custom-branch-radio-container w-full h-full"><input type="radio" data-areaval="${area.area[areaName]}" name="area-${count}" id="area${area.area.id}-${count}" value="${area.area.id}" class="custom-branch-radio area" data-address="" data-area="${area.area.id}" data-id="${count}" ${area.area.id == defaultArea.area.id && "checked"}><span class="custom-branch-radio-btn transition-colors duration-300 hover:bg-orangeLight p-2 sm:p-4 lg:p-5">${area.area[areaName]}</span></label></li>`;
  });
  if (selectAreas) {
    selectAreas.innerHTML = areaListItem;
  }
  let f_address = `full_address_${inputlng}`;
  addressElem.textContent = defaultArea[f_address];
  eventDates[count] = defaultArea?.events;
  specificTimes[count] = defaultArea?.week_days;

  const selectedDateElem = $(`#selectedDate-${count}`);
  const displaySelectedDate = $(`#displaySelectedDate-${count}`); //change name

  renderFullCalendar(count, lang);
  if (Object.keys(fullCalendarObj[count]).length > 0) {
      fullCalendarObj[count].render();
      eventDates[count]?.map((x) => {
        $(`#calendar-${count} td[data-date="${x.close_date}"]`).addClass('day-with-events');
      })

      const getSelectedDate = $(`#calendar-${count} td.fc-day-current`).data("date");
      const { weekDay, formattedShowDate } = formatDate(new Date(getSelectedDate));
      const currentDate = specificTimes[count]?.find(x => x.week_days == weekDay);
      renderBookingTime(currentDate?.booking_times, tabCount);
      selectedDateElem.val(getSelectedDate);
      displaySelectedDate.text(formattedShowDate); //change name
    }

}

function renderFullCalendar(tabCount, lang = "en-us") {
  const calendarElem = document.getElementById(`calendar-${tabCount}`);
  if (!calendarElem) {
    return;
  }
  const { initialDate, initialMonth, formattedInitDate } = getCurrentDate()
  const selectedDateElem = $(`#selectedDate-${tabCount}`);
  const displaySelectedDate = $(`#displaySelectedDate-${tabCount}`);
  const initDate = selectedDateElem.val() ? selectedDateElem.val() : formattedInitDate;
  let setCurDate = selectedDateElem.val() && new Date(selectedDateElem.val());
  let status = true;
  fullCalendarObj[tabCount] = new FullCalendar.Calendar(calendarElem, {
    selectable: true,
    initialView: 'dayGridMonth',
    initialDate: initDate,
    locale: lang,
    contentHeight: "auto",
    // firstDay: 1,
    headerToolbar: {
      start: "prev",
      center: "title",
      end: "next",
    },
    showNonCurrentDates: false,
    //events: eventDates,
    eventRender: function (event, element, view) {
      // like that
      //var eventStart = moment(event.start);

    },
    events: function (info, successCallback, failureCallback) {
      isThisMonth = initialMonth === new Date(info.start).getMonth();
      if (!isThisMonth) {
        $(".fc-prev-button").eq(tabCount - 1).css("visibility", "visible")
      } else {
        $(".fc-prev-button").eq(tabCount - 1).css("visibility", "hidden")
      }
      $(`#calendar-${tabCount} .fc-daygrid-day`).each(function (index) {
        $(this).removeClass("day-with-events");
      });

      $(`#calendar-${tabCount} .fc-day-today`).addClass("today");

      eventDates[tabCount]?.map((x) => {
        // if (new Date(x.close_date == info.start)) {
          $(`#calendar-${tabCount} td[data-date="${x.close_date}"]`).addClass('day-with-events');
        // }
      })
      return successCallback(eventDates)
    },

    dateClick: function (info) {
      const targetElem = $(info.dayEl);
      if (targetElem.hasClass("fc-day-today")) {
            $(`#calendar-${tabCount} .fc-day-today`).addClass("today").removeClass("fc-day-today");
            return;
          }
      if (targetElem.hasClass("fc-day-past") || targetElem.hasClass("fc-day-other") || targetElem.hasClass("day-with-events") || targetElem.hasClass("today")) {
        return;
      }
      const {weekDay, formattedShowDate} = formatDate(info.date);
      const currentDate = specificTimes[tabCount]?.find(x => x.week_days == weekDay);
      renderBookingTime(currentDate?.booking_times, tabCount);
      $(`#calendar-${tabCount} .fc-daygrid-day`).each(function (index) {
        $(this).removeClass("fc-day-today fc-day-current");
      });
      targetElem.addClass("fc-day-current");
      const getSelectDate = $(`#calendar-${tabCount} td.fc-day-current`).data("date");
      setCurDate = info.date;
      selectedDateElem.val(getSelectDate);
      displaySelectedDate.text(formattedShowDate);
    },
    dayCellClassNames: function(arg) {
      const baseDate = setCurDate || initialDate;
      if (!baseDate) {
        return []; 
      }
      // 1. Check for current date and matching event
      const isCurrentDate = areDatesEqual(baseDate, arg.date);
      let currentClass = isCurrentDate ? ["fc-day-current"] : [" "];
      
      if (isCurrentDate) {
        const hasMatchingEvent = eventDates[tabCount].some(x => areDatesEqual(baseDate, new Date(x.close_date)));
        if (hasMatchingEvent) {
          currentClass = [" "];
        } else {
          status = false;
        }
      } 

      // 3. Check for future date and matching event (optional)
      if (!isCurrentDate && new Date(arg.date) > baseDate && status) {
        const hasMatchingEvent = eventDates[tabCount].some(x => areDatesEqual(new Date(arg.date), new Date(x.close_date)));
        if (!hasMatchingEvent) {
          currentClass = ["fc-day-current"];
          status = false;
        }
      }

      if (currentClass.some(cur => cur === "fc-day-current")) {
        selectedDateElem.val(`${arg.date.getFullYear()}-${arg.date.toLocaleString(lang, { month: '2-digit' })}-${arg.date.toLocaleString(lang, { day: '2-digit' })}`);
      }
      
      return currentClass;
    }
    
  });
  fullCalendarObj[tabCount].render();
}


$(document).on('change', 'input.area', function () {
  var currentTabCount = $(this).data("id");
  const data = {!! json_encode($productLocations) !!}
  var branch = data?.find(x => x.area.id == $(this).data('area'));
  const addressElement = $(`#branch-address-${currentTabCount}`);
  addressElement.text(branch[fullAddress]);

  eventDates[currentTabCount] = branch?.events;
  specificTimes[currentTabCount] = branch?.week_days;
  renderFullCalendar(currentTabCount, lang);
  if (Object.keys(fullCalendarObj[currentTabCount]).length > 0) {
    fullCalendarObj[currentTabCount].render();
    eventDates[currentTabCount]?.map((x) => {
      $(`#calendar-${currentTabCount} td[data-date="${x.close_date}"]`).addClass('day-with-events');
    })
    const selectedDateElem = $(`#selectedDate-${currentTabCount}`).val();
    const displaySelectedDate = $(`#displaySelectedDate-${currentTabCount}`); //change name
    const calSelectedDate = $(`#calendar-${currentTabCount} td.fc-day-current`);
    calSelectedDate.removeClass("fc-day-current")
    $(`#calendar-${currentTabCount} td[data-date="${selectedDateElem}"]`).addClass("fc-day-current");
    const {weekDay, formattedShowDate} = formatDate(new Date(selectedDateElem));
    const currentDate = specificTimes[currentTabCount]?.find(x => x.week_days == weekDay);
    renderBookingTime(currentDate?.booking_times, currentTabCount);
    displaySelectedDate.text(formattedShowDate); //change name

  }
  
});


$(document).ready(function() {
    const planOpts = $(".plan-option-tab");
    planOpts.length > 0 && getArea(1,lang);
    planOpts.length === 2 && getArea(2,lang);


});

function previewTime(sctedTime){
  let prevTime = '';
    if(locale == "en" && sctedTime == "AM"){
      prevTime = "AM";
    }else if(locale == "zh-hk" && sctedTime == "AM"){
      prevTime = "上午";
    }else if(locale == "zh-cn" && sctedTime == "AM"){
      prevTime = "上午";
    }else if(locale == "en" && sctedTime == "PM"){
      prevTime = "PM";
    }else if(locale == "zh-hk" && sctedTime == "PM"){
      prevTime = "下午";
    }else if(locale == "zh-cn" && sctedTime == "PM"){
      prevTime = "下午";
    }else{
      prevTime = sctedTime;
    }
  return prevTime;
}

</script>