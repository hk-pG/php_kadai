'use strict';
(function () {
    var cancelFormSubmit = function (form, _a) {
        var inputs = _a.slice(0);
        // もしエラーがあれば、メッセージを表示する
        if (form instanceof HTMLFormElement &&
            inputs.every(function (input) { return input instanceof HTMLSelectElement; })) {
            form.addEventListener('submit', function (e) {
                var inputValueStrings = inputs.map(function (input) { return input.value; });
                var inputValueSet = new Set(inputValueStrings);
                if (inputValueStrings.length !== inputValueSet.size) {
                    e.preventDefault();
                    alert('出発地と目的地は異なる場所を選択してください');
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
    var timeInputToggle = function () {
        var timeInputsToggleButton = document.getElementById('time-inputs-toggle-button');
        var separatedInputs = document.getElementById('separated');
        timeInputsToggleButton.addEventListener('click', function () {
            // もしクラスに'btn-close'があれば削除し、'btn-open'を追加する
            if (timeInputsToggleButton.classList.contains('btn-close')) {
                timeInputsToggleButton.classList.remove('btn-close');
                timeInputsToggleButton.classList.add('btn-open');
                timeInputsToggleButton.textContent = '個別入力を閉じる';
            }
            else if (timeInputsToggleButton.classList.contains('btn-open')) {
                // もしクラスに'btn-open'があれば削除し、'btn-close'を追加する
                timeInputsToggleButton.classList.remove('btn-open');
                timeInputsToggleButton.classList.add('btn-close');
                timeInputsToggleButton.textContent = '個別入力を開く';
            }
            // separatedに'non-active'があれば削除し、'active'を追加する
            if (separatedInputs.classList.contains('non-active')) {
                separatedInputs.classList.remove('non-active');
                separatedInputs.classList.add('active');
            }
            else if (separatedInputs.classList.contains('active')) {
                // separatedに'active'があれば削除し、'non-active'を追加する
                separatedInputs.classList.remove('active');
                separatedInputs.classList.add('non-active');
            }
        });
    };
    var form = document.getElementById('form');
    var stationFrom = document.getElementById('station-from');
    var stationTo = document.getElementById('station-to'); /* */
    // 出発駅と到着駅が同じ場合はエラー
    cancelFormSubmit(form, [stationFrom, stationTo]);
    timeInputToggle();
})();
