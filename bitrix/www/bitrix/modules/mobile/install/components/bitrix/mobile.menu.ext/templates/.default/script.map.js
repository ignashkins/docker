{"version":3,"sources":["script.js"],"names":["BX","Menu","BXMobileApp","addCustomEvent","proxy","window","bCalendarShowMobileHelp","this","calendarList","MenuSettings","userId","pullParams","enable","pulltext","message","downtext","loadtext","app","enableInVersion","action","callback","document","location","reload","pullDown","delegate","command","params","USER_ID","COLOR","style","counterCode","ob","updateCounters","counters","obZeroCounter","lang","siteDir","canInvite","calendarFirstVisit","profileUrl","helpUrl","timemanUrl","marketPlaceApps","set","settings","type","isNotEmptyString","onCustomEvent","getMarketPlaceAppName","id","apps","count","length","i","currentItem","init","items","getElementById","that","FastButton","event","onItemClick","buttons","menu-user-accounts","exec","eventCancelBubble","menu-user-help","PageManager","loadPageStart","url","menu-user-timeman","bx24ModernStyle","menu-user-logout","logOut","buttonId","button","bind","addClass","removeClass","page_id","target","isChild","hasClass","parentNode","nodeType","unselectItem","selectItem","getAttribute","setTimeout","name","mpAppFlag","mpAppId","mpAppName","pageId","sideNotifyPanel","pageParams","protocol","host","onclick","item","counterType","value","zeroCounterTS","totalCount","counter","toLowerCase","plus","valueContainer","findChild","className","innerHTML","test","zeroCounter","key","parseInt","prototype","userList","isExtranetUser","listUserSettings","isroot","table_settings","alphabet_index","outsection","openNewPage","openBXTable","closeMenu","platform","localStorage","get","confirm","text","buttonIndex","ajax","json","console","log","response","JSON","parse","token","urlPath","openUrl","bpList","p","useTagsInSearch","webdavList","diskList","storageData","path","encodeURIComponent","entityId","MobileUI","List","show","showTitle","overflowmenu","undefined","table_id","cache","use_sections","loadPage","MobileMenu","addListener","eventName","listObject","Events","ON_ITEM_MORE_CHOOSED","showMenu","title","sort","NAME","ID","post","objectId","sessid","bitrix_sessid","link","alert"],"mappings":"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","file":""}