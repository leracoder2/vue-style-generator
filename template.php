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

<?
$THEME_COLOR = $arResult["PROPERTIES"]["STYLE_THEME_COLOR"]["VALUE"];
$BACKGROUND_COLOR = $arResult["PROPERTIES"]["STYLE_BACKGROUND_COLOR"]["VALUE"];
$TEXT_COLOR = $arResult["PROPERTIES"]["STYLE_TEXT_COLOR"]["VALUE"];
$BTN_BORDER_SIZE = $arResult["PROPERTIES"]["STYLE_BTN_BORDER_SIZE"]["VALUE"];
$BTN_HORIZ_PADDING = $arResult["PROPERTIES"]["STYLE_BTN_HORIZ_PADDING"]["VALUE"];
$BTN_VERTIC_PADDING = $arResult["PROPERTIES"]["STYLE_BTN_VERTIC_PADDING"]["VALUE"];
$BTN_BORDER_RADIUS = $arResult["PROPERTIES"]["STYLE_BTN_BORDER_RADIUS"]["VALUE"];
$BTN_FILLED = $arResult["PROPERTIES"]["STYLE_BTN_FILLED"]["VALUE"];
?>

<div id="styleGenerator">
    <generator
		initial-main-color="<?=$THEME_COLOR?>"
		initial-background-color="<?=$BACKGROUND_COLOR?>"
		initial-text-color="<?=$TEXT_COLOR?>"
        :initial-border-size="<?=$BTN_BORDER_SIZE?>"
        :initial-horizontal-padding="<?=$BTN_HORIZ_PADDING?>"
        :initial-vertical-padding="<?=$BTN_VERTIC_PADDING?>"
        :initial-border-radius="<?=$BTN_BORDER_RADIUS?>"
		:initial-filled-button="<?=$BTN_FILLED?>"
    />
</div>

<script type="text/x-template" id="generator-template">
    <div class="settings">	
        <form action="" class="settings-form" action="">
        	
			<div class="settings-form__item">
        		<label for="volume" class="settings-form-item__label">Базовый цвет сайта</label>
        		<div class="settings-form-item--wrap">
        			<input v-model="mainColor" type="text" class="form-field" name="THEME_COLOR">
					<input v-model="mainColor" type="color" class="form-color-picker">
        		</div>
			</div>

			<div class="settings-form__item">
        		<label for="volume" class="settings-form-item__label">Цвет фона</label>
        		<div class="settings-form-item--wrap">
        			<input v-model="backgroundСolor" type="text"  class="form-field" name="BACKGROUND_COLOR">
					<input v-model="backgroundСolor" type="color" class="form-color-picker">
        		</div>
			</div>

			<div class="settings-form__item">
        		<label for="volume" class="settings-form-item__label">Цвет текста</label>
        		<div class="settings-form-item--wrap">
        			<input v-model="textСolor" type="text"  class="form-field" name="TEXT_COLOR">
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
							<input v-model="borderSize" type="range" min="0" max="10" name="BTN_BORDER_SIZE">
							<label for="volume">Толщина обводки: {{borderSize}}</label>
						</div>

						<div>
							<input v-model="horizontalPadding" type="range" min="0" max="50" name="BTN_HORIZ_PADDING">
							<label for="volume">Горизонтальные отступы: {{horizontalPadding}}</label> 
						</div>

						<div>
							<input v-model="verticalPadding" type="range" min="0" max="20" name="BTN_VERTIC_PADDING">
							<label for="volume">Вертикальные отступы: {{verticalPadding}}</label> 
						</div>

						<div>
							<input v-model="borderRadius" type="range" min="0" max="50" name="BTN_BORDER_RADIUS">
							<label for="volume">Закругленность: {{borderRadius}}</label> 
						</div>

						<input v-model="filledButton" type="checkbox" name="BTN_FILLED"> 
						<label for="checkbox">C заливкой</label>

					</div>

					<div class="col-lg-5">
						<button v-bind:style="style" class="btn">Демо кнопка</button>
					</div>

				</div>
				
			</div> 	

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
					default: '#cccccc',
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
            console.log(this);
			return {
            	mainColor: this.initialMainColor,
            	backgroundСolor: this.initialBackgroundColor,
            	textСolor: this.initialTextColor,
                borderSize: this.initialBorderSize,
                borderRadius: this.initialBorderRadius,
                horizontalPadding: this.initialHorizontalPadding,
                verticalPadding: this.initialVerticalPadding,
				filledButton: this.initialFilledButton,
            }
        },
        computed: {
            style: function() {
				var bgColor = '#ffffff';
				var btnTextColor = this.textСolor;

				if(this.filledButton){
					bgColor = this.mainColor;
					btnTextColor = '#ffffff';
				}

            	var style = 'border:'+this.borderSize+'px solid '+this.mainColor+';\
            				padding:'+this.verticalPadding+'px '+this.horizontalPadding+'px;\
            				border-radius:'+this.borderRadius+'px;\
							background: '+bgColor+';\
							color:'+btnTextColor+';';

                return style;
            },
			textStyle: function(){
				var textStyle = 'color:'+this.textСolor+';';

                return textStyle;
			}
        }
    }) 

    var app = new Vue({
        el: '#styleGenerator'
    })
</script>

<style>

	.settings-form{
		width: 60%;
	}

	.settings-form__item{
		border: 1px solid #ccc;
		display: flex;
		flex-direction: column;
		padding: 20px;
	}

	.settings-form-item__label{
		margin-bottom: 10px;
	}

	.settings-form-item--wrap{
		display: flex;
		align-items: center;
	}

	.settings-form-item__btn-wrap{
		padding: 20px 0 0 0;
	}

	.settings-form__submit--wrap{
		padding-top: 20px;
		display: flex;
    	justify-content: flex-end;
	}

	.settings-form__submit{
		color: #fff;
		background: green;
		border: none;
		padding: 10px;
		border-radius: 5px;
		font-size: 14px;
		cursor: pointer;
	}

	.settings-form__submit:hover{
		background: #037503;
	}

</style>



