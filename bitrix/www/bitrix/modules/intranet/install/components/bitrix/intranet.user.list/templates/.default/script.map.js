{"version":3,"sources":["script.js"],"names":["namespace","BX","Manager","params","this","init","prototype","componentName","signedParameters","gridId","filterId","type","isNotEmptyString","gridContainer","gridContainerId","toolbar","toolbarInstance","Toolbar","bindTags","addCustomEvent","event","getEventId","Main","gridManager","reload","bind","addTask","userId","isNotEmptyObject","taskIFramePopup","add","RESPONSIBLE_ID","sendMessage","BXIM","openMessenger","viewMessageHistory","openHistory","videoCall","checkCallSupport","callTo","reinvite","isExtranetUser","bindNode","ajax","runAction","data","extranet","then","response","result","InviteAccessPopup","PopupWindowManager","create","Math","floor","random","content","message","offsetLeft","offsetTop","autoHide","show","activityAction","action","userActive","confirmUser","runComponentAction","mode","isArray","errors","DeleteErrorPopup","confirmMess","confirm","isDomNode","filterManager","getById","filterApi","getApi","addEventListener","delegate","e","tagValue","getEventTarget","getAttribute","clickTag","preventDefault","setFields","TAGS","apply","windowScroll","GetWindowScrollPos","easing","duration","start","scroll","scrollTop","finish","transition","makeEaseOut","transitions","quart","step","state","window","scrollTo","complete","animate","id","menuItems","menuId","menu","menuOpened","menuPopup","initialize","menuButtonId","menuButtonClick","currentTarget","getId","_id","getSetting","name","defaultval","_settings","getParam","_onMenuClose","eventArgs","_menu","onCustomEvent","openMenu","closeMenu","onClick","i","length","item","SEPARATOR","push","TYPE","LINK","text","TITLE","onclick","toLowerCase","PopupMenu","closeByEsc","events","onPopupShow","onPopupClose","onPopupDestroy","currentItem","popupWindow","destroy","Data"],"mappings":"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","file":"script.map.js"}