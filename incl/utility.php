<?php
//include possible error responses
include("errors.php");

function countdays($date)   // declare the function and get the birth date as a parameter
{
 $olddate =  substr($date, 4); // use this line if you have a date in the format YYYY-mm-dd.
 $newdate = date("Y") ."".$olddate; //set the full birth date this year
 $nextyear = date("Y")+1 ."".$olddate; //set the full birth date next year
 
	if(strtotime($newdate) > strtotime(date("Y-m-d"))) //check if the birthday has passed this year. In order to check use strotime(). if it has not....
	{
	$start_ts = strtotime($newdate); // set a variable equal to the birthday in seconds (Unix timestamp, check php manual for more information)
	$end_ts = strtotime(date("Y-m-d"));// and a variable equal to today in seconds
	$diff = $end_ts - $start_ts; // calculate the difference of today minus birthday
	$n = round($diff / (60*60*24));// divide the diffence with the seconds of one day to get the dates. Use round() to get a round number.
								//(60*60*24) represents 60 seconds * 60 minutes * 24 hours = 1 day in seconds. You can also directly write 86400
	$return = substr($n, 1); //you need this to get the right value without -
	return $return; // return the value
	}
	else // else if the birthday has past this year
	{
	$start_ts = strtotime(date("Y-m-d")); // set a variable equal to the today in seconds
	$end_ts = strtotime($nextyear); // and a variable with the birtday next year
	$diff = $end_ts - $start_ts; // calculate the difference of next birthday minus today
	$n = round($diff / (60*60*24)); // divide the diffence with the seconds of one day to get the dates.
	$return = $n; // assign the dates to return
	return $return; // return the value

	}

}

function urloggedin() {
	if( ( isset($_SESSION['username']) && $_SESSION['username'] != "") || ( isset($_COOKIE['username']) && $_COOKIE['username'] != "") ){
	return true;
	}else{
	return false;
	}
}

function whichuser() {
	if(isset($_COOKIE['userid']) && $_COOKIE['userid'] != '') {
		return $_COOKIE['userid'];
	}elseif(isset($_SESSION['userid']) && $_SESSION['userid'] != '') {		
		return $_SESSION['userid'];
	}if(isset($_COOKIE['id']) && $_COOKIE['id'] != '') {
		return $_COOKIE['id'];
	}elseif(isset($_SESSION['id']) && $_SESSION['id'] != '') {		
		return $_SESSION['id'];
	}else{
	header("Location: index.php?msg=session or cookie has expired.");
	exit;
	}
}

function whichuserlevel() {
	if(isset($_COOKIE['userlevelid']) && $_COOKIE['userlevelid'] != '') {
		return $_COOKIE['userlevelid'];
	}elseif(isset($_SESSION['userlevelid']) && $_SESSION['userlevelid'] != '') {		
		return $_SESSION['userlevelid'];
	}else{
	header("Location: index.php?msg=session or cookie has expired.");
	exit;
	}
}

function whichemail() {
	if(isset($_COOKIE['emailaddress']) && $_COOKIE['emailaddress'] != '') {
		return $_COOKIE['emailaddress'];
	}elseif(isset($_SESSION['emailaddress']) && $_SESSION['emailaddress'] != '') {		
		return $_SESSION['emailaddress'];
	}else{
	header("Location: index.php?msg=session or cookie has expired.");
	exit;
	}
}


function getdaysago($date){
 $then = strtotime($date);
 $diff = time() - $then;
 $days = floor($diff/(60*60*24));
	if ($days == 0 || $days == '') {
	return '<span style="color:#9AC0CD">First Seen:</span> &nbsp;Today';
	}
	elseif ($days == 1) {
	return '<span style="color:#9AC0CD">First Seen:</span> &nbsp;Yesterday';
	}else{
	return '<span style="color:#9AC0CD">First Seen:</span> &nbsp;'.$days. ' Days Ago';
	}
}

 
function break_long_words( $string )
{
#    $max_length = 22;
    $max_length = 20;
    if( preg_match( '/\S{' . $max_length . '}\S/', $string ) )
    {
        $string = preg_replace( '/&amp;/', '&', $string );
        $j = 0;
        for( $i = $max_length; $i > $j; $i-- )
        {
            if( $string[ $i ] == '/' || $string[ $i ] == '-' ||
                $string[ $i ] == '=' || $string[ $i ] == '#' ||
                $string[ $i ] == '&' )
            {
                $string = substr( $string, 0, $i + 1 ) . ' ' .
                    substr( $string, $i + 1, strlen( $string ) - $i - 1 );
                $j = $i + 2;
                $i = $j + $max_length;
            }
        }

        while( preg_match( '/\S{' . $max_length . '}\S/', $string ) )
        {
            $string = preg_replace( '/(\S{' . $max_length . '})(\S+)/', 
                "$1 $2", $string );
        }
    }

    return $string;
}

