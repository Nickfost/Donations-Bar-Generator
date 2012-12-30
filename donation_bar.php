<?php
	//---------------
	// Configuration
	//---------------

	$donationsbar_conf = array();
	// Total amount you're of money you're looking for. (default: 100)
	$donationsbar_conf['cost'] = 100;
	// Current amount donated. (TODO: Fetch from somewhere like PayPal?: Yes!) (default: 0)
	$donationsbar_conf['donations'] = 0;
	// Width of the bar;  can be 100%, 100px, etc. (default: 100%)
	$donationsbar_conf['width'] = '100%';
	// Height of the bar; can be 100%, 100px, etc. (default: 10px)
	$donationsbar_conf['height'] = '10px';
	// The size of the font in em/px. (default: 10px)
	$donationsbar_conf['font_size'] = '10px';
	
	// Should we show how much is fullfilled, how much is needed, etc? (default: false) (TODO! Not functional)
	$donationsbar_conf['show_stats'] = false;
	// Detailed stats ex: true, 25/100 false, 25% (defualt: false)
	$donationsbar_conf['detailed_stats'] = false;
	// CSS color for completed amount. (default: #68a976)
	$donationsbar_conf['color_complete'] = '#68a976';
	// CSS color for missing amount. (default: #eb4444)
	$donationsbar_conf['color_missing'] = '#eb4444';
	// CSS color for the text shown. (default: #000000)
	$donationsbar_conf['color_text'] = '#000000';
	// How many decimal places should we format to? (default: 2)
	$donationsbar_conf['decimal_places'] = 2;

	// This will just dump information about the configuration. (default: false)
	$donationsbar_conf['debug'] = false;

	//---------------
	// Math
	//---------------
	$math = array();

	$math['ratio'] = ($donationsbar_conf['donations']) / $donationsbar_conf['cost'];
	$math['percent'] = ($math['ratio'] != 0 ? $math['ratio'] * 100 : 100);
	$math['p_green'] = (($math['ratio'] * 100) - 1) . '%';
	$math['p_red'] = 100 - ($math['ratio'] * 100) . '%';
	
	//---------------
	// Stats
	//---------------
	$stats = array();
	
	if ($donationsbar_conf['show_stats'] = true) {
		if ($donationsbar_conf['detailed_stats'] = true) {
			$stats['output'] = ($donationsbar_conf['donations']) .'/'. $donationsbar_conf['cost'];	
		}
		else{
			$stats['output'] = $math['percent'];
		}
		
	}
	
	
?>
<style>
div#donations-bar {
	width: 100%;
}
div#donations-bar-inner {
	width: <?php echo $donationsbar_conf['width'] ?>;
	height: <?php echo $donationsbar_conf['height'] ?>;
	font-size: 0;
}
div.donations-bar-inner {
	height: 100%;
	display: inline-block;
	margin: 0 auto;
	padding: 0;
}
div.donations-bar-inner.green {
	background-color: <?php echo $donationsbar_conf['color_complete'] ?>;
	width: <?php echo $math['p_green'] ?>;
}
div.donations-bar-inner.red {
	background-color: <?php echo $donationsbar_conf['color_missing'] ?>;
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
if ($donationsbar_conf['debug']) {
	echo '<p>' . PHP_EOL;
	echo '<h2>$donationsbar_conf</h2>' . PHP_EOL;
	echo '<pre>';
	echo var_dump($donationsbar_conf);
	echo '</pre>' . PHP_EOL;
	echo '<h2>$math</h2>' . PHP_EOL;
	echo '<pre>';
	echo var_dump($math, true);
	echo '</pre> ' . PHP_EOL;
	echo '</p>';
	echo '<h2>$stats</h2>' . PHP_EOL;
	echo '<pre>';
	echo var_dump($stats, true);
	echo '</pre> ' . PHP_EOL;
	echo '</p>';
}
?>