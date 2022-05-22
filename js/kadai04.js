'use strict';
(function () {
    var splitTimeFormatByInput = function (inputTimeFormat) {
        var timeFormat = inputTimeFormat.split(':');
        // remove zero padding
        var hour = timeFormat[0].replace(/^0/, '');
        var minute = timeFormat[1].replace(/^0/, '');
        return { hour: hour, minute: minute };
    };
    var syncInputToSelect = function (timeInput, hourSelect, minuteSelect1, minuteSelect2) {
        if (timeInput instanceof HTMLInputElement &&
            hourSelect instanceof HTMLSelectElement &&
            minuteSelect1 instanceof HTMLSelectElement &&
            minuteSelect2 instanceof HTMLSelectElement) {
            timeInput === null || timeInput === void 0 ? void 0 : timeInput.addEventListener('input', function () {
                // get hour and minute from input(type=time)
                var time = splitTimeFormatByInput(timeInput.value);
                var minuteTop = '0';
                var minuteBottom = '0';
                var hour = time.hour, minute = time.minute;
                if (minute.length >= 2) {
                    minuteTop = minute.toString().charAt(0);
                    minuteBottom = minute.toString().charAt(1);
                }
                else {
                    minuteBottom = minute.toString().charAt(0);
                }
                if (hour == '00') {
                    hour = '0';
                }
                hourSelect.value = hour;
                minuteSelect1.value = minuteTop;
                minuteSelect2.value = minuteBottom;
            });
        }
    };
    var syncSelectToInput = function (hourSelect, minuteSelect1, minuteSelect2, timeInput) {
        if (hourSelect instanceof HTMLSelectElement &&
            minuteSelect1 instanceof HTMLSelectElement &&
            minuteSelect2 instanceof HTMLSelectElement &&
            timeInput instanceof HTMLInputElement) {
            var makeTimeStr = function () {
                var hour = hourSelect.value;
                if (hour.length <= 1) {
                    hour = '0' + hour;
                }
                var timeStr = "".concat(hour, ":").concat(minuteSelect1.value).concat(minuteSelect2.value);
                timeInput.value = timeStr;
                timeInput.value = timeStr;
            };
            hourSelect.addEventListener('change', makeTimeStr);
            minuteSelect1.addEventListener('change', makeTimeStr);
            minuteSelect2.addEventListener('change', makeTimeStr);
        }
    };
    var cancelFormSubmit = function (form, _a, errorMsg) {
        var inputs = _a.slice(0);
        if (errorMsg === void 0) { errorMsg = '入力した値が重複しています'; }
        console.table(inputs);
        if (form instanceof HTMLFormElement &&
            inputs.every(function (input) { return input instanceof HTMLSelectElement; })) {
            form.addEventListener('submit', function (e) {
                var inputValueStrings = inputs.map(function (input) { return input.value; });
                var inputValueSet = new Set(inputValueStrings);
                if (inputValueStrings.length !== inputValueSet.size) {
                    e.preventDefault();
                    alert(errorMsg);
                }
            });
        }
    };
    var main = function () {
        var timeInput = document.getElementById('time');
        var hourSelect = document.getElementById('Dhh_slc');
        var minuteSelect1 = document.getElementById('Dmn1_slc');
        var minuteSelect2 = document.getElementById('Dmn2_slc');
        syncInputToSelect(timeInput, hourSelect, minuteSelect1, minuteSelect2);
        syncSelectToInput(hourSelect, minuteSelect1, minuteSelect2, timeInput);
        var stationFrom = document.getElementById('station-from');
        var stationTo = document.getElementById('station-to');
        var form = document.getElementById('form');
        if (stationFrom instanceof HTMLSelectElement &&
            stationTo instanceof HTMLSelectElement &&
            form instanceof HTMLFormElement) {
            cancelFormSubmit(form, [stationFrom, stationTo]);
        }
    };
    main();
})();