function subtract_dates($begin_date, $end_date) {
return round(((strtotime($end_date) - strtotime($begin_date)) / 86400));
}


function cleanmoney($value) {
$prz = explode(".",$value);
			
			$prs = OnlyNumbers($prz[0]);
			$prs2 = OnlyNumbers($prz[1]);
			
		if(strlen($prs2) >2) {
			$prs2 = substr($prs2, 0, 2);
		}	
					
			if($prs == "") {
			$prs = 0;
			}
			if($prs2 == "") {
			$prs2 = 0;
			}
			
			$newcur = $prs.'.'.$prs2;
return $newcur;
}


// only one decimal point in the string
// only two digits right of the decimal point
// all characters are digits
// RETVAL: false on not a valid price
//		   true on valid price
function check_real($price) {
	// make sure there is only one decimal point
	$num_dec_points = substr_count($price,".");
	if( $num_dec_points > 1 )
		return false;
	
	if( $num_dec_points == 1 ) {
		// get the left and right part of the number
		list($left_part,$right_part) = explode(".",$price);
	} else {
		$left_part = $price;
		$right_part = "";
	}
	
	// check the left part to make sure that it is all number
	if( !check_number($left_part) )
		return false;
		
	// make sure that the decimal part is only 5 decimal places for proper accounting
	if( strlen($right_part) > 5 )
		return false;
	// check the right part to make sure that it is all number
	if( !check_number($right_part) )
		return false;
		
	// otherwise return that it is a valid price
	return true;
}

function check_number($number) {
	// loop through all the digits
	for($x = 0; $x < strlen($number); $x++ ) {
		$digit = substr($number,$x,1);
		
		if( $digit != "0" && $digit != "1" && $digit != "2" && $digit != "3" && $digit != "4" &&
			$digit != "5" && $digit != "6" && $digit != "7" && $digit != "8" && $digit != "9" ) 
			return false;
	}
	
	return true;
}

// this generates an authcode for a company when they signup
function GeneratePW() {
	$length = 9;
	$vowels = 'aeiouy';
	$consonants = 'bdghjmnpqrstvz';
	$consonants .= '23456789';

 
	$password = '';
	$alt = time() % 2;
	for ($i = 0; $i < $length; $i++) {
		if ($alt == 1) {
			$password .= $consonants[(rand() % strlen($consonants))];
			$alt = 0;
		} else {
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
		}
	}
	return $password;

}

function short_text($str, $max, $rep = '...') {
  if(strlen($str) > $max) {
    $leave = $max - strlen($rep);
    return substr_replace($str, $rep, $leave);
  } else {
    return $str;
  }
}


function stdround($num, $d=0) {
   return round($num + 0.0001 / pow(10, $d), $d);
 }

  
function file_size_info($filesize) {  
	$bytes = array('KB', 'KB', 'MB', 'GB', 'TB'); 
	# values are always displayed   
	if ($filesize < 1024) $filesize = 1; 
	# in at least kilobytes.  
	for ($i = 0; $filesize > 1024; $i++) $filesize /= 1024;  
	$file_size_info['size'] = ceil($filesize);  
	$file_size_info['type'] = $bytes[$i];  
	return $file_size_info; 
}

/** 
 * A class for making time periods readable. 
 * 
 * This class allows for the conversion of an integer 
 * number of seconds into a readable string. 
 * For example, '121' into '2 minutes, 1 second'. 
 *  
 * If an array is passed to the class, the associative 
 * keys are used for the names of the time segments. 
 * For example, array('seconds' => 12, 'minutes' => 1) 
 * into '1 minute, 12 seconds'. 
 * 
 * This class is plural aware. Time segments with values 
 * other than 1 will have an 's' appended. 
 * For example, '1 second' not '1 seconds'. 
 */ 
class Duration 
{ 
    function toString ($duration, $periods = null) 
    { 
        if (!is_array($duration)) { 
            $duration = Duration::int2array($duration, $periods); 
        } 
  
        return Duration::array2string($duration); 
    } 
  
    function int2array ($seconds, $periods = null) 
    {         
        // Define time periods 
        if (!is_array($periods)) { 
            $periods = array ( 
                    'years'     => 31556926, 
                    'months'    => 2629743, 
                    'weeks'     => 604800, 
                    'days'      => 86400, 
                    'hours'     => 3600, 
                    'minutes'   => 60, 
                    'seconds'   => 1 
                    ); 
        } 
        // Loop 
        $seconds = (float) $seconds; 
        foreach ($periods as $period => $value) { 
            $count = floor($seconds / $value); 
  
            if ($count == 0) { 
                continue; 
            } 
            $values[$period] = $count; 
            $seconds = $seconds % $value; 
        } 
        // Return 
        if (empty($values)) { 
            $values = null; 
        } 
  
        return $values; 
    } 
  
