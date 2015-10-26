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

$mvcontet  = json_decode($this->item->attribs);
$idioma    = $mvcontet->idioma;
$formato   = $mvcontet->formato;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

//Idioma
  $idioma_p = "";

  if (count($idioma)==2)
  {
    $idioma_p = $idioma[0] .' y '. $idioma[1];
  }
  else
  {
    $idioma_p = $idioma[0];
  }

  //Formato
  $formato_p = '';

  if ($formato !=null)
  {

    if (count($formato)==3)
    {
      $formato_p = '<div class="td">3D</div>';
      $formato_p .= '<div class="dd">2D</div>';
      $formato_p .= '<div class="estreno"><i class="fa fa-star"></i></div>';
    }

    elseif ($formato[0]=='2d')
      {
        $formato_p = '<div class="dd">2D</div>';
      }
    elseif ($formato[0]=='3d')
    {
      $formato_p = '<div class="td">3D</div>';
    }
    
    else
      {
       $formato_p .= '<div class="estreno"><i class="fa fa-star"></i></div>';
    }
   
  }

?>

<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)); ?>" class="cartel_link">
  <div class="cartel_contenido">
    <div class="features">
      <?php echo $formato_p; ?>
    </div>
    <div class="poster">
      <img src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="">
    </div>
    <div class="cartel_info">
      <div class="titulo">
        <h2>
          <?php echo $this->escape($this->item->title); ?>
        </h2>
      </div>
      <div class="idioma">
        <?php if ($idioma_p): ?>
          <span><?php echo "Idioma: ".$idioma_p; ?></span>
        <?php endif ?>
      </div>
    </div>
  </div>
</a>