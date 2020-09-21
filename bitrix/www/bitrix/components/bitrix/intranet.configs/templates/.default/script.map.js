{"version":3,"sources":["script.js"],"names":["BX","namespace","Bitrix24","Configs","LogoClass","ajax_path","this","ajaxPath","prototype","LogoChange","mode","style","display","ajax","submit","reply","json","JSON","parse","error","error_block","findChild","class","innerHTML","path","src","e","LogoDelete","curLink","confirm","message","post","client_delete_logo","sessid","bitrix_sessid","IpSettingsClass","arCurIpRights","DeleteIpAccessRow","ob","tdObj","parentNode","remove","allInputBlocks","findChildren","tagName","length","deleteRight","getAttribute","arCurIpRightsNew","i","push","ShowIpAccessPopup","val","curObj","Access","Init","other","disabled","disabled_g2","disabled_cr","groups","socnetgroups","startValue","SetSelected","ShowForm","callback","arRights","pr","provider","GetProviderName","right","insertBlock","create","attrs","data-bx-right","children","html","name","props","className","colspan","type","size","events","click","addInputForIp","href","title","insertBefore","input","inputParent","nextSibling","newInputBlock","clone","newInput","firstChild","value","onclick","appendChild","Functions","addressFormatList","init","toAllCheckBox","defaultCont","bind","delegate","checked","rightsCont","client_logo","B24ConfigsLogo","client_logo_retina","toChatAllCheckBox","chatRightsCont","mpUserInstallChechBox","mpUserInstallCont","addressFormatSelect","addressFormatDescription","isDomNode","proxy","showHideSmtpAuth","submitForm","button","addClass","otpSwitchOffInfo","elem","PopupWindowManager","autoHide","offsetLeft","offsetTop","overlay","draggable","restrict","closeByEsc","closeIcon","top","content","show","onGdprChange","element","items","document","querySelectorAll","visibility","adminOtpIsRequiredInfo","showDiskExtendedFullTextInfo","event","stopPropagation","preventDefault","geoDataSwitch","UI","Dialogs","MessageBox","modal","minWidth","buttons","MessageBoxButtons","OK_CANCEL","okCaption","onOk"],"mappings":"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","file":"script.map.js"}