    function array2string ($duration) 
    { 
        if (!is_array($duration)) { 
            return false; 
        } 
  
        foreach ($duration as $key => $value) { 
            $segment_name = substr($key, 0, -1); 
            $segment = $value . ' ' . $segment_name;  
  
            // Plural 
            if ($value != 1) { 
                $segment .= 's'; 
            } 
  
            $array[] = $segment; 
        } 
  
        $str = implode(', ', $array); 
        return $str; 
    } 
  
}


// another version of time_duration
function time_duration($seconds, $use = null, $zeros = false)
{
    // Define time periods
    $periods = array (
        'years'     => 31556926,
        'Months'    => 2629743,
        'weeks'     => 604800,
        'days'      => 86400,
        'hours'     => 3600,
        'minutes'   => 60,
        'seconds'   => 1
        );
 
    // Break into periods
    $seconds = (float) $seconds;
    $segments = array();
    foreach ($periods as $period => $value) {
        if ($use && strpos($use, $period[0]) === false) {
            continue;
        }
        $count = floor($seconds / $value);
        if ($count == 0 && !$zeros) {
            continue;
        }
        $segments[strtolower($period)] = $count;
        $seconds = $seconds % $value;
    }
 
    // Build the string
    $string = array();
    foreach ($segments as $key => $value) {
        $segment_name = substr($key, 0, -1);
        $segment = $value . ' ' . $segment_name;
        if ($value != 1) {
            $segment .= 's';
        }
        $string[] = $segment;
    }
 
    return implode(', ', $string);
}


function timeDifference($startTime, $endTime = false)
{
    $endTime = $endTime ? $endTime : time();

    if ($endTime > $startTime)
    {
        $diff = $endTime - $startTime;

        $hours = floor($diff/3600);
        $diff = $diff % 3600;

        $minutes = floor($diff/60);
        $diff = $diff % 60;

        $seconds = $diff;

        return str_pad($hours, 2, '0', STR_PAD_LEFT) . ':' . str_pad($minutes, 2, '0', STR_PAD_LEFT) . ':' . str_pad($seconds, 2, '0', STR_PAD_LEFT);
    }
    else
    {
        return 'Error: Start time should be less than end time!';
    }
}

function timestamp2itdate($timestamp){
return( substr($timestamp, 6, 2) . ':' . substr($timestamp, 8, 2) . ' ' . substr($timestamp, 4,
2) . '/' . substr($timestamp, 2, 2) . '/20' . substr($timestamp, 0, 2) );
} 


// a modded class that i customized to my needs in calculating the final pay of an employee based on time worked and pay rate
class CalcPay
{ 
    function toStrin ($duration, $periods = null,$hrate) 
    { 
        if (!is_array($duration)) { 
            $duration = CalcPay::int2array($duration, $periods); 
        } 
				
  
        return CalcPay::array2string($duration,$hrate); 
    } 
  
    function int2array ($seconds, $periods = null) 
    {         
        // Define time periods 
        if (!is_array($periods)) { 
            $periods = array ( 
                    'years'     => 31556926, 
                    'months'    => 2629743, 
                    'weeks'     => 604800, 
                    'days'      => 86400, 
                    'hours'     => 3600, 
                    'minutes'   => 60, 
                    'seconds'   => 1 
                    ); 
        } 
        // Loop 
        $seconds = (float) $seconds; 
        foreach ($periods as $period => $value) { 
            $count = floor($seconds / $value); 
  
            if ($count == 0) { 
                continue; 
            } 
            $values[$period] = $count; 
            $seconds = $seconds % $value; 
        } 
        // Return 
        if (empty($values)) { 
            $values = null; 
        } 
  
        return $values; 
    } 
  
    function array2string ($duration,$hrate) 
    { 
        if (!is_array($duration)) { 
            return false; 
        } 
  
        foreach ($duration as $key => $value) { 
            $segment_name = substr($key, 0, -1); 
            $segment = $value . ' ' . $segment_name;  
  
            // Plural 
            if ($value != 1) { 
                $segment .= 's'; 
            } 
  
            $array[] = $segment; 
        } 
	
		
	
		$f=0;
		// loop through returned vales
		
		
		
		foreach ($array as $value){
		//if we see no hours at all and only minutes run the algorithm below
		if(!stristr($array[0], 'hour') && stristr($array[0], 'minutes') ) {
		//explode to grab value
		$mins = explode(" ",$array[0]);
		//calculate how much they make a minute and divide it by how much they make an hour, format it by rounding.
		$mrate = round($hrate / 60, 2);
		//take how much they make a minute and times it by the amount of minutes they worked
		$finaltotal = round($mins[0] * $mrate,2);
		}
		// if we see an hour in the array assume based on what our class returns run this
		elseif(stristr($array[0], 'hour')) {
		//grab value for hours
		$hrs = explode(" ",$array[0]);
		//grab value for minutes
		$mins = explode(" ",$array[1]);
		// first we can get how much they make an hour peroid, this should always  round to .00 and not past 2 decminals
		$hraw = $hrs[0] * $hrate;
		//calculate how much they make a minute and divide it by how much they make an hour, format it by rounding.
		$mrate = round($hrate / 60, 2);
		
		$finaltotal = round($mins[0] * $mrate,2);	
		$mint = round($mins[0] * $mrate,2);
		//add the raw amount to the minute amount
		$finaltotal = ($hraw + $mint);
		
		} 

		return $finaltotal; 
		
		unset($hrtotal);
		unset($mintotal);
		
		$f++;
		}
		
        
    } 
  
}

