
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <?php echo Asset::css('common.css'); ?>

    <style type="text/css">
      body {
        padding-top:60px;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">FuelPHP Kickstart</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <?php echo $content; ?>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <?php
	    Asset::js(array(
	      'bootstrap/bootstrap-transition.js',
	      'bootstrap/bootstrap-alert.js',
	      'bootstrap/bootstrap-modal.js',
	      'bootstrap/bootstrap-dropdown.js',
	      'bootstrap/bootstrap-dropdown.js',
	      'bootstrap/bootstrap-scrollspy.js',
	      'bootstrap/bootstrap-tab.js',
	      'bootstrap/bootstrap-tooltip.js',
	      'bootstrap/bootstrap-popover.js',
	      'bootstrap/bootstrap-button.js',
	      'bootstrap/bootstrap-collapse.js',
	      'bootstrap/bootstrap-carousel.js',
	      'bootstrap/bootstrap-typeahead.js',
    	)
	);
    ?>
  </body>
</html>
