<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content layout override
 *
 * @copyright   Copyright (C) 2015 Jose Alfredo Monroy Sanchez All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();

$templateparams = $app->getTemplate(true)->params;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('behavior.caption');

$cparams = JComponentHelper::getParams('com_media');


?>

<div class="blog contenedor">
	<ul>
		<?php
				$introcount = (count($this->intro_items));
				$counter = 0;
			?>
			<?php if (!empty($this->intro_items)) : ?>
			<?php foreach ($this->intro_items as $key => &$item) : ?>
			
			<li class='<?php echo $item->state == 0 ? ' system-unpublished' : null; ?>'>
				<?php
					$this->item = &$item;
					echo $this->loadTemplate('item');
				?>
			</li>
			
			<?php endforeach; ?>
			<?php endif; ?>
	</ul>	
</div>