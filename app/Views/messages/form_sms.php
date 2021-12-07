<?php
/**
 * @var object $person_info
 * @var string $controller_name
 */
?>
<div id="required_fields_message"><?php echo lang('Common.fields_required_message') ?></div>

<ul id="error_message_box" class="error_message_box"></ul>
	
<?php echo form_open(esc("messages/send_form/$person_info->person_id", 'attr'), ['id' => 'send_sms_form', 'class' => 'form-horizontal']) ?>
	<fieldset>
		<div class="form-group form-group-sm">
			<?php echo form_label(lang('Messages.first_name'), 'first_name_label', ['for' => 'first_name', 'class' => 'control-label col-xs-2']) ?>
			<div class="col-xs-10">
				<?php echo form_input (['class' => 'form-control input-sm', 'type' => 'text', 'name' => 'first_name', 'value' => esc($person_info->first_name, 'attr'), 'readonly' => 'true']) ?>
			</div>
		</div>
		<div class="form-group form-group-sm">
			<?php echo form_label(lang('Messages.last_name'), 'last_name_label', ['for' => 'last_name', 'class' => 'control-label col-xs-2']) ?>
			<div class="col-xs-10">
				<?php echo form_input (['class' => 'form-control input-sm', 'type' => 'text', 'name' => 'last_name', 'value' => esc($person_info->last_name, 'attr'), 'readonly' => 'true']) ?>
			</div>
		</div> 
		<div class="form-group form-group-sm">
			<?php echo form_label(lang('Messages.phone'), 'phone_label', ['for' => 'phone', 'class' => 'control-label col-xs-2 required']) ?>
			<div class="col-xs-10">
				<div class="input-group">
					<span class="input-group-addon input-sm"><span class="glyphicon glyphicon-phone-alt"></span></span>
					<?php echo form_input (['class' => 'form-control input-sm required', 'type' => 'text', 'name' => 'phone', 'value' => esc($person_info->phone_number, 'attr')]) ?>
				</div>
			</div>
		</div>
		<div class="form-group form-group-sm">
			<?php echo form_label(lang('Messages.message'), 'message_label', ['for' => 'message', 'class' => 'control-label col-xs-2 required']) ?>
			<div class="col-xs-10">
				<?php echo form_textarea (['class' => 'form-control input-sm required', 'name' => 'message', 'id' => 'message', 'value' => esc($this->appconfig->get('msg_msg'), 'attr')]) ?>
			</div>
		</div>
	</fieldset>
<?php echo form_close() ?>

<script type="text/javascript">
//validation and submit handling
$(document).ready(function()
{
	$('#send_sms_form').validate($.extend({
		submitHandler: function(form) {
			$(form).ajaxSubmit({
				success: function(response)
				{
					dialog_support.hide();
					table_support.handle_submit("<?php echo esc(site_url($controller_name), 'url') ?>", response);
				},
				dataType: 'json'
			});
		},

		errorLabelContainer: '#error_message_box',

		rules:
		{
			phone:
			{
				required: true,
				number: true
			},
			message:
			{
				required: true,
				number: false
			}
   		},

		messages:
		{
			phone:
			{
				required: "<?php echo lang('Messages.phone_number_required') ?>",
				number: "<?php echo lang('Messages.phone') ?>"
			},
			message:
			{
				required: "<?php echo lang('Messages.message_required') ?>"
			}
		}
	}, form_support.error));
});
</script>
