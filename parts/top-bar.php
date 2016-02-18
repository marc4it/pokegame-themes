<?php
/**
 * Template part for top bar menu
 * test
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<div class="top-bar-container contain-to-grid">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area top-bar-<?php echo apply_filters( 'filter_mobile_nav_position', 'mobile_nav_position' ); ?>">
            <li class="name">
                <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
        </ul>
        <section class="top-bar-section">
			<ul class="left">
            <li><a href="https://pokemon.game-solver.com/pokedex/">Pokedex</a></li>
            <li><a href="https://pokemon.game-solver.com/type/">Types</a></li>
            <li class="has-dropdown">
            	<a href="#">Skills</a>
            		<ul class="dropdown">
            			<li><a href="https://pokemon.game-solver.com/move/">Moves</a></li>
                		<li><a href="https://pokemon.game-solver.com/abilities/">Abilities</a></li>
                		<li><a href="https://pokemon.game-solver.com/hm/">HM Moves</a></li>
                	</ul>
                </li>
            <li class="has-dropdown">
            	<a href="#">Items</a>
            		<ul class="dropdown">
            			<li><a href="https://pokemon.game-solver.com/">Pokeballs</a></li>
                		<li><a href="https://pokemon.game-solver.com/">Potions</a></li>
                	</ul>
                </li>
        </section>
        <section class="top-bar-section">
        	<ul class="right">
        		<li><a href="https://pokemon.game-solver.com/about-us/">About Us</a></li>
        	</ul>
        </section>
    </nav>
</div>

<!-- breadcrumbs -->
<?php

function no_dash($name) {
	if (strpos($name,'-') !== false) {
		$new_name = str_replace('-',' ',$name);
		return $new_name;
	} else {
		return $name;
	}
}

$urlArr = parse_url(filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRIPPED));
$path = explode('/', $urlArr['path']);
$crumbString1 = "/".$path[1]."/";
$crumbString2 = "/".$path[1]."/".$path[2]."/";

if ($path[1] == "pokedex" && ($path[2])) {
	
	$path2 = $path[2];
	$sql = "SELECT * FROM `pokedex` WHERE `pokedex_id` LIKE '".$path2."' ;";
	$results = $wpdb->get_row( $sql, ARRAY_A );
	
	echo '<div class="row">
			<div class="small-12 columns">
				<ul class="breadcrumbs">
					<li><a href="/">Home</a></li>
					<li><a href="'.$crumbString1.'">'.$path[1].'</a></li>
					<li class="current"><a href="'.$crumbString2.'">'.$results['name'].'</a></li>
				</ul>
			</div>
		</div>';
		
} elseif ($path[1] == "about-us") {
	
} elseif (($path[1]) && ($path[2])) {

	echo '<div class="row">
			<div class="small-12 columns">
				<ul class="breadcrumbs">
					<li><a href="/">Home</a></li>
					<li><a href="'.$crumbString1.'">'.$path[1].'</a></li>
					<li class="current"><a href="'.$crumbString2.'">'.no_dash($path[2]).'</a></li>
				</ul>
			</div>
		</div>';
		
} elseif (($path[1]) && $path[2] == "") {
	
	echo '<div class="row">
			<div class="small-12 columns">
				<ul class="breadcrumbs">
					<li><a href="/">Home</a></li>
					<li class="current"><a href="'.$crumbString1.'">'.$path[1].'</a></li>
				</ul>
			</div>
		</div>';
		
}