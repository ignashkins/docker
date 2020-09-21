<?php
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2013 Bitrix
 */

require_once(substr(__FILE__, 0, strlen(__FILE__) - strlen("/include.php"))."/bx_root.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/start.php");

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/virtual_io.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/virtual_file.php");

$application = \Bitrix\Main\Application::getInstance();
$application->initializeExtendedKernel(array(
	"get" => $_GET,
	"post" => $_POST,
	"files" => $_FILES,
	"cookie" => $_COOKIE,
	"server" => $_SERVER,
	"env" => $_ENV
));

//define global application object
$GLOBALS["APPLICATION"] = new CMain;

if(defined("SITE_ID"))
	define("LANG", SITE_ID);

if(defined("LANG"))
{
	if(defined("ADMIN_SECTION") && ADMIN_SECTION===true)
		$db_lang = CLangAdmin::GetByID(LANG);
	else
		$db_lang = CLang::GetByID(LANG);

	$arLang = $db_lang->Fetch();

	if(!$arLang)
	{
		throw new \Bitrix\Main\SystemException("Incorrect site: ".LANG.".");
	}
}
else
{
	$arLang = $GLOBALS["APPLICATION"]->GetLang();
	define("LANG", $arLang["LID"]);
}

if($arLang["CULTURE_ID"] == '')
{
	throw new \Bitrix\Main\SystemException("Culture not found, or there are no active sites or languages.");
}

$lang = $arLang["LID"];
if (!defined("SITE_ID"))
	define("SITE_ID", $arLang["LID"]);
define("SITE_DIR", $arLang["DIR"]);
define("SITE_SERVER_NAME", $arLang["SERVER_NAME"]);
define("SITE_CHARSET", $arLang["CHARSET"]);
define("FORMAT_DATE", $arLang["FORMAT_DATE"]);
define("FORMAT_DATETIME", $arLang["FORMAT_DATETIME"]);
define("LANG_DIR", $arLang["DIR"]);
define("LANG_CHARSET", $arLang["CHARSET"]);
define("LANG_ADMIN_LID", $arLang["LANGUAGE_ID"]);
define("LANGUAGE_ID", $arLang["LANGUAGE_ID"]);

$culture = \Bitrix\Main\Localization\CultureTable::getByPrimary($arLang["CULTURE_ID"], ["cache" => ["ttl" => CACHED_b_lang]])->fetchObject();

$context = $application->getContext();
$context->setLanguage(LANGUAGE_ID);
$context->setCulture($culture);

$request = $context->getRequest();
if (!$request->isAdminSection())
{
	$context->setSite(SITE_ID);
}

$application->start();

$GLOBALS["APPLICATION"]->reinitPath();

if (!defined("POST_FORM_ACTION_URI"))
{
	define("POST_FORM_ACTION_URI", htmlspecialcharsbx(GetRequestUri()));
}

$GLOBALS["MESS"] = array();
$GLOBALS["ALL_LANG_FILES"] = array();
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/tools.php");
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/classes/general/database.php");
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/classes/general/main.php");
IncludeModuleLangFile(__FILE__);

error_reporting(COption::GetOptionInt("main", "error_reporting", E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR|E_PARSE) & ~E_STRICT & ~E_DEPRECATED);

if(!defined("BX_COMP_MANAGED_CACHE") && COption::GetOptionString("main", "component_managed_cache_on", "Y") <> "N")
{
	define("BX_COMP_MANAGED_CACHE", true);
}

require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/filter_tools.php");
require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/ajax_tools.php");

