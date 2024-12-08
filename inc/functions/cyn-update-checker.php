<?php
require ( get_stylesheet_directory() . '/inc/libs/plugin-update-checker/plugin-update-checker.php' );
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$updateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/cyandm/aura/', //github theme
	get_stylesheet_directory(),
	'aura' //theme slug
);

//Set the branch that contains the stable release.
$updateChecker->setBranch( 'main' );

