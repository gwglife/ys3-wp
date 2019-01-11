<?php
/*
***************************
***************************
Public Controllers
***************************
***************************
*/
/*
*
	*
	IXN API quote Controller
	*
*
*/
if($_POST['getquote'] == 'true') {
	
	//restrict access ajax only...
    define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    if(!IS_AJAX) {
		die('Restricted access');
    }
    $pos = strpos($_SERVER['HTTP_REFERER'],getenv('HTTP_HOST'));
    if($pos===false){
		die('Restricted access');
    }
	
	/* calculate current age based on their birthday */
	$dobMonth = preg_replace('/\D/', '', $_POST['dobMonth']);
	$dobYear= preg_replace('/\D/', '', $_POST['dobYear']);
	$dobDay= preg_replace('/\D/', '', $_POST['dobDay']);
	$birthday = $dobYear.'-'.$dobMonth.'-'.$dobDay;
	$currentage = date_diff(date_create($birthday), date_create('now'))->y;
	
	/* get the 'insurance age' by getting the difference between today an their birthday date */
	$datetime1 = new DateTime(date('Y')."-".$dobMonth."-".$dobDay);
	$datetime2 = new DateTime("".date('Y')."-".date('m')."-".date('d')."");
	$birthdaydiff = $datetime1->diff($datetime2)->format('%a');
    
	if(countdays($birthday) <= 182.5) {
		$closestage = $currentage + 1;
	}else{
		$closestage = $currentage;
	}
	/* debug
	echo $currentage.'<br>';
	echo $closestage.'<br>';
	echo countdays($birthday);
	*/

	if($_POST['tobacco'] == 'Yes'){
	 $tco = "true";
	}else{
	 $tco = "false";
	 
	}
	//build IXN api request - uncomment vars if desired
	$data = array(
				"gender" => ucfirst($_POST['gender']), //note this is required to be upper case
				"state" => strtoupper($_POST['state']), 
				"current_age" => $currentage,
				"nearest_age" => $closestage,
				"face_amount" => $_POST['coverageAmount'],
				"tobacco" => $tco,
				/* uncomment once we hear back why aig and this other one aint working */
				"carrier_ids" => array(
					//140,
					193
				  ),
				"product_types" => ["".$_POST['coverageLength'].""],
				//"product_ids" => [590,1841,588,586,587,120,118,121,122,123,124,125,126,127],
				"health_categories" => ["Standard"],
				//"table_rates" => ["Table A","Table B"],
				//"wop_rider" => true,
				// we need to discuss this with Clint as to what is the preferred
				//"adb_rider" => true,  
				//"child_rider_units" => 1,
				//"flat_extra" => 1.00		
	);                                                                    
	$data_string = json_encode($data);  //encode the php array to a json for the api
	//echo $data_string.'<br>';
	$ch = curl_init('https://grapeshot.ixn.tech/v1/quotes');                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		'Content-Type: application/json',
		'accept: application/json',
		'app-id: d163aa40-b4a6-4de4-be04-2107fb19eea6',
		'app-token: 3f560683-c079-411c-9533-3245f047673f',	
		'Content-Length: ' . strlen($data_string))                                                                       
	);                                                                                                                   
																														 
	$insurancejson = curl_exec($ch); //returns json
	//print_r($_POST);
	//print_r($insurancejson);
	$insurancequotes = json_decode($insurancejson, true); //populates policy quotes into an array
	$insurancequotescount = count($insurancequotes); //error checking if no policies are available
	
	/*
	Business requirement:
	Only 1 quote, from 2 carriers, AIG and SBLS - and only the cheapest quote from each
	*/
	
	//first order our returned quotes array Decending
	$price = array();
	foreach ($insurancequotes as $key => $row) {
		$price[$key] = $row['premium_monthly'];
	}
	array_multisort($price, SORT_DESC, $insurancequotes);
	
	//Create a new container array. by nature, assigning the carrier_name as the key of the array will eliminate all other unique values
	//Since we orderd the quote array descending by monthly price this array will favor the cheapest prices when 
	//filtered in this fashion
	$oneQuotePerCarrier = array();
	foreach ($insurancequotes as $value) {
		$oneQuotePerCarrier[$value['carrier_name']] = $value;
	}
	
	//again multisort the filtered array that should only have 2 (or a certain number of unique carrier) quotes now
	//this time Ascending
	$price = array();
	foreach ($oneQuotePerCarrier as $key => $row) {
		$price[$key] = $row['premium_monthly'];
	}
	array_multisort($price, SORT_ASC, $oneQuotePerCarrier);
	
	//print_r($oneQuotePerCarrier);
	//if we have posts
	//echo $insurancequotescount.'<br><br>';
	if(count($oneQuotePerCarrier) > 0) {
			
		echo '<br>
        <h3>Your Results</h3> 

        <div class="row table-key">

			<div class="col-sm-12 col-md-12 col-lg-3">
                
                <strong>Carrier</strong>

            </div>

            <div class="col-sm-12 col-md-12 col-lg-3">
                
                <strong>Monthly Cost</strong>
                
            </div>

            <div class="col-sm-12 col-md-12 col-lg-3">
                
                <strong>Product Name</strong>
                
            </div>
        
            <div class="col-sm-12 col-md-12 col-lg-3">
                
                
            </div>

        </div>';	
			
		//loop over each unique insurance carrier quote returned from the api
		foreach ($oneQuotePerCarrier as $quote) {
		//print_r($quote);
			echo '
			<div class="row quote-result" id="quote-result-1">
				
				<div class="col-sm-12 col-md-12 col-lg-3 quote-rate-class">
					 <p>   
					<strong>Carrier:</strong> <span id="rate-class-1"><img style="background-color:#FFFFFF;padding:10px;border 2px solid pink;" width="80%" alt="'.$quote['carrier_name'].'" src="'.$quote['carrier_logo_url'].'" border="0"></span>
				</p>
				</div>		
				<div class="col-sm-12 col-md-12 col-lg-3 quote-monthly">
				 <p>   
					<strong>Monthly:</strong> <span id="quote-monthly-1">$'.ceil($quote['premium_monthly']).'</span>
				</p>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-3 quote-product">
				 <p>   
					<strong>Product Name:</strong> <span id="quote-product-1">'.$quote['product_name'].'</span>
				</p>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-3 quote-request">
					<a href="#" onclick="requestquoteinfo(\''.$quote['id'].'\',
\''.$quote['adb_rider_annual'].'\',
\''.$quote['adb_rider_max_coverage'].'\',
\''.$quote['adb_rider_monthly'].'\',
\''.$quote['adb_rider_quarterly'].'\',
\''.$quote['adb_rider_semi_annual'].'\',
\''.$quote['agent_message'].'\',
\''.$quote['am_best_date'].'\',
\''.$quote['am_best_rating'].'\',
\''.$quote['base_premium_annual'].'\',
\''.$quote['base_premium_monthly'].'\',
\''.$quote['base_premium_quarterly'].'\',
\''.$quote['base_premium_semi_annual'].'\',
\''.$quote['carrier_health_category'].'\',
\''.$quote['carrier_id'].'\',
\''.$quote['carrier_logo_url'].'\',
\''.$quote['carrier_name'].'\',
\''.$quote['child_rider_annual'].'\',
\''.$quote['child_rider_monthly'].'\',
\''.$quote['child_rider_quarterly'].'\',
\''.$quote['child_rider_semi_annual'].'\',
\''.$quote['child_rider_unit_coverage'].'\',
\''.$quote['child_rider_units'].'\',
\''.$quote['child_wop_rider_annual'].'\',
\''.$quote['child_wop_rider_monthly'].'\',
\''.$quote['child_wop_rider_quarterly'].'\',
\''.$quote['child_wop_rider_semi_annual'].'\',
\''.$quote['face_amount'].'\',
\''.$quote['flat_extra_annual'].'\',
\''.$quote['flat_extra_monthly'].'\',
\''.$quote['flat_extra_quarterly'].'\',
\''.$quote['flat_extra_semi_annual'].'\',
\''.$quote['gender'].'\',
\''.$quote['guid'].'\', 
\''.$quote['ixn_health_category'].'\',
\''.$quote['policy_fee_annual'].'\',
\''.$quote['policy_fee_monthly'].'\',
\''.$quote['policy_fee_quarterly'].'\',
\''.$quote['policy_fee_semi_annual'].'\',
\''.$quote['premium_annual'].'\',
\''.$quote['premium_monthly'].'\',
\''.$quote['premium_quarterly'].'\',
\''.$quote['premium_semi_annual'].'\',
\''.$quote['product_id'].'\', 
\''.$quote['product_name'].'\',
\''.$quote['product_type'].'\',
\''.$quote['table_rate_annual'].'\',
\''.$quote['table_rate_letter'].'\',
\''.$quote['table_rate_monthly'].'\',
\''.$quote['table_rate_percent'].'\',
\''.$quote['table_rate_quarterly'].'\',
\''.$quote['table_rate_semi_annual'].'\',
\''.$quote['wop_rider_annual'].'\',
\''.$quote['wop_rider_monthly'].'\',
 \''.$quote['wop_rider_quarterly'].'\',
 \''.$quote['wop_rider_semi_annual'].'\');return false;" 
					class="custom-button">
						<span data-hover="Select">
						  Select
					  </span>
				  </a>
				</div>
			</div>';
		
		
		}
	}else{
				
		echo '<h3>Based on the information you entered youSurance can not provide you with a quote at this time. If you think there\'s been a mistake please review and adjust your information, or alternatively call us at 1 (800) 303-5153 and a customer service representative will assist you with your quote</h3>';
		
	}