/*ZDUyZmZNDFlMGEwMjQ5NDk0ZDFmMDI2NmQyODI3ODViZDVhM2U=*/$GLOBALS['_____1811068319']= array(base64_decode(''.'R2V0'.'TW'.'9'.'k'.'d'.'WxlRX'.'Z'.'lbnR'.'z'),base64_decode('RXh'.'lY3V0ZU1vZH'.'Vs'.'ZUV2'.'ZW50RXg='));$GLOBALS['____1605720928']= array(base64_decode(''.'ZGVm'.'aW5l'),base64_decode('c3RybGV'.'u'),base64_decode('Y'.'m'.'FzZT'.'Y0X2RlY29kZQ=='),base64_decode('d'.'W5'.'zZ'.'XJpYW'.'xpemU='),base64_decode('aXN'.'fYXJyYXk='),base64_decode('Y29'.'1bnQ='),base64_decode('aW5'.'fYXJy'.'YXk='),base64_decode('c2Vya'.'WF'.'saXpl'),base64_decode('YmFzZ'.'TY0X2V'.'u'.'Y'.'2'.'9kZQ'.'=='),base64_decode('c'.'3R'.'ybGVu'),base64_decode('YXJyYXlfa2V5X'.'2V'.'4aXN0cw=='),base64_decode('Y'.'XJy'.'YX'.'lfa2V5X2'.'V'.'4'.'aXN0c'.'w'.'=='),base64_decode('b'.'Wt'.'0'.'aW1l'),base64_decode('ZGF0'.'ZQ=='),base64_decode('ZGF0Z'.'Q=='),base64_decode('Y'.'XJyYXlfa2V5X2V4a'.'XN'.'0cw='.'='),base64_decode(''.'c3Ry'.'b'.'GVu'),base64_decode('YXJyYXlfa2V5X2V4'.'a'.'X'.'N0'.'c'.'w'.'='.'='),base64_decode('c3R'.'yb'.'GVu'),base64_decode(''.'YXJyYXlfa'.'2V5X2V'.'4aXN0cw=='),base64_decode('YXJyY'.'Xlf'.'a2V5'.'X2V4a'.'X'.'N0c'.'w='.'='),base64_decode('bWt'.'0a'.'W1l'),base64_decode('ZGF0'.'ZQ=='),base64_decode('ZGF0ZQ=='),base64_decode('bWV0aG'.'9k'.'X'.'2V4'.'aXN0cw=='),base64_decode('Y2FsbF9'.'1'.'c2Vy'.'X2Z1bmNfYXJyYXk='),base64_decode(''.'c3RybGV'.'u'),base64_decode(''.'YXJ'.'yYX'.'l'.'fa2V5X2V4aXN'.'0cw=='),base64_decode('YX'.'J'.'y'.'YXlf'.'a'.'2'.'V5X2'.'V'.'4'.'aXN0cw='.'='),base64_decode('c'.'2V'.'yaWFsaXp'.'l'),base64_decode('YmF'.'zZT'.'Y0X2V'.'uY'.'29kZQ=='),base64_decode('c'.'3RybG'.'Vu'),base64_decode('Y'.'XJy'.'YXl'.'f'.'a2V5X2V'.'4aXN0cw'.'=='),base64_decode('YXJ'.'y'.'YXl'.'fa2V'.'5X2'.'V4aXN0c'.'w='.'='),base64_decode('YXJ'.'yYXlfa'.'2V5X2V4aXN0cw'.'='.'='),base64_decode('aXNfY'.'X'.'JyYXk='),base64_decode('YXJyYX'.'lfa2V5X2V4aX'.'N0cw=='),base64_decode('c2Vya'.'W'.'F'.'saXpl'),base64_decode(''.'Y'.'mFzZTY'.'0X2VuY'.'29'.'kZQ=='),base64_decode('Y'.'XJy'.'YXl'.'fa2V'.'5'.'X2V4a'.'X'.'N0cw'.'=='),base64_decode('YXJ'.'yYX'.'lfa2V5X2V4aXN0cw=='),base64_decode('c'.'2VyaWF'.'s'.'aX'.'p'.'l'),base64_decode('YmFzZTY'.'0'.'X'.'2Vu'.'Y'.'29'.'kZQ='.'='),base64_decode('a'.'XN'.'fYX'.'Jy'.'YXk='),base64_decode('aXNf'.'YXJyYXk'.'='),base64_decode('a'.'W5fY'.'XJyYXk='),base64_decode('YXJyYXlfa2V5'.'X2V'.'4aX'.'N0'.'cw=='),base64_decode('aW'.'5fYXJyY'.'Xk'.'='),base64_decode('bWt0aW'.'1l'),base64_decode('ZG'.'F0ZQ=='),base64_decode('ZGF0ZQ'.'=='),base64_decode('ZG'.'F0ZQ='.'='),base64_decode('bWt'.'0aW1'.'l'),base64_decode('ZGF0'.'Z'.'Q=='),base64_decode(''.'ZGF0Z'.'Q'.'=='),base64_decode('aW5fYXJyYXk'.'='),base64_decode('YXJyYX'.'lf'.'a2V5X2V'.'4aXN0'.'cw='.'='),base64_decode('YXJyYXlfa2V5X2V4aXN'.'0cw=='),base64_decode('c2VyaW'.'F'.'saXp'.'l'),base64_decode('YmFzZTY0X'.'2VuY29'.'kZQ=='),base64_decode('YXJyYXlfa2V'.'5X2V4aXN'.'0cw=='),base64_decode('aW50dmF'.'s'),base64_decode('d'.'Gl'.'tZQ'.'=='),base64_decode('YXJyYXl'.'fa2'.'V'.'5X2'.'V4aXN'.'0cw='.'='),base64_decode('Z'.'m'.'lsZ'.'V9l'.'e'.'GlzdH'.'M='),base64_decode('c3'.'RyX3J'.'lcGxhY'.'2U'.'='),base64_decode('Y2xhc3NfZXhpc3Rz'),base64_decode(''.'ZGVm'.'aW5'.'l'));if(!function_exists(__NAMESPACE__.'\\___1161198963')){function ___1161198963($_1413704206){static $_1516844108= false; if($_1516844108 == false) $_1516844108=array(''.'SU5'.'UUkFORVRfRURJVElPTg==','WQ='.'=','bWF'.'pbg==',''.'f'.'mNwZl9tYXB'.'f'.'d'.'mFsd'.'WU=','','ZQ==',''.'Zg==',''.'ZQ==','R'.'g==',''.'WA==','Zg==',''.'bWFpbg==','f'.'mNwZ'.'l9t'.'YXBf'.'dm'.'FsdWU=','UG9ydGFs','Rg'.'==','ZQ'.'==',''.'ZQ'.'==','WA==','R'.'g==',''.'R'.'A==','RA==','bQ==','Z'.'A='.'=','WQ==','Zg'.'==','Zg==','Zg==','Zg'.'==','UG9yd'.'G'.'Fs','R'.'g==','ZQ==','ZQ'.'==','WA==','Rg==','RA'.'==','RA='.'=','bQ==','ZA'.'==','W'.'Q'.'==','bWFpbg='.'=','T24=',''.'U'.'2V0dGluZ3NDaGFuZ2U=',''.'Zg==','Zg==','Z'.'g'.'='.'=',''.'Z'.'g==','bWFpbg='.'=','fmNwZl9tYXBfd'.'mF'.'sdWU'.'=','ZQ='.'=','ZQ='.'=',''.'Z'.'Q==','R'.'A==','ZQ='.'=','ZQ'.'==','Zg==','Zg==','Zg==','ZQ==','bWFpb'.'g==','f'.'mN'.'wZl'.'9tYX'.'BfdmFsdW'.'U'.'=','ZQ==','Zg'.'='.'=','Z'.'g='.'=',''.'Zg==','Zg'.'='.'=','bWFp'.'bg='.'=','f'.'mN'.'wZl9tYXBfdmF'.'sdWU=',''.'ZQ==','Zg'.'==','UG9ydGFs','UG9'.'ydGF'.'s','ZQ==','ZQ==','UG9'.'ydG'.'F'.'s','Rg==',''.'WA==','Rg==','RA==','ZQ==','Z'.'Q==','RA==','bQ'.'==','ZA==',''.'WQ==','ZQ==','W'.'A'.'==','ZQ==','Rg==','Z'.'Q==','RA==','Z'.'g='.'=','ZQ'.'==','RA==',''.'Z'.'Q==','bQ'.'==','Z'.'A'.'==','WQ==',''.'Zg==','Zg==','Z'.'g==',''.'Zg==',''.'Zg'.'==','Zg==','Zg='.'=',''.'Zg==','bW'.'Fpbg'.'==','f'.'mNwZ'.'l'.'9tYXBfdmFs'.'d'.'WU=','ZQ'.'==','ZQ='.'=','UG9'.'ydGFs','Rg==','WA'.'==','V'.'FlQ'.'RQ='.'=','REFURQ==','RkVB'.'VF'.'VSR'.'VM=','RV'.'hQ'.'SV'.'J'.'F'.'R'.'A'.'==','VFlQR'.'Q==','RA='.'=',''.'VFJZX0RBW'.'VN'.'fQ09VTlQ=','R'.'EF'.'URQ==','VF'.'JZX0R'.'BWVNfQ09'.'VT'.'lQ=','RVhQ'.'S'.'VJ'.'FRA==','Rk'.'V'.'BVFVSRV'.'M=','Zg==','Z'.'g==',''.'RE9'.'DVU1FTl'.'R'.'fUk9PVA='.'=','L2JpdHJp'.'eC9t'.'b'.'2R1bGVzLw'.'==','L'.'2luc'.'3Rhb'.'GwvaW5k'.'Z'.'X'.'gucGhw','Lg='.'=',''.'Xw==','c2VhcmNo','Tg==','','',''.'Q'.'UNUSVZF',''.'WQ==','c29j'.'aWFsbmV0d'.'29yaw==','YWxs'.'b3df'.'Z'.'nJpZW'.'xkcw==','WQ==','SUQ=',''.'c'.'29ja'.'WFs'.'bmV'.'0d2'.'9yaw==','YWxs'.'b'.'3'.'d'.'fZ'.'nJp'.'ZWxkcw='.'=','SUQ=','c'.'29jaWFsbmV0d29'.'ya'.'w==','YWxsb3'.'dfZnJpZW'.'xkcw==','T'.'g==','','','QUNU'.'SVZF','W'.'Q'.'==',''.'c29'.'jaWFsbmV'.'0d29yaw='.'=',''.'YWxs'.'b3'.'df'.'b'.'Wljcm'.'9ibG9nX3Vz'.'ZX'.'I=','WQ==','SUQ=','c29jaWFsb'.'mV'.'0d'.'2'.'9yaw==','YW'.'xsb3dfb'.'Wljc'.'m9i'.'bG9nX3VzZXI'.'=',''.'SUQ=',''.'c2'.'9ja'.'WFsbmV'.'0'.'d29yaw==','YWxsb3df'.'bWljcm'.'9ibG9nX3'.'V'.'z'.'Z'.'X'.'I'.'=',''.'c29'.'jaW'.'Fsbm'.'V0'.'d'.'29yaw==',''.'YWxsb3dfbWljcm'.'9ibG9nX2dyb3Vw','WQ'.'==','SUQ=','c29jaWF'.'sbmV'.'0d'.'29y'.'aw'.'==','YWxsb3'.'dfbW'.'ljcm9ibG'.'9n'.'X2dyb3Vw','SUQ=','c29jaWF'.'sbmV0d2'.'9yaw'.'==',''.'YWxsb3dfbWl'.'jcm9ibG9'.'n'.'X2dyb3Vw','Tg==','','',''.'Q'.'UNUS'.'VZF',''.'W'.'Q==','c2'.'9jaWFs'.'bmV0d29yaw==',''.'YWxsb3dfZmlsZX'.'N'.'f'.'d'.'XNlcg==','WQ'.'==','SUQ=','c29'.'ja'.'WFs'.'bmV0d'.'29'.'yaw==',''.'YWxsb3df'.'Z'.'mls'.'ZXNfd'.'X'.'Nlcg==','SUQ'.'=','c2'.'9j'.'aW'.'FsbmV0d29y'.'aw==','YWx'.'sb3dfZ'.'ml'.'sZX'.'N'.'fdX'.'Nlcg'.'==','T'.'g==','','','QUNU'.'SVZ'.'F','WQ==',''.'c'.'2'.'9jaW'.'Fsbm'.'V0d'.'29'.'yaw'.'==','YWxsb3'.'d'.'fY'.'mxvZ1'.'91c2V'.'y','W'.'Q==','SUQ=','c29j'.'aWF'.'sbm'.'V0d29yaw'.'='.'=','YWxsb'.'3dfYmxvZ191c2Vy','SUQ=','c29j'.'aW'.'F'.'sbmV0d29'.'yaw'.'='.'=','YWxsb3'.'dfYm'.'xvZ191c'.'2'.'Vy','Tg==','','','QUN'.'US'.'VZF','W'.'Q==','c29jaW'.'FsbmV0'.'d29'.'yaw==','YWxsb'.'3'.'d'.'f'.'c'.'GhvdG9fd'.'X'.'Nl'.'c'.'g'.'==','WQ==','SUQ'.'=',''.'c29jaWFsbmV0d2'.'9ya'.'w==','Y'.'Wxsb3dfcGhvdG9fdX'.'Nlcg==','SUQ=','c29ja'.'WF'.'sbmV0d29'.'yaw==','YWx'.'sb3df'.'cG'.'h'.'vdG9fdXNlcg'.'='.'=','Tg==','','',''.'QUNUSV'.'ZF','WQ==',''.'c29jaWFsbmV0d29yaw='.'=','YWxsb3dfZm9'.'y'.'d'.'W1fdXNlcg==',''.'WQ==','SUQ=','c29jaWFsbmV0d29ya'.'w'.'==','YWxs'.'b3d'.'fZ'.'m9ydW'.'1fdXN'.'lcg==','S'.'UQ'.'=','c29j'.'a'.'WFsbmV'.'0d'.'29yaw='.'=','YWxs'.'b3'.'d'.'fZm9y'.'dW1f'.'dXNlcg==','Tg==','','','QUNUSVZ'.'F','WQ==',''.'c'.'29jaWF'.'s'.'bmV0d29'.'yaw'.'==','Y'.'Wxsb'.'3dfdGFza3Nfd'.'XNlcg='.'=','WQ'.'='.'=',''.'SUQ=','c29jaWFsbmV0'.'d29ya'.'w==','YWxsb3'.'df'.'dGFza'.'3NfdXNlcg'.'='.'=','SUQ=',''.'c'.'29j'.'aWFs'.'bmV0d29y'.'a'.'w==','YWxsb3dfdGFza'.'3'.'Nf'.'d'.'XN'.'lcg==','c'.'29jaWFs'.'bmV0d'.'29ya'.'w==','Y'.'Wxsb3dfdGFz'.'a3NfZ'.'3JvdXA=','W'.'Q'.'==','SU'.'Q=',''.'c2'.'9j'.'aW'.'FsbmV0d29y'.'aw==','Y'.'W'.'xsb'.'3dfdG'.'Fza3NfZ3'.'Jvd'.'XA=','SUQ'.'=','c29jaW'.'Fsbm'.'V'.'0d29yaw==','YW'.'xsb3df'.'dGFza3'.'NfZ3J'.'vdX'.'A=','d'.'GFza3'.'M=','Tg==','','','QUNUSV'.'ZF',''.'WQ==','c29jaWFsb'.'mV'.'0d29yaw'.'==','YWx'.'sb3dfY2FsZ'.'W5'.'kYXJ'.'fdXN'.'l'.'cg==','W'.'Q==','SU'.'Q=','c29'.'jaWFsb'.'mV'.'0d29y'.'aw='.'=','YWxsb3df'.'Y2Fs'.'ZW5'.'kYXJfdXN'.'l'.'cg==','SUQ=','c29jaW'.'F'.'sbmV'.'0d2'.'9ya'.'w='.'=','YWx'.'s'.'b3dfY'.'2FsZW5'.'kY'.'XJfdXNlcg==','c29'.'ja'.'WFsbmV'.'0d29'.'yaw==','YWxsb3d'.'fY'.'2FsZW'.'5'.'kY'.'XJfZ3J'.'v'.'d'.'XA=','WQ'.'==','SUQ'.'=','c2'.'9jaWFsbm'.'V0'.'d29'.'yaw'.'==','Y'.'Wxsb3'.'d'.'f'.'Y2FsZW5kY'.'X'.'JfZ'.'3J'.'vdXA'.'=','SU'.'Q=','c29j'.'aWF'.'s'.'b'.'mV0'.'d'.'29yaw==',''.'YWxsb3d'.'fY2F'.'s'.'ZW5'.'kYXJ'.'fZ'.'3JvdXA=','QUNUSVZF','WQ==','Tg==','ZX'.'h0c'.'mFu'.'ZXQ=','aWJsb2Nr','T'.'25BZnR'.'lck'.'lCbG9'.'j'.'a0VsZ'.'W'.'1'.'lbnRVc'.'GRhd'.'G'.'U=','aW50c'.'mFuZ'.'XQ'.'=','Q'.'0l'.'u'.'dHJhbmV0RXZl'.'b'.'nR'.'IYW5k'.'bGV'.'y'.'c'.'w='.'=','U1BS'.'Z'.'Wdpc3Rl'.'clVwZ'.'G'.'F0ZWRJ'.'dGVt','Q0'.'ludHJhbm'.'V0U2hhc'.'m'.'Vwb2ludDo6'.'Q'.'W'.'dlbnR'.'MaXN0cygpOw==','aW50cm'.'Fu'.'ZXQ'.'=','Tg='.'=','Q0ludHJhbmV0U'.'2hhcmV'.'wb2ludDo'.'6'.'QWdl'.'b'.'nRRdWV1ZSgpO'.'w'.'==','aW50cmF'.'uZX'.'Q=','Tg==','Q0ludHJ'.'hbm'.'V0U2hhcmVwb2lud'.'D'.'o6Q'.'Wdlb'.'nRVc'.'GRh'.'dGUoK'.'Ts=',''.'a'.'W50'.'cmFuZ'.'XQ=',''.'Tg==','aWJs'.'b2Nr',''.'T25B'.'Z'.'nR'.'lcklCb'.'G9j'.'a'.'0VsZW1lb'.'n'.'RBZ'.'GQ=','aW50cmFuZ'.'XQ=','Q0lud'.'H'.'J'.'hbmV'.'0RXZlbnRIYW5kbGVycw==','U1BSZWdpc3Rlc'.'lVwZG'.'F0ZWR'.'JdGVt','aWJsb2Nr','T25BZnRlckl'.'CbG9'.'j'.'a'.'0VsZW1lbnRV'.'cG'.'RhdGU=','aW50cm'.'Fu'.'ZXQ=','Q0l'.'u'.'dHJhbmV0RXZlb'.'nRIYW5kbG'.'Vy'.'cw='.'=','U1BSZWdpc'.'3R'.'lclVwZG'.'F0Z'.'WRJdGVt','Q0'.'ludHJhb'.'mV'.'0U2'.'hhcm'.'Vwb2lud'.'Do6Q'.'Wd'.'lbn'.'RMaXN0'.'cyg'.'pOw==','aW50cm'.'Fu'.'ZXQ'.'=','Q'.'0ludHJh'.'bm'.'V0U2'.'hhcmV'.'wb2'.'ludDo6Q'.'Wd'.'lbnR'.'R'.'dWV'.'1ZSg'.'pO'.'w='.'=','aW50cmF'.'uZXQ=','Q0ludHJhb'.'m'.'V'.'0U2hhcmVwb2lu'.'dDo6Q'.'WdlbnRVcGRhdG'.'UoKTs=','aW50cmFu'.'ZXQ'.'=','Y3Jt','bWFp'.'b'.'g==','T25'.'CZW'.'Zvc'.'mV'.'Qcm9sb2c'.'=','bWFpbg==','Q1d'.'pemF'.'yZFNvbFBhbmVsSW50cm'.'FuZ'.'X'.'Q=',''.'U2hvd1BhbmVs','L21'.'vZHVs'.'ZXMvaW50'.'cm'.'FuZXQvcGFuZ'.'Wxf'.'YnV0dG9uL'.'nBo'.'cA'.'='.'=','RU5DT0R'.'F','WQ'.'==');return base64_decode($_1516844108[$_1413704206]);}};$GLOBALS['____1605720928'][0](___1161198963(0), ___1161198963(1));class CBXFeatures{ private static $_45723401= 30; private static $_1860456978= array( "Portal" => array( "CompanyCalendar", "CompanyPhoto", "CompanyVideo", "CompanyCareer", "StaffChanges", "StaffAbsence", "CommonDocuments", "MeetingRoomBookingSystem", "Wiki", "Learning", "Vote", "WebLink", "Subscribe", "Friends", "PersonalFiles", "PersonalBlog", "PersonalPhoto", "PersonalForum", "Blog", "Forum", "Gallery", "Board", "MicroBlog", "WebMessenger",), "Communications" => array( "Tasks", "Calendar", "Workgroups", "Jabber", "VideoConference", "Extranet", "SMTP", "Requests", "DAV", "intranet_sharepoint", "timeman", "Idea", "Meeting", "EventList", "Salary", "XDImport",), "Enterprise" => array( "BizProc", "Lists", "Support", "Analytics", "crm", "Controller", "LdapUnlimitedUsers",), "Holding" => array( "Cluster", "MultiSites",),); private static $_1031268506= false; private static $_166427773= false; private static function __1511318637(){ if(self::$_1031268506 == false){ self::$_1031268506= array(); foreach(self::$_1860456978 as $_392199507 => $_735729164){ foreach($_735729164 as $_69316001) self::$_1031268506[$_69316001]= $_392199507;}} if(self::$_166427773 == false){ self::$_166427773= array(); $_1046424744= COption::GetOptionString(___1161198963(2), ___1161198963(3), ___1161198963(4)); if($GLOBALS['____1605720928'][1]($_1046424744)>(1308/2-654)){ $_1046424744= $GLOBALS['____1605720928'][2]($_1046424744); self::$_166427773= $GLOBALS['____1605720928'][3]($_1046424744); if(!$GLOBALS['____1605720928'][4](self::$_166427773)) self::$_166427773= array();} if($GLOBALS['____1605720928'][5](self::$_166427773) <= min(34,0,11.333333333333)) self::$_166427773= array(___1161198963(5) => array(), ___1161198963(6) => array());}} public static function InitiateEditionsSettings($_1529807324){ self::__1511318637(); $_125633113= array(); foreach(self::$_1860456978 as $_392199507 => $_735729164){ $_1801032851= $GLOBALS['____1605720928'][6]($_392199507, $_1529807324); self::$_166427773[___1161198963(7)][$_392199507]=($_1801032851? array(___1161198963(8)): array(___1161198963(9))); foreach($_735729164 as $_69316001){ self::$_166427773[___1161198963(10)][$_69316001]= $_1801032851; if(!$_1801032851) $_125633113[]= array($_69316001, false);}} $_1758722488= $GLOBALS['____1605720928'][7](self::$_166427773); $_1758722488= $GLOBALS['____1605720928'][8]($_1758722488); COption::SetOptionString(___1161198963(11), ___1161198963(12), $_1758722488); foreach($_125633113 as $_1965066243) self::__154817238($_1965066243[(173*2-346)], $_1965066243[round(0+0.2+0.2+0.2+0.2+0.2)]);} public static function IsFeatureEnabled($_69316001){ if($GLOBALS['____1605720928'][9]($_69316001) <= 0) return true; self::__1511318637(); if(!$GLOBALS['____1605720928'][10]($_69316001, self::$_1031268506)) return true; if(self::$_1031268506[$_69316001] == ___1161198963(13)) $_1473485116= array(___1161198963(14)); elseif($GLOBALS['____1605720928'][11](self::$_1031268506[$_69316001], self::$_166427773[___1161198963(15)])) $_1473485116= self::$_166427773[___1161198963(16)][self::$_1031268506[$_69316001]]; else $_1473485116= array(___1161198963(17)); if($_1473485116[(984-2*492)] != ___1161198963(18) && $_1473485116[(214*2-428)] != ___1161198963(19)){ return false;} elseif($_1473485116[(1496/2-748)] == ___1161198963(20)){ if($_1473485116[round(0+0.33333333333333+0.33333333333333+0.33333333333333)]< $GLOBALS['____1605720928'][12]((188*2-376),(1156/2-578),(994-2*497), Date(___1161198963(21)), $GLOBALS['____1605720928'][13](___1161198963(22))- self::$_45723401, $GLOBALS['____1605720928'][14](___1161198963(23)))){ if(!isset($_1473485116[round(0+0.4+0.4+0.4+0.4+0.4)]) ||!$_1473485116[round(0+0.4+0.4+0.4+0.4+0.4)]) self::__1010931103(self::$_1031268506[$_69316001]); return false;}} return!$GLOBALS['____1605720928'][15]($_69316001, self::$_166427773[___1161198963(24)]) || self::$_166427773[___1161198963(25)][$_69316001];} public static function IsFeatureInstalled($_69316001){ if($GLOBALS['____1605720928'][16]($_69316001) <= 0) return true; self::__1511318637(); return($GLOBALS['____1605720928'][17]($_69316001, self::$_166427773[___1161198963(26)]) && self::$_166427773[___1161198963(27)][$_69316001]);} public static function IsFeatureEditable($_69316001){ if($GLOBALS['____1605720928'][18]($_69316001) <= 0) return true; self::__1511318637(); if(!$GLOBALS['____1605720928'][19]($_69316001, self::$_1031268506)) return true; if(self::$_1031268506[$_69316001] == ___1161198963(28)) $_1473485116= array(___1161198963(29)); elseif($GLOBALS['____1605720928'][20](self::$_1031268506[$_69316001], self::$_166427773[___1161198963(30)])) $_1473485116= self::$_166427773[___1161198963(31)][self::$_1031268506[$_69316001]]; else $_1473485116= array(___1161198963(32)); if($_1473485116[(942-2*471)] != ___1161198963(33) && $_1473485116[(1052/2-526)] != ___1161198963(34)){ return false;} elseif($_1473485116[min(28,0,9.3333333333333)] == ___1161198963(35)){ if($_1473485116[round(0+0.33333333333333+0.33333333333333+0.33333333333333)]< $GLOBALS['____1605720928'][21]((854-2*427),(1356/2-678), min(44,0,14.666666666667), Date(___1161198963(36)), $GLOBALS['____1605720928'][22](___1161198963(37))- self::$_45723401, $GLOBALS['____1605720928'][23](___1161198963(38)))){ if(!isset($_1473485116[round(0+2)]) ||!$_1473485116[round(0+0.5+0.5+0.5+0.5)]) self::__1010931103(self::$_1031268506[$_69316001]); return false;}} return true;} private static function __154817238($_69316001, $_248291609){ if($GLOBALS['____1605720928'][24]("CBXFeatures", "On".$_69316001."SettingsChange")) $GLOBALS['____1605720928'][25](array("CBXFeatures", "On".$_69316001."SettingsChange"), array($_69316001, $_248291609)); $_363520087= $GLOBALS['_____1811068319'][0](___1161198963(39), ___1161198963(40).$_69316001.___1161198963(41)); while($_890919346= $_363520087->Fetch()) $GLOBALS['_____1811068319'][1]($_890919346, array($_69316001, $_248291609));} public static function SetFeatureEnabled($_69316001, $_248291609= true, $_866301110= true){ if($GLOBALS['____1605720928'][26]($_69316001) <= 0) return; if(!self::IsFeatureEditable($_69316001)) $_248291609= false; $_248291609=($_248291609? true: false); self::__1511318637(); $_2077200858=(!$GLOBALS['____1605720928'][27]($_69316001, self::$_166427773[___1161198963(42)]) && $_248291609 || $GLOBALS['____1605720928'][28]($_69316001, self::$_166427773[___1161198963(43)]) && $_248291609 != self::$_166427773[___1161198963(44)][$_69316001]); self::$_166427773[___1161198963(45)][$_69316001]= $_248291609; $_1758722488= $GLOBALS['____1605720928'][29](self::$_166427773); $_1758722488= $GLOBALS['____1605720928'][30]($_1758722488); COption::SetOptionString(___1161198963(46), ___1161198963(47), $_1758722488); if($_2077200858 && $_866301110) self::__154817238($_69316001, $_248291609);} private static function __1010931103($_392199507){ if($GLOBALS['____1605720928'][31]($_392199507) <= 0 || $_392199507 == "Portal") return; self::__1511318637(); if(!$GLOBALS['____1605720928'][32]($_392199507, self::$_166427773[___1161198963(48)]) || $GLOBALS['____1605720928'][33]($_392199507, self::$_166427773[___1161198963(49)]) && self::$_166427773[___1161198963(50)][$_392199507][(1304/2-652)] != ___1161198963(51)) return; if(isset(self::$_166427773[___1161198963(52)][$_392199507][round(0+0.4+0.4+0.4+0.4+0.4)]) && self::$_166427773[___1161198963(53)][$_392199507][round(0+1+1)]) return; $_125633113= array(); if($GLOBALS['____1605720928'][34]($_392199507, self::$_1860456978) && $GLOBALS['____1605720928'][35](self::$_1860456978[$_392199507])){ foreach(self::$_1860456978[$_392199507] as $_69316001){ if($GLOBALS['____1605720928'][36]($_69316001, self::$_166427773[___1161198963(54)]) && self::$_166427773[___1161198963(55)][$_69316001]){ self::$_166427773[___1161198963(56)][$_69316001]= false; $_125633113[]= array($_69316001, false);}} self::$_166427773[___1161198963(57)][$_392199507][round(0+0.5+0.5+0.5+0.5)]= true;} $_1758722488= $GLOBALS['____1605720928'][37](self::$_166427773); $_1758722488= $GLOBALS['____1605720928'][38]($_1758722488); COption::SetOptionString(___1161198963(58), ___1161198963(59), $_1758722488); foreach($_125633113 as $_1965066243) self::__154817238($_1965066243[(832-2*416)], $_1965066243[round(0+1)]);} public static function ModifyFeaturesSettings($_1529807324, $_735729164){ self::__1511318637(); foreach($_1529807324 as $_392199507 => $_928831140) self::$_166427773[___1161198963(60)][$_392199507]= $_928831140; $_125633113= array(); foreach($_735729164 as $_69316001 => $_248291609){ if(!$GLOBALS['____1605720928'][39]($_69316001, self::$_166427773[___1161198963(61)]) && $_248291609 || $GLOBALS['____1605720928'][40]($_69316001, self::$_166427773[___1161198963(62)]) && $_248291609 != self::$_166427773[___1161198963(63)][$_69316001]) $_125633113[]= array($_69316001, $_248291609); self::$_166427773[___1161198963(64)][$_69316001]= $_248291609;} $_1758722488= $GLOBALS['____1605720928'][41](self::$_166427773); $_1758722488= $GLOBALS['____1605720928'][42]($_1758722488); COption::SetOptionString(___1161198963(65), ___1161198963(66), $_1758722488); self::$_166427773= false; foreach($_125633113 as $_1965066243) self::__154817238($_1965066243[min(110,0,36.666666666667)], $_1965066243[round(0+1)]);} public static function SaveFeaturesSettings($_1583394052, $_1442816107){ self::__1511318637(); $_1677618730= array(___1161198963(67) => array(), ___1161198963(68) => array()); if(!$GLOBALS['____1605720928'][43]($_1583394052)) $_1583394052= array(); if(!$GLOBALS['____1605720928'][44]($_1442816107)) $_1442816107= array(); if(!$GLOBALS['____1605720928'][45](___1161198963(69), $_1583394052)) $_1583394052[]= ___1161198963(70); foreach(self::$_1860456978 as $_392199507 => $_735729164){ if($GLOBALS['____1605720928'][46]($_392199507, self::$_166427773[___1161198963(71)])) $_1930696466= self::$_166427773[___1161198963(72)][$_392199507]; else $_1930696466=($_392199507 == ___1161198963(73))? array(___1161198963(74)): array(___1161198963(75)); if($_1930696466[(914-2*457)] == ___1161198963(76) || $_1930696466[(818-2*409)] == ___1161198963(77)){ $_1677618730[___1161198963(78)][$_392199507]= $_1930696466;} else{ if($GLOBALS['____1605720928'][47]($_392199507, $_1583394052)) $_1677618730[___1161198963(79)][$_392199507]= array(___1161198963(80), $GLOBALS['____1605720928'][48]((1024/2-512), min(40,0,13.333333333333),(215*2-430), $GLOBALS['____1605720928'][49](___1161198963(81)), $GLOBALS['____1605720928'][50](___1161198963(82)), $GLOBALS['____1605720928'][51](___1161198963(83)))); else $_1677618730[___1161198963(84)][$_392199507]= array(___1161198963(85));}} $_125633113= array(); foreach(self::$_1031268506 as $_69316001 => $_392199507){ if($_1677618730[___1161198963(86)][$_392199507][(968-2*484)] != ___1161198963(87) && $_1677618730[___1161198963(88)][$_392199507][(218*2-436)] != ___1161198963(89)){ $_1677618730[___1161198963(90)][$_69316001]= false;} else{ if($_1677618730[___1161198963(91)][$_392199507][(144*2-288)] == ___1161198963(92) && $_1677618730[___1161198963(93)][$_392199507][round(0+0.25+0.25+0.25+0.25)]< $GLOBALS['____1605720928'][52]((145*2-290),(1360/2-680),(234*2-468), Date(___1161198963(94)), $GLOBALS['____1605720928'][53](___1161198963(95))- self::$_45723401, $GLOBALS['____1605720928'][54](___1161198963(96)))) $_1677618730[___1161198963(97)][$_69316001]= false; else $_1677618730[___1161198963(98)][$_69316001]= $GLOBALS['____1605720928'][55]($_69316001, $_1442816107); if(!$GLOBALS['____1605720928'][56]($_69316001, self::$_166427773[___1161198963(99)]) && $_1677618730[___1161198963(100)][$_69316001] || $GLOBALS['____1605720928'][57]($_69316001, self::$_166427773[___1161198963(101)]) && $_1677618730[___1161198963(102)][$_69316001] != self::$_166427773[___1161198963(103)][$_69316001]) $_125633113[]= array($_69316001, $_1677618730[___1161198963(104)][$_69316001]);}} $_1758722488= $GLOBALS['____1605720928'][58]($_1677618730); $_1758722488= $GLOBALS['____1605720928'][59]($_1758722488); COption::SetOptionString(___1161198963(105), ___1161198963(106), $_1758722488); self::$_166427773= false; foreach($_125633113 as $_1965066243) self::__154817238($_1965066243[(174*2-348)], $_1965066243[round(0+0.5+0.5)]);} public static function GetFeaturesList(){ self::__1511318637(); $_1760097333= array(); foreach(self::$_1860456978 as $_392199507 => $_735729164){ if($GLOBALS['____1605720928'][60]($_392199507, self::$_166427773[___1161198963(107)])) $_1930696466= self::$_166427773[___1161198963(108)][$_392199507]; else $_1930696466=($_392199507 == ___1161198963(109))? array(___1161198963(110)): array(___1161198963(111)); $_1760097333[$_392199507]= array( ___1161198963(112) => $_1930696466[(244*2-488)], ___1161198963(113) => $_1930696466[round(0+1)], ___1161198963(114) => array(),); $_1760097333[$_392199507][___1161198963(115)]= false; if($_1760097333[$_392199507][___1161198963(116)] == ___1161198963(117)){ $_1760097333[$_392199507][___1161198963(118)]= $GLOBALS['____1605720928'][61](($GLOBALS['____1605720928'][62]()- $_1760097333[$_392199507][___1161198963(119)])/ round(0+43200+43200)); if($_1760097333[$_392199507][___1161198963(120)]> self::$_45723401) $_1760097333[$_392199507][___1161198963(121)]= true;} foreach($_735729164 as $_69316001) $_1760097333[$_392199507][___1161198963(122)][$_69316001]=(!$GLOBALS['____1605720928'][63]($_69316001, self::$_166427773[___1161198963(123)]) || self::$_166427773[___1161198963(124)][$_69316001]);} return $_1760097333;} private static function __1284800153($_299165604, $_416270875){ if(IsModuleInstalled($_299165604) == $_416270875) return true; $_485663054= $_SERVER[___1161198963(125)].___1161198963(126).$_299165604.___1161198963(127); if(!$GLOBALS['____1605720928'][64]($_485663054)) return false; include_once($_485663054); $_518210825= $GLOBALS['____1605720928'][65](___1161198963(128), ___1161198963(129), $_299165604); if(!$GLOBALS['____1605720928'][66]($_518210825)) return false; $_1482724467= new $_518210825; if($_416270875){ if(!$_1482724467->InstallDB()) return false; $_1482724467->InstallEvents(); if(!$_1482724467->InstallFiles()) return false;} else{ if(CModule::IncludeModule(___1161198963(130))) CSearch::DeleteIndex($_299165604); UnRegisterModule($_299165604);} return true;} protected static function OnRequestsSettingsChange($_69316001, $_248291609){ self::__1284800153("form", $_248291609);} protected static function OnLearningSettingsChange($_69316001, $_248291609){ self::__1284800153("learning", $_248291609);} protected static function OnJabberSettingsChange($_69316001, $_248291609){ self::__1284800153("xmpp", $_248291609);} protected static function OnVideoConferenceSettingsChange($_69316001, $_248291609){ self::__1284800153("video", $_248291609);} protected static function OnBizProcSettingsChange($_69316001, $_248291609){ self::__1284800153("bizprocdesigner", $_248291609);} protected static function OnListsSettingsChange($_69316001, $_248291609){ self::__1284800153("lists", $_248291609);} protected static function OnWikiSettingsChange($_69316001, $_248291609){ self::__1284800153("wiki", $_248291609);} protected static function OnSupportSettingsChange($_69316001, $_248291609){ self::__1284800153("support", $_248291609);} protected static function OnControllerSettingsChange($_69316001, $_248291609){ self::__1284800153("controller", $_248291609);} protected static function OnAnalyticsSettingsChange($_69316001, $_248291609){ self::__1284800153("statistic", $_248291609);} protected static function OnVoteSettingsChange($_69316001, $_248291609){ self::__1284800153("vote", $_248291609);} protected static function OnFriendsSettingsChange($_69316001, $_248291609){ if($_248291609) $_2017587858= "Y"; else $_2017587858= ___1161198963(131); $_925966127= CSite::GetList(($_1801032851= ___1161198963(132)),($_1424307496= ___1161198963(133)), array(___1161198963(134) => ___1161198963(135))); while($_949514377= $_925966127->Fetch()){ if(COption::GetOptionString(___1161198963(136), ___1161198963(137), ___1161198963(138), $_949514377[___1161198963(139)]) != $_2017587858){ COption::SetOptionString(___1161198963(140), ___1161198963(141), $_2017587858, false, $_949514377[___1161198963(142)]); COption::SetOptionString(___1161198963(143), ___1161198963(144), $_2017587858);}}} protected static function OnMicroBlogSettingsChange($_69316001, $_248291609){ if($_248291609) $_2017587858= "Y"; else $_2017587858= ___1161198963(145); $_925966127= CSite::GetList(($_1801032851= ___1161198963(146)),($_1424307496= ___1161198963(147)), array(___1161198963(148) => ___1161198963(149))); while($_949514377= $_925966127->Fetch()){ if(COption::GetOptionString(___1161198963(150), ___1161198963(151), ___1161198963(152), $_949514377[___1161198963(153)]) != $_2017587858){ COption::SetOptionString(___1161198963(154), ___1161198963(155), $_2017587858, false, $_949514377[___1161198963(156)]); COption::SetOptionString(___1161198963(157), ___1161198963(158), $_2017587858);} if(COption::GetOptionString(___1161198963(159), ___1161198963(160), ___1161198963(161), $_949514377[___1161198963(162)]) != $_2017587858){ COption::SetOptionString(___1161198963(163), ___1161198963(164), $_2017587858, false, $_949514377[___1161198963(165)]); COption::SetOptionString(___1161198963(166), ___1161198963(167), $_2017587858);}}} protected static function OnPersonalFilesSettingsChange($_69316001, $_248291609){ if($_248291609) $_2017587858= "Y"; else $_2017587858= ___1161198963(168); $_925966127= CSite::GetList(($_1801032851= ___1161198963(169)),($_1424307496= ___1161198963(170)), array(___1161198963(171) => ___1161198963(172))); while($_949514377= $_925966127->Fetch()){ if(COption::GetOptionString(___1161198963(173), ___1161198963(174), ___1161198963(175), $_949514377[___1161198963(176)]) != $_2017587858){ COption::SetOptionString(___1161198963(177), ___1161198963(178), $_2017587858, false, $_949514377[___1161198963(179)]); COption::SetOptionString(___1161198963(180), ___1161198963(181), $_2017587858);}}} protected static function OnPersonalBlogSettingsChange($_69316001, $_248291609){ if($_248291609) $_2017587858= "Y"; else $_2017587858= ___1161198963(182); $_925966127= CSite::GetList(($_1801032851= ___1161198963(183)),($_1424307496= ___1161198963(184)), array(___1161198963(185) => ___1161198963(186))); while($_949514377= $_925966127->Fetch()){ if(COption::GetOptionString(___1161198963(187), ___1161198963(188), ___1161198963(189), $_949514377[___1161198963(190)]) != $_2017587858){ COption::SetOptionString(___1161198963(191), ___1161198963(192), $_2017587858, false, $_949514377[___1161198963(193)]); COption::SetOptionString(___1161198963(194), ___1161198963(195), $_2017587858);}}} protected static function OnPersonalPhotoSettingsChange($_69316001, $_248291609){ if($_248291609) $_2017587858= "Y"; else $_2017587858= ___1161198963(196); $_925966127= CSite::GetList(($_1801032851= ___1161198963(197)),($_1424307496= ___1161198963(198)), array(___1161198963(199) => ___1161198963(200))); while($_949514377= $_925966127->Fetch()){ if(COption::GetOptionString(___1161198963(201), ___1161198963(202), ___1161198963(203), $_949514377[___1161198963(204)]) != $_2017587858){ COption::SetOptionString(___1161198963(205), ___1161198963(206), $_2017587858, false, $_949514377[___1161198963(207)]); COption::SetOptionString(___1161198963(208), ___1161198963(209), $_2017587858);}}} protected static function OnPersonalForumSettingsChange($_69316001, $_248291609){ if($_248291609) $_2017587858= "Y"; else $_2017587858= ___1161198963(210); $_925966127= CSite::GetList(($_1801032851= ___1161198963(211)),($_1424307496= ___1161198963(212)), array(___1161198963(213) => ___1161198963(214))); while($_949514377= $_925966127->Fetch()){ if(COption::GetOptionString(___1161198963(215), ___1161198963(216), ___1161198963(217), $_949514377[___1161198963(218)]) != $_2017587858){ COption::SetOptionString(___1161198963(219), ___1161198963(220), $_2017587858, false, $_949514377[___1161198963(221)]); COption::SetOptionString(___1161198963(222), ___1161198963(223), $_2017587858);}}} protected static function OnTasksSettingsChange($_69316001, $_248291609){ if($_248291609) $_2017587858= "Y"; else $_2017587858= ___1161198963(224); $_925966127= CSite::GetList(($_1801032851= ___1161198963(225)),($_1424307496= ___1161198963(226)), array(___1161198963(227) => ___1161198963(228))); while($_949514377= $_925966127->Fetch()){ if(COption::GetOptionString(___1161198963(229), ___1161198963(230), ___1161198963(231), $_949514377[___1161198963(232)]) != $_2017587858){ COption::SetOptionString(___1161198963(233), ___1161198963(234), $_2017587858, false, $_949514377[___1161198963(235)]); COption::SetOptionString(___1161198963(236), ___1161198963(237), $_2017587858);} if(COption::GetOptionString(___1161198963(238), ___1161198963(239), ___1161198963(240), $_949514377[___1161198963(241)]) != $_2017587858){ COption::SetOptionString(___1161198963(242), ___1161198963(243), $_2017587858, false, $_949514377[___1161198963(244)]); COption::SetOptionString(___1161198963(245), ___1161198963(246), $_2017587858);}} self::__1284800153(___1161198963(247), $_248291609);} protected static function OnCalendarSettingsChange($_69316001, $_248291609){ if($_248291609) $_2017587858= "Y"; else $_2017587858= ___1161198963(248); $_925966127= CSite::GetList(($_1801032851= ___1161198963(249)),($_1424307496= ___1161198963(250)), array(___1161198963(251) => ___1161198963(252))); while($_949514377= $_925966127->Fetch()){ if(COption::GetOptionString(___1161198963(253), ___1161198963(254), ___1161198963(255), $_949514377[___1161198963(256)]) != $_2017587858){ COption::SetOptionString(___1161198963(257), ___1161198963(258), $_2017587858, false, $_949514377[___1161198963(259)]); COption::SetOptionString(___1161198963(260), ___1161198963(261), $_2017587858);} if(COption::GetOptionString(___1161198963(262), ___1161198963(263), ___1161198963(264), $_949514377[___1161198963(265)]) != $_2017587858){ COption::SetOptionString(___1161198963(266), ___1161198963(267), $_2017587858, false, $_949514377[___1161198963(268)]); COption::SetOptionString(___1161198963(269), ___1161198963(270), $_2017587858);}}} protected static function OnSMTPSettingsChange($_69316001, $_248291609){ self::__1284800153("mail", $_248291609);} protected static function OnExtranetSettingsChange($_69316001, $_248291609){ $_2095844424= COption::GetOptionString("extranet", "extranet_site", ""); if($_2095844424){ $_240194910= new CSite; $_240194910->Update($_2095844424, array(___1161198963(271) =>($_248291609? ___1161198963(272): ___1161198963(273))));} self::__1284800153(___1161198963(274), $_248291609);} protected static function OnDAVSettingsChange($_69316001, $_248291609){ self::__1284800153("dav", $_248291609);} protected static function OntimemanSettingsChange($_69316001, $_248291609){ self::__1284800153("timeman", $_248291609);} protected static function Onintranet_sharepointSettingsChange($_69316001, $_248291609){ if($_248291609){ RegisterModuleDependences("iblock", "OnAfterIBlockElementAdd", "intranet", "CIntranetEventHandlers", "SPRegisterUpdatedItem"); RegisterModuleDependences(___1161198963(275), ___1161198963(276), ___1161198963(277), ___1161198963(278), ___1161198963(279)); CAgent::AddAgent(___1161198963(280), ___1161198963(281), ___1161198963(282), round(0+166.66666666667+166.66666666667+166.66666666667)); CAgent::AddAgent(___1161198963(283), ___1161198963(284), ___1161198963(285), round(0+150+150)); CAgent::AddAgent(___1161198963(286), ___1161198963(287), ___1161198963(288), round(0+1200+1200+1200));} else{ UnRegisterModuleDependences(___1161198963(289), ___1161198963(290), ___1161198963(291), ___1161198963(292), ___1161198963(293)); UnRegisterModuleDependences(___1161198963(294), ___1161198963(295), ___1161198963(296), ___1161198963(297), ___1161198963(298)); CAgent::RemoveAgent(___1161198963(299), ___1161198963(300)); CAgent::RemoveAgent(___1161198963(301), ___1161198963(302)); CAgent::RemoveAgent(___1161198963(303), ___1161198963(304));}} protected static function OncrmSettingsChange($_69316001, $_248291609){ if($_248291609) COption::SetOptionString("crm", "form_features", "Y"); self::__1284800153(___1161198963(305), $_248291609);} protected static function OnClusterSettingsChange($_69316001, $_248291609){ self::__1284800153("cluster", $_248291609);} protected static function OnMultiSitesSettingsChange($_69316001, $_248291609){ if($_248291609) RegisterModuleDependences("main", "OnBeforeProlog", "main", "CWizardSolPanelIntranet", "ShowPanel", 100, "/modules/intranet/panel_button.php"); else UnRegisterModuleDependences(___1161198963(306), ___1161198963(307), ___1161198963(308), ___1161198963(309), ___1161198963(310), ___1161198963(311));} protected static function OnIdeaSettingsChange($_69316001, $_248291609){ self::__1284800153("idea", $_248291609);} protected static function OnMeetingSettingsChange($_69316001, $_248291609){ self::__1284800153("meeting", $_248291609);} protected static function OnXDImportSettingsChange($_69316001, $_248291609){ self::__1284800153("xdimport", $_248291609);}} $GLOBALS['____1605720928'][67](___1161198963(312), ___1161198963(313));/**/			//Do not remove this

