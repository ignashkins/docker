{"version":3,"sources":["script.js"],"names":["BX","namespace","Salescenter","Cashbox","init","parameters","signedParameters","form","errorMessageNode","container","isProgress","renderForm","bindEvents","saveButtonNode","document","getElementById","closeButtonNode","deleteButtonNode","cashboxId","initialFormData","getAllFormData","setContainer","paramsPage","getPage","paramsSection","renderSection","Form","getByName","config","appendChild","settingsPage","index","hasOwnProperty","name","indexOf","vatSection","taxSection","vatSectionTitle","firstChild","addClass","angle","createElement","removeClass","removeChild","nextSibling","style","display","addEventListener","toggle","insertBefore","renderOfdPage","isFilled","ofdPage","parentNode","ofdField","fields","input","getFieldInput","bind","onChangeOfd","SidePanel","Instance","slider","getSliderByWindow","window","addCustomEvent","onCloseSlider","startProgress","ajax","runComponentAction","mode","data","getData","then","result","stopProgress","catch","reason","showError","errors","pop","message","save","event","preventDefault","closeSlider","messages","i","getPages","querySelectorAll","pages","length","dataset","cashboxPage","showPage","page","classList","contains","ComponentAnimation","smoothShowHide","title","cashboxTitle","innerHTML","text","click","hideError","getLoader","isShown","show","hide","setTimeout","this","loader","Loader","size","remove","confirm","id","savedInput","value","getTopSlider","close","openHelper","url","top","Helper","formData","isClose","action","popup","destroy","PopupWindow","autoHide","draggable","closeByEsc","offsetLeft","offsetTop","zIndex","bindOptions","forceBindPosition","titleBar","content","buttons","PopupWindowButton","className","events","delegate","onCloseConfirmButtonClick","PopupWindowButtonLink","onPopupClose","button","formNode","getElementsByTagName","prepared","prepareForm","JSON","stringify"],"mappings":"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","file":"script.map.js"}