//print_r($result);
exit;
}
/*
*
	*
	Sign Up Form Controller
	*
*
*/
if( $_POST['proccess_epigenetic_insurance_quote'] == "true") {
	
		$_POST = array_map( 'stripslashes_deep', $_POST );
	
		/*
		*
		* Begin error checking
		* And filtering data for a clean Contact insert into Salesforce
		*
		*/
		
		$_POST['fullname'] = $_POST['firstName'].' '.$_POST['lastName'];

		/*
		 Birthday sanitization and calculation
		*/
	
		/* calculate current age based on their birthday */
		
		//sanitize the bday
		$dobMonth = preg_replace('/\D/', '', $_POST['dobMonthfinal']);
		$dobYear= preg_replace('/\D/', '', $_POST['dobYearfinal']);
		$dobDay= preg_replace('/\D/', '', $_POST['dobDayfinal']);
		$birthday = $dobYear.'-'.$dobMonth.'-'.$dobDay;
		$currentage = date_diff(date_create($birthday), date_create('now'))->y;
		
		/* get the 'insurance age' by getting the difference between today an their birthday date */
		$datetime1 = new DateTime(date('Y')."-".$dobMonth."-".$dobDay);
		$datetime2 = new DateTime("".date('Y')."-".date('m')."-".date('d')."");
		$birthdaydiff = $datetime1->diff($datetime2)->format('%a');
		
	    if(countdays($birthday) <= 182.5) {
			$closestage = $currentage + 1;
		}else{
			$closestage = $currentage;
		}
	
		$_POST['dob'] = $dobYear.'-'.$dobMonth.'-'.$dobDay;
		
	
		if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$_POST['dob'])) {
			$errors[] = 'Your Birthday Is In An Invalid Format. Please check your birthday before submitting again.';
		}
		
		if(strlen($_POST['fullname']) < 1 || strlen($_POST['fullname']) >= 150) { $errors[] = 'Your Full Name Is Required'; }
		if(strlen($_POST['address']) < 1 || strlen($_POST['address']) >= 100) {	$errors[] = 'Your Address Is Required';	}
		if(strlen($_POST['city']) < 1 || strlen($_POST['city']) >= 75) { $errors[] = 'Your City Is Required'; }
		
		/*
		if($_POST['state']){
			$getstate = new Database_PDO();
			$getstate->query('SELECT id,abbrev FROM states WHERE abbrev = :state');
			$getstate->bind(':state', $_POST['state']);	
			$rowstate = $getstate->single();
			
			if(!$rowstate){ $errors[] = 'Your State Is Required.'; }
		}else{
			$errors[] = 'Your State Is Required.';
		}
		*/
		
		if(!validateZipCode($_POST['zipcode'])) { $errors[] = 'Your Zipcode Is Required.'; }
		
		$_POST['phone'] = OnlyNumbers($_POST['phone']);
		if(strlen($_POST['phone']) < 1 || strlen($_POST['phone']) >= 15) {	
			$errors[] = 'Your Phone Number Is Required.';	
		}
		
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && strlen($_POST['email']) < 1 || strlen($_POST['email']) >= 250) {
		  $errors[] = 'Your email is in an invalid format.';	
		} 
		
		/*
		if($_POST['email']){
			$getstate = new Database_PDO();
			$getstate->query('SELECT email FROM users WHERE email = :email');
			$getstate->bind(':email', $_POST['email']);	
			$rowstate = $getstate->single();
			
			if($rowstate){ $errors[] = 'This email/account already exists,<br>Please use another.'; }
		}
		*/
		
		if(strlen($_POST['dob']) < 1 || strlen($_POST['dob']) >= 12) {	
			$errors[] = 'Your Date Of Birth Is Required.';
		}
	
		if($_POST['gendercarryover'] != "Male" &&
			$_POST['gendercarryover'] != "Female") {	
			$errors[] = 'Your Gender Is Required';		
		}
		
		$_POST['weightfinal'] = OnlyNumbers($_POST['weightfinal']);
		if(strlen($_POST['weightfinal']) < 1 || strlen($_POST['weightfinal']) >= 2000) {	
			$errors[] = 'Your Body Weight Is Required.';	
		}
		
		$_POST['heightfeetfinal'] = OnlyNumbers($_POST['heightfeetfinal']);
		if(strlen($_POST['heightfeetfinal']) >= 3 && strlen($_POST['heightfeetfinal']) <= 8) {	
			$errors[] = 'Your Body Height In Feet Is Required.';	
		}
		
		$_POST['heightinchesfinal'] = OnlyNumbers($_POST['heightinchesfinal']);
		if(strlen($_POST['heightinchesfinal']) >= 3 && strlen($_POST['heightinchesfinal']) <= 8) {	
			$errors[] = 'Your Body Height In Feet Is Required.';	
		}
		
		$_POST['coverage_amount'] = OnlyNumbers($_POST['coverage_amount']);
		if(strlen($_POST['coverage_amount']) < 1 && strlen($_POST['coverage_amount']) >= 5000000000) {	
			$errors[] = 'Please provide the amount of insurance coverage you need.';	
		}
		
		
		$_POST['coverage_length'] = $_POST['coverageLengthFinal'];
		
		/*
		if($_POST['coverage_length']){
			$getcov = new Database_PDO();
			$getcov->query('SELECT id,coverage_length FROM users_length_of_coverage WHERE coverage_length = :coverage_length');
			$getcov->bind(':coverage_length', $_POST['coverage_length']);	
			$rowcov = $getcov->single();
			//echo 'SELECT id,coverage_length FROM users_length_of_coverage WHERE id = '.$_POST['coverage_length'].'';
			if(!$rowcov){ $errors[] = 'Please select a coverage length.'; }
		}else{
			$errors[] = 'Please select a coverage length.';
		}
		*/
		
		if(strlen($_POST['best_time_to_call']) < 1 && strlen($_POST['best_time_to_call']) > 256) {	
			$errors[] = 'What is the best time for us to reach out to you?';		
		}
		if($_POST['nicotine_use'] != "Yes" &&
			$_POST['nicotine_use'] != "No") {	
			$errors[] = 'Do you use nicotine products?';		
		}
	
		// If we've passed all error checking,
		// Create a new user for this app,
		// Whether the app is successful or not is based on the current state of the application,
		// All fields should be non null on insert so that any possible data can be accepted at any time,	
		if (sizeof($errors) == 0) {
							
			//handle full names with 3 words in them
			$name = explode(" ",$_POST['fullname']);
			if (sizeof($name) == 2) {
				$first_name = $name[0];
				$last_name = $name[1];
			}elseif(sizeof($name) == 3) {
				$first_name = $name[0].' '.$name[1];
				$last_name = $name[2];
			}

				/*
				*
				SETUP PARDOT VARIABLE MAPPING
				*
				*/			
				
				$_POST['phone'] = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $_POST['phone']);
				
				//build IXN api request - uncomment vars if desired
				$data = array(
							"firstname" => $first_name, //note this is required to be upper case
							"lastname" => $last_name, 
							"fullname" => $first_name.' '.$last_name, 
							"address" => $_POST['address'], //note this is required to be upper case
							"city" => $_POST['city'], //note this is required to be upper case
							"state" => $_POST['state'], 
							"zipcode" => $_POST['zipcode'], 
							"gender" => ucfirst($_POST['gendercarryover']), //note this is required to be upper case
							"phone" => $_POST['phone'],
							"email" => $_POST['email'],
							"weight" => $_POST['weightfinal'],
							"dob" => $_POST['dob'],
							"heightfeet" => $_POST['heightfeetfinal'],
							"heightinches" => $_POST['heightinchesfinal'],
							
							"Taxpayer_Identification_Number__c" => $_POST['ssn'],
							"Taxpayer_Identification_Number_Type__c" => 'SSN',
							 
							
							"coverage_length" => $_POST['coverageLengthFinal'],
							"coverage_amount" => $_POST['coverage_amount'],
							"face_amount" => $_POST['coverage_amount'],
							"amount" => $_POST['premiumannual'],
							
							"nicotine_use" => $_POST['nicotine_use'],
							
							"RecordTypeIdByDeveloperName__c" => "YouSuranceDirect",	
							"AccountRecordTypeDeveloperName__c" => "YouSurance",	
							"ContactRecordTypeDeveloperName__c" => "YouSurance",			
							"OpportunityRecordTypeDeveloperName__c" => "YouSurance",	
							
							//"recordtypeid" => "0121N0000012cnC",
							"best_time_to_call" => $_POST['best_time_to_call'],	
							"contact-method" =>  $_POST['contact-method'],

							"company" => $last_name.' Family',
							//"convert" => "false",			
							"current_age" => $currentage,
							"nearest_age" => $closestage,
							
							"GovernmentIdType__c" => stripslashes($_POST['gov-id']),
							"GovernmentId__c" => $_POST['DriversLicense__c'],
							
							"IXNQuoteid" => $_POST['quote_id'],
							"adbriderannual" => $_POST['adbriderannual'],
							"adbridermaxcoverage" => $_POST['adbridermaxcoverage'],
							"adbridermonthly" => $_POST['adbridermonthly'],
							"adbriderquarterly" => $_POST['adbriderquarterly'],
							"adbridersemiannual" => $_POST['adbridersemiannual'],
							"agentmessage" => $_POST['agentmessage'],
							"ambestdate" => $_POST['ambestdate'],
							"ambestrating" => $_POST['ambestrating'],
							"basepremiumannual" => $_POST['basepremiumannual'],
							"basepremiummonthly" => $_POST['basepremiummonthly'],
							"basepremiumquarterly" => $_POST['basepremiumquarterly'],
							"basepremiumsemiannual" => $_POST['basepremiumsemiannual'],
							"carrierhealthcategory" => $_POST['carrierhealthcategory'],
							"carrierid" => $_POST['carrierid'],
							"carrierlogourl" => $_POST['carrierlogourl'],
							"carriername" => $_POST['carriername'],
							"childriderannual" => $_POST['childriderannual'],
							"childridermonthly" => $_POST['childridermonthly'],
							"childriderquarterly" => $_POST['childriderquarterly'],
							"childridersemiannual" => $_POST['childridersemiannual'],
							"childriderunitcoverage" => $_POST['childriderunitcoverage'],
							"childriderunits" => $_POST['childriderunits'],
							"childwopriderannual" => $_POST['childwopriderannual'],
							"childwopridermonthly" => $_POST['childwopridermonthly'],
							"childwopriderquarterly" => $_POST['childwopriderquarterly'],
							"childwopridersemiannual" => $_POST['childwopridersemiannual'],
							"createdat" => $_POST['createdat'],
							"faceamount" => $_POST['faceamount'],
							"flatextraannual" => $_POST['flatextraannual'],
							"flatextramonthly" => $_POST['flatextramonthly'],
							"flatextraquarterly" => $_POST['flatextraquarterly'],
							"flatextrasemiannual" => $_POST['flatextrasemiannual'],
							"guid" => $_POST['guid'],
							"ixnhealthcategory" => $_POST['ixnhealthcategory'],
							"policyfeeannual" => $_POST['policyfeeannual'],
							"policyfeemonthly" => $_POST['policyfeemonthly'],
							"policyfeequarterly" => $_POST['policyfeequarterly'],
							"policyfeesemiannual" => $_POST['policyfeesemiannual'],
							"premiumannual" => $_POST['premiumannual'],
							"premiummonthly" => $_POST['premiummonthly'],
							"premiumquarterly" => $_POST['premiumquarterly'],
							"premiumsemiannual" => $_POST['premiumsemiannual'],
							"productid" => $_POST['productid'],
							"productname" => $_POST['productname'],
							"producttype" => $_POST['producttype'],
							"tablerateannual" => $_POST['tablerateannual'],
							"tablerateletter" => $_POST['tablerateletter'],
							"tableratemonthly" => $_POST['tableratemonthly'],
							"tableratepercent" => $_POST['tableratepercent'],
							"tableratequarterly" => $_POST['tableratequarterly'],
							"tableratesemiannual" => $_POST['tableratesemiannual'],
							"wopriderannual" => $_POST['wopriderannual'],
							"wopridermonthly" => $_POST['wopridermonthly'],
							"wopriderquarterly" => $_POST['wopriderquarterly'],
							"wopridersemiannual" => $_POST['wopridersemiannual'],
							"source" => $_SESSION['source']
							
				);                         
				
				// ?source=mpls1
				
				//print_r($data);
				//echo '<br><br>';
				//exit;
				$pardotleadpostdata = http_build_query($data);
				
				$ch = curl_init();

				curl_setopt($ch, CURLOPT_URL,"http://go.gwgh.com/l/233872/2018-06-22/51cbq");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,
							$pardotleadpostdata);

				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

				$server_output = curl_exec($ch);

				curl_close ($ch);
			
				
				//print_r($server_output);
				//exit;
			
			/*
			require_once(dirname(__FILE__) . '/phpmailer/class.phpmailer.php');
			$email = new PHPMailer();
			$email->ClearAddresses();
			$email->From = $GLOBALS['CONTACT_MAIL'];
			$email->FromName = 'youSurance Error';
			$email->Subject = "A DMGA Prospect Lead failed to send to Salesforce: please review. errror: ".$e->faultstring."";
			$email->Body = $e->faultstring;
			$email->AddAddress('akwiczola@gwglife.com');
			//$email->Sender = $emailaddy;
			$email->IsHTML(true);
			$email->Send();
					
			
			$adduser = new Database_PDO();
			$adduser->query('INSERT INTO users (first_name, last_name, address, zipcode, city, state, phone, email,
												dob,timeentered, gender, weight,heightinches,heightfeet,fullname,
												coverage_length_id, coverage_amount, best_time_to_call, nicotine_use
												) 
										VALUES (:first_name, :last_name, :address, :zipcode, :city, :state, :phone, :email,
												:dob,NOW(), :gender, :weight,:heightinches,:heightfeet, :fullname,
												:coverage_length_id, :coverage_amount, :best_time_to_call, :nicotine_use)');
			$adduser->bind(':first_name',  $first_name);
			$adduser->bind(':last_name',  $last_name);
			$adduser->bind(':address',  $_POST['address']);
			$adduser->bind(':zipcode',  $_POST['zipcode']);
			$adduser->bind(':city',  $_POST['city']);
			$adduser->bind(':state',  $rowstate['id']);
			$adduser->bind(':phone',  $_POST['phone']);
			$adduser->bind(':email',  $_POST['email']);
			$adduser->bind(':dob',  $_POST['dob']);
			$adduser->bind(':gender',  $_POST['gender']);
			$adduser->bind(':weight',  $_POST['weight']);
			$adduser->bind(':heightinches',  $_POST['heightinches']);
			$adduser->bind(':heightfeet',  $_POST['heightfeet']);	
			$adduser->bind(':fullname',  $_POST['fullname']);
			$adduser->bind(':coverage_length_id',  $_POST['coverage_length_id']);
			$adduser->bind(':coverage_amount',  $_POST['coverage_amount']);
			$adduser->bind(':best_time_to_call',  $_POST['best_time_to_call']);	
			$adduser->bind(':nicotine_use',  $_POST['nicotine_use']);
			$adduser->execute();
			$userid = $adduser->lastInsertId();
			
			//$sfidu
			*/
			
			header("Location: /success?msg=signupsuccess&id=".$sfidu."");
			exit;
		}
}
?>