//component 2.0 template engines
$GLOBALS["arCustomTemplateEngines"] = array();

require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/classes/general/urlrewriter.php");

/**
 * Defined in dbconn.php
 * @param string $DBType
 */

\Bitrix\Main\Loader::registerAutoLoadClasses(
	"main",
	array(
		"CSiteTemplate" => "classes/general/site_template.php",
		"CBitrixComponent" => "classes/general/component.php",
		"CComponentEngine" => "classes/general/component_engine.php",
		"CComponentAjax" => "classes/general/component_ajax.php",
		"CBitrixComponentTemplate" => "classes/general/component_template.php",
		"CComponentUtil" => "classes/general/component_util.php",
		"CControllerClient" => "classes/general/controller_member.php",
		"PHPParser" => "classes/general/php_parser.php",
		"CDiskQuota" => "classes/".$DBType."/quota.php",
		"CEventLog" => "classes/general/event_log.php",
		"CEventMain" => "classes/general/event_log.php",
		"CAdminFileDialog" => "classes/general/file_dialog.php",
		"WLL_User" => "classes/general/liveid.php",
		"WLL_ConsentToken" => "classes/general/liveid.php",
		"WindowsLiveLogin" => "classes/general/liveid.php",
		"CAllFile" => "classes/general/file.php",
		"CFile" => "classes/".$DBType."/file.php",
		"CTempFile" => "classes/general/file_temp.php",
		"CFavorites" => "classes/".$DBType."/favorites.php",
		"CUserOptions" => "classes/general/user_options.php",
		"CGridOptions" => "classes/general/grids.php",
		"CUndo" => "/classes/general/undo.php",
		"CAutoSave" => "/classes/general/undo.php",
		"CRatings" => "classes/".$DBType."/ratings.php",
		"CRatingsComponentsMain" => "classes/".$DBType."/ratings_components.php",
		"CRatingRule" => "classes/general/rating_rule.php",
		"CRatingRulesMain" => "classes/".$DBType."/rating_rules.php",
		"CTopPanel" => "public/top_panel.php",
		"CEditArea" => "public/edit_area.php",
		"CComponentPanel" => "public/edit_area.php",
		"CTextParser" => "classes/general/textparser.php",
		"CPHPCacheFiles" => "classes/general/cache_files.php",
		"CDataXML" => "classes/general/xml.php",
		"CXMLFileStream" => "classes/general/xml.php",
		"CRsaProvider" => "classes/general/rsasecurity.php",
		"CRsaSecurity" => "classes/general/rsasecurity.php",
		"CRsaBcmathProvider" => "classes/general/rsabcmath.php",
		"CRsaOpensslProvider" => "classes/general/rsaopenssl.php",
		"CASNReader" => "classes/general/asn.php",
		"CBXShortUri" => "classes/".$DBType."/short_uri.php",
		"CFinder" => "classes/general/finder.php",
		"CAccess" => "classes/general/access.php",
		"CAuthProvider" => "classes/general/authproviders.php",
		"IProviderInterface" => "classes/general/authproviders.php",
		"CGroupAuthProvider" => "classes/general/authproviders.php",
		"CUserAuthProvider" => "classes/general/authproviders.php",
		"CTableSchema" => "classes/general/table_schema.php",
		"CCSVData" => "classes/general/csv_data.php",
		"CSmile" => "classes/general/smile.php",
		"CSmileGallery" => "classes/general/smile.php",
		"CSmileSet" => "classes/general/smile.php",
		"CGlobalCounter" => "classes/general/global_counter.php",
		"CUserCounter" => "classes/".$DBType."/user_counter.php",
		"CUserCounterPage" => "classes/".$DBType."/user_counter.php",
		"CHotKeys" => "classes/general/hot_keys.php",
		"CHotKeysCode" => "classes/general/hot_keys.php",
		"CBXSanitizer" => "classes/general/sanitizer.php",
		"CBXArchive" => "classes/general/archive.php",
		"CAdminNotify" => "classes/general/admin_notify.php",
		"CBXFavAdmMenu" => "classes/general/favorites.php",
		"CAdminInformer" => "classes/general/admin_informer.php",
		"CSiteCheckerTest" => "classes/general/site_checker.php",
		"CSqlUtil" => "classes/general/sql_util.php",
		"CFileUploader" => "classes/general/uploader.php",
		"LPA" => "classes/general/lpa.php",
		"CAdminFilter" => "interface/admin_filter.php",
		"CAdminList" => "interface/admin_list.php",
		"CAdminUiList" => "interface/admin_ui_list.php",
		"CAdminUiResult" => "interface/admin_ui_list.php",
		"CAdminUiContextMenu" => "interface/admin_ui_list.php",
		"CAdminUiSorting" => "interface/admin_ui_list.php",
		"CAdminListRow" => "interface/admin_list.php",
		"CAdminTabControl" => "interface/admin_tabcontrol.php",
		"CAdminForm" => "interface/admin_form.php",
		"CAdminFormSettings" => "interface/admin_form.php",
		"CAdminTabControlDrag" => "interface/admin_tabcontrol_drag.php",
		"CAdminDraggableBlockEngine" => "interface/admin_tabcontrol_drag.php",
		"CJSPopup" => "interface/jspopup.php",
		"CJSPopupOnPage" => "interface/jspopup.php",
		"CAdminCalendar" => "interface/admin_calendar.php",
		"CAdminViewTabControl" => "interface/admin_viewtabcontrol.php",
		"CAdminTabEngine" => "interface/admin_tabengine.php",
		"CCaptcha" => "classes/general/captcha.php",
		"CMpNotifications" => "classes/general/mp_notifications.php",

		//deprecated
		"CHTMLPagesCache" => "lib/composite/helper.php",
		"StaticHtmlMemcachedResponse" => "lib/composite/responder.php",
		"StaticHtmlFileResponse" => "lib/composite/responder.php",
		"Bitrix\\Main\\Page\\Frame" => "lib/composite/engine.php",
		"Bitrix\\Main\\Page\\FrameStatic" => "lib/composite/staticarea.php",
		"Bitrix\\Main\\Page\\FrameBuffered" => "lib/composite/bufferarea.php",
		"Bitrix\\Main\\Page\\FrameHelper" => "lib/composite/bufferarea.php",
		"Bitrix\\Main\\Data\\StaticHtmlCache" => "lib/composite/page.php",
		"Bitrix\\Main\\Data\\StaticHtmlStorage" => "lib/composite/data/abstractstorage.php",
		"Bitrix\\Main\\Data\\StaticHtmlFileStorage" => "lib/composite/data/filestorage.php",
		"Bitrix\\Main\\Data\\StaticHtmlMemcachedStorage" => "lib/composite/data/memcachedstorage.php",
		"Bitrix\\Main\\Data\\StaticCacheProvider" => "lib/composite/data/cacheprovider.php",
		"Bitrix\\Main\\Data\\AppCacheManifest" => "lib/composite/appcache.php",
	)
);

