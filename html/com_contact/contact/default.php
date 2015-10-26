<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$cparams = JComponentHelper::getParams('com_media');

jimport('joomla.html.html.bootstrap');
?>

<div class="contacto">
	<?php if ($this->contact->name && $this->params->get('show_name')) : ?>
		<header>
			<div class="contenedor row">
				<div class="col-md-10 titulo-box">
					<div class="titulo">
						<h1>
							<?php if ($this->item->published == 0) : ?>
									<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
							<?php endif; ?>
							<span class="contact-name" itemprop="name"><?php echo $this->contact->name; ?></span>
						</h1>
					</div>
				</div>
			</div>
		</header>
	<?php endif;  ?>
	<section>
		<div class="module">
			<div id="mapa" class="mapa">
			</div>
		</div>
	</section>
	<?php if ($this->params->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id)) : ?>
		<section class="cont-contac">
			<div class="contenedor">
				<div class="row">
					<div class="col-md-6 cont-info">
						<div class="row">
							<?php echo $this->loadTemplate('address'); ?>
						</div>
					</div>
					<div class="col-md-6 cont-form">
						<?php  echo $this->loadTemplate('form');  ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
</div>