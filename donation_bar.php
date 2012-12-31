<?php
	//---------------
	// Configuration
	//---------------

	$donationsbar_conf = array();
	// Total amount you're of money you're looking for. (default: 100)
	$donationsbar_conf['cost'] = 100;
	// Current amount donated. (TODO: Fetch from somewhere like PayPal?: Yes!) (default: 0)
	$donationsbar_conf['donations'] = 0;
	// Your local currency symbol. (default: $)
	$donationsbar_conf['currency'] = '$';
	// Width of the bar;  can be 100%, 100px, etc. (default: 100%)
	$donationsbar_conf['width'] = '100%';
	// Height of the bar; can be 100%, 100px, etc. (default: 14px)
	$donationsbar_conf['height'] = '14px';
	// The size of the font in em/px. (default: 13px)
	$donationsbar_conf['font_size'] = '13px';
	// Top alignment hack, so the red aligns with the green bar. (default: -2px)
	// If you edit the height or font-size, you'll probably have to change this.
	$donationsbar_conf['top_hack'] = '-2px';
	
	// Should we show how much is fullfilled, how much is needed, etc? (default: false) (TODO! Not functional)
	$donationsbar_conf['show_stats'] = false;
	// Detailed stats ex: true, $25/$100; false, 25% (default: false)
	$donationsbar_conf['detailed_stats'] = false;
	// CSS color for completed amount. (default: #68a976)
	$donationsbar_conf['color_complete'] = '#68a976';
	// CSS color for missing amount. (default: #eb4444)
	$donationsbar_conf['color_missing'] = '#eb4444';
	// CSS color for the text shown. (default: #000000)
	$donationsbar_conf['color_text'] = '#000000';

	// This will just dump information about the configuration. (default: false)
	$donationsbar_conf['debug'] = false;

	//!!/ DON'T CHANGE ANYTHING BELOW THIS LINE! /!!//

	//---------------
	// Math
	//---------------
	$math = array();

	$math['ratio'] = ($donationsbar_conf['donations']) / $donationsbar_conf['cost'];
	$math['percent'] = ($math['ratio'] != 0 ? $math['ratio'] * 100 : 100);
	$math['p_green'] = (($math['ratio'] * 100)) . '%';
	$math['p_red'] = 100 - (($math['ratio'] * 100)) . '%';
	
	//---------------
	// Stats
	//---------------
	$stats = array('output' => '');
	
	if ($donationsbar_conf['show_stats']) {
		if ($donationsbar_conf['detailed_stats']) {
			// We want $DONATED/$WANTED here. e.g., $25/$50 (50%)
			$stats['output'] = $donationsbar_conf['currency'] . $donationsbar_conf['donations'] . 
								'/' . $donationsbar_conf['currency'] . $donationsbar_conf['cost']
								. ' (' . $math['percent'] . '%)';
		}
		else {
			$stats['output'] = $math['percent'] . '%';
		}
	}
	
?>
<style type="text/css">
	div#donations-bar {
		width: 100%;
	}
	div#donations-bar-inner {
		width: <?php echo $donationsbar_conf['width']; ?>;
		height: <?php echo $donationsbar_conf['height']; ?>;
		font-size: 0;
	}
	div.donations-bar-inner {
		height: 100%;
		display: inline-block;
		margin: 0 auto;
		padding: 0;
		box-sizing: border-box;
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
	}
	div.donations-bar-inner.green {
		border-top-left-radius: 2px;
		border-bottom-left-radius: 2px;
		background-color: <?php echo $donationsbar_conf['color_complete']; ?>;
		width: <?php echo $math['p_green']; ?>;
	}
	div.donations-bar-inner.red {
		border-top-right-radius: 2px;
		border-bottom-right-radius: 2px;
		background-color: <?php echo $donationsbar_conf['color_missing']; ?>;
		width: <?php echo $math['p_red']; ?>;
		text-align: right;
		padding-right: 2px;
		<?php
			if ($donationsbar_conf['show_stats']) {
				echo 'position: relative;';
				echo "top: {$donationsbar_conf['top_hack']};";
			}
		?>
	}
	div.donations-bar-inner.red > span {
		font-size: <?php echo $donationsbar_conf['font_size']; ?>;
		font-color: <?php echo $donationsbar_conf['color_text']; ?>;
	}
</style>
<div id="donations-bar">
	<div id="donations-bar-inner">
		<div class="donations-bar-inner green"></div>
		<div class="donations-bar-inner red"><span><?php echo $stats['output']; ?></span></div>
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
	echo var_dump($math);
	echo '</pre> ' . PHP_EOL;
	echo '<h2>$stats</h2>' . PHP_EOL;
	echo '<pre>';
	echo var_dump($stats);
	echo '</pre> ' . PHP_EOL;
	echo 'Problems or suggestions? Visit the <a href="https://github.com/Nickfost/Donations-Bar-Generator">git repo!</a>';
	echo '</p>';
}
?>