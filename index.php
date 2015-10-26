<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
$doc = JFactory::getDocument();
$doc->addStyleSheet('templates/' . $this->template . '/css/bootstrap.min.css');
$doc->addStyleSheet('templates/' . $this->template . '/css/template.css');
$doc->addStyleSheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Yantramanav:400,700,500');
$doc->addScript('templates/' . $this->template . '/js/video.js', 'text/javascript');
$doc->addScript('templates/' . $this->template . '/js/main.js', 'text/javascript');
$doc->addScript('templates/' . $this->template . '/js/map.js', 'text/javascript');
JHtml::_('bootstrap.framework');
$app             = JFactory::getApplication();
// Getting params from template
$params = $app->getTemplate(true)->params;
$sitename = $app->get('sitename');
// Logo file or site title param
if ($this->params->get('logoFile'))
{
$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle'))
{
$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
}
else
{
$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
//Iconos de redes sociales
$facebook   = $this->params->get('facebook');
$twitter    = $this->params->get('twitter');
$googleplus = $this->params->get('googleplus');
if( $facebook || $twitter || $googleplus ) {
$html  = '<ul>';
    if( $facebook ) {
    $html .= '<li><a target="_blank" href="'. $facebook .'"><span class="fa fa-facebook"></span></a></li>';
    }
    if( $twitter ) {
    $html .= '<li><a target="_blank" href="'. $twitter .'"><span class="fa fa-twitter"></span></a></li>';
    }
    if( $googleplus ) {
    $html .= '<li><a target="_blank" href="'. $googleplus .'"><span class="fa fa-google-plus"></span></a></li>';
    }
    
$html .= '</ul>';
}
//Imagen para el background
$background;
if ($this->params->get('bkg_image')) {
$background = htmlspecialchars($this->params->get('bkg_image'));
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <jdoc:include type="head" />
    </head>
    <body>
      <span class="bkgnd">
            <?php echo $background; ?>
        </span>
        <header class='header'>
            <nav>
                <div class="contenedor">
                    <div class="row">
                        <div class="logo">
                            <a href="<?php echo $this->baseurl; ?>" title="Tu Cine">
                                <?php echo $logo; ?>
                            </a>
                        </div>
                      
                        <div class="menu-movil col-sm-1 fa fa-bars"></div>
                      
                        <div class="col-md-1 line">
                            <jdoc:include type="modules" name="telefonos" style="none" />
                        </div>
                        
                        <div class="menu-select col-md-8 col-sm-12 col-xs-12">
                            <jdoc:include type="modules" name="menu" style="none" />
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="wrap">
            
            <section>
                <div class="container-fluid module">
                    <div class="row banner">
                        <jdoc:include type="modules" name="banner" style="xhtml" />
                    </div>
                </div>
            </section>

            <main class="main">
                <div class="bkg"></div>
                <jdoc:include type="message" />
                <jdoc:include type="component" />
            </main>

            <footer>
                <div class="contenedor row">
                    
                    <div class="col-md-2 col-sm-3 col-xs-6 copy">
                        © <?php echo date('Y'); ?> <?php echo $sitename; ?>
                    </div>
                    <div class="col-md-4 col-sm-5 hidden-xs footer-menu">
                        <jdoc:include type="modules" name="menu-footer" style="none" />
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6 sociales">
                        <?php echo $html; ?>
                    </div>
                </div>
            </footer>
        </div>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script src="https://www.youtube.com/iframe_api"></script>
    </body>
</html>