{"version":3,"sources":["logic.js"],"names":["BX","namespace","Tasks","Component","TopMenu","extend","sys","code","methodsStatic","instances","getInstance","name","addInstance","obj","methods","construct","this","callConstruct","userId","Number","option","ownerId","groupId","sliderInit","bindEvents","elements","scope","getElementsByClassName","length","key","bind","event","preventDefault","targetClass","target","className","roleId","dataset","id","url","onCustomEvent","parentElement","removeClass","addClass","e","addCustomEvent","command","params","onUserCounter","filterId","data","ctx","onFilterApply","isMyList","Object","keys","forEach","role","roleButton","querySelector","innerText","total","getFilterFieldsValues","ROLEID","el","querySelectorAll","i","toolbar","TasksToolbar","rerender","window","top","SidePanel","Instance","bindAnchors","rules","condition","loader","options","cacheable","events","onClose","onOpen","manager","Main","interfaceButtonsManager","menuId","closeSubmenu","call"],"mappings":"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","file":"logic.map.js"}