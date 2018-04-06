<?php
/**
* @package   yoo_master2
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>
<head>
<?php echo $this['template']->render('head'); ?>
<?php if ($this['config']->get('bg-top-a')) : ?>
<style type="text/css">
#top-a{ background-image:url(<?php echo $this['config']->get('site_url'); ?>/<?php echo $this['config']->get('bg-top-a-image'); ?>)}
</style>
<?php endif; ?>
<?php if ($this['config']->get('bg-top-b')) : ?>
<style type="text/css">
#top-b{ background-image:url(<?php echo $this['config']->get('site_url'); ?>/<?php echo $this['config']->get('bg-top-b-image'); ?>)}
</style>
<?php endif; ?>
<?php if ($this['config']->get('bg-top-c')) : ?>
<style type="text/css">
#top-c{ background-image:url(<?php echo $this['config']->get('site_url'); ?>/<?php echo $this['config']->get('bg-top-c-image'); ?>)}
</style>
<?php endif; ?>
<?php if ($this['config']->get('bg-top-d')) : ?>
<style type="text/css">
#top-d{ background-image:url(<?php echo $this['config']->get('site_url'); ?>/<?php echo $this['config']->get('bg-top-d-image'); ?>)}
</style>
<?php endif; ?>
<?php if ($this['config']->get('bg-bottom-a')) : ?>
<style type="text/css">
#bottom-a{ background-image:url(<?php echo $this['config']->get('site_url'); ?>/<?php echo $this['config']->get('bg-bottom-a-image'); ?>)}
</style>
<?php endif; ?>
<?php if ($this['config']->get('bg-bottom-b')) : ?>
<style type="text/css">
#bottom-b{ background-image:url(<?php echo $this['config']->get('site_url'); ?>/<?php echo $this['config']->get('bg-bottom-b-image'); ?>)}
</style>
<?php endif; ?>
<?php if ($this['config']->get('bg-bottom-c')) : ?>
<style type="text/css">
#bottom-c{ background-image:url(<?php echo $this['config']->get('site_url'); ?>/<?php echo $this['config']->get('bg-bottom-c-image'); ?>)}
</style>
<?php endif; ?>
<?php if ($this['config']->get('bg-bottom-d')) : ?>
<style type="text/css">
#bottom-d{ background-image:url(<?php echo $this['config']->get('site_url'); ?>/<?php echo $this['config']->get('bg-bottom-d-image'); ?>)}
</style>
<?php endif; ?>

</head>
<body class="<?php echo $this['config']->get('body_classes'); ?>">

	<?php if ($this['widgets']->count('absolute')) : ?>
	<div class="absolute uk-hidden-small"><?php echo $this['widgets']->render('absolute'); ?></div>
	<?php endif; ?>
		
	<!-- TOP Outer -->
	<?php if ($this['widgets']->count('toolbar-r + toolbar-l')) : ?>
		<div class="toolbar-outer uk-clearfix">
			<div class="uk-container uk-container-center no-space">
				<div class="tm-toolbar uk-clearfix">
				  <?php if ($this['widgets']->count('toolbar-l')) : ?>
				  <div class="uk-float-left"><?php echo $this['widgets']->render('toolbar-l'); ?></div>
				  <?php endif; ?>
				  <?php if ($this['widgets']->count('toolbar-r')) : ?>
				  <div class="uk-float-right"><?php echo $this['widgets']->render('toolbar-r'); ?></div>
				  <?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
		
	<?php if ($this['widgets']->count('logo-center')) : ?>
	<div class="uk-container uk-container-center no-space uk-hidden-small">
		<div class="logo uk-text-center">
			<a class="tm-logo-center" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-center'); ?></a>
		</div>
	</div>
	<?php endif; ?>


	<?php if ($this['widgets']->count('menu + logo-small + logo-left')) : ?>
	<div id="menu-outer" <?php if ($this['config']->get('fixed_navigation')) : ?>data-uk-sticky="{top:-300, animation: 'uk-animation-slide-top'}"<?php endif; ?>>
		<nav class="tm-navbar uk-navbar">
			<div class="uk-container uk-container-center no-space">
				<?php if ($this['widgets']->count('logo-left')) : ?>
					<div class="logo-left uk-hidden-small uk-float-left">
					<a class="tm-logo-left" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-left'); ?></a>
					</div>
				<?php endif; ?>
				
				<?php if ($this['widgets']->count('offcanvas')) : ?>
				  <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
				<?php endif; ?>
				
				<?php if ($this['widgets']->count('menu')) : ?>
					<div class="menu-style"><?php echo $this['widgets']->render('menu'); ?></div>
				<?php endif; ?>
			    <?php if ($this['widgets']->count('logo-small')) : ?>
					<div class="uk-navbar-content uk-navbar-center uk-visible-small">
						<a class="tm-logo-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a>
					</div>
				<?php endif; ?>
			</div>
		</nav>
	</div>
	<?php endif; ?>

	  <?php if ($this['widgets']->count('headerbar')) : ?>
          <div class="headerbar">
          	<?php echo $this['widgets']->render('headerbar'); ?>
          </div>
      <?php endif; ?>


		<?php if ($this['widgets']->count('top-a')) : ?>
        <div id="top-a" class="top-a-outer uk-cover-background">
            <div class="uk-container uk-container-center">
              <section class="<?php echo $grid_classes['top-a']; echo $display_classes['top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?></section>
             </div>
        </div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('top-b')) : ?>
        <div id="top-b" class="top-b-outer uk-cover-background">
            <div class="uk-container uk-container-center">
              <section class="<?php echo $grid_classes['top-b']; echo $display_classes['top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?></section>
             </div>
        </div>
		<?php endif; ?>
        
		<?php if ($this['widgets']->count('top-c')) : ?>
        <div id="top-c" class="top-c-outer uk-cover-background">
            <div class="uk-container uk-container-center">
              <section class="<?php echo $grid_classes['top-c']; echo $display_classes['top-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-c', array('layout'=>$this['config']->get('grid.top-c.layout'))); ?></section>
             </div>
        </div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('top-d')) : ?>
        <div id="top-d" class="top-d-outer uk-cover-background">
            <div class="uk-container uk-container-center">
              <section class="<?php echo $grid_classes['top-d']; echo $display_classes['top-d']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-d', array('layout'=>$this['config']->get('grid.top-d.layout'))); ?></section>
             </div>
        </div>
		<?php endif; ?>


		<?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
        <div id="main-content" class="main-outer">
            <div class="uk-container uk-container-center">
            
              <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

			<?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
			<div class="<?php echo $columns['main']['class'] ?>">

				<?php if ($this['widgets']->count('main-top')) : ?>
				<section class="<?php echo $grid_classes['main-top']; echo $display_classes['main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?></section>
				<?php endif; ?>

				<?php if ($this['config']->get('system_output', true)) : ?>
				<main class="tm-content">

					<?php if ($this['widgets']->count('breadcrumbs')) : ?>
					<?php echo $this['widgets']->render('breadcrumbs'); ?>
					<?php endif; ?>

					<?php echo $this['template']->render('content'); ?>

				</main>
				<?php endif; ?>

				<?php if ($this['widgets']->count('main-bottom')) : ?>
				<section class="<?php echo $grid_classes['main-bottom']; echo $display_classes['main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?></section>
				<?php endif; ?>

            </div>
			<?php endif; ?>

            <?php foreach($columns as $name => &$column) : ?>
            <?php if ($name != 'main' && $this['widgets']->count($name)) : ?>
            <aside class="<?php echo $column['class'] ?>"><?php echo $this['widgets']->render($name) ?></aside>
            <?php endif ?>
            <?php endforeach ?>
		
        </div>
		</div>
		</div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('bottom-a')) : ?>
        <div id="bottom-a" class="bottom-a-outer uk-cover-background">
            <div class="uk-container uk-container-center">
              <section class="<?php echo $grid_classes['bottom-a']; echo $display_classes['bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?>			</section>
             </div>
        </div>
		<?php endif; ?>

		<?php if ($this['widgets']->count('bottom-b')) : ?>
        <div id="bottom-b" class="bottom-b-outer uk-cover-background">
            <div class="uk-container uk-container-center">
              <section class="<?php echo $grid_classes['bottom-a']; echo $display_classes['bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?>			</section>
             </div>
        </div>
		<?php endif; ?>
		<?php if ($this['widgets']->count('bottom-c')) : ?>
        <div id="bottom-c" class="bottom-c-outer uk-cover-background">
            <div class="uk-container uk-container-center">
              <section class="<?php echo $grid_classes['bottom-c']; echo $display_classes['bottom-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-c', array('layout'=>$this['config']->get('grid.bottom-c.layout'))); ?>			</section>
             </div>
        </div>
		<?php endif; ?>
		<?php if ($this['widgets']->count('map')) : ?>
        <div id="map">
		<?php echo $this['widgets']->render('map'); ?>
        </div>
		<?php endif; ?>
		
		<?php if ($this['widgets']->count('bottom-d')) : ?>
        <div id="bottom-d" class="bottom-d-outer uk-cover-background">
            <div class="uk-container uk-container-center">
              <section class="<?php echo $grid_classes['bottom-d']; echo $display_classes['bottom-d']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-d', array('layout'=>$this['config']->get('grid.bottom-d.layout'))); ?>			</section>
             </div>
        </div>
		<?php endif; ?>

		<!-- Footer Left and Right -->
		<?php if ($this['widgets']->count('footer-l + footer-r')) : ?>
			<div class="footer-outer uk-clearfix">
				<div class="uk-container uk-container-center no-space">
					<div class="uk-grid">
					  <?php if ($this['widgets']->count('footer-l')) : ?>
					  <div class="uk-width-medium-1-2 uk-text-left"><?php echo $this['widgets']->render('footer-l'); ?></div>
					  <?php endif; ?>
					  <?php if ($this['widgets']->count('footer-r')) : ?>
					  <div class="uk-width-medium-1-2 uk-text-right"><?php echo $this['widgets']->render('footer-r'); ?></div>
					  <?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		
		
		<?php if ($this['widgets']->count('debug') || $this['config']->get('warp_branding', true)) : ?>
		<footer class="tm-footer">
			<?php
				$this->output('warp_branding');
				echo $this['widgets']->render('debug');
			?>
		</footer>
		<?php endif; ?>

		<?php if ($this['widgets']->count('offcanvas')) : ?>
		<div id="offcanvas" class="uk-offcanvas">
			<div class="uk-offcanvas-bar"><?php echo $this['widgets']->render('offcanvas'); ?></div>
		</div>
		<?php endif; ?>
		<?php if ($this['config']->get('totop_scroller', true)) : ?>
		<a href="#" class="uk-button top-scroller" data-uk-smooth-scroll="{offset: 80}"><i class="uk-icon-angle-up"></i></a>
		<?php endif; ?>
 
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top-70}, 900);
		});
	});
</script>

<?php echo $this['config']->get('tracking_code'); ?>
</body>
</html>