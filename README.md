Donations Bar Generator
===

How to setup/use
---
+ Make sure your webserver supports php.
+ Download the newest verion here: https://github.com/Nickfost/Donations-Bar-Generator/zipball/master
+ Open the file in your text editor of choice.
+ Edit the configuration as required. (Under _DonationBar::config()_ method in the PHP file.)
+ Include and use, as per below.
+ Say thanks!

```php
<?php
	# Includes, whatever.
	include_once('donation_bar.php');
	$dbar = new DonationBar();
?>
<!DOCTYPE html>
<html>
<head>
	<title>...</title>
	<!-- Put the <style> for the bar in your <head> for valid HTML5. -->
	<?php echo $dbar->to_css(); ?>
	<!-- rest of stuff here -->
</head>
<body>
	<!-- Content! -->
	<!-- Output the HTML for the bar. -->
	<?php echo $dbar->to_html(); ?>
	<!-- More content! -->
</body>
</html>
```

TODO
---
+ [X] Move the css into the \<head\> tag, so as not to ruin valid HTML5. (__Now easy with `$dbar->to_css()`__)
+ [ ] Make it more customisable.
+ [X] Move to a method instead of a script to include. (__Now in a class__)

Changelog
---
### 2.2.0
+ Moved from inclusion to a class. Much easier now.
+ Cleaned up CSS and html more.
+ README cleanup.

### 2.1.0
+ Stats now functional, thanks to some slight css hacks.
+ Cleaned up some of the source more.
+ Fixed slight discrepancy between width of shown bars and actual width it should be.

### 2.0.3
+ Another attempt at stats.. should be finished by now

### 2.0.2
+ Working on stats still disabled by defualt

### 2.0.1
+ Tiny Things... (Wording and comments)


### 2.0
+ Near complete rewrite.
+ Moved from a table to \<div\>s aswell as some css.
+ Cleaned up configuration to make it easier for users.
+ Math is now cleaned and streamlined, making the script simpler.
+ Cleaned up debug section so that it's a simple var_dump().

### 1.5
+ Fixed the rounding of the percent
+ Updated version number

### 1.4
+ Added the ability to change the color in the text displayed on the bar
+ Added the ability to limit the number of decimal places after the percentage can be displayed
+ Updated Version number & synced with GitHub

### 1.3
+ Fixed some incompatabilities with crappy browsers
+ Fixed the size of text not working becuase of not using the "px" letters after the number (stupid css)
+ Updated version number

### 1.2
+ Added font size
+ Changed breakline tag in debug to using paragraph tags
+ Color apeared in debug where defined (you'll see)
+ Updated version number

### 1.1
+ Added changelog (:D)
+ Cleaned up a few loose things (cant really remember)
+ updated version number

### 1.0
+ Initial release