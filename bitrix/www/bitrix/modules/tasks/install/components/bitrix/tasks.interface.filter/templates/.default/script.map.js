{"version":3,"sources":["script.js"],"names":["BX","FilterEntitySelector","this","_id","_settings","_fieldId","_control","_selector","_inputKeyPressHandler","delegate","keypress","prototype","initialize","id","settings","getSetting","addCustomEvent","window","onCustomEntitySelectorOpen","onCustomEntitySelectorClose","getId","name","defaultval","hasOwnProperty","e","open","field","query","Tasks","Integration","Socialnetwork","NetworkSelector","scope","mode","useSearch","useAdd","parent","popupOffsetTop","popupOffsetLeft","bindEvent","data","setData","util","htmlspecialcharsback","nameFormatted","close","control","closeAll","k","items","create","self","TasksGroupsSelectorInit","menu","selectorId","buttonAddId","pathTaskAdd","indexOf","messages","groups","currentGroup","groupLimit","offsetLeft","setTaskAddHref","groupId","setAttribute","parseInt","text","htmlspecialchars","bind","menuItems","clickHandler","item","onCustomEvent","currentMenuItems","getMenuItems","addMenuItem","onclick","length","getMenuItem","removeMenuItem","innerHTML","i","c","push","class","delimiter","TASKS_BTN_GROUP_SELECT","event","getPopupWindow","setAutoHide","selector","getContainer","substring","PopupMenu","autoHide","closeByEsc","popupWindow","show","SortManager","setSort","dir","gridId","Main","gridManager","undefined","grid","getById","instance","sortByColumn","sort_by","sort_order","getRows","enableDragAndDrop","disableDragAndDrop","ajax","post","add_url_param","GRID_ID","action","by","order","res","JSON","parse","error","location","reload","err","SprintSelector","containerId","sprints","params","menuSprintItems","sprintId","className","menuItem","menuWindow","removeClass","layout","addClass","menuSprint","PopupMenuWindow","ProjectSelector","reloadProject","url","document","href","group_id"],"mappings":"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","file":"script.map.js"}