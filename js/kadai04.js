'use strict';
(function () {
    var cancelFormSubmit = function (form, _a, errorMsg) {
        var inputs = _a.slice(0);
        if (errorMsg === void 0) { errorMsg = '入力した値が重複しています'; }
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
    /**
     * @param {HTMLFormElement} form
     *  @description Dateオブジェクトから'2022-06-09T07:14:00'のような文字列を生成する
     */
    var convertDateToIso = function (date) {
        var shift = date.getTime() + 9 * 60 * 60 * 1000;
        var time = new Date(shift).toISOString().split('.')[0];
        return time;
    };
    // get elements
    var datetimeInput = document.getElementById('datetime');
    var yearSelect = document.getElementById('Dyy_slc');
    var monthSelect = document.getElementById('Dmm_slc');
    var daySelect = document.getElementById('Ddd_slc');
    var hourSelect = document.getElementById('Dhh_slc');
    var minuteSelect1 = document.getElementById('Dmn1_slc');
    var minuteSelect2 = document.getElementById('Dmn2_slc');
    var splitInputs = [
        yearSelect,
        monthSelect,
        daySelect,
        hourSelect,
        minuteSelect1,
        minuteSelect2,
    ];
    // datetime -> inputs
    if (datetimeInput instanceof HTMLInputElement) {
        datetimeInput.addEventListener('input', function (e) {
            var date = new Date(datetimeInput.value);
            var isoTime = convertDateToIso(date);
            console.log(isoTime);
            {
                // datetime-local -> year, month, day, hour, minute
                var year = date.getFullYear();
                var month = date.getMonth() + 1;
                var day = date.getDate();
                var hour = date.getHours();
                var minute = date.getMinutes();
                // set values
                yearSelect.value = year.toString();
                monthSelect.value = month.toString();
                daySelect.value = day.toString();
                hourSelect.value = hour.toString();
                // 分は上位と下位に分けて設定する
                if (minute.toString().length === 1) {
                    minuteSelect1.value = '0';
                    minuteSelect2.value = minute.toString();
                }
                else {
                    minuteSelect1.value = minute.toString().slice(0, 1);
                    minuteSelect2.value = minute.toString().slice(1, 2);
                }
            }
        });
        splitInputs.forEach(function (input) {
            input.addEventListener('input', function () {
                var year = yearSelect.value;
                var month = monthSelect.value;
                var day = daySelect.value;
                var hour = hourSelect.value;
                var minute1 = minuteSelect1.value;
                var minute2 = minuteSelect2.value;
                console.log('INPUT : ', input);
                {
                    // year, month, day, hour, minute1, minute2 -> datetime-local
                    var time = "".concat(year, "-").concat(month.padStart(2, '0'), "-").concat(day.padStart(2, '0'), "T").concat(hour.padStart(2, '0'), ":").concat(minute1).concat(minute2);
                    console.log(time);
                    datetimeInput.value = time;
                }
            });
        });
    }
    var stationFrom = document.getElementById('station-from');
    var stationTo = document.getElementById('station-to');
    var form = document.getElementById('form');
    // 出発駅と到着駅が同じ場合はエラー
    if (stationFrom instanceof HTMLSelectElement &&
        stationTo instanceof HTMLSelectElement &&
        form instanceof HTMLFormElement) {
        cancelFormSubmit(form, [stationFrom, stationTo]);
    }
})();