function getmonth ($month = null, $year = null)
  {
      // The current month is used if none is supplied.
      if (is_null($month))
          $month = date('n');

      // The current year is used if none is supplied.
      if (is_null($year))
          $year = date('Y');

      // Verifying if the month exist
      if (!checkdate($month, 1, $year))
          return null;

      // Calculating the days of the month
      $first_of_month = mktime(0, 0, 0, $month, 1, $year);
      $days_in_month = date('t', $first_of_month);
      $last_of_month = mktime(0, 0, 0, $month, $days_in_month, $year);

      $m = array();
      $m['first_mday'] = 1;
      $m['first_wday'] = date('w', $first_of_month);
      $m['first_weekday'] = strftime('%A', $first_of_month);
      $m['first_yday'] = date('z', $first_of_month);
      $m['first_week'] = date('W', $first_of_month);
      $m['last_mday'] = $days_in_month;
      $m['last_wday'] = date('w', $last_of_month);
      $m['last_weekday'] = strftime('%A', $last_of_month);
      $m['last_yday'] = date('z', $last_of_month);
      $m['last_week'] = date('W', $last_of_month);
      $m['mon'] = $month;
      $m['month'] = strftime('%B', $first_of_month);
      $m['year'] = $year;

      return $m['month'].' '.$m['year'];
  }

  
  function weekDayOf($year,$month,$dayoftheweek,$occurance) {
    /*
     * returns the # occurance of the day of the week. Such as the 3rd sunday
     * if occurance is null it will return the whole array. for the week days in that month
     * it can be accessed by $date[$dayoftheweek][$occurance]=date;
     */
    $mdays=date("t",mktime(0,0,0,$month,1,$year)); //days in the current month
    $first_day = date('w',mktime(0,0,0,$month,1,$year)); // day of the week the month started with
    $day_oc = array(); // occurances of each day of the week
    for($i=0;$i<$mdays;++$i){
        $dayofweek = ($i+$first_day)%7;
        if(!is_array($day_oc[$dayofweek])) {
            $day_oc[$dayofweek] = array();
        }
        $day_oc[$dayofweek][]=$i+1;
    }
    $n = $occurance;
    while($n > 0 && !isset($day_oc[$dayoftheweek][$n]))
        $n--;
    return $day_oc[$dayoftheweek][$n];
} 


/*
Here is the function that cleans array of empty records.
It goes recursive through multidimensional array and erases any item that has empty value or is empty array. 
This actually works on any variable type, not just arrays.
*/


function clean_item ($p_value) {

	if (is_array ($p_value)) {
		if ( count ($p_value) == 0) {
			$p_value = null;
		} else {
			foreach ($p_value as $m_key => $m_value) {
				$p_value[$m_key] = clean_item ($m_value);
				if (empty ($p_value[$m_key])) unset ($p_value[$m_key]);
			}
		}
	} else {
		if (empty ($p_value)) {
			$p_value = null;
		}
	}
	return $p_value;
}


function ddiff($d1, $d2){
	$d1 = (is_string($d1) ? strtotime($d1) : $d1);
	$d2 = (is_string($d2) ? strtotime($d2) : $d2);

	$diff_secs = abs($d1 - $d2);
	$base_year = min(date("Y", $d1), date("Y", $d2));

	$diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
	return array(
		"years" => date("Y", $diff) - $base_year,
		"months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1,
		"months" => date("n", $diff) - 1,
		"days_total" => floor($diff_secs / (3600 * 24)),
		"days" => date("j", $diff) - 1,
		"hours_total" => floor($diff_secs / 3600),
		"hours" => date("G", $diff),
		"minutes_total" => floor($diff_secs / 60),
		"minutes" => (int) date("i", $diff),
		"seconds_total" => $diff_secs,
		"seconds" => (int) date("s", $diff)
	);
}


function dateDiff($dformat, $endDate, $beginDate)
{
$date_parts1=explode($dformat, $beginDate);
$date_parts2=explode($dformat, $endDate);
$start_date=gregoriantojd($date_parts1[0], $date_parts1[1], $date_parts1[2]);
$end_date=gregoriantojd($date_parts2[0], $date_parts2[1], $date_parts2[2]);
return $end_date - $start_date;
}


