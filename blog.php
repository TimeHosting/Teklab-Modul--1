<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de" id="xmlreader"  >
<head>
  <meta http-equiv="content-type" content="application/xhtml+xml;charset=utf-8" />
  <meta http-equiv="Content-Script-Type" content="text/javascript" />
  <meta http-equiv="imagetoolbar" content="no" />
  
  <meta name="author" content="TimeHosting" />
  <meta name="publisher" content="www.time-hosting.de" />
  <meta name="copyright" content="TimeHosting - https://www.time-hosting.de" />
  <meta name="keywords" content="WordPress, WP, RSS, Feed, RSSFeed" />
  <meta name="Diese zeigt, wei man den RSSFeed nutzen kann, um die Inhalte auf anderen Seiten darzustellen." />
  <meta name="page-topic" content="Webhosting" />
  <meta name="robots" content="all" />

  <title>Beitr&auml;ge au&szlig;erhalb von WordPress</title>

  <style type="text/css" title="currentStyle" media="screen" >@import "style.css";</style>
  <link rel="Shortcut Icon" type="image/x-icon" href="favicon.ico" />
  
</head> 
<body>
    <h2>TimeHosting Blog News</h2>
  <p>Hier informieren wir Sie über die 5 letzten News aus unserem Blog</p>
  <div style="margin: 2em; padding: 1em; background: #DDD">
	  <?php
	  # Script: XML-Reader
	  # Copyright: y0y.de, erweitert: timehosting.de
	  
	  # Hier editieren
	  $url = "http://s2.time-hosting.de/blog/feed"; //URL zum XML-Feed
	  $number = 5; //Anzahl der angezeigten News
	  
	  # Ab hier nichts mehr Ã¤ndern
	  
	  # code
	  $file_content = @file_get_contents($url);
	  
	  #Items auslesen
	  $items = preg_match_all("/<item[ ]?.*>(.*)<\/item>/Uis", $file_content, $array_items);
	  $array_items = $array_items[1];
	  if(!empty($array_items)) { //Nur wenn es Items gibt, soll auch was angezeigt werden
	  if ($number>sizeof($array_items)) $number=sizeof($array_items);
	      for($n=0;$n<$number;$n++) { //Nur die angegebene Anzahl der News soll angezeigt werden
	      preg_match("/<link>(.*)<\/link>/Uis", $array_items[$n], $array_link); //URLs auslesen
	      preg_match("/<title>(.*)<\/title>/Uis", $array_items[$n], $array_title); //Titel auslesen
	      preg_match("/<description>(.*)<\/description>/Uis", $array_items[$n], $array_description); //Beschreibung auslesen
	  
	  # Ab hier wird ausgegeben
	     echo "<h3>$array_title[1]</h3>" ; //Titel darstellen
	     echo "<a href=\"$array_link[1]\" title=\"Klick f&uuml;r mehr Informationen\"> Mehr lesen</a>"; //Link
	     }
	  }
	  ?>

  </div>
</body>
