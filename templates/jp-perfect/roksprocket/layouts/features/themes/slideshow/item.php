<?php
/**
 * @version   $Id: item.php 27448 2015-03-06 21:03:26Z reggie $
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2015 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

/**
 * @var $item RokSprocket_Item
 */
?>

<li class="sprocket-features-index-<?php echo $index;?>">
	<div class="sprocket-features-img-container sprocket-fullslideshow-image<?php if ($image = $item->getPrimaryImage()== FALSE): echo ' sprocket-none'; endif;?>" data-slideshow-image>
		<?php
			if ($image = $item->getPrimaryImage()):
		?>
			<?php if ($item->getPrimaryLink()) : ?>
				<a href="<?php echo $item->getPrimaryLink()->getUrl(); ?>"><img src="<?php echo $image->getSource(); ?>" alt="<?php echo $item->getPrimaryImage()->getAlttext(); ?>" style="max-width: 100%; height: auto;" /></a>
			<?php else: ?>
				<img src="<?php echo $image->getSource(); ?>" alt="<?php echo $item->getPrimaryImage()->getAlttext(); ?>" style="max-width: 100%; height: auto;" />
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<div class="uk-container uk-container-center no-space uk-visible-large sprocket-features-content <?php if (($parameters->get('features_show_title') && $item->getTitle() == FALSE) && ($parameters->get('features_show_article_text') && $item->getText() == FALSE)) : echo ' sprocket-none'; endif; ?>" data-slideshow-content>
		<?php if ($parameters->get('features_show_article_text') && ($item->getText() || $item->getPrimaryLink())) : ?>
			<div class="slideshow-content uk-animation-fade uk-animation-10">
				<div class="sprocket-features-desc">
				
				<?php if ($parameters->get('features_show_title') && $item->getTitle()) : ?>
				<h2 class="sprocket-features-title">
					<?php echo $item->getTitle(); ?>
				</h2>
				<?php endif; ?>

				<?php echo $item->getText(); ?><br/>
				<?php if ($item->getPrimaryLink()) : ?>
				<p><a style="margin-top:20px" href="<?php echo $item->getPrimaryLink()->getUrl(); ?>" class="uk-button"><?php rc_e('READ_MORE'); ?></a></p>
				<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</li>
