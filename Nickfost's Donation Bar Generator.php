<?php
 //This is a simple bar to indicate the amout of donation to a project or comunity 
 //Config
 if(!isset($cost))
	$cost = '100'; 			//cost to operate
 
 if(!isset($donations))
	$donations = '10';	 	//current donations
 
 if(!isset($width))
	$width = '500';		 	//width of bar

 if(!isset($height))
	$height = '10';			// the hight of the bar, defualt is 1 (modified by text)
	
 if(!isset($fontsize))
	$fontsize = '10';			// Size of the font in pexels...
	
 if(!isset($percentinred))
	$percentinred = 'off'; 		// show the amount completed in the red bar "off" is off "on" is on
	
 if(!isset($alternategreen))
	$alternategreen = 'green';		// alternate color for the green, leave green if you want it to stay green, color codes and words work. 
	
 if(!isset($alternatered))
	$alternatered = 'red';		// alternate color for the red, leave red if you want it to stay red, you can use a color code or the word. if you using a color code be sure to leave out the number sign or it wont work
 
 if(!isset($textcolor))
	$textcolor = 'Black';		// the text color on the percentage (percentinred must be on)
	
 if(!isset($decimalplacelimit))
	$decimalplacelimit = '2';		// the number of decimal places in the percentage (perecentinred must be on)
 
 if(!isset($debug))
	$debug = 'off'; 			// print debug informations "on" for on and "off" for off
 //math $ratio = $donations / $cost;
 $percent = $ratio * 100;
 $greenwidth = $ratio * $width;
  if ($greenwidth > $width) {
	$greenwidth = $width;
 }
 $redwidth = $width - $greenwidth;
 //percent in red caclulations
 if ($percentinred == 'on'){
	 $percent = round($percent,$decimalplacelimit);
	 if ($percent < 95) {
		 $enabledpercentinred = $percent. "%";
	 } 
 }
 ?>
<div id="Donations bar">
	<table cellpadding="0" border="0" cellspacing="0">
		<tr height="<?php print $height; ?>" width='<?php print $width; ?>px'>
			<td width='<?php print $greenwidth; ?>px' style="background:<?php print $alternategreen; ?>;"></td>
			<td width='<?php print $redwidth; ?>px' style="background:<?php print $alternatered; ?>; color:<?php print $textcolor; ?>; font-size:<?php print $fontsize; ?>px;" align='right'><?php print $enabledpercentinred; ?></td>
		</tr>
	</table>
	 <!-- This was made with Nickfost's Donations Bar Generator V. 1.5-->
</div>
 <?php
  //debug
 if ($debug == 'on'){
 echo "<br /><h3>DEBUG</h3><br />";
 echo "<p>CONFIG></p>";
 echo "<p>-------------</p>";
 echo "<p>Cost = " .$cost. "</p>";
 echo "<p>Donations = " .$donations. "</p>";
 echo "<p>Width = " .$width. "</p>";
 echo "<p>Height = " .$height. "</p>";
 echo "<p>Font Size = " .$fontsize. "</p>";
 echo "<p>Percent in red =" .$percentinred. "</p>";
 echo "<p style='color:".$alternategreen.";'>Alternate Green = " .$alternategreen. "</p>";
 echo "<p style='color:".$alternatered.";'>Alternate Red = " .$alternatered. "</p>";
 echo "<p style='color:".$textcolor.";'>Text Color = " .$textcolor. "</p>";
 echo "<p>Decimal Place Limit = " .$decimalplacelimit. "</p>";
 echo "<p>Debug = " .$debug. "</p>";
 echo "<br />Math section<br />";
 echo "<p>-------------</p>";
 echo "<p>Ratio = " .$ratio. "</p>";
 echo "<p>Percent = " .$percent. "</p>";
 echo "<p>greenwidth = " .$greenwidth. "</p>";
 echo "<p>Redwidth = " .$redwidth. "</p>";
 echo "<br />OTHER<br />";
 echo "<p>-------------</p>";
 echo "<p>enabled perecent in red  = " .$enabledpercentinred. "</p>";
 echo "<p><h6>This was made with Nickfost's Donations Bar Generator V. 1.5</h6>";
 }
 ?>
 