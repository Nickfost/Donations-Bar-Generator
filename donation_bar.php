<?php
	//---------------
	// Configuration
	//---------------

	$bar_conf = array();
	// Total amount you're looking for. (default: 100)
	$bar_conf['cost'] = 100;
	// Current amount donated. (TODO: Fetch from somewhere like PayPal?) (default: 0)
	$bar_conf['donations'] = 0;
	
	// Width of the bar;  can be 100%, 100px, etc. (default: 100%)
	$bar_conf['width'] = '100%';
	// Height of the bar; can be 100%, 100px, etc. (default: 10px)
	$bar_conf['height'] = '10px';
	// Obviously the size of the font in em/px. (default: 10px)
	$bar_conf['font_size'] = '10px';
	
	// Should we show how much is fullfilled, how much is needed, etc? (default: false) (TODO! Not functional)
	$bar_conf['show_stats'] = false;
	// CSS color for completed amount. (default: #68a976)
	$bar_conf['color_complete'] = '#68a976';
	// CSS color for missing amount. (default: #eb4444)
	$bar_conf['color_missing'] = '#eb4444';
	// CSS color for the text shown. (default: #000000)
	$bar_conf['color_text'] = '#000000';

	// How many decimal places should we format to? (default: 2)
	$bar_conf['decimal_places'] = 2;

	// This will just dump information about the configuration. (default: false)
	$bar_conf['debug'] = false;

	//---------------
	// Math
	//---------------
	$math = array();

	$math['ratio'] = ($bar_conf['donations']) / $bar_conf['cost'];
	$math['percent'] = ($math['ratio'] != 0 ? $math['ratio'] * 100 : 100);
	$math['p_green'] = (($math['ratio'] * 100) - 1) . '%';
	$math['p_red'] = 100 - ($math['ratio'] * 100) . '%';
?>
<style>
div#donations-bar {
	width: 100%;
}
div#donations-bar-inner {
	width: <?php echo $bar_conf['width'] ?>;
	height: <?php echo $bar_conf['height'] ?>;
	font-size: 0;
}
div.donations-bar-inner {
	height: 100%;
	display: inline-block;
	margin: 0 auto;
	padding: 0;
}
div.donations-bar-inner.green {
	background-color: <?php echo $bar_conf['color_complete'] ?>;
	width: <?php echo $math['p_green'] ?>;
}
div.donations-bar-inner.red {
	background-color: <?php echo $bar_conf['color_missing'] ?>;
	width: <?php echo $math['p_red'] ?>;
}
</style>
<div id="donations-bar">
	<div id="donations-bar-inner">
		<div class="donations-bar-inner green"></div>
		<div class="donations-bar-inner red"></div>
	</div>
	<!-- Want your own bar? https://github.com/Nickfost/Donations-Bar-Generator -->
</div>
<?php
if ($bar_conf['debug']) {
	echo '<p>' . PHP_EOL;
	echo '<h2>$bar_conf</h2>' . PHP_EOL;
	echo '<pre>';
	echo var_dump($bar_conf);
	echo '</pre>' . PHP_EOL;
	echo '<h2>$math</h2>' . PHP_EOL;
	echo '<pre>';
	echo var_dump($math, true);
	echo '</pre> ' . PHP_EOL;
	echo '</p>';
}
?>