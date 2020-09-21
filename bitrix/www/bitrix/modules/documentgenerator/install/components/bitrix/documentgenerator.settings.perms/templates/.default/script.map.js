{"version":3,"sources":["script.js"],"names":["BX","namespace","DocumentGenerator","Perms","main","accessTable","accessTableBody","accessTableLastRow","rolesTableBody","rolesTableLastRow","isPermissionsFeatureEnabled","init","element","params","this","querySelector","Access","Init","other","disabled","bindDelegate","className","proxy","onDeleteRole","onDeleteAccess","onAddAccess","onSelectRole","onEditRole","addCustomEvent","message","getEventId","data","getData","role","type","isNotEmptyObject","template","innerHTML","replaceTemplateData","ID","id","NAME","name","EDIT_URL","getEditRoleUrl","newElement","create","html","dataset","roleId","insertBefore","updateRoleFields","e","preventDefault","stopPropagation","target","elementsToRemove","document","querySelectorAll","confirm","confirmed","showPermissionsFeaturePopup","analyticsLabel","method","showWait","ajax","runAction","then","closeWait","i","length","remove","response","showError","errors","pop","roleAccessCode","accessCode","selectedAccessCodes","rowCount","rows","SetSelected","ShowForm","bind","callback","providerName","accessName","provider","GetProviderName","renderNewAccessCode","PROVIDER","ACCESS_CODE","updateRoleSelect","getRoles","value","tableRow","title","text","result","popupId","popupWindow","PopupWindow","content","titleBar","closeByEsc","buttons","PopupWindowButton","events","click","close","isFunction","PopupWindowButtonLink","show","SidePanel","Instance","open","href","width","cacheable","location","save","setTimeout","removeClass","accesses","push","fireEvent","alert","UI","Alert","color","Color","DANGER","icon","Icon","adjust","append","getContainer","isPlainObject","replace","match","variable","hasOwnProperty","addRoleUrl","util","add_url_param","top","InfoHelper","roles","nodes","children","innerText","selectItems","selectNode","currentRoles","options","option","attrs","data-role-id","appendChild","Role","form","fields","permissions","action","elements","indexOf","entity","slider","getTopSlider","postMessage","window"],"mappings":"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","file":"script.map.js"}