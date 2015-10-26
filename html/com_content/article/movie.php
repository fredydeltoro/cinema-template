<?php
/**
* @package     Joomla.Site
* @subpackage  com_content
*
* @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
* @license     GNU General Public License version 2 or later; see LICENSE.txt
*/
defined('_JEXEC') or die;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$canEdit = $params->get('access-edit');
$mvcontet     = json_decode($this->item->attribs);
$original     = $mvcontet->original;
$genero       = $mvcontet->genero;
$clasif       = $mvcontet->clasif;
$idioma       = $mvcontet->idioma;
$formato      = $mvcontet->formato;
$duracion     = $mvcontet->duracion;
$link         = $mvcontet->link;
$video        = $mvcontet->video;
$lunes        = $mvcontet->lunes;
$martes       = $mvcontet->martes;
$miercoles    = $mvcontet->miercoles;
$jueves       = $mvcontet->jueves;
$viernes      = $mvcontet->viernes;
$sabado       = $mvcontet->sabado;
$domingo      = $mvcontet->domingo;
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
//Genero
$len = count($genero);
$g = '';
$genero_p = '';
if ($len < 2){$genero_p =  $genero[0];}
else{
  for ($i=0; $i < $len-1; $i++)
  {
    $g .=" - ".$genero[$i+1];
  }
  $genero_p = $genero[0].$g;
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
  elseif (($formato[0]=='2d' && $formato[1]=='3d') || ($formato[0]=='3d' && $formato[1]=='2d') )
  {
    $formato_p = '<div class="td">3D</div>';
    $formato_p .= '<div class="dd">2D</div>';
  }
  elseif (($formato[0]=='2d' && $formato[1]=='est') || ($formato[0]=='est' && $formato[1]=='2d') )
  {
    $formato_p = '<div class="estreno"><i class="fa fa-star"></i></div>';
    $formato_p .= '<div class="dd">2D</div>';
  }
  elseif (($formato[0]=='3d' && $formato[1]=='est') || ($formato[0]=='est' && $formato[1]=='3d') )
  {
    $formato_p = '<div class="estreno"><i class="fa fa-star"></i></div>';
    $formato_p .= '<div class="td">3D</div>';
  }
  elseif ($formato[0]=='3d')
  {
    $formato_p = '<div class="td">3D</div>';
  }
  elseif ($formato[0]=='2d')
  {
    $formato_p = '<div class="dd">2D</div>';
  }
  elseif ($formato[0]=='est')
  {
    $formato_p = '<div class="estreno"><i class="fa fa-star"></i></div>';
  }
}
//Duración
$duracion_p = $duracion . " Minutos";
//Funciones
function funciones($dia)
{
//descomposicion del parametro json en variables
  $dia_params = json_decode($dia);
  $dia_hora = $dia_params->hora;
  $dia_min  = $dia_params->min;
  $dia_sala  = $dia_params->sala;
  $dia_language  = $dia_params->language;
  $dia_formato  = $dia_params->format;
  $html_fun = "";
  for ($i=0; $i < count($dia_hora); $i++) {
//hora de la función
    $hr_f = $dia_hora[$i];
    $min_f = $dia_min[$i];
    if (intval($dia_hora[$i]) <10 ){ $hr_f = '0'.$dia_hora[$i];}
    if (intval($dia_min[$i]) <10 ){ $min_f = '0'.$dia_min[$i];}
    $hora = $hr_f.':'.$min_f;
//idioma y formato
    if ($dia_formato[$i] != null){
      $id_fo = $dia_language[$i].' . '.$dia_formato[$i];
    }
    else{$id_fo = $dia_language[$i];}
    $html_fun .= '<div class="fn">';
    $html_fun .= '<div class="fn_sl">';
    $html_fun .= '<div class="funcion">'.$hora.'</div>';
    $html_fun .= '<div class="sala">'.'Sala '.$dia_sala[$i].'</div>';
    $html_fun .= '</div><div class="idi_form">'.$id_fo.'</div></div>';
  }
  return $html_fun;
}
    // Si es estreno
$menu;
$box_hr;
$box_sp;
if ($lunes || $martes || $miercoles || $jueves || $viernes || $sabado || $domingo){
  ;
}
else{
  $menu = 'display: none;';
  $box_hr = 'display: none;';
  $box_sp = 'display: block;';
}
$bkgnd ='';
if (isset($images->image_fulltext) and !empty($images->image_fulltext)){
  $bkgnd = "background:url('" . htmlspecialchars($images->image_fulltext) . "')";
}
JHtml::_('behavior.caption');
    ?>