function dateDiffAlt($start, $end) {

$start_ts = strtotime($start);

$end_ts = strtotime($end);

$diff = $end_ts - $start_ts;

return round($diff / 86400);

}




function getNumMonth($start,$stop) { 

$aSta = substr($start,0,4) ; 
$aSto = substr($stop,0,4) ; 

$mSta = substr($start,4,2) ; 
$mSto = substr($stop,4,2) ; 

if($aSta == $aSto) {              
return $mSto-$mSta+1 ; 
} else { 
if(($aSto-$aSta) == 1) {     
	return 12-$mSta+$mSto+1 ; 
} else {                     
	return (12-$mSta+$mSto+1)+($aSto-$aSta-1)*12; 
}    
} 
}



function findspan($start,$kind) {
	$date = $start; // the format of this date is MM-DD-YYYY which is the American way of writing a date and the most common used on the internet
	$currentDate = mktime();     // for the second date we are going to use the current Unix system time
	                            // be advised that this is not necessarily the date of your computer but the date of the Unix server on which the .php file resides

	$dateSplit = explode("-", $date); // see explanations below to see what this does

	//$dateSplit[0] = Month
	//$dateSplit[1] = Day
	//$dateSplit[2] = Year

	$previousDate = mktime(0, 0, 0, $dateSplit[0], $dateSplit[1], $dateSplit[2]); // we will now create the timestamp for this date

	$nrSeconds = $currentDate - $previousDate; // subtract the previousDate from the currentDate to see how many seconds have passed between these two dates

	$nrSeconds = abs($nrSeconds); // in some cases, because of a user input error, the second date which should be smaller then the current one
	                            // will give a negative number of seconds. So we use abs() to get the absolute value of nrSeconds

	$nrDaysPassed = floor($nrSeconds / 86400); // see explanations below to see what this does
	$nrWeeksPassed = floor($nrSeconds / 604800); // same as above
	$nrYearsPassed = floor($nrSeconds / 31536000); // same as above

	if ($kind == "days") {
	echo $nrDaysPassed . " days have passed between " . date("F j, Y", $previousDate) . " and " . date("F j, Y", $currentDate) . "<br />";

	}
	if ($kind == "weeks") {
	return $nrWeeksPassed;
	}
	if ($kind == "years") {
	echo $nrYearsPassed . " years have passed between " . date("F j, Y", $previousDate) . " and " . date("F j, Y", $currentDate) . "<br />";
	}

}

function get_week_intervals($fdate,$ldate) 
{ 
    list($year,$month,$day) = explode('-',$fdate); 
    $daynum = date('w', 
                   mktime(date('H'), 
                          date('i'), 
                          date('s'), 
                          $month, 
                          $day, 
                          $year) 
                  ); 
    $daynum = $daynum==0? 7 : $daynum; 
    $week=array(); 
    //get the dayname of the first day 
    //if month = current month get the current date as the last day 
    if($month==date('m')) 
    { 
        $lastday = date('d'); 
    } 
    else 
    { 
        $lastday = date('t', strtotime($fdate)); 
    } 
    if((date('l',strtotime($fdate))) == 'Sunday') 
    { 
        $monday = $fdate; 
        $sunday = $fdate; 
    } 
    else 
    { 
        $monday = $fdate; 
        $sunday = date('Y-m-d',(mktime(date('H'), 
                       date('i'),date('s'),$month, 
                       $day,$year))-($daynum-7)*86400); 

    } 
    $week[] = array('monday'=>$monday,'sunday'=>$sunday); 

    $day = date('d',strtotime($sunday." +1 day")); 

    while($sunday < $ldate) 
    { 
        $monday = date('Y-m-d',strtotime($sunday." +1 day")); 

        list($year,$month,$day) = explode('-',$monday); 
        $daynum = date('w', 
                      mktime(date('H'), 
                             date('i'), 
                             date('s'), 
                             $month, 
                             $day, 
                             $year) 
                       ); 
        $daynum = $daynum==0? 7 : $daynum; 

        $sunday = date('Y-m-d',(mktime(date('H'),date('i'), 
                       date('s'),$month,$day,$year))-($daynum-7)*86400); 
        if($sunday > $ldate) 
        { 
            $sunday = $ldate; 
        } 

        $week[] = array('monday'=>$monday,'sunday'=>$sunday); 
    } 

    return $week; 
} 


 

function roundbc($x, $p)
{
  $x = trim($x);
  $data = explode(".",$x);
  if(substr($data[1],$p,1) >= "5")
  {
    $i=0;
    $addString = "5";
    while($i < $p)
    {
      $addString = "0" . $addString;
      $i++;
    }//end while.
    $addString = "." . $addString;
    $sum = bcadd($data[0] . "." . $data   [1],$addString,$p+1);
    $sumData = explode(".",$sum);
    return $sumData[0] . "." . substr($sumData[1],0,$p);
  }
  else
  {
    return $data[0] . "." . substr($data[1],0,$p);
  }
}
 