require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/classes/".$DBType."/agent.php");
require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/classes/".$DBType."/user.php");
require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/classes/".$DBType."/event.php");
require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/classes/general/menu.php");
AddEventHandler("main", "OnAfterEpilog", array("\\Bitrix\\Main\\Data\\ManagedCache", "finalize"));
require_once($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/classes/".$DBType."/usertype.php");

if(file_exists(($_fname = $_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/classes/general/update_db_updater.php")))
{
	$US_HOST_PROCESS_MAIN = False;
	include($_fname);
}

if(file_exists(($_fname = $_SERVER["DOCUMENT_ROOT"]."/bitrix/init.php")))
	include_once($_fname);

if(($_fname = getLocalPath("php_interface/init.php", BX_PERSONAL_ROOT)) !== false)
	include_once($_SERVER["DOCUMENT_ROOT"].$_fname);

if(($_fname = getLocalPath("php_interface/".SITE_ID."/init.php", BX_PERSONAL_ROOT)) !== false)
	include_once($_SERVER["DOCUMENT_ROOT"].$_fname);

if(!defined("BX_FILE_PERMISSIONS"))
	define("BX_FILE_PERMISSIONS", 0644);
if(!defined("BX_DIR_PERMISSIONS"))
	define("BX_DIR_PERMISSIONS", 0755);

//global var, is used somewhere
$GLOBALS["sDocPath"] = $GLOBALS["APPLICATION"]->GetCurPage();

if((!(defined("STATISTIC_ONLY") && STATISTIC_ONLY && substr($GLOBALS["APPLICATION"]->GetCurPage(), 0, strlen(BX_ROOT."/admin/"))!=BX_ROOT."/admin/")) && COption::GetOptionString("main", "include_charset", "Y")=="Y" && strlen(LANG_CHARSET)>0)
	header("Content-Type: text/html; charset=".LANG_CHARSET);

if(COption::GetOptionString("main", "set_p3p_header", "Y")=="Y")
	header("P3P: policyref=\"/bitrix/p3p.xml\", CP=\"NON DSP COR CUR ADM DEV PSA PSD OUR UNR BUS UNI COM NAV INT DEM STA\"");

header("X-Powered-CMS: Bitrix Site Manager (".(LICENSE_KEY == "DEMO"? "DEMO" : md5("BITRIX".LICENSE_KEY."LICENCE")).")");
if (COption::GetOptionString("main", "update_devsrv", "") == "Y")
	header("X-DevSrv-CMS: Bitrix");

define("BX_CRONTAB_SUPPORT", defined("BX_CRONTAB"));

if(COption::GetOptionString("main", "check_agents", "Y")=="Y")
{
	define("START_EXEC_AGENTS_1", microtime());
	$GLOBALS["BX_STATE"] = "AG";
	$GLOBALS["DB"]->StartUsingMasterOnly();
	CAgent::CheckAgents();
	$GLOBALS["DB"]->StopUsingMasterOnly();
	define("START_EXEC_AGENTS_2", microtime());
	$GLOBALS["BX_STATE"] = "PB";
}

//session initialization
ini_set("session.cookie_httponly", "1");

if(($domain = \Bitrix\Main\Web\Cookie::getCookieDomain()) <> '')
{
	ini_set("session.cookie_domain", $domain);
}

if(COption::GetOptionString("security", "session", "N") === "Y"	&& CModule::IncludeModule("security"))
	CSecuritySession::Init();

session_start();

foreach (GetModuleEvents("main", "OnPageStart", true) as $arEvent)
	ExecuteModuleEventEx($arEvent);

//define global user object
$GLOBALS["USER"] = new CUser;

//session control from group policy
$arPolicy = $GLOBALS["USER"]->GetSecurityPolicy();
$currTime = time();
if(
	(
		//IP address changed
		$_SESSION['SESS_IP']
		&& strlen($arPolicy["SESSION_IP_MASK"])>0
		&& (
			(ip2long($arPolicy["SESSION_IP_MASK"]) & ip2long($_SESSION['SESS_IP']))
			!=
			(ip2long($arPolicy["SESSION_IP_MASK"]) & ip2long($_SERVER['REMOTE_ADDR']))
		)
	)
	||
	(
		//session timeout
		$arPolicy["SESSION_TIMEOUT"]>0
		&& $_SESSION['SESS_TIME']>0
		&& $currTime-$arPolicy["SESSION_TIMEOUT"]*60 > $_SESSION['SESS_TIME']
	)
	||
	(
		//signed session
		isset($_SESSION["BX_SESSION_SIGN"])
		&& $_SESSION["BX_SESSION_SIGN"] <> bitrix_sess_sign()
	)
	||
	(
		//session manually expired, e.g. in $User->LoginHitByHash
		isSessionExpired()
	)
)
{
	$_SESSION = array();
	@session_destroy();

	//session_destroy cleans user sesssion handles in some PHP versions
	//see http://bugs.php.net/bug.php?id=32330 discussion
	if(COption::GetOptionString("security", "session", "N") === "Y"	&& CModule::IncludeModule("security"))
		CSecuritySession::Init();

	session_id(md5(uniqid(rand(), true)));
	session_start();
	$GLOBALS["USER"] = new CUser;
}
$_SESSION['SESS_IP'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['SESS_TIME'] = time();
if(!isset($_SESSION["BX_SESSION_SIGN"]))
	$_SESSION["BX_SESSION_SIGN"] = bitrix_sess_sign();

//session control from security module
if(
	(COption::GetOptionString("main", "use_session_id_ttl", "N") == "Y")
	&& (COption::GetOptionInt("main", "session_id_ttl", 0) > 0)
	&& !defined("BX_SESSION_ID_CHANGE")
)
{
	if(!array_key_exists('SESS_ID_TIME', $_SESSION))
	{
		$_SESSION['SESS_ID_TIME'] = $_SESSION['SESS_TIME'];
	}
	elseif(($_SESSION['SESS_ID_TIME'] + COption::GetOptionInt("main", "session_id_ttl")) < $_SESSION['SESS_TIME'])
	{
		if(COption::GetOptionString("security", "session", "N") === "Y" && CModule::IncludeModule("security"))
		{
			CSecuritySession::UpdateSessID();
		}
		else
		{
			session_regenerate_id();
		}
		$_SESSION['SESS_ID_TIME'] = $_SESSION['SESS_TIME'];
	}
}

define("BX_STARTED", true);

if (isset($_SESSION['BX_ADMIN_LOAD_AUTH']))
{
	define('ADMIN_SECTION_LOAD_AUTH', 1);
	unset($_SESSION['BX_ADMIN_LOAD_AUTH']);
}

if(!defined("NOT_CHECK_PERMISSIONS") || NOT_CHECK_PERMISSIONS!==true)
{
	$bLogout = isset($_REQUEST["logout"]) && (strtolower($_REQUEST["logout"]) == "yes");

	if($bLogout && $GLOBALS["USER"]->IsAuthorized())
	{
		$GLOBALS["USER"]->Logout();
		LocalRedirect($GLOBALS["APPLICATION"]->GetCurPageParam('', array('logout')));
	}

	// authorize by cookies
	if(!$GLOBALS["USER"]->IsAuthorized())
	{
		$GLOBALS["USER"]->LoginByCookies();
	}

	$arAuthResult = false;

	//http basic and digest authorization
	if(($httpAuth = $GLOBALS["USER"]->LoginByHttpAuth()) !== null)
	{
		$arAuthResult = $httpAuth;
		$GLOBALS["APPLICATION"]->SetAuthResult($arAuthResult);
	}

	//Authorize user from authorization html form
	//Only POST is accepted
	if(isset($_POST["AUTH_FORM"]) && $_POST["AUTH_FORM"] <> '')
	{
		$bRsaError = false;
		if(COption::GetOptionString('main', 'use_encrypted_auth', 'N') == 'Y')
		{
			//possible encrypted user password
			$sec = new CRsaSecurity();
			if(($arKeys = $sec->LoadKeys()))
			{
				$sec->SetKeys($arKeys);
				$errno = $sec->AcceptFromForm(array('USER_PASSWORD', 'USER_CONFIRM_PASSWORD'));
				if($errno == CRsaSecurity::ERROR_SESS_CHECK)
					$arAuthResult = array("MESSAGE"=>GetMessage("main_include_decode_pass_sess"), "TYPE"=>"ERROR");
				elseif($errno < 0)
					$arAuthResult = array("MESSAGE"=>GetMessage("main_include_decode_pass_err", array("#ERRCODE#"=>$errno)), "TYPE"=>"ERROR");

				if($errno < 0)
					$bRsaError = true;
			}
		}

		if($bRsaError == false)
		{
			if(!defined("ADMIN_SECTION") || ADMIN_SECTION !== true)
				$USER_LID = SITE_ID;
			else
				$USER_LID = false;

			if($_POST["TYPE"] == "AUTH")
			{
				$arAuthResult = $GLOBALS["USER"]->Login($_POST["USER_LOGIN"], $_POST["USER_PASSWORD"], $_POST["USER_REMEMBER"]);
			}
			elseif($_POST["TYPE"] == "OTP")
			{
				$arAuthResult = $GLOBALS["USER"]->LoginByOtp($_POST["USER_OTP"], $_POST["OTP_REMEMBER"], $_POST["captcha_word"], $_POST["captcha_sid"]);
			}
			elseif($_POST["TYPE"] == "SEND_PWD")
			{
				$arAuthResult = CUser::SendPassword($_POST["USER_LOGIN"], $_POST["USER_EMAIL"], $USER_LID, $_POST["captcha_word"], $_POST["captcha_sid"], $_POST["USER_PHONE_NUMBER"]);
			}
			elseif($_POST["TYPE"] == "CHANGE_PWD")
			{
				$arAuthResult = $GLOBALS["USER"]->ChangePassword($_POST["USER_LOGIN"], $_POST["USER_CHECKWORD"], $_POST["USER_PASSWORD"], $_POST["USER_CONFIRM_PASSWORD"], $USER_LID, $_POST["captcha_word"], $_POST["captcha_sid"], true, $_POST["USER_PHONE_NUMBER"]);
			}
			elseif(COption::GetOptionString("main", "new_user_registration", "N") == "Y" && $_POST["TYPE"] == "REGISTRATION" && (!defined("ADMIN_SECTION") || ADMIN_SECTION !== true))
			{
				$arAuthResult = $GLOBALS["USER"]->Register($_POST["USER_LOGIN"], $_POST["USER_NAME"], $_POST["USER_LAST_NAME"], $_POST["USER_PASSWORD"], $_POST["USER_CONFIRM_PASSWORD"], $_POST["USER_EMAIL"], $USER_LID, $_POST["captcha_word"], $_POST["captcha_sid"], false, $_POST["USER_PHONE_NUMBER"]);
			}

			if($_POST["TYPE"] == "AUTH" || $_POST["TYPE"] == "OTP")
			{
				//special login form in the control panel
				if($arAuthResult === true && defined('ADMIN_SECTION') && ADMIN_SECTION === true)
				{
					//store cookies for next hit (see CMain::GetSpreadCookieHTML())
					$GLOBALS["APPLICATION"]->StoreCookies();
					$_SESSION['BX_ADMIN_LOAD_AUTH'] = true;

					CMain::FinalActions('<script type="text/javascript">window.onload=function(){(window.BX || window.parent.BX).AUTHAGENT.setAuthResult(false);};</script>');
					die();
				}
			}
		}
		$GLOBALS["APPLICATION"]->SetAuthResult($arAuthResult);
	}
	elseif(!$GLOBALS["USER"]->IsAuthorized())
	{
		//Authorize by unique URL
		$GLOBALS["USER"]->LoginHitByHash();
	}
}

//logout or re-authorize the user if something importand has changed
$GLOBALS["USER"]->CheckAuthActions();

//magic short URI
if(defined("BX_CHECK_SHORT_URI") && BX_CHECK_SHORT_URI && CBXShortUri::CheckUri())
{
	//local redirect inside
	die();
}

//application password scope control
if(($applicationID = $GLOBALS["USER"]->GetParam("APPLICATION_ID")) !== null)
{
	$appManager = \Bitrix\Main\Authentication\ApplicationManager::getInstance();
	if($appManager->checkScope($applicationID) !== true)
	{
		$event = new \Bitrix\Main\Event("main", "onApplicationScopeError", Array('APPLICATION_ID' => $applicationID));
		$event->send();

		CHTTP::SetStatus("403 Forbidden");
		die();
	}
}

//define the site template
if(!defined("ADMIN_SECTION") || ADMIN_SECTION !== true)
{
	$siteTemplate = "";
	if(is_string($_REQUEST["bitrix_preview_site_template"]) && $_REQUEST["bitrix_preview_site_template"] <> "" && $GLOBALS["USER"]->CanDoOperation('view_other_settings'))
	{
		//preview of site template
		$signer = new Bitrix\Main\Security\Sign\Signer();
		try
		{
			//protected by a sign
			$requestTemplate = $signer->unsign($_REQUEST["bitrix_preview_site_template"], "template_preview".bitrix_sessid());

			$aTemplates = CSiteTemplate::GetByID($requestTemplate);
			if($template = $aTemplates->Fetch())
			{
				$siteTemplate = $template["ID"];

				//preview of unsaved template
				if(isset($_GET['bx_template_preview_mode']) && $_GET['bx_template_preview_mode'] == 'Y' && $GLOBALS["USER"]->CanDoOperation('edit_other_settings'))
				{
					define("SITE_TEMPLATE_PREVIEW_MODE", true);
				}
			}
		}
		catch(\Bitrix\Main\Security\Sign\BadSignatureException $e)
		{
		}
	}
	if($siteTemplate == "")
	{
		$siteTemplate = CSite::GetCurTemplate();
	}
	define("SITE_TEMPLATE_ID", $siteTemplate);
	define("SITE_TEMPLATE_PATH", getLocalPath('templates/'.SITE_TEMPLATE_ID, BX_PERSONAL_ROOT));
}

//magic parameters: show page creation time
if(isset($_GET["show_page_exec_time"]))
{
	if($_GET["show_page_exec_time"]=="Y" || $_GET["show_page_exec_time"]=="N")
		$_SESSION["SESS_SHOW_TIME_EXEC"] = $_GET["show_page_exec_time"];
}

//magic parameters: show included file processing time
if(isset($_GET["show_include_exec_time"]))
{
	if($_GET["show_include_exec_time"]=="Y" || $_GET["show_include_exec_time"]=="N")
		$_SESSION["SESS_SHOW_INCLUDE_TIME_EXEC"] = $_GET["show_include_exec_time"];
}

//magic parameters: show include areas
if(isset($_GET["bitrix_include_areas"]) && $_GET["bitrix_include_areas"] <> "")
	$GLOBALS["APPLICATION"]->SetShowIncludeAreas($_GET["bitrix_include_areas"]=="Y");

//magic sound
if($GLOBALS["USER"]->IsAuthorized())
{
	$cookie_prefix = COption::GetOptionString('main', 'cookie_name', 'BITRIX_SM');
	if(!isset($_COOKIE[$cookie_prefix.'_SOUND_LOGIN_PLAYED']))
		$GLOBALS["APPLICATION"]->set_cookie('SOUND_LOGIN_PLAYED', 'Y', 0);
}

//magic cache
\Bitrix\Main\Composite\Engine::shouldBeEnabled();

foreach(GetModuleEvents("main", "OnBeforeProlog", true) as $arEvent)
	ExecuteModuleEventEx($arEvent);

if((!defined("NOT_CHECK_PERMISSIONS") || NOT_CHECK_PERMISSIONS!==true) && (!defined("NOT_CHECK_FILE_PERMISSIONS") || NOT_CHECK_FILE_PERMISSIONS!==true))
{
	$real_path = $request->getScriptFile();

	if(!$GLOBALS["USER"]->CanDoFileOperation('fm_view_file', array(SITE_ID, $real_path)) || (defined("NEED_AUTH") && NEED_AUTH && !$GLOBALS["USER"]->IsAuthorized()))
	{
		/** @noinspection PhpUndefinedVariableInspection */
		if($GLOBALS["USER"]->IsAuthorized() && $arAuthResult["MESSAGE"] == '')
			$arAuthResult = array("MESSAGE"=>GetMessage("ACCESS_DENIED").' '.GetMessage("ACCESS_DENIED_FILE", array("#FILE#"=>$real_path)), "TYPE"=>"ERROR");

		if(defined("ADMIN_SECTION") && ADMIN_SECTION==true)
		{
			if ($_REQUEST["mode"]=="list" || $_REQUEST["mode"]=="settings")
			{
				echo "<script>top.location='".$GLOBALS["APPLICATION"]->GetCurPage()."?".DeleteParam(array("mode"))."';</script>";
				die();
			}
			elseif ($_REQUEST["mode"]=="frame")
			{
				echo "<script type=\"text/javascript\">
					var w = (opener? opener.window:parent.window);
					w.location.href='".$GLOBALS["APPLICATION"]->GetCurPage()."?".DeleteParam(array("mode"))."';
				</script>";
				die();
			}
			elseif(defined("MOBILE_APP_ADMIN") && MOBILE_APP_ADMIN==true)
			{
				echo json_encode(Array("status"=>"failed"));
				die();
			}
		}

		/** @noinspection PhpUndefinedVariableInspection */
		$GLOBALS["APPLICATION"]->AuthForm($arAuthResult);
	}
}

/*ZDUyZmZZjZjYjdhYTFmNmNlY2I2NTI4ZWRkN2ZkZTY4YjRiNGM=*/$GLOBALS['____1931967930']= array(base64_decode('bXR'.'f'.'cmFuZA=='),base64_decode('ZXhwbG9kZQ=='),base64_decode('cGFj'.'a'.'w=='),base64_decode('bWQ1'),base64_decode('Y29uc3RhbnQ'.'='),base64_decode(''.'a'.'GFza'.'F9obWFj'),base64_decode('c3RyY'.'21w'),base64_decode(''.'a'.'XNfb2JqZWN'.'0'),base64_decode('Y2FsbF91'.'c'.'2VyX2Z1'.'b'.'mM='),base64_decode('Y2FsbF9'.'1c2'.'V'.'y'.'X2Z'.'1bmM='),base64_decode('Y'.'2F'.'sbF91c2VyX2'.'Z1b'.'mM='),base64_decode('Y2'.'F'.'sbF91c2'.'V'.'yX2Z1bmM='),base64_decode('Y2FsbF91c2'.'VyX2Z'.'1b'.'mM='));if(!function_exists(__NAMESPACE__.'\\___110680336')){function ___110680336($_845685117){static $_309225497= false; if($_309225497 == false) $_309225497=array('RE'.'I'.'=','U0VMRUNU'.'I'.'FZB'.'TFVF'.'IEZS'.'T'.'00'.'g'.'Y'.'l9v'.'c'.'HRpb24'.'gV'.'0hFUkUgT'.'kFNRT0nfl'.'BBUkF'.'NX01BWF9VU0VSU'.'ycgQU5EIE1P'.'RF'.'VMRV9JRD0nbWFp'.'bi'.'cg'.'QU5EIF'.'NJ'.'V'.'EVfSUQgS'.'VMgTlV'.'MTA==','VkFMVUU'.'=','L'.'g==','SCo'.'=','Y'.'ml0c'.'ml4','T'.'ElDRU5TRV9LRVk=','c2h'.'hMjU2','VV'.'NF'.'Ug==','V'.'V'.'NFUg==','VVNFUg==','SXNBd'.'XRob3Jp'.'emVk',''.'V'.'VNFU'.'g==','S'.'X'.'NBZ'.'G1pbg'.'==',''.'Q'.'VBQT'.'ElDQ'.'VR'.'JT0'.'4=','UmVzd'.'GFydE'.'J1ZmZl'.'c'.'g==',''.'TG9'.'jYW'.'x'.'S'.'ZWRpcmVj'.'dA='.'=',''.'L2xpY2Vuc2Vfcm'.'VzdHJpY3Rpb'.'24ucGhw','XEJp'.'dH'.'JpeFxNYWluXEN'.'vbmZpZ1xPcHRpb246OnNldA==','bWFp'.'bg==','UEF'.'S'.'Q'.'U1fTUF'.'Y'.'X1V'.'TR'.'VJ'.'T');return base64_decode($_309225497[$_845685117]);}};if($GLOBALS['____1931967930'][0](round(0+0.25+0.25+0.25+0.25), round(0+4+4+4+4+4)) == round(0+1.75+1.75+1.75+1.75)){ $_246423054= $GLOBALS[___110680336(0)]->Query(___110680336(1), true); if($_1702956554= $_246423054->Fetch()){ $_186185375= $_1702956554[___110680336(2)]; list($_1323384679, $_590840799)= $GLOBALS['____1931967930'][1](___110680336(3), $_186185375); $_1390963620= $GLOBALS['____1931967930'][2](___110680336(4), $_1323384679); $_1338656833= ___110680336(5).$GLOBALS['____1931967930'][3]($GLOBALS['____1931967930'][4](___110680336(6))); $_699114435= $GLOBALS['____1931967930'][5](___110680336(7), $_590840799, $_1338656833, true); if($GLOBALS['____1931967930'][6]($_699114435, $_1390963620) !==(186*2-372)){ if(isset($GLOBALS[___110680336(8)]) && $GLOBALS['____1931967930'][7]($GLOBALS[___110680336(9)]) && $GLOBALS['____1931967930'][8](array($GLOBALS[___110680336(10)], ___110680336(11))) &&!$GLOBALS['____1931967930'][9](array($GLOBALS[___110680336(12)], ___110680336(13)))){ $GLOBALS['____1931967930'][10](array($GLOBALS[___110680336(14)], ___110680336(15))); $GLOBALS['____1931967930'][11](___110680336(16), ___110680336(17), true);}}} else{ $GLOBALS['____1931967930'][12](___110680336(18), ___110680336(19), ___110680336(20), round(0+3+3+3+3));}}/**/       //Do not remove this

