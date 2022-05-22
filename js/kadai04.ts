'use strict';
(() => {
  const splitTimeFormatByInput = (inputTimeFormat: string) => {
    const timeFormat = inputTimeFormat.split(':');
    // remove zero padding
    const hour = timeFormat[0].replace(/^0/, '');
    const minute = timeFormat[1].replace(/^0/, '');

    return { hour, minute };
  };

  const syncInputToSelect = (
    timeInput: unknown,
    hourSelect: unknown,
    minuteSelect1: unknown,
    minuteSelect2: unknown,
  ) => {
    if (
      timeInput instanceof HTMLInputElement &&
      hourSelect instanceof HTMLSelectElement &&
      minuteSelect1 instanceof HTMLSelectElement &&
      minuteSelect2 instanceof HTMLSelectElement
    ) {
      timeInput?.addEventListener('input', () => {
        // get hour and minute from input(type=time)
        let time = splitTimeFormatByInput(timeInput.value);
        let minuteTop = '0';
        let minuteBottom = '0';

        let { hour, minute } = time;

        if (minute.length >= 2) {
          minuteTop = minute.toString().charAt(0);
          minuteBottom = minute.toString().charAt(1);
        } else {
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

  const syncSelectToInput = (
    hourSelect: unknown,
    minuteSelect1: unknown,
    minuteSelect2: unknown,
    timeInput: unknown,
  ) => {
    if (
      hourSelect instanceof HTMLSelectElement &&
      minuteSelect1 instanceof HTMLSelectElement &&
      minuteSelect2 instanceof HTMLSelectElement &&
      timeInput instanceof HTMLInputElement
    ) {
      const makeTimeStr = () => {
        let hour = hourSelect.value;
        if (hour.length <= 1) {
          hour = '0' + hour;
        }
        const timeStr = `${hour}:${minuteSelect1.value}${minuteSelect2.value}`;
        timeInput.value = timeStr;
        timeInput.value = timeStr;
      };

      hourSelect.addEventListener('change', makeTimeStr);
      minuteSelect1.addEventListener('change', makeTimeStr);
      minuteSelect2.addEventListener('change', makeTimeStr);
    }
  };

  const cancelFormSubmit = (
    form: unknown,
    [...inputs]: HTMLSelectElement[],
    errorMsg: string = '入力した値が重複しています',
  ) => {
    console.table(inputs);
    if (
      form instanceof HTMLFormElement &&
      inputs.every((input) => input instanceof HTMLSelectElement)
    ) {
      form.addEventListener('submit', (e) => {
        const inputValueStrings: string[] = inputs.map((input) => input.value);
        const inputValueSet = new Set(inputValueStrings);
        if (inputValueStrings.length !== inputValueSet.size) {
          e.preventDefault();
          alert(errorMsg);
        }
      });
    }
  };

  const main = () => {
    const timeInput: unknown = document.getElementById('time');
    const hourSelect = document.getElementById('Dhh_slc');
    const minuteSelect1 = document.getElementById('Dmn1_slc');
    const minuteSelect2 = document.getElementById('Dmn2_slc');
    syncInputToSelect(timeInput, hourSelect, minuteSelect1, minuteSelect2);
    syncSelectToInput(hourSelect, minuteSelect1, minuteSelect2, timeInput);

    const stationFrom = document.getElementById('station-from');
    const stationTo = document.getElementById('station-to');
    const form = document.getElementById('form');
    if (
      stationFrom instanceof HTMLSelectElement &&
      stationTo instanceof HTMLSelectElement &&
      form instanceof HTMLFormElement
    ) {
      cancelFormSubmit(form, [stationFrom, stationTo]);
    }
  };

  main();
})();
