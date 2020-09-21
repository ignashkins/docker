{"version":3,"sources":["tree.js"],"names":["BX","namespace","Disk","Tree","Structure","rootObject","parameters","type","isPlainObject","events","this","multipleChoice","ajaxUrl","rootNode","container","onSelectFolder","onUnSelectFolder","setEvents","prototype","buildByRoot","buildByObject","buildTreeNode","loadSubFolders","id","then","response","ul","create","props","className","appendChild","buildTree","parentNode","bind","getRootNode","objectId","ajaxPromise","method","dataType","url","addToLinkParam","data","showSubFolders","node","getAttribute","ignoreNode","items","length","forEach","item","cleanNode","findChildByClassName","removeClass","addClass","object","canAdd","dataset","hasSubFolders","children","click","onClickToExpand","onClickTreeNode","dblclick","text","name","e","target","srcElement","parent","findParent","isOpened","collapse","expand","hasClass","isSelectedNode","unselectNode","onCustomEvent","lastUnselectedFolder","isFunction","selectNode","unselectAllNodes","getSelectedNodes","getByClass","getFirstSelectedNode","nodes","getFirstSelectedId","ids","getSelectedIds","map","Modal","tree","modalParameters","modalWindow","enableKeyboardNavigation","heightNode","paddingModal","addHandlers","show","_keyPress","handleKeyPress","height","Math","min","document","documentElement","clientHeight","bindElement","title","message","overlay","autoHide","modalId","content","contentTitle","buildContentTitle","onPopupShow","onPopupClose","unbind","buttons","titleMessage","handleEnter","handleUpArrow","previousSibling","preventDefault","getNextSibling","nextSibling","handleDownArrow","handleLeftArrow","handleRightArrow","key","window","event","keyCode","charCode","handleSelectFolder","previousSelected","isVisibleNode","offsetTop","contentContainer","scrollTop","scrollToNode","addCustomEvent","buildByTree","NavigateModal","apply","arguments","__proto__","constructor","location","getUrlToShowObjectInGrid","rootElement","first","result","getElementsByClassName","slice","call"],"mappings":"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","file":""}