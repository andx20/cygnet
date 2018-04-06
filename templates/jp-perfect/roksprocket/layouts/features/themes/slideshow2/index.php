<?php
/**
 * @version   $Id: index.php 10885 2013-05-30 06:31:41Z btowles $
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2015 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

/**
 * @var $layout     RokSprocket_Layout_Features
 * @var $items      RokSprocket_Item[]
 * @var $parameters RokCommon_Registry
 */

?>
<div class="sprocket-features layout-slideshow2 <?php echo ($parameters->get('features_show_arrows')=='onhover') ? " arrows-onhover" : ""; ?>" data-slideshow2="<?php echo $parameters->get('module_id'); ?>">
	<ul class="sprocket-features-img-list">
		<?php
			$index = 0;
			foreach($items as $item){
				$index++;
				echo $layout->getThemeContext()->load('item.php', array('item'=> $item,'parameters'=>$parameters,'index'=>$index,'layout'=>$layout));
			}
		?>
	</ul>
	<div class="sprocket-features-pagination<?php echo !$parameters->get('features_show_pagination') ? '-hidden' : '';?>">
		<ul>
		<?php $i = 0; foreach ($items as $item): ?>
			<?php
				$class = (!$i) ? ' class="active"' : '';
				$i++;
			?>
	    	<li<?php echo $class; ?> data-slideshow2-pagination="<?php echo $i; ?>"><span><?php echo $i; ?></span></li>
		<?php endforeach; ?>
		</ul>
	</div>
</div>
