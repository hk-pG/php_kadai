'use strict';

(() => {
  const cancelFormSubmit = (
    form: unknown,
    [...inputs]: HTMLSelectElement[],
  ) => {
    // もしエラーがあれば、メッセージを表示する
    if (
      form instanceof HTMLFormElement &&
      inputs.every((input) => input instanceof HTMLSelectElement)
    ) {
      form.addEventListener('submit', (e) => {
        const inputValueStrings: string[] = inputs.map((input) => input.value);
        const inputValueSet = new Set(inputValueStrings);
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
  const convertDateToIso = (date: Date) => {
    const shift = date.getTime() + 9 * 60 * 60 * 1000;
    const time = new Date(shift).toISOString().split('.')[0];
    return time;
  };

  // get elements
  const datetimeInput = document.getElementById('datetime') as HTMLInputElement;
  const yearSelect = document.getElementById('Dyy_slc') as HTMLSelectElement;
  const monthSelect = document.getElementById('Dmm_slc') as HTMLSelectElement;
  const daySelect = document.getElementById('Ddd_slc') as HTMLSelectElement;
  const hourSelect = document.getElementById('Dhh_slc') as HTMLSelectElement;

  const minuteSelect1 = document.getElementById(
    'Dmn1_slc',
  ) as HTMLSelectElement;

  const minuteSelect2 = document.getElementById(
    'Dmn2_slc',
  ) as HTMLSelectElement;

  const splitInputs = [
    yearSelect,
    monthSelect,
    daySelect,
    hourSelect,
    minuteSelect1,
    minuteSelect2,
  ];

  // datetime -> inputs
  if (datetimeInput instanceof HTMLInputElement) {
    datetimeInput.addEventListener('input', (e) => {
      const date = new Date(datetimeInput.value);
      const isoTime = convertDateToIso(date);
      console.log(isoTime);

      {
        // datetime-local -> year, month, day, hour, minute
        const year = date.getFullYear();
        const month = date.getMonth() + 1;
        const day = date.getDate();
        const hour = date.getHours();
        const minute = date.getMinutes();
        // set values
        yearSelect.value = year.toString();
        monthSelect.value = month.toString();
        daySelect.value = day.toString();
        hourSelect.value = hour.toString();

        // 分は上位と下位に分けて設定する
        if (minute.toString().length === 1) {
          minuteSelect1.value = '0';
          minuteSelect2.value = minute.toString();
        } else {
          minuteSelect1.value = minute.toString().slice(0, 1);
          minuteSelect2.value = minute.toString().slice(1, 2);
        }
      }
    });

    splitInputs.forEach((input) => {
      input.addEventListener('input', () => {
        const year = yearSelect.value;
        const month = monthSelect.value;
        const day = daySelect.value;
        const hour = hourSelect.value;
        const minute1 = minuteSelect1.value;
        const minute2 = minuteSelect2.value;
        console.log('INPUT : ', input);
        {
          // year, month, day, hour, minute1, minute2 -> datetime-local
          const time = `${year}-${month.padStart(2, '0')}-${day.padStart(
            2,
            '0',
          )}T${hour.padStart(2, '0')}:${minute1}${minute2}`;
          console.log(time);
          datetimeInput.value = time;
        }
      });
    });
  }

  const timeInputToggle = () => {
    const timeInputsToggleButton = document.getElementById(
      'time-inputs-toggle-button',
    ) as HTMLButtonElement;

    const separatedInputs = document.getElementById(
      'separated',
    ) as HTMLDivElement;

    timeInputsToggleButton.addEventListener('click', () => {
      // もしクラスに'btn-close'があれば削除し、'btn-open'を追加する
      if (timeInputsToggleButton.classList.contains('btn-close')) {
        timeInputsToggleButton.classList.remove('btn-close');
        timeInputsToggleButton.classList.add('btn-open');
        timeInputsToggleButton.textContent = '個別入力を閉じる';
      } else if (timeInputsToggleButton.classList.contains('btn-open')) {
        // もしクラスに'btn-open'があれば削除し、'btn-close'を追加する
        timeInputsToggleButton.classList.remove('btn-open');
        timeInputsToggleButton.classList.add('btn-close');
        timeInputsToggleButton.textContent = '個別入力を開く';
      }

      // separatedに'non-active'があれば削除し、'active'を追加する
      if (separatedInputs.classList.contains('non-active')) {
        separatedInputs.classList.remove('non-active');
        separatedInputs.classList.add('active');
      } else if (separatedInputs.classList.contains('active')) {
        // separatedに'active'があれば削除し、'non-active'を追加する
        separatedInputs.classList.remove('active');
        separatedInputs.classList.add('non-active');
      }
    });
  };

  const form = document.getElementById('form') as HTMLFormElement;

  const stationFrom = document.getElementById(
    'station-from',
  ) as HTMLSelectElement;

  const stationTo = document.getElementById(
    'station-to',
  ) as HTMLSelectElement; /* */

  // 出発駅と到着駅が同じ場合はエラー
  cancelFormSubmit(form, [stationFrom, stationTo]);

  timeInputToggle();
})();
