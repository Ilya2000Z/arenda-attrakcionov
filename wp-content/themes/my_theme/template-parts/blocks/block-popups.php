<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<?php 
	$feedback_types = array(
		__('Консультация по телефону'),
		__('WatsApp'),
		__('Telegram')
	);
?>

<div class="mfp-hide popup-block" id="feedback-popup">
		<h2 class="title"><?php _e('Варианты связи'); ?></h2>
		<form class="masterclass-feedback">
			<?php if ($feedback_types): ?>
			<div class="feedback-type-wrapper">
				<?php foreach($feedback_types as $i => $feedback_type): ?>
					<label class="custom-radio-wrapper">
						<?php echo $feedback_type ?>
						<input type="radio" name="feedback-type" value="<?php echo $feedback_type; ?>" <?php checked($i, 0, true); ?>>
						<span class="checkmark"></span>
					</label>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			<input type="text" placeholder="<?php _e('Имя');?>" class="w100" required name="name">
			<input type="tel" placeholder="<?php _e('Телефон');?>" class="w100" required name="phone">
			<label class="custom-checkbox-wrapper agreement-checkbox">
            <?php _e('Я согласен на обработку персональных данных');?>
				
				<input type="checkbox" checked="checked">
				<span class="checkmark"></span>
			</label>

			<div class="center mt30"><button type="submit"><?php _e('Оставить заявку');?></button></div>
		</form>
	</div>