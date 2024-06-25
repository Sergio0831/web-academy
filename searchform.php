<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ) ?>">
	<div class="input-group">
		<label for="s" class="screen-reader-text">Search:</label>
		<input type="search" value="<?php get_search_query() ?>" id="s" name="s" class="form-control form-control-lg"
			placeholder="Keyword">
		<div class="input-group-append">
			<span class="input-group-text bg-transparent text-primary"><i class="fa fa-search"></i></span>
		</div>
	</div>
</form>