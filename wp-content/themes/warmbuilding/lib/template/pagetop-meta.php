<div class="my_meta_control" id="pagetop_metabox">
	<ul>
	<li>If you leave this area empty, the page will flow as normal without the separated area on top. </li>
	<li>Use featured image to place an image to the right of this area.</li>
	</ul>
	<p>
		<?php $mb->the_field('pagetop_title'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="Title for top section of page" />
	</p>
	<p>
		<?php $mb->the_field('pagetop_content'); 
        $settings = array(
        'textarea_name' => $mb->get_the_name(),
        );
        $mb_content = html_entity_decode($mb->get_the_value(), ENT_QUOTES, 'UTF-8');
		wp_editor($mb_content,'pagetop',$settings); ?>
	</p>
</div>