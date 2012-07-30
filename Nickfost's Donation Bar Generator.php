<?php
 //This is a simple bar to indicate the amout of donation to a project or comunity 
 //Config
 $cost = 100; 					//cost to operate
 $donations = 10;	 			//current donations
 $width = 500;		 			//width of bar
 $height = 10;					// the hight of the bar, defualt is 1 (modified by text)
 $fontsize = 10;				// Size of the font in pexels...
 $percentinred = off; 			// show the amount completed in the red bar "off" is off "on" is on
 $alternategreen = green;		// alternate color for the green, leave green if you want it to stay green, color codes and words work. 
 $alternatered = red;			// alternate color for the red, leave red if you want it to stay red, you can use a color code or the word. if you using a color code be sure to leave out the number sign or it wont work
 $debug = off; 					// print debug informations "on" for on and "off" for off
 //math
 $ratio = $donations / $cost;
 $percent = $ratio * 100;
 $greenwidth = $ratio * $width;
  if ($greenwidth > $width) {
	$greenwidth = $width;
 }
 $redwidth = $width - $greenwidth;
 //percent in red
 if ($percentinred == on){
	 if ($percent < 98) {
		$enabledpercentinred = $percent. "%";
	 } 
 }
 ?>
<div id="Donations bar">
	<table cellpadding="0" border="0" cellspacing="0">
		<tr height="<? print $height; ?>" width='<? print $width; ?>px'>
			<td width='<? print $greenwidth; ?>px' style="background:<? print $alternategreen; ?>;"></td>
			<td width='<? print $redwidth; ?>px' style="background:<? print $alternatered; ?>; font-size:<? print $fontsize; ?>px;" align='right'><? print $enabledpercentinred; ?></td>
		</tr>
	</table>
	 <!-- This was made with Nickfost's Donations Bar Generator V. 1.3-->
</div>
 <?php
  //debug
 if ($debug == on){
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
 echo "<p><h6>This was made with Nickfost's Donations Bar Generator V. 1.3</h6>";
 }
 // Changelog
 // ----1.3----
 // fixed some incompatabilities with crappy browsers
 // fixed the size of text not working becuase of not using the "px" letters after the number (stupid css)
 // updated version number
 // ----1.2----
 // Added font size
 // Changed breakline tag in debug to using paragraph tags
 // color apeared in debug where defined (you'll see)
 // updated version number :D
 // ----1.1----
 // Added changelog (:D)
 // Cleaned up a few loose things (cant really remember)
 // updated version number :D
 // ----1.0----
 // Initial release
 ?>
 