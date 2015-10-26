<?php
/**
* @package     Joomla.Site
* @subpackage  Templates.Flat Performance
*
* @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
* @license     GNU General Public License version 2 or later; see LICENSE.txt
*/
defined('_JEXEC') or die;
$app = JFactory::getApplication();
$templateparams = $app->getTemplate(true)->params;
$images = json_decode($this->item->images);
$urls = json_decode($this->item->urls);
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('behavior.caption');
// Create shortcut to parameters.
$params = $this->item->params;
								
?>
<article class="article">
	<header>
		<div class="contenedor row">
			<div class="col-md-10 titulo-box">
				<div class="titulo">
					<h1>
						<?php echo $this->item->title; ?>
					</h1>
					<?php if ($params->get('show_publish_date')): ?>
						<div class="fecha">
							<?php echo JText::sprintf(JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</header>
	<main>
		<div class="contenedor row">
			<div class="col-md-9 contenido">
				<?php echo $this->item->text; ?>
			</div>
		</div>
	</main>
</article>