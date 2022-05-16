<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

<div id="styleGenerator">
    <generator
		initial-main-color="<?=$arResult['THEME_COLOR']?>"
		initial-background-color="<?=$arResult['BACKGROUND_COLOR']?>"
		initial-text-color="<?=$arResult['TEXT_COLOR']?>"
        :initial-border-size="<?=$arResult['BTN_BORDER_SIZE']?>"
        :initial-horizontal-padding="<?=$arResult['BTN_HORIZ_PADDING']?>"
        :initial-vertical-padding="<?=$arResult['BTN_VERTIC_PADDING']?>"
        :initial-border-radius="<?=$arResult['BTN_BORDER_RADIUS']?>"
		:initial-filled-button="<?=$arResult['BTN_FILLED']?>"
    />
</div>


<script type="text/x-template" id="generator-template">
    <div class="settings">	
        <form action="handler_form_settings.php" class="settings-form">
        	 
			<div class="settings-form__item">
        		<label for="volume" class="settings-form-item__label">Базовый цвет сайта</label>
        		<div class="settings-form-item--wrap">
        			<input 
						v-model="mainColor" 
						type="text" 
						class="form-field" 
						name="INPUT_THEME_COLOR" 
						placeholder="Выберите цвет или введите кодировку в формате HEX"
					>
					<input v-model="mainColor" type="color" class="form-color-picker">
        		</div>
			</div>

			<div class="settings-form__item">
        		<label for="volume" class="settings-form-item__label">Цвет фона</label>
        		<div class="settings-form-item--wrap">
        			<input 
						v-model="backgroundColor" 
						type="text"  
						class="form-field" 
						name="INPUT_BACKGROUND_COLOR"
						placeholder="Выберите цвет или введите кодировку в формате HEX"
					>
					<input v-model="backgroundColor" type="color" class="form-color-picker">
        		</div>
			</div>

			<div class="settings-form__item">
        		<label for="volume" class="settings-form-item__label">Цвет текста</label>
        		<div class="settings-form-item--wrap">
        			<input 
						v-model="textСolor" 
						type="text"  
						class="form-field" 
						name="INPUT_TEXT_COLOR"
						placeholder="Выберите цвет или введите кодировку в формате HEX"
					>
					<input v-model="textСolor" type="color" class="form-color-picker">
        		</div>
				<p v-bind:style="textStyle">
					Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
					Et voluptates, repellat unde laboriosam temporibus magni optio quia aperiam, molestiae minima, similique quo quaerat totam. 
					Facilis magnam nesciunt omnis cum in?
				</p>
			</div>

			<div class="settings-form__item">

			<label for="volume" class="settings-form-item__label">Вид кнопки</label>
        		<div class="row">
					<div class="col-lg-7">
						<div>
							<input v-model="borderSize" type="range" min="0" max="10" name="INPUT_BTN_BORDER_SIZE">
							<label for="volume">Толщина обводки: {{borderSize}}</label>
						</div>

						<div>
							<input v-model="horizontalPadding" type="range" min="0" max="50" name="INPUT_BTN_HORIZ_PADDING">
							<label for="volume">Горизонтальные отступы: {{horizontalPadding}}</label> 
						</div>

						<div>
							<input v-model="verticalPadding" type="range" min="0" max="20" name="INPUT_BTN_VERTIC_PADDING">
							<label for="volume">Вертикальные отступы: {{verticalPadding}}</label> 
						</div>

						<div>
							<input v-model="borderRadius" type="range" min="0" max="50" name="INPUT_BTN_BORDER_RADIUS">
							<label for="volume">Закругленность: {{borderRadius}}</label> 
						</div>

						<input v-model="filledButton" type="checkbox" name="INPUT_BTN_FILLED"> 
						<label for="checkbox">C заливкой</label>

					</div>

					<div class="col-lg-5">
						<button v-bind:style="styleBtn">Демо кнопка</button>
					</div>

				</div>
				
			</div> 	

			<div class="settings-form__item">
				
        		<label for="volume" class="settings-form-item__label">
					Использовать авторизацию на сайте 
					<input type="checkbox" name="CHECK_USE_AUTH" <?=$arResult['USE_AUTH']?> > 
				</label>
			</div>
			
			<textarea name="" id="" cols="30" rows="10" name="GENERATE_STYLE" class="settings-form__textarea">
				{{themeStyle}}
			</textarea>
			
			<div class="settings-form__submit--wrap">
				<input type="submit" class="settings-form__submit" value="Cохранить настройки">
			</div>

        </form>
    </div>
