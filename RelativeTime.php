<?php
class RelativeTime{
        
	public static function GetRelativeTime($dateTime, $timezone){
		
		// The RelativeTime will be show according timezone of users
		date_default_timezone_set($timezone);
		$result = "";
		$CurrentDate = date('Y-m-d H:i:s');
		$CurrentDateToSeconds = (int) strtotime(date($CurrentDate));
		$timeSpan = $CurrentDateToSeconds - ((int) strtotime(date($dateTime)));

		if ($timeSpan <= 60){
			$result = "about " . $timeSpan . " seconds ago";
		}
		else if ($timeSpan <= 3600){
			
			$result = $timeSpan > 119 ?
				"about " . (int) ($timeSpan / 60) . " minutes ago" :
				"about a minute ago";
		}
		else if ($timeSpan <= (3600 * 24)){
			$result = $timeSpan > ((3600 * 24) - 1) ?
				"about " . (int) ($timeSpan / 3600) . " hours ago" :
				"about an hour ago";
		}
		else if ($timeSpan <= (3600 * 24 * 30)){
			$result = $timeSpan > ((3600 * 24 * 30) - 1) ?
				"about " . (int) ($timeSpan / (3600 * 24)) . " days ago" :
				"yesterday";
		}
		else if ($timeSpan <= (3600 * 24 * 30 * 12)){
			$result = $timeSpan > ((3600 * 24 * 30 * 12) - 1) ?
				"about " . (int) ($timeSpan / (3600 * 24 * 30)) . " months ago" :
				"about a month ago";
		}
		else{
			$result = $timeSpan > (3600 * 24 * 30 * 12) ?
				"about " . (int) ($timeSpan / (3600 * 24 * 30 * 12)) . " years ago" :
				"about a year ago";
		}

		return $result;
		
	}
}
