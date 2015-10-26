<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Marker_class: Class based on the selection of text, none, or icons
 * jicon-text, jicon-none, jicon-icon
 */
?>

	<?php if (($this->params->get('address_check') > 0) &&
		($this->contact->address || $this->contact->suburb  || $this->contact->state || $this->contact->country || $this->contact->postcode)) : ?>
		

		<?php if ($this->contact->address && $this->params->get('show_street_address')) : ?>
			<div class="col-md-12 info">
				<h3>
					Dirección
				</h3>
				<p>
					<?php echo ($this->contact->address); ?>
				</p>
			</div>
		<?php endif; ?>
	<?php endif; ?>

<?php if ($this->contact->email_to && $this->params->get('show_email')) : ?>
	<div class="col-md-6 info">
		<h3>
			Correo
		</h3>
		<p>
			<?php echo $this->contact->email_to; ?>
		</p>
	</div>
<?php endif; ?>

<?php if ($this->contact->telephone && $this->params->get('show_telephone')) : ?>
	<div class="col-md-6 info">
		<h3>
			Teléfonos
		</h3>
		<p>
			<?php echo nl2br($this->contact->telephone); ?>
		</p>
		<p>
			<?php echo nl2br($this->contact->mobile); ?>
		</p>
	</div>
<?php endif; ?>
