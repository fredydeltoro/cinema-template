<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.Cinema
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

$params =& $this->item->params;
$images = json_decode($this->item->images);
$app = JFactory::getApplication();
$canEdit = $this->item->params->get('access-edit');


JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

?>

<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)); ?>">
  <span class="fecha"><?php echo JText::sprintf(JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?></span>
  <h2><?php echo $this->escape($this->item->title); ?></h2>
  <span class="fa fa-chevron-circle-right"></span>
</a>
