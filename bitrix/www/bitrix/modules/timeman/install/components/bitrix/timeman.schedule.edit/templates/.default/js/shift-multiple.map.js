{"version":3,"sources":["shift-multiple.js"],"names":["BX","namespace","Timeman","Component","Schedule","ShiftEdit","Multiple","options","this","observersData","apply","arguments","workdaysOptions","shiftWorkdaysOptions","customWorkdaysText","shiftedScheduleTypeName","uniqueIndex","isScheduleFixed","visible","formFields","container","querySelectorAll","i","length","name","replace","showElement","undefined","shiftId","selectOneByRole","value","workdaysToggle","workdaysInput","workDaysSelector","pencil","nameInput","workdaysBlocks","selectAllByRole","nameBlock","workDaysBlock","nameSpan","deleteSelfBtn","defaultName","textContent","prevShiftEnd","workTimeStartLink","workTimeStartInput","prevShiftStart","prevDuration","calculateDurationSeconds","workTimeEndLink","beautifyTime","convertFormattedTimeToSecs","workTimeEndInput","id","querySelector","htmlFor","isScheduleShifted","setBreakSeconds","initDurationWithoutBreak","addSelfEventHandlers","prototype","__proto__","constructor","bind","delegate","showWorkdaysOptionsPopup","startNameEdit","endNameEdit","onDeleteSelfBtnClick","processBeforeCollectFormData","innerText","workDaysItems","workdays","checked","push","sort","join","getFormattedDeltaTime","minuend","subtrahend","beautifyTimeLocal","onScheduleTypeSelected","selectedValue","fixedScheduleTypeName","hideElement","showWorkdaysBySelectedValue","breakTimeLink","event","focus","val","util","htmlspecialchars","attachOnDeleteEvent","obj","eventType","observer","document","updateOnShiftEvent","shift","remove","buildWorkdaysPopup","menuItems","item","text","title","dataset","onclick","workdaysPopup","close","PopupMenu","create","Math","random","autoHide","show"],"mappings":"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","file":"shift-multiple.map.js"}