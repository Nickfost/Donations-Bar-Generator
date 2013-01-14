<?php
class DonationBar
{
	public function __construct() {

	}

	private function config($key) {
		$config = array(
			// Total amount of money you're looking for. (default: 100)
			'cost' => 100,
			// Current amount donated. (default: 0)
			'donations' => 0,
			// Your local currency symbol. (default: $)
			'currency' => '$',

			// Width of the bar; can be 100%, 100px, etc. (default: 100%)
			'width' => '100%',
			// Height of the bar; can be 100%, 100px, etc. (default: 14px)
			'height' => '14px',
			// The size of the font in em/px. (default: 13px)
			'font_size' => '13px',
			// Top alignment hack, so the red aligns with the green bar. (default: -2px)
			// If you edit the height or font-size, you'll probably have to change this.
			'top_hack' => '-2px',

			// Should we show how much is fullfilled, how much is needed, etc? (default: false)
			'show_stats' => false,
			// Detailed stats ex: true, $25/$100; false, 25% (default: false)
			'detailed_stats' => false,
			// CSS color for completed amount. (default: #68a976)
			'color_complete' => '#68a976',
			// CSS color for missing amount. (default: #eb4444)
			'color_missing' => '#eb4444',
			// CSS color for the text shown. (default: #000000)
			'color_text' => '#000000',

			// This will just dump information about the config. (default: false)
			'debug' => false
		);
		if (is_null($key)) {
			return $config;
		} else {
			return $config[$key];
		}
	}

	private function math($key) {
		$math = array();
		$math['ratio'] = $this->config('donations') / $this->config('cost');
		$math['percent'] = ($math['ratio'] != 0 ? $math['ratio'] * 100 : 0);
		$math['p_green'] = ($math['ratio'] * 100) . '%';
		$math['p_red'] = 100 - ($math['ratio'] * 100) . '%';
		$math['diff'] = $this->config('cost') - $this->config('donations');
		if (is_null($key)) {
			return $math;
		} else {
			return $math[$key];
		}
	}

	private function stats($key) {
		$stats = array('output' => '', 'tooltip' => '');
		if ($this->config('show_stats')) {
			if ($this->config['detailed_stats']) {
				// We want $DONATED/$WANTED here. e.g., $25/$50 (50%)
				$stats['output'] = $this->config('currency') . $this->config('donations') . 
									'/' . $this->config('currency') . $this->config('cost')
									. ' (' . $this->math('percent') . '%)';
			}
			else {
				$stats['output'] = $this->math('percent') . '%';
			}
		}
		if ($this->math('diff') == 0) {
			$stats['tooltip'] = "We've already reached our goal of <b>{$this->config('currency')}{$this->config('cost')}</b>!"
				. "<br /><b>Awesome!</b>";
		} else {
			$stats['tooltip'] = "We want to raise <b>{$this->config('currency')}{$this->config('cost')}</b>, "
				. "but we've only got <b>{$this->config('currency')}{$this->config('donations')}</b> so far."
				. "<br /> We still need <b>{$this->config('currency')}{$this->math('diff')}</b> to reach our goal!";
		}
		// Wrap that thing in a <span>.
		$stats['tooltip'] = "<span class=\"classic\">{$stats['tooltip']}</span>";
		if (is_null($key)) {
			return $stats;
		} else {
			return $stats[$key];
		}
	}

	public function to_css() {
		$inner_bar = "";
		if ($this->config('show_stats')) {
			$inner_bar = "position: relative;\ntop: {$this->config('top_hack')};";
		}
		$css = "<style type=\"text/css\">
		div#donations-bar {
			width: 100%;
		}
		div#donations-bar-inner {
			width: {$this->config('width')};
			height: {$this->config('height')};
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
			/*border-top-left-radius: 2px;
			border-bottom-left-radius: 2px;*/
			background-color: {$this->config('color_complete')};
			width: {$this->math('p_green')};
		}
		div.donations-bar-inner.red {
			border-top-right-radius: 2px;
			border-bottom-right-radius: 2px;
			background-color: {$this->config('color_missing')};
			width: {$this->math('p_red')};
			text-align: right;
			padding-right: 2px;
			{$inner_bar}
		}
		div.donations-bar-inner.red span {
			font-size: {$this->config('font_size')};
			font-color: {$this->config('color_text')};
		}

		.tooltip {
			color: #000000;
			outline: none;
			cursor: help;
			text-decoration: none;
			position: relative;
		}
		.tooltip span.classic {
			left: -9999em;
			position: absolute;
		}
		.tooltip:hover span.classic {
			font-family: Calibri, Tahoma, Geneva, sans-serif;
			position: absolute;
			left: 0px;
			top: 16px;
			z-index: 100;
			width: 375px;
		}
		span.classic {
			font-size: {$this->config('font_size')};
			padding: 10px 8px;
			text-align: left;

			background: #9FDAEE;
			border: 1px solid #2BB0D7;

			border-radius: 5px 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
			box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);
			-webkit-box-shadow: 5px 5px rgba(0, 0, 0, 0.1);
			-moz-box-shadow: 5px 5px rgba(0, 0, 0, 0.1);
		}
		</style>";
		return $css;
	}

	public function to_html() {
		$html = "<div id=\"donations-bar\">
			<div id=\"donations-bar-inner\">
				<div class=\"donations-bar-inner green tooltip\">
					{$this->stats('tooltip')}
				</div>
				<div class=\"donations-bar-inner red tooltip\">
					{$this->stats('tooltip')}
					<span class=\"info\">{$this->stats('output')}</span>
				</div>
			</div>
			<!-- Want your own bar? https://github.com/Nickfost/Donations-Bar-Generator -->
		</div>";
		return $html;
	}

	public function debug() {
		ob_start();
		echo '<p>' . PHP_EOL;
		echo '<h2>$donationsbar_conf</h2>' . PHP_EOL;
		echo '<pre>';
		echo var_dump($this->config(null));
		echo '</pre>' . PHP_EOL;
		echo '<h2>$math</h2>' . PHP_EOL;
		echo '<pre>';
		echo var_dump($this->math(null));
		echo '</pre> ' . PHP_EOL;
		echo '<h2>$stats</h2>' . PHP_EOL;
		echo '<pre>';
		echo var_dump($this->stats(null));
		echo '</pre> ' . PHP_EOL;
		echo 'Problems or suggestions? Visit the <a href="https://github.com/Nickfost/Donations-Bar-Generator">git repo!</a>';
		echo '</p>';
		$dbg = ob_get_clean();
		return $dbg;
	}
}
// WHERE ARE THE OTHER PHP TAGS GOING? SWEAR TO ME!
