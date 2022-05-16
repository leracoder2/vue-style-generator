<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Настройки сайта");
CModule::IncludeModule("iblock");
?>

<?
	$filename = '/home/bitrix/www/bitrix/templates/siteConstructor/app/css/theme.css';
	$text = $_GET["GENERATE_STYLE"];
	$f_hdl = fopen($filename, 'w');
	fwrite($f_hdl, $text);
	fclose($f_hdl);
?>

<?
	$el = new CIBlockElement;
	$checkBtnFilled = ($_GET["INPUT_BTN_FILLED"] == 'on') ? 'true' : 'false';
	$checkUseAuth = ($_GET["CHECK_USE_AUTH"] == 'on') ? 'true' : 'false';

	$PROP = array();
	$PROP["STYLE_THEME_COLOR"] = $_GET["INPUT_THEME_COLOR"]; 
	$PROP["STYLE_BACKGROUND_COLOR"] = $_GET["INPUT_BACKGROUND_COLOR"]; 
	$PROP["STYLE_TEXT_COLOR"] = $_GET["INPUT_TEXT_COLOR"]; 
	$PROP["STYLE_BTN_BORDER_SIZE"] = $_GET["INPUT_BTN_BORDER_SIZE"]; 
	$PROP["STYLE_BTN_HORIZ_PADDING"] = $_GET["INPUT_BTN_HORIZ_PADDING"]; 
	$PROP["STYLE_BTN_VERTIC_PADDING"] = $_GET["INPUT_BTN_VERTIC_PADDING"]; 
	$PROP["STYLE_BTN_BORDER_RADIUS"] = $_GET["INPUT_BTN_BORDER_RADIUS"];
	$PROP["STYLE_BTN_FILLED"] = $checkBtnFilled;
	$PROP["SETTINGS_USE_AUTH"] = $checkUseAuth;

	$arLoadProductArray = Array(
	  "MODIFIED_BY"    => $USER->GetID(),
	  "PROPERTY_VALUES"=> $PROP,
	);

	$PRODUCT_ID = 33; 
	$res = $el->Update(33, $arLoadProductArray);
?>


<?
header('Location: /settings/');
exit;
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>