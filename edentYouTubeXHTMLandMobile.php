<?php
/*
Plugin Name: XHTML and Mobile YouTube
Plugin URI: http://shkspr.mobi
Description: Allows you to simply embed YouTube videos in an XHTML 1.0 Strict compliant manner. Also allows links to Mobile YouTube for phones
Version: 0.3
Author: Terence Eden
Author URI: http://shkspr.mobi/blog/

	Copyright 2009  Terence Ede  (email : edentYouTubeXHTMLandMobile@shkspr.mobi)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
	// [youtube id="foo"]
	function youtube_func($attr) 
	{
		$name = get_template();
		if(stristr($name, 'mobile') === FALSE) //If this isn't a mobile template, generate valid XHTML
		{
			$ytURL = "http://www.youtube.com/v/" . $attr['id'];

			$s = "<object type=\"application/x-shockwave-flash\" style=\"width:450px; height:366px;\" data=\"" . $ytURL . "\">"
					. "<param name=\"movie\" value=\"". $ytURL . "\" />"
				. "</object>";

			return $s;

		}
		else //This is a mobile template, show a thumbnail from the YouTube video and link it to the mobile site.
		{
			//http://i.ytimg.com/vi/plvE4882B7Y/1.jpg
			$name = get_template();

			$mYtURL = "http://m.youtube.com/watch?v=" . $attr['id'];
			$mYtIMG = "http://i.ytimg.com/vi/" . $attr['id'] . "/1.jpg";

			$s = "<a href=\"" . $mYtURL . "\">"
					. "<img src=\"" . $mYtIMG . "\" />"
				. "</a>";
			
			return $s;
		}
	}
	add_shortcode('youtube', 'youtube_func');
?>