</script>

<script>
    Vue.component('generator', {
        template: "#generator-template",
        props: {
			// color settings
				initialMainColor: {
					type: String,
					default: '#000000',
				},
				initialBackgroundColor: {
					type: String,
					default: '#ffffff',
				},
			// font setitngs
				initialTextColor: {
					type: String,
					default: '#000000',
				},
			// button settings
				initialBorderSize: {
					type: Number,
					default: 5,
				},
				initialHorizontalPadding: {
					type: Number,
					default: 5,
				},
				initialVerticalPadding: {
					type: Number,
					default: 5,
				},
				initialBorderRadius: {
					type: Number,
					default: 5,
				},
				initialFilledButton: { 
					type: Boolean,
					default: false,
				},
        },
        data: function () {
			return {
            	mainColor: this.initialMainColor,
            	backgroundColor: this.initialBackgroundColor,
            	textСolor: this.initialTextColor,
                borderSize: this.initialBorderSize,
                borderRadius: this.initialBorderRadius,
                horizontalPadding: this.initialHorizontalPadding,
                verticalPadding: this.initialVerticalPadding,
				filledButton: this.initialFilledButton,
            }
        },
        computed: {
            styleBtn: function() {
				var bgColor = '#ffffff';
				var btnTextColor = this.textСolor;

				if(this.filledButton){
					bgColor = this.mainColor;
					btnTextColor = '#ffffff';
				}

            	var styleBtn = 'border:'+this.borderSize+'px solid '+this.mainColor+';\
            				padding:'+this.verticalPadding+'px '+this.horizontalPadding+'px;\
            				border-radius:'+this.borderRadius+'px;\
							background: '+bgColor+';\
							color:'+btnTextColor+';';

                return styleBtn;
            },
			textStyle: function(){
				var textStyle = 'color:'+this.textСolor+';';

                return textStyle;
			},
			themeStyle: function(){
				var bgColor = '#ffffff';
				var btnTextColor = this.textСolor;

				if(this.filledButton){
					bgColor = this.mainColor;
					btnTextColor = '#ffffff';
				} 
				
				var themeStyle = ':root {\
					--theme-color: '+this.mainColor+';\
					--main-bg-color: '+this.backgroundColor+';\
					--main-text-color: '+this.textСolor+';\
					--main-btn-border-size: '+this.borderSize+'px;\
					--main-btn-border-radius: '+this.borderRadius+'px;\
					--main-btn-horiz-padding: '+this.horizontalPadding+'px;\
					--main-btn-vertic-padding: '+this.verticalPadding+'px;\
					--main-btn-bg: '+bgColor+';\
					--main-btn-color: '+btnTextColor+';}';
	
				
				return themeStyle;
			}
        }
    }) 	

    var app = new Vue({
        el: '#styleGenerator'
    })

</script>


<?/*
	<div class="news-detail">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
			<img
				class="detail_picture"
				border="0"
				src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
				width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
				height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
				alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
				title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
				/>
		<?endif?>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif;?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
			<h3><?=$arResult["NAME"]?></h3>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
			<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
		<?endif;?>
		<?if($arResult["NAV_RESULT"]):?>
			<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
			<?echo $arResult["NAV_TEXT"];?>
			<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
		<?elseif($arResult["DETAIL_TEXT"] <> ''):?>
			<?echo $arResult["DETAIL_TEXT"];?>
		<?else:?>
			<?echo $arResult["PREVIEW_TEXT"];?>
		<?endif?>
		<div style="clear:both"></div>
		<br />
		<?foreach($arResult["FIELDS"] as $code=>$value):
			if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
			{
				?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
				if (!empty($value) && is_array($value))
				{
					?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
				}
			}
			else
			{
				?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
			}
			?><br />
		<?endforeach;
		foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

			<?=$arProperty["NAME"]?>:&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			<br />
		<?endforeach;
		if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
		{
			?>
			<div class="news-detail-share">
				<noindex>
				<?
				$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
						"HANDLERS" => $arParams["SHARE_HANDLERS"],
						"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
						"PAGE_TITLE" => $arResult["~NAME"],
						"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
						"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
						"HIDE" => $arParams["SHARE_HIDE"],
					),
					$component,
					array("HIDE_ICONS" => "Y")
				);
				?>
				</noindex>
			</div>
			<?
		}
		?>
	</div>
*/?>