function sec2hms ($sec, $padHours = false) {

    $hms = "";
    
    // there are 3600 seconds in an hour, so if we
    // divide total seconds by 3600 and throw away
    // the remainder, we've got the number of hours
    $hours = intval(intval($sec) / 3600); 

    // add to $hms, with a leading 0 if asked for
    $hms .= ($padHours) 
          ? str_pad($hours, 2, "0", STR_PAD_LEFT). ':'
          : $hours. ':';
     
    // dividing the total seconds by 60 will give us
    // the number of minutes, but we're interested in 
    // minutes past the hour: to get that, we need to 
    // divide by 60 again and keep the remainder
    $minutes = intval(($sec / 60) % 60); 

    // then add to $hms (with a leading 0 if needed)
    $hms .= str_pad($minutes, 2, "0", STR_PAD_LEFT). ':';

    // seconds are simple - just divide the total
    // seconds by 60 and keep the remainder
    $seconds = intval($sec % 60); 

    // add to $hms, again with a leading 0 if needed
    $hms .= str_pad($seconds, 2, "0", STR_PAD_LEFT);

    return $hms;
} 



function paginationbonds($query,$per_page=10,$page=1,$url='?',$dbconn){   



	$dbconn->query("SELECT COUNT(a.id) as num 
									FROM applications_bonds a {$query}");
								
	$apps = $dbconn->single();

    $total = $apps['num'];
    $adjacents = "2"; 
      
    $prevlabel = "&lsaquo; Prev";
    $nextlabel = "Next &rsaquo;";
    $lastlabel = "Last &rsaquo;&rsaquo;";
      
    $page = ($page == 0 ? 1 : $page);  
    $start = ($page - 1) * $per_page;                               
      
    $prev = $page - 1;                          
    $next = $page + 1;
      
    $lastpage = ceil($total/$per_page);
      
    $lpm1 = $lastpage - 1; // //last page minus 1
      
     $pagination = "";
    if($lastpage > 1){   
        $pagination .= "<ul class='pagination'>";
        $pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";
              
            if ($page > 1) $pagination.= "<li><a onclick='gotopage(\"{$prev}\");return false;' href='{$url}page={$prev}'>{$prevlabel}</a></li>";
              
        if ($lastpage < 7 + ($adjacents * 2)){   
            for ($counter = 1; $counter <= $lastpage; $counter++){
                if ($counter == $page)
                    $pagination.= "<li><a class='current'>{$counter}</a></li>";
                else
                    $pagination.= "<li><a onclick='gotopage(\"{$counter}\");return false;' href='{$url}page={$counter}'>{$counter}</a></li>";                    
            }
          
        } elseif($lastpage > 5 + ($adjacents * 2)){
              
            if($page < 1 + ($adjacents * 2)) {
                  
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a onclick='gotopage(\"{$counter}\");return false;' href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a onclick='gotopage(\"{$lpm1}\");return false;' href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a onclick='gotopage(\"{$lastpage}\");return false;' href='{$url}page={$lastpage}'>{$lastpage}</a></li>";  
                      
            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                  
                $pagination.= "<li><a onclick='gotopage(\"1\");return false;' href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a onclick='gotopage(\"2\");return false;' href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a onclick='gotopage(\"{$counter}\");return false;' href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a onclick='gotopage(\"{$lpm1}\");return false;' href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a onclick='gotopage(\"{$lastpage}\");return false;' href='{$url}page={$lastpage}'>{$lastpage}</a></li>";      
                  
            } else {
                  
                $pagination.= "<li><a onclick='gotopage(\"1\");return false;' href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a onclick='gotopage(\"2\");return false;' href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a onclick='gotopage(\"{$counter}\");return false;' href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
            }
        }
          
            if ($page < $counter - 1) {
                $pagination.= "<li><a onclick='gotopage(\"{$next}\");return false;' href='{$url}page={$next}'>{$nextlabel}</a></li>";
                $pagination.= "<li><a onclick='gotopage(\"{$lastpage}\");return false;' href='{$url}page=$lastpage'>{$lastlabel}</a></li>";
            }
          
        $pagination.= "</ul>";        
    }
      
    return $pagination;
}



function array_random($arr, $num = 1) {
	shuffle($arr);
	shuffle($arr);
	$r = array();
	
	
	
	for ($i = 0; $i < $num; $i++) {
		$r[] = $arr[$i];
	}
	return $num == 1 ? $r[0] : $r;
}


  function format_money($format, $number) 
{ 
    $regex  = '/%((?:[\^!\-]|\+|\(|\=.)*)([0-9]+)?'. 
              '(?:#([0-9]+))?(?:\.([0-9]+))?([in%])/'; 
    if (setlocale(LC_MONETARY, 0) == 'C') { 
        setlocale(LC_MONETARY, ''); 
    } 
    $locale = localeconv(); 
    preg_match_all($regex, $format, $matches, PREG_SET_ORDER); 
    foreach ($matches as $fmatch) { 
        $value = floatval($number); 
        $flags = array( 
            'fillchar'  => preg_match('/\=(.)/', $fmatch[1], $match) ? 
                           $match[1] : ' ', 
            'nogroup'   => preg_match('/\^/', $fmatch[1]) > 0, 
            'usesignal' => preg_match('/\+|\(/', $fmatch[1], $match) ? 
                           $match[0] : '+', 
            'nosimbol'  => preg_match('/\!/', $fmatch[1]) > 0, 
            'isleft'    => preg_match('/\-/', $fmatch[1]) > 0 
        ); 
        $width      = trim($fmatch[2]) ? (int)$fmatch[2] : 0; 
        $left       = trim($fmatch[3]) ? (int)$fmatch[3] : 0; 
        //$right      = trim($fmatch[4]) ? (int)$fmatch[4] : $locale['int_frac_digits']; 
        $conversion = $fmatch[5]; 

        $positive = true; 
        if ($value < 0) { 
            $positive = false; 
            $value  *= -1; 
        } 
        $letter = $positive ? 'p' : 'n'; 

        $prefix = $suffix = $cprefix = $csuffix = $signal = ''; 

        $signal = $positive ? $locale['positive_sign'] : $locale['negative_sign']; 
        switch (true) { 
            case $locale["{$letter}_sign_posn"] == 1 && $flags['usesignal'] == '+': 
                $prefix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 2 && $flags['usesignal'] == '+': 
                $suffix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 3 && $flags['usesignal'] == '+': 
                $cprefix = $signal; 
                break; 
            case $locale["{$letter}_sign_posn"] == 4 && $flags['usesignal'] == '+': 
                $csuffix = $signal; 
                break; 
            case $flags['usesignal'] == '(': 
            case $locale["{$letter}_sign_posn"] == 0: 
                $prefix = '('; 
                $suffix = ')'; 
                break; 
        } 
        if (!$flags['nosimbol']) { 
            $currency = "";
        } else { 
            $currency = ''; 
        } 
        $space  = $locale["{$letter}_sep_by_space"] ? ' ' : ''; 

        $value = number_format($value, $right, $locale['mon_decimal_point'], 
                 $flags['nogroup'] ? '' : $locale['mon_thousands_sep']); 
        $value = @explode($locale['mon_decimal_point'], $value); 

        $n = strlen($prefix) + strlen($currency) + strlen($value[0]); 
        if ($left > 0 && $left > $n) { 
            $value[0] = str_repeat($flags['fillchar'], $left - $n) . $value[0]; 
        } 
        $value = implode($locale['mon_decimal_point'], $value); 
        if ($locale["{$letter}_cs_precedes"]) { 
            $value = $prefix . $currency . $space . $value . $suffix; 
        } else { 
            $value = $prefix . $value . $space . $currency . $suffix; 
        } 
        if ($width > 0) { 
            $value = str_pad($value, $width, $flags['fillchar'], $flags['isleft'] ? 
                     STR_PAD_RIGHT : STR_PAD_LEFT); 
        } 

        $format = str_replace($fmatch[0], $value, $format); 
    } 
    return $format; 
} 
 

function toMoney($val,$symbol='$',$r=2)
{


    $n = $val; 
    $c = is_float($n) ? 1 : number_format($n,$r);
    $d = '.';
    $t = ',';
    $sign = ($n < 0) ? '-' : '';
    $i = $n=number_format(abs($n),$r); 
    $j = (($j = count($i)) > 3) ? $j % 3 : 0; 

   return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;

}  

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}


