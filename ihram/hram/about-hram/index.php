<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О храме");
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
Text here....
			<form class="form-horizontal" action="/" method="post" role="form">
				<div class="form-group">
					<label for="name" class="col-xs-12 col-md-3 control-label"><?=GetMessage("CONTACTS_NAME")?></label>
					<div class="col-xs-12 col-md-9">
						<input type="text" class="form-control" name="name" id="name">
					</div>
				</div>
				<div class="form-group">
					<label for="phone" class="col-xs-12 col-md-3 control-label"><?=GetMessage("CONTACTS_PHONE")?></label>
					<div class="col-xs-12 col-md-9">
						<input type="text" class="form-control" name="phone" id="phone">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-xs-12 col-md-3 control-label"><?=GetMessage("CONTACTS_EMAIL")?></label>
					<div class="col-xs-12 col-md-9">
						<input type="text" class="form-control" name="email" id="email">
					</div>
				</div>
				<div class="form-group">
					<label for="message" class="col-xs-12 col-md-3 control-label"><?=GetMessage("CONTACTS_MESSAGE")?></label>
					<div class="col-xs-12 col-md-9">
						<textarea class="form-control" name="message" id="message" rows="6"></textarea>
					</div>
				</div>
				<div class="text-right">
					<button type="submit" class="btn btn-success"><?=GetMessage("CONTACTS_BTN_SEND")?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>