<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( '', 'label', 'lubstarter' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Szukaj &hellip;', 'placeholder', 'lubstarter' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( '<i class="fa fa-search"></i>', 'submit button', 'lubstarter' ); ?></span></button>
</form>