<article class="movie">
  <header style="<?php echo $bkgnd; ?>">
    <div class="bg"></div>
    <div class="contenedor row">
      <div class="col-md-10  titulo">
        <section class="video">
          <div class="button">
            <span class="fa fa-play"></span>
          </div>
          <div class="reproductor">
            <div class="box-player">
              <div id="player"></div>
              <span class="button-close fa fa-times"></span>
            </div>
            <span id="id-video"><?php echo $video; ?></span>
          </div>
        </section>
        <h1>
        <?php echo $this->item->title; ?>
        </h1>
        <div class="original">
          <?php echo $original; ?>
        </div>
      </div>
    </div>
  </header>
  <main>
  <div class="contenedor row">
    <section class="_ficha col-md-3">
      <div class="ficha">
        <h3>Ficha Técnica</h3>
        <div class="formato">
          <?php echo $formato_p; ?>
        </div>
        <?php if($duracion_p != null): ?>
        <div class="duracion">
          <strong>Duración</strong>
          <div><?php echo $duracion_p; ?></div>
        </div>
        <?php endif ?>
        <div class="dt">
          <?php if ($clasif != null): ?>
          <div>
            <strong>Clasificación</strong>
            <div>
              <?php echo $clasif;?>
            </div>
          </div>
          <?php endif ?>
          <?php if ($idioma_p != null): ?>
          <div>
            <strong>Idioma</strong>
            <div>
              <?php echo $idioma_p; ?>
            </div>
          </div>
          <?php endif ?>
          <?php if ($genero_p != null): ?>
          <div>
            <strong>Género</strong>
            <div>
              <?php echo $genero_p; ?>
            </div>
          </div>
          <?php endif ?>
        </div>
        <?php if ($link != null): ?>
        <div class="sitio">
          <a target="_blank" href="<?php echo $link; ?>">Página Oficial</a>
        </div>
        <?php endif ?>
        <div class="share"></div>
      </div>
    </section>
    <section class="sino_hr col-md-9">
      <div class="section">
        <h2>Sinopsis</h2>
      </div>
      <hr>
      <div class="descripcion">
        <div class="ficha-responsive">
          <h3>Ficha Técnica</h3>
          <div class="formato">
            <?php echo $formato_p; ?>
          </div>
          <?php if($duracion_p != null): ?>
          <div class="duracion">
            <strong>Duración</strong>
            <div><?php echo $duracion_p; ?></div>
          </div>
          <?php endif ?>
          <div class="dt">
            <?php if ($clasif != null): ?>
            <div>
              <strong>Clasificación</strong>
              <div>
                <?php echo $clasif;?>
              </div>
            </div>
            <?php endif ?>
            <?php if ($idioma_p != null): ?>
            <div>
              <strong>Idioma</strong>
              <div>
                <?php echo $idioma_p; ?>
              </div>
            </div>
            <?php endif ?>
            <?php if ($genero_p != null): ?>
            <div>
              <strong>Género</strong>
              <div>
                <?php echo $genero_p; ?>
              </div>
            </div>
            <?php endif ?>
          </div>
          <?php if ($link != null): ?>
          <div class="sitio">
            <a target="_blank" href="<?php echo $link; ?>">Página Oficial</a>
          </div>
          <?php endif ?>
          <div class="share"></div>
        </div>
        <div class="sinopsis">
          <?php echo $this->item->text; ?>
        </div>
      </div>
      <div class="horario">
        <div class="dias">
          <div class="dia">Lun</div>
          <div class="dia">Mar</div>
          <div class="dia">Mie</div>
          <div class="dia">Jue</div>
          <div class="dia">Vie</div>
          <div class="dia">Sab</div>
          <div class="dia">Dom</div>
        </div>
        <div class="fn_dia">
          <div class="dia_responsive">Lun</div>
          <?php
          if ($lunes !=null)
          echo funciones($lunes);
          ?>
        </div>
        <div class="fn_dia">
          <div class="dia_responsive">Mar</div>
          <?php
          if ($martes !=null)
          echo funciones($martes);
          ?>
        </div>
        <div class="fn_dia">
          <div class="dia_responsive">Mie</div>
          <?php
          if ($miercoles !=null)
          echo funciones($miercoles);
          ?>
        </div>
        <div class="fn_dia">
          <div class="dia_responsive">Jue</div>
          <?php
          if ($jueves !=null)
          echo funciones($jueves);
          ?>
        </div>
        <div class="fn_dia">
          <div class="dia_responsive">Vie</div>
          <?php
          if ($viernes !=null)
          echo funciones($viernes);
          ?>
        </div>
        <div class="fn_dia">
          <div class="dia_responsive">Sab</div>
          <?php
          if ($sabado !=null)
          echo funciones($sabado);
          ?>
        </div>
        <div class="fn_dia">
          <div class="dia_responsive">Dom</div>
          <?php
          if ($domingo !=null)
          echo funciones($domingo);
          ?>
        </div>
      </div>
      <div class="menu" style="<?php echo $menu; ?>">
        <div class="btn_sin">
          Sinopsis
        </div>
        <div class="btn_hr button">
          Horario
        </div>
      </div>
    </section>
  </div>
  </main>
</article>