function format_json($json, $html = false, $tabspaces = null)
{
	$tabcount = 0;
	$result = '';
	$inquote = false;
	$ignorenext = false;

	if ($html) {
		$tab = str_repeat("&nbsp;", ($tabspaces == null ? 4 : $tabspaces));
		$newline = "<br/>";
	} else {
		$tab = ($tabspaces == null ? "\t" : str_repeat(" ", $tabspaces));
		$newline = "\n";
	}

	for($i = 0; $i < strlen($json); $i++) {
		$char = $json[$i];

		if ($ignorenext) {
			$result .= $char;
			$ignorenext = false;
		} else {
			switch($char) {
				case ':':
					$result .= $char . (!$inquote ? " " : "");
					break;
				case '{':
					if (!$inquote) {
						$tabcount++;
						$result .= $char . $newline . str_repeat($tab, $tabcount);
					}
					else {
						$result .= $char;
					}
					break;
				case '}':
					if (!$inquote) {
						$tabcount--;
						$result = trim($result) . $newline . str_repeat($tab, $tabcount) . $char;
					}
					else {
						$result .= $char;
					}
					break;
				case ',':
					if (!$inquote) {
						$result .= $char . $newline . str_repeat($tab, $tabcount);
					}
					else {
						$result .= $char;
					}
					break;
				case '"':
					$inquote = !$inquote;
					$result .= $char;
					break;
				case '\\':
					if ($inquote) $ignorenext = true;
					$result .= $char;
					break;
				default:
					$result .= $char;
			}
		}
	}

	return $result;
}


