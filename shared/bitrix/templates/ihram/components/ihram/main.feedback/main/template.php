<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="mfeedback col-xs-12 col-md-offset-3 col-md-9">
	<?if(!empty($arResult["ERROR_MESSAGE"]))
	{
		echo '<div class="alert alert-danger">';
		foreach($arResult["ERROR_MESSAGE"] as $v)
			ShowError($v);
		echo '</div>';
	}
	if(strlen($arResult["OK_MESSAGE"]) > 0)
	{
		?><div class="alert alert-success"><?=$arResult["OK_MESSAGE"]?></div><?
	}
	?>
</div>
	<form class="form-horizontal" action="<?=POST_FORM_ACTION_URI?>" method="POST" role='form'>
		<?=bitrix_sessid_post()?>
		<div class='form-group'>
			<label for='user_name' class="col-xs-12 col-md-3 control-label"><?=GetMessage("MFT_NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) ||
					in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span> *</span><?endif?></label>
			<div class="col-xs-12 col-md-9">
				<input id='user_name' name='user_name' type='text' class="form-control" value="<?=$arResult["AUTHOR_NAME"]?>">
			</div>
		</div>
		<div class='form-group'>
			<label for='user_telephone' class="col-xs-12 col-md-3 control-label"><?=GetMessage("MFT_TELEPHONE")?><?if(empty($arParams["REQUIRED_FIELDS"]) ||
					in_array("TELEPHONE", $arParams["REQUIRED_FIELDS"])):?><?endif?></label>
			<div class="col-xs-12 col-md-9">
				<input id='user_telephone' type="text" name="user_telephone" class="form-control" value="<?=$arResult["AUTHOR_TELEPHONE"]?>">
			</div>
		</div>
		<div class='form-group'>
			<label for='user_email' class="col-xs-12 col-md-3 control-label"><?=GetMessage("MFT_EMAIL")?><?if(empty($arParams["REQUIRED_FIELDS"]) ||
					in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span> *</span><?endif?></label>
			<div class="col-xs-12 col-md-9">
				<input id='user_email' type="text" name="user_email" class="form-control" value="<?=$arResult["AUTHOR_EMAIL"]?>">
			</div>
		</div>
		<div class='form-group'>
			<label for='MESSAGE' class="col-xs-12 col-md-3 control-label"><?=GetMessage("MFT_MESSAGE")?><?if(empty($arParams["REQUIRED_FIELDS"]) ||
					in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span> *</span><?endif?></label>
			<div class="col-xs-12 col-md-9">
				<textarea  class="form-control" id='MESSAGE' name="MESSAGE" rows="6"><?=$arResult["MESSAGE"]?></textarea>
			</div>
		</div>
		<div class='requre-field-message col-xs-12 col-md-offset-3 col-md-9'>
			Поля, отмеченные <span>*</span>, обязательны для заполнения
		</div>
		<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
		<div class="row captcha_block">
			<?if($arParams["USE_CAPTCHA"] == "Y"):?>
				<div class="col-xs-12 col-md-offset-3 col-md-9">
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
							<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="160" height="40" alt="CAPTCHA">
						</div>
						<div class="col-xs-12 col-md-6 text-right captcha-enter">
							<input class="captcha_word" type="text" name="captcha_word" value="">
						</div>
					</div>
				</div>
			<?endif;?>
		</div>
		<div class="col-xs-12 col-md-offset-3 col-md-9 text-center btn-block-feedback">
			<input class='btn btn-info btn-feedback' type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
		</div>
	</form>