function convertToInt($string) {
    $y = ltrim($string, '0');
    $z = 0 + $y;
    return $z;
}
function bcround($strval, $precision = 0) { 
    if (false !== ($pos = strpos($strval, '.')) && (strlen($strval) - $pos - 1) > $precision) { 
        $zeros = str_repeat("0", $precision); 
        return bcadd($strval, "0.{$zeros}5", $precision); 
    } else { 
        return $strval; 
    } 
} 

//strict numbers and letters filter, lowercase letter and only numbers
function OnumLets($string) {
$string = preg_replace("/[^a-z0-9]/i", "", $string);  
return $string;
}

function OnumLetsS($string) {
$string =  eregi_replace('[^a-z0-9 ]', '', $string);
return $string;
}

function uclean($string) {
$string =  eregi_replace('[^a-z0-9_]', '', $string);
return $string;
}


// A regular expression to only allow numbers, a poeriod and underscore
function OnumLet($string) {
$string = preg_replace("/[^a-zA-Z0*-9._]/", "", $string);  
return $string;
}

// A regular expression to only allow numbers, a poeriod and underscore
function OnLet($string) {
$string = preg_replace("/[^a-z._]/", "", $string);  
return $string;
}

function OnLetU($string) {
$string = preg_replace("/[^a-zA-Z._]/", "", $string);  
return $string;
}

// A regular expression to only allow numbers, a poeriod and underscore
function OnStg($string) {
$string = preg_replace("/[^0*-9.-]/", "", $string);  
return $string;
}

function OnDate($string) {
$string = preg_replace("/[^0*-9-]/", "", $string);  
return $string;
}

function OnNumCom($string) {
$string = preg_replace("/[^0*-9,]/", "", $string);  
return $string;
}
// check for a valid email function
function isEmail( $email ) {
return !eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email); 
         
}
function Money($string) {
 // Clean up the string by removing all chars that are not digits:
$string = preg_replace('/[^0-9.]/', '', $string);
$string = preg_replace('/\.([^.]*)(?=\.)/', '$1', $string);
$string = (double)$string;
return $string;
}

function dir_size( $dir ) 
{ 
    if( !$dir or !is_dir( $dir ) ) 
    { 
        return 0; 
    } 

    $ret = 0; 
    $sub = opendir( $dir ); 
    while( $file = readdir( $sub ) ) 
    { 
        if( is_dir( $dir . '/' . $file ) && $file !== ".." && $file !== "." ) 
        { 
            $ret += dir_size( $dir . '/' . $file ); 
            unset( $file ); 
        } 
        elseif( !is_dir( $dir . '/' . $file ) ) 
        { 
            $stats = stat( $dir . '/' . $file ); 
            $ret += $stats['size']; 
            unset( $file ); 
        } 
    } 
    closedir( $sub ); 
    unset( $sub ); 
    return $ret; 
}


function DirSize($DirectoryPath) {
 
    // I reccomend using a normalize_path function here
    // to make sure $DirectoryPath contains an ending slash
    // (-> http://www.jonasjohn.de/snippets/php/normalize-path.htm)
 
    // To display a good looking size you can use a readable_filesize
    // function.
    // (-> http://www.jonasjohn.de/snippets/php/readable-filesize.htm)
 
    $Size = 0;
 
    $Dir = opendir($DirectoryPath);
 
    if (!$Dir)
        return -1;
 
    while (($File = readdir($Dir)) !== false) {
 
        // Skip file pointers
        if ($File[0] == '.') continue; 
 
        // Go recursive down, or add the file size
        if (is_dir($DirectoryPath . $File))            
            $Size += DirSize($DirectoryPath . $File . DIRECTORY_SEPARATOR);
        else 
            $Size += filesize($DirectoryPath . $File);        
    }
 
    closedir($Dir);
 
    return $Size;
}

function validateZipCode($zipCode) {
if (preg_match('#[0-9]{5}#', $zipCode))
	return true;
else
	return false;
}

// A regular expression to only allow numbers
function OnlyNumbers($string) {
//$string = preg_replace("/[^0*-9]/", "", $string);
$string = preg_replace("/\D+/", "", $string);

//cast this string as an integer

return $string;
}


?>