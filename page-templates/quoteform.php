<?php
/**
 * Template Name: Quote Form
 */

include("incl/common.php");
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<!-- @@ Add to head under stylesheets -->
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script type='text/javascript' src='http://yousurance.wpengine.com/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
	<script type='text/javascript' src='http://yousurance.wpengine.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
	<!-- @! -->
	<meta charset="utf-8" />
	<title>Get a Life Insurance quote using epigenetic technology at youSurance.com</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.png">

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PTWS6GF');
</script>
<!-- End Google Tag Manager -->

<script>

	function calcAge(dateString) {
		var birthday = new Date(dateString);
		var ageDifMs = Date.now() - birthday.getTime();
  var ageDate = new Date(ageDifMs); // miliseconds from epoch
  return Math.abs(ageDate.getFullYear() - 1970);
}

function getlifeinsurancequote() {

	document.getElementById('quotebuttonarea').focus();
	window.scrollY += 100;
	document.getElementById("quotefrag").innerHTML = '';
	document.getElementById("loadingquote").style.display = 'block';

	var state = document.getElementById('statequote').value;
	var coverageAmount = document.getElementById('coverageAmount').value;
	var weight = document.getElementById('weight').value;
	var coverageLength = document.getElementById('coverageLength').value;
	var heightFeet = document.getElementById('heightFeet').value;
	var heightInches = document.getElementById('heightInches').value;
	var dobMonth = document.getElementById('dobMonth').value;
	var dobYear = document.getElementById('dobYear').value;
	var dobDay = document.getElementById('dobDay').value;

	var tobacco = document.getElementsByName('tobacco');
	for (var i = 0, length = tobacco.length; i < length; i++)
	{
		if (tobacco[i].checked)
		{
			var tobaccovalue = tobacco[i].value;

			break;
		}
	}

	var gender = document.getElementsByName('gender');
	for (var i = 0, length = gender.length; i < length; i++)
	{
		if (gender[i].checked)
		{
			var gendervalue = gender[i].value;

			break;
		}
	}


	var ajx = $.ajax({
		type: "POST",
		async: true,
		url: "/get-a-life-insurance-quote",
		data: "getquote=true&state="+state+"&tobacco="+tobaccovalue+"&coverageAmount="+coverageAmount+"&weight="+weight+"&gender="+gendervalue+"&coverageLength="+coverageLength+"&heightFeet="+heightFeet+"&heightInches="+heightInches+"&dobMonth="+dobMonth+"&dobYear="+dobYear+"&dobDay="+dobDay,
		success: function(msg){

			document.getElementById("quotefrag").innerHTML = msg;
			document.getElementById("loadingquote").style.display = 'none';
		},
		error: function (request, status, error) {
			document.getElementById("quotefrag").innerHTML = '';
			alert(error);
			alert('There was an error. Please contact support at 1 (800) 303-5153 and they will gladly assist you.');

		}
	});
	return false;
}

function requestquoteinfo(

	id,
	adb_rider_annual,
	adb_rider_max_coverage,
	adb_rider_monthly,
	adb_rider_quarterly,
	adb_rider_semi_annual,
	agent_message,
	am_best_date,
	am_best_rating,
	base_premium_annual,
	base_premium_monthly,
	base_premium_quarterly,
	base_premium_semi_annual,
	carrier_health_category,
	carrier_id,
	carrier_logo_url,
	carrier_name,
	child_rider_annual,
	child_rider_monthly,
	child_rider_quarterly,
	child_rider_semi_annual,
	child_rider_unit_coverage,
	child_rider_units,
	child_wop_rider_annual,
	child_wop_rider_monthly,
	child_wop_rider_quarterly,
	child_wop_rider_semi_annual,
	face_amount,
	flat_extra_annual,
	flat_extra_monthly,
	flat_extra_quarterly,
	flat_extra_semi_annual,
	gender,
	guid, 
	ixn_health_category,
	policy_fee_annual,
	policy_fee_monthly,
	policy_fee_quarterly,
	policy_fee_semi_annual,
	premium_annual,
	premium_monthly,
	premium_quarterly,
	premium_semi_annual,
	product_id, 
	product_name,
	product_type,
	table_rate_annual,
	table_rate_letter,
	table_rate_monthly,
	table_rate_percent,
	table_rate_quarterly,
	table_rate_semi_annual,
	wop_rider_annual,
	wop_rider_monthly,
	wop_rider_quarterly,
	wop_rider_semi_annual 
	){


//Swap the header values after picking a quote value
jQuery("h1").text("Begin your application");
jQuery(".img-header p").text("Scroll down and complete the information below");

<?php // populate the quote related fields ?>

document.getElementById('IXNQuoteid').value = id;
document.getElementById('adbriderannual').value = adb_rider_annual;
document.getElementById('adbridermaxcoverage').value = adb_rider_max_coverage;
document.getElementById('adbridermonthly').value = adb_rider_monthly;
document.getElementById('adbriderquarterly').value = adb_rider_quarterly;
document.getElementById('adbridersemiannual').value = adb_rider_semi_annual;
document.getElementById('agentmessage').value = agent_message;
document.getElementById('ambestdate').value = am_best_date;
document.getElementById('ambestrating').value = am_best_rating;
document.getElementById('basepremiumannual').value = base_premium_annual;
document.getElementById('basepremiummonthly').value = base_premium_monthly;
document.getElementById('basepremiumquarterly').value = base_premium_quarterly;
document.getElementById('basepremiumsemiannual').value = base_premium_semi_annual;
document.getElementById('carrierhealthcategory').value = carrier_health_category;
document.getElementById('carrierid').value = carrier_id;
document.getElementById('carrierlogourl').value = carrier_logo_url;
document.getElementById('carriername').value = carrier_name;
document.getElementById('childriderannual').value = child_rider_annual;
document.getElementById('childridermonthly').value = child_rider_monthly;
document.getElementById('childriderquarterly').value = child_rider_quarterly;
document.getElementById('childridersemiannual').value = child_rider_semi_annual;
document.getElementById('childriderunitcoverage').value = child_rider_unit_coverage;
document.getElementById('childriderunits').value = child_rider_units;
document.getElementById('childwopriderannual').value = child_wop_rider_annual;
document.getElementById('childwopridermonthly').value = child_wop_rider_monthly;
document.getElementById('childwopriderquarterly').value = child_wop_rider_quarterly;
document.getElementById('childwopridersemiannual').value = child_wop_rider_semi_annual;
document.getElementById('faceamount').value = face_amount;
document.getElementById('flatextraannual').value = flat_extra_annual;
document.getElementById('flatextramonthly').value = flat_extra_monthly;
document.getElementById('flatextraquarterly').value = flat_extra_quarterly;
document.getElementById('flatextrasemiannual').value = flat_extra_semi_annual;
document.getElementById('guid').value = guid;
document.getElementById('ixnhealthcategory').value = ixn_health_category;
document.getElementById('policyfeeannual').value = policy_fee_annual;
document.getElementById('policyfeemonthly').value = policy_fee_monthly;
document.getElementById('policyfeequarterly').value = policy_fee_quarterly;
document.getElementById('premiumannual').value = premium_annual;
document.getElementById('premiummonthly').value = premium_monthly;
document.getElementById('premiumquarterly').value = premium_quarterly;
document.getElementById('premiumsemiannual').value = premium_semi_annual;
document.getElementById('productid').value = product_id;
document.getElementById('productname').value = product_name;
document.getElementById('producttype').value = product_type;
document.getElementById('tablerateannual').value = table_rate_annual;
document.getElementById('tablerateletter').value = table_rate_letter;
document.getElementById('tableratemonthly').value = table_rate_monthly;
document.getElementById('tableratepercent').value = table_rate_percent;
document.getElementById('tableratequarterly').value = table_rate_quarterly;
document.getElementById('tableratesemiannual').value = table_rate_semi_annual;
document.getElementById('wopriderannual').value = wop_rider_annual;
document.getElementById('wopridermonthly').value = wop_rider_monthly;
document.getElementById('wopriderquarterly').value = wop_rider_quarterly;
document.getElementById('wopridersemiannual').value = wop_rider_semi_annual;





	//hide elements we need to hide
	document.getElementById("loadingquote").style.display = 'none';
	document.getElementById("about").style.display = 'none';

	document.getElementById("rowdetails").style.display = 'block';
	document.getElementById("scrollback").focus();
	
	var state = document.getElementById('state').value;
	var coverageAmount = document.getElementById('coverageAmount').value;
	var weight = document.getElementById('weight').value;

	var gender = document.getElementsByName('gender');
	for (var i = 0, length = gender.length; i < length; i++)
	{
		if (gender[i].checked)
		{
			var gendervalue = gender[i].value;
			break;
		}
	}
	
	var gender = document.getElementsByName('gendercarryover');
	for (var i = 0, length = gender.length; i < length; i++)
	{
		if (gender[i].value == gendervalue)
		{
			gender[i].checked = true;	
			//alert(gendervalue);
			break;
		}
	}
	
	var ss = document.getElementById('statequote').value;
	document.getElementById('sale-state2').value = ss;
	document.getElementById('state').value = ss;

	var coverageLength = document.getElementById('coverageLength').value;
	var heightFeet = document.getElementById('heightFeet').value;
	var heightInches = document.getElementById('heightInches').value;
	var dobMonth = document.getElementById('dobMonth').value;
	var dobYear = document.getElementById('dobYear').value;
	var dobDay = document.getElementById('dobDay').value;

	document.getElementById("dob2").innerHTML = dobMonth+'/'+dobDay+'/'+dobYear;
	
	document.getElementById("quote-monthly-final").innerHTML = "$"+premium_monthly;
	document.getElementById("carrier-final").innerHTML = carrier_name;
	document.getElementById("quote-product-final").innerHTML = product_name;
	
	document.getElementById('coverageLengthFinal').value = coverageLength;
	
	var tobacco = document.getElementsByName('tobacco');
	for (var i = 0, length = tobacco.length; i < length; i++)
	{
		if (tobacco[i].checked)
		{
			var tobaccovalue = tobacco[i].value;

			break;
		}
	}

	document.getElementById('nicotine_use').value = tobaccovalue;
	document.getElementById('weightfinal').value = document.getElementById('weight').value;
	document.getElementById('heightfeetfinal').value = heightFeet;
	document.getElementById('heightinchesfinal').value = heightInches;
	document.getElementById('coverage_amount').value = document.getElementById('coverageAmount').value;
	document.getElementById('dobMonthfinal').value = dobMonth;
	document.getElementById('dobDayfinal').value = dobDay;
	document.getElementById('dobYearfinal').value = dobYear;
	document.getElementById('guid').value = guid;
	document.getElementById('quote_id').value = id;
	return false;	
}

function finalizequote() {
	
	
	document.finalquote.submit();
	
	return false;	
}


function filteralpha(event) {

	if (event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 8 || event.keyCode == 0 || event.keyCode == 13 || event.keyCode == 9 || event.keyCode ==16){



		return true;
	}else{
		if (event.preventDefault) {
			event.preventDefault();
		} else {
			event.returnValue = false;
		}
	}

}


</script>

<!-- Template CSS Files -->
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/child-theme.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/yousurance-styles.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/form.css" />

<?php wp_head(); ?>

</head>

<body <?php body_class('get-a-quote'); ?>>

	<!-- Page Wrapper Starts -->
	<!-- Google Tag Manager (noscript) -->

	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PTWS6GF"

		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

		<!-- End Google Tag Manager (noscript) -->
		<div class="wrapper">
			
			<?php echo do_shortcode('[fl_builder_insert_layout slug="header"]');	 ?>

			<section class="img-header img-header-quote1">

				<!-- Main Heading Starts -->
				<div class="text-center top-text">

					<h1 class="text-white">Get A Quote</h1>
					<p>Fill out the info below to get a quote. It's that easy.</p>

				</div>
				<!-- Main Heading Ends -->

			</section>




			<!-- About Section Starts -->
			<section id="rowdetails" style="<?php if (count($errors) == 0) { echo 'display:none;'; }elseif (count($errors) > 0){  echo 'display:block;'; } ?>" class="about quote-region double-diagonal pt-5">

				<!-- Container Starts -->
				<div class="container pt-5">

					<?php include($GLOBALS['webroot']."/incl/errors.php"); ?>

					<div class="row table-key">

						<div class="col-sm-12 col-md-12 col-lg-4">

							<h3>Monthly Cost</h3>

						</div>

						<div class="col-sm-12 col-md-12 col-lg-4">

							<h3>Carrier</h3>

						</div>

						<div class="col-sm-12 col-md-12 col-lg-4">

							<h3>Product Name</h3>

						</div>



					</div>

					<hr>

					<div class="row quote-result" id="quote-result-1" style="margin-top:-30px;">

						<div class="col-sm-12 col-md-12 col-lg-4 quote-monthly">

							<p>   
								<strong>Monthly Cost:</strong> <span id="quote-monthly-final"></span>
							</p>

						</div>

						<div class="col-sm-12 col-md-12 col-lg-4 quote-carrier">

							<p>
								<strong>Carrier:</strong> <span id="carrier-final"></span>
							</p>

						</div>

						<div class="col-sm-12 col-md-12 col-lg-4 quote-product">

							<p>   
								<strong>Product Name:</strong> <span id="quote-product-final"></span>
							</p>

						</div>

						<hr>

					</div>






					<!-- About Content Starts -->
					<div class="row">

						<div class="col-sm-12 col-md-12">

							<h2>Insured Information</h2>

							<p>We need just a bit more information before we can complete your quote.</p>
							<hr style="color:#fff; border-top:1px solid #fff;">


							<form action="/get-a-life-insurance-quote" id="quote-form-2" method="POST" name="life_epigenetics_insurance_signup">
								<input type="hidden" name="proccess_epigenetic_insurance_quote" value="true">
								<input type="hidden" name="heightfeetfinal" id="heightfeetfinal" value="<?php if( isset($_POST['heightfeetfinal'])){echo $_POST['heightfeetfinal'];}?>">
								<input type="hidden" name="heightinchesfinal" id="heightinchesfinal" value="<?php if( isset($_POST['heightinchesfinal'])){echo $_POST['heightinchesfinal'];}?>">
								<input type="hidden" name="weightfinal" id="weightfinal" value="<?php if( isset($_POST['weightfinal'])){echo $_POST['weightfinal'];}?>">
								<input type="hidden" name="nicotine_use" id="nicotine_use" value="<?php if( isset($_POST['nicotine_use'])){echo $_POST['nicotine_use'];}?>">
								<input type="hidden" name="coverage_amount" id="coverage_amount" value="<?php if( isset($_POST['coverage_amount'])){echo $_POST['coverage_amount'];}?>">
								<input type="hidden" name="coverageLengthFinal" id="coverageLengthFinal" value="<?php if( isset($_POST['coverageLengthFinal'])){echo $_POST['coverageLengthFinal'];}?>">

								<input type="hidden" name="dobMonthfinal" id="dobMonthfinal" value="<?php if( isset($_POST['dobMonthfinal'])){echo $_POST['dobMonthfinal'];}?>">
								<input type="hidden" name="dobDayfinal" id="dobDayfinal" value="<?php if( isset($_POST['dobDayfinal'])){echo $_POST['dobDayfinal'];}?>">
								<input type="hidden" name="dobYearfinal" id="dobYearfinal" value="<?php if( isset($_POST['dobYearfinal'])){echo $_POST['dobYearfinal'];}?>">

								<input type="hidden" name="IXNQuoteid" id="IXNQuoteid" value="<?php if( isset($_POST['quote_id'])){echo $_POST['quote_id'];}?>">
								<input type="hidden" name="adbriderannual" id="adbriderannual" value="<?php if( isset($_POST['adbriderannual'])){echo $_POST['adbriderannual'];}?>">
								<input type="hidden" name="adbridermaxcoverage" id="adbridermaxcoverage" value="<?php if( isset($_POST['adbridermaxcoverage'])){echo $_POST['adbridermaxcoverage'];}?>">
								<input type="hidden" name="adbridermonthly" id="adbridermonthly" value="<?php if( isset($_POST['adbridermonthly'])){echo $_POST['adbridermonthly'];}?>">
								<input type="hidden" name="adbriderquarterly" id="adbriderquarterly" value="<?php if( isset($_POST['adbriderquarterly'])){echo $_POST['adbriderquarterly'];}?>">
								<input type="hidden" name="adbridersemiannual" id="adbridersemiannual" value="<?php if( isset($_POST['adbridersemiannual'])){echo $_POST['adbridersemiannual'];}?>">
								<input type="hidden" name="agentmessage" id="agentmessage" value="<?php if( isset($_POST['agentmessage'])){echo $_POST['agentmessage'];}?>">
								<input type="hidden" name="ambestdate" id="ambestdate" value="<?php if( isset($_POST['ambestdate'])){echo $_POST['ambestdate'];}?>">
								<input type="hidden" name="ambestrating" id="ambestrating" value="<?php if( isset($_POST['ambestrating'])){echo $_POST['ambestrating'];}?>">
								<input type="hidden" name="basepremiumannual" id="basepremiumannual" value="<?php if( isset($_POST['basepremiumannual'])){echo $_POST['basepremiumannual'];}?>">
								<input type="hidden" name="basepremiummonthly" id="basepremiummonthly" value="<?php if( isset($_POST['basepremiummonthly'])){echo $_POST['basepremiummonthly'];}?>">
								<input type="hidden" name="basepremiumquarterly" id="basepremiumquarterly" value="<?php if( isset($_POST['basepremiumquarterly'])){echo $_POST['basepremiumquarterly'];}?>">
								<input type="hidden" name="basepremiumsemiannual" id="basepremiumsemiannual" value="<?php if( isset($_POST['basepremiumsemiannual'])){echo $_POST['basepremiumsemiannual'];}?>">
								<input type="hidden" name="carrierhealthcategory" id="carrierhealthcategory" value="<?php if( isset($_POST['carrierhealthcategory'])){echo $_POST['carrierhealthcategory'];}?>">
								<input type="hidden" name="carrierid" id="carrierid" value="<?php if( isset($_POST['carrierid'])){echo $_POST['carrierid'];}?>">
								<input type="hidden" name="carrierlogourl" id="carrierlogourl" value="<?php if( isset($_POST['carrierlogourl'])){echo $_POST['carrierlogourl'];}?>">
								<input type="hidden" name="carriername" id="carriername" value="<?php if( isset($_POST['carriername'])){echo $_POST['carriername'];}?>">
								<input type="hidden" name="childriderannual" id="childriderannual" value="<?php if( isset($_POST['childriderannual'])){echo $_POST['childriderannual'];}?>">
								<input type="hidden" name="childridermonthly" id="childridermonthly" value="<?php if( isset($_POST['childridermonthly'])){echo $_POST['childridermonthly'];}?>">
								<input type="hidden" name="childriderquarterly" id="childriderquarterly" value="<?php if( isset($_POST['childriderquarterly'])){echo $_POST['childriderquarterly'];}?>">
								<input type="hidden" name="childridersemiannual" id="childridersemiannual" value="<?php if( isset($_POST['childridersemiannual'])){echo $_POST['childridersemiannual'];}?>">
								<input type="hidden" name="childriderunitcoverage" id="childriderunitcoverage" value="<?php if( isset($_POST['childriderunitcoverage'])){echo $_POST['childriderunitcoverage'];}?>">
								<input type="hidden" name="childriderunits" id="childriderunits" value="<?php if( isset($_POST['childriderunits'])){echo $_POST['childriderunits'];}?>">
								<input type="hidden" name="childwopriderannual" id="childwopriderannual" value="<?php if( isset($_POST['childwopriderannual'])){echo $_POST['childwopriderannual'];}?>">
								<input type="hidden" name="childwopridermonthly" id="childwopridermonthly" value="<?php if( isset($_POST['childwopridermonthly'])){echo $_POST['childwopridermonthly'];}?>">
								<input type="hidden" name="childwopriderquarterly" id="childwopriderquarterly" value="<?php if( isset($_POST['childwopriderquarterly'])){echo $_POST['childwopriderquarterly'];}?>">
								<input type="hidden" name="childwopridersemiannual" id="childwopridersemiannual" value="<?php if( isset($_POST['childwopridersemiannual'])){echo $_POST['childwopridersemiannual'];}?>">
								<input type="hidden" name="createdat" id="createdat" value="<?php if( isset($_POST['createdat'])){echo $_POST['createdat'];}?>">
								<input type="hidden" name="faceamount" id="faceamount" value="<?php if( isset($_POST['faceamount'])){echo $_POST['faceamount'];}?>">
								<input type="hidden" name="flatextraannual" id="flatextraannual" value="<?php if( isset($_POST['flatextraannual'])){echo $_POST['flatextraannual'];}?>">
								<input type="hidden" name="flatextramonthly" id="flatextramonthly" value="<?php if( isset($_POST['flatextramonthly'])){echo $_POST['flatextramonthly'];}?>">
								<input type="hidden" name="flatextraquarterly" id="flatextraquarterly" value="<?php if( isset($_POST['flatextraquarterly'])){echo $_POST['flatextraquarterly'];}?>">
								<input type="hidden" name="flatextrasemiannual" id="flatextrasemiannual" value="<?php if( isset($_POST['flatextrasemiannual'])){echo $_POST['flatextrasemiannual'];}?>">
								<input type="hidden" name="guid" id="guid" value="<?php if( isset($_POST['guid'])){echo $_POST['guid'];}?>">
								<input type="hidden" name="ixnhealthcategory" id="ixnhealthcategory" value="<?php if( isset($_POST['ixnhealthcategory'])){echo $_POST['ixnhealthcategory'];}?>">
								<input type="hidden" name="policyfeeannual" id="policyfeeannual" value="<?php if( isset($_POST['policyfeeannual'])){echo $_POST['policyfeeannual'];}?>">
								<input type="hidden" name="policyfeemonthly" id="policyfeemonthly" value="<?php if( isset($_POST['policyfeemonthly'])){echo $_POST['policyfeemonthly'];}?>">
								<input type="hidden" name="policyfeequarterly" id="policyfeequarterly" value="<?php if( isset($_POST['policyfeequarterly'])){echo $_POST['policyfeequarterly'];}?>">
								<input type="hidden" name="policyfeesemiannual" id="policyfeesemiannual" value="<?php if( isset($_POST['policyfeesemiannual'])){echo $_POST['policyfeesemiannual'];}?>">
								<input type="hidden" name="premiumannual" id="premiumannual" value="<?php if( isset($_POST['premiumannual'])){echo $_POST['premiumannual'];}?>">
								<input type="hidden" name="premiummonthly" id="premiummonthly" value="<?php if( isset($_POST['premiummonthly'])){echo $_POST['premiummonthly'];}?>">
								<input type="hidden" name="premiumquarterly" id="premiumquarterly" value="<?php if( isset($_POST['premiumquarterly'])){echo $_POST['premiumquarterly'];}?>">
								<input type="hidden" name="premiumsemiannual" id="premiumsemiannual" value="<?php if( isset($_POST['premiumsemiannual'])){echo $_POST['premiumsemiannual'];}?>">
								<input type="hidden" name="productid" id="productid" value="<?php if( isset($_POST['productid'])){echo $_POST['productid'];}?>">
								<input type="hidden" name="productname" id="productname" value="<?php if( isset($_POST['productname'])){echo $_POST['productname'];}?>">
								<input type="hidden" name="producttype" id="producttype" value="<?php if( isset($_POST['producttype'])){echo $_POST['producttype'];}?>">
								<input type="hidden" name="tablerateannual" id="tablerateannual" value="<?php if( isset($_POST['tablerateannual'])){echo $_POST['tablerateannual'];}?>">
								<input type="hidden" name="tablerateletter" id="tablerateletter" value="<?php if( isset($_POST['tablerateletter'])){echo $_POST['tablerateletter'];}?>">
								<input type="hidden" name="tableratemonthly" id="tableratemonthly" value="<?php if( isset($_POST['tableratemonthly'])){echo $_POST['tableratemonthly'];}?>">
								<input type="hidden" name="tableratepercent" id="tableratepercent" value="<?php if( isset($_POST['tableratepercent'])){echo $_POST['tableratepercent'];}?>">
								<input type="hidden" name="tableratequarterly" id="tableratequarterly" value="<?php if( isset($_POST['tableratequarterly'])){echo $_POST['tableratequarterly'];}?>">
								<input type="hidden" name="tableratesemiannual" id="tableratesemiannual" value="<?php if( isset($_POST['tableratesemiannual'])){echo $_POST['tableratesemiannual'];}?>">
								<input type="hidden" name="wopriderannual" id="wopriderannual" value="<?php if( isset($_POST['wopriderannual'])){echo $_POST['wopriderannual'];}?>">
								<input type="hidden" name="wopridermonthly" id="wopridermonthly" value="<?php if( isset($_POST['wopridermonthly'])){echo $_POST['wopridermonthly'];}?>">
								<input type="hidden" name="wopriderquarterly" id="wopriderquarterly" value="<?php if( isset($_POST['wopriderquarterly'])){echo $_POST['wopriderquarterly'];}?>">
								<input type="hidden" name="wopridersemiannual" id="wopridersemiannual" value="<?php if( isset($_POST['wopridersemiannual'])){echo $_POST['wopridersemiannual'];}?>">

								<div class="row name">

									<div class="col-sm-12 col-md-12 col-lg-3">

										<div class="row">

											<div class="col-sm-12">
												<div id="scrollback" tabindex="0"></div>
												<label for="Name"><span class="required">*</span>Name:</label>

											</div>

										</div>

									</div> 

									<div class="col-sm-12 col-md-12 col-lg-9">

										<div class="row">

											<div class="col-sm-12 col-md-12 col-lg-4">

												<input type="text" class="w-100" name="firstName" placeholder="First Name" id="firstName" value="<?php if( isset($_POST['firstName'])){echo $_POST['firstName'];}?>" required>


											</div>

											<div class="col-sm-12 col-md-12 col-lg-4">

												<input type="text" class="w-100" name="mi" placeholder="MI" id="mi" value="<?php if( isset($_POST['mi'])){echo $_POST['mi'];}?>">

											</div>

											<div class="col-sm-12 col-md-12 col-lg-4">

												<input type="text" class="w-100" name="lastName" placeholder="Last Name" id="lastName" value="<?php if( isset($_POST['lastName'])){echo $_POST['lastName'];}?>" required>

											</div>


										</div>

									</div>

								</div>

								<div class="row gender">

									<div class="col-sm-12 col-md-12 col-lg-3">

										<label for="gender">Gender:</label>

									</div>

									<div class="col-sm-12 col-md-12 col-lg-9">


										<label for="Male">Male</label>
										<input type="radio" name="gendercarryover" id="gendermalecarryover" <?php if( $_POST['gendercarryover'] == "Male"){echo 'checked';}?> tabindex="2" value="Male" required>

										<label for="Female">Female</label>
										<input type="radio" name="gendercarryover" id="genderfemalecarryover" <?php if( $_POST['gendercarryover'] == "Female"){echo 'checked';}?> tabindex="3" value="Female">


									</div>

								</div>

								<div class="row dob">

									<div class="col-sm-12 col-md-12 col-lg-3">

										<label for="dob2">Date of Birth:</label>

									</div>

									<div class="col-sm-12 col-md-12 col-lg-9">

										<span id="dob2"><?php if( isset($_POST['dobMonthfinal'])){echo $_POST['dobMonthfinal'].'/'.$_POST['dobDayfinal'].'/'.$_POST['dobYearfinal'];}?></span>

									</div>

								</div>

								<div class="row ssn">

									<div class="col-sm-12 col-md-12 col-lg-3">

										<label for="dob"><span class="required">*</span>SSN:</label>

									</div>

									<div class="col-sm-12 col-md-12 col-lg-9">

										<input type="text" class="w-100" name="ssn" placeholder="XXX-XXX-XXXX" id="ssn" value="<?php if( isset($_POST['ssn'])){echo $_POST['ssn'];}?>" required>

									</div>

								</div>

								<div class="row home-address">

									<div class="col-sm-12 col-md-12 col-lg-3">

										<div class="row">

											<div class="col-sm-12">

												<label for="address-home"><span class="required">*</span>Home Address:</label>

											</div>

										</div>



									</div>

									<div class="col-sm-12 col-md-12 col-lg-9">

										<div class="row">

											<div class="col-sm-12">

												<input type="text" class="w-100" name="address" placeholder="Street" id="address" value="<?php if( isset($_POST['address'])){echo $_POST['address'];}?>" required>

											</div>

											<div class="col-sm-12 col-md-12 col-lg-4">

												<input type="text" class="w-100" name="city" placeholder="City" id="city" value="<?php if( isset($_POST['city'])){echo $_POST['city'];}?>" required>

											</div>

											<div class="col-sm-12 col-md-12 col-lg-4">

												<select class="w-100" name="state" id="state" required>
													<option value="">--Select--</option>
													<option value="AL" <?php if( $_POST['state'] == "AL"){echo 'selected';}?>>Alabama</option>
													<option value="AK" <?php if( $_POST['state'] == "AK"){echo 'selected';}?>>Alaska</option>
													<option value="AZ" <?php if( $_POST['state'] == "AL"){echo 'selected';}?>>Arizona</option>
													<option value="AR" <?php if( $_POST['state'] == "AR"){echo 'selected';}?>>Arkansas</option>
													<option value="CA" <?php if( $_POST['state'] == "CA"){echo 'selected';}?>>California</option>
													<option value="CO" <?php if( $_POST['state'] == "CO"){echo 'selected';}?>>Colorado</option>
													<option value="CT" <?php if( $_POST['state'] == "CT"){echo 'selected';}?>>Connecticut</option>
													<option value="DE" <?php if( $_POST['state'] == "DE"){echo 'selected';}?>>Delaware</option>
													<option value="FL" <?php if( $_POST['state'] == "FL"){echo 'selected';}?>>Florida</option>
													<option value="GA" <?php if( $_POST['state'] == "GA"){echo 'selected';}?>>Georgia</option>
													<option value="HI" <?php if( $_POST['state'] == "HI"){echo 'selected';}?>>Hawaii</option>
													<option value="ID" <?php if( $_POST['state'] == "ID"){echo 'selected';}?>>Idaho</option>
													<option value="IL" <?php if( $_POST['state'] == "IL"){echo 'selected';}?>>Illinois</option>
													<option value="IN" <?php if( $_POST['state'] == "IN"){echo 'selected';}?>>Indiana</option>
													<option value="IA" <?php if( $_POST['state'] == "IA"){echo 'selected';}?>>Iowa</option>
													<option value="KS" <?php if( $_POST['state'] == "KS"){echo 'selected';}?>>Kansas</option>
													<option value="KY" <?php if( $_POST['state'] == "KY"){echo 'selected';}?>>Kentucky</option>
													<option value="LA" <?php if( $_POST['state'] == "LA"){echo 'selected';}?>>Louisiana</option>
													<option value="ME" <?php if( $_POST['state'] == "ME"){echo 'selected';}?>>Maine</option>
													<option value="MD" <?php if( $_POST['state'] == "MD"){echo 'selected';}?>>Maryland</option>
													<option value="MA" <?php if( $_POST['state'] == "MA"){echo 'selected';}?>>Massachusetts</option>
													<option value="MI" <?php if( $_POST['state'] == "MI"){echo 'selected';}?>>Michigan</option>
													<option value="MN" <?php if( $_POST['state'] == "MN"){echo 'selected';}?>>Minnesota</option>
													<option value="MS" <?php if( $_POST['state'] == "MS"){echo 'selected';}?>>Mississippi</option>
													<option value="MO" <?php if( $_POST['state'] == "MO"){echo 'selected';}?>>Missouri</option>
													<option value="MT" <?php if( $_POST['state'] == "MT"){echo 'selected';}?>>Montana</option>
													<option value="NE" <?php if( $_POST['state'] == "NE"){echo 'selected';}?>>Nebraska</option>
													<option value="NV" <?php if( $_POST['state'] == "NV"){echo 'selected';}?>>Nevada</option>
													<option value="NH" <?php if( $_POST['state'] == "NH"){echo 'selected';}?>>New Hampshire</option>
													<option value="NJ" <?php if( $_POST['state'] == "NJ"){echo 'selected';}?>>New Jersey</option>
													<option value="NM" <?php if( $_POST['state'] == "NM"){echo 'selected';}?>>New Mexico</option>
													<option value="NY" <?php if( $_POST['state'] == "NY"){echo 'selected';}?>>New York</option>
													<option value="NC" <?php if( $_POST['state'] == "NC"){echo 'selected';}?>>North Carolina</option>
													<option value="ND" <?php if( $_POST['state'] == "ND"){echo 'selected';}?>>North Dakota</option>
													<option value="OH" <?php if( $_POST['state'] == "OH"){echo 'selected';}?>>Ohio</option>
													<option value="OK" <?php if( $_POST['state'] == "OK"){echo 'selected';}?>>Oklahoma</option>
													<option value="OR" <?php if( $_POST['state'] == "OR"){echo 'selected';}?>>Oregon</option>
													<option value="PA" <?php if( $_POST['state'] == "PA"){echo 'selected';}?>>Pennsylvania</option>
													<option value="RI" <?php if( $_POST['state'] == "RI"){echo 'selected';}?>>Rhode Island</option>
													<option value="SC" <?php if( $_POST['state'] == "SC"){echo 'selected';}?>>South Carolina</option>
													<option value="SD" <?php if( $_POST['state'] == "SD"){echo 'selected';}?>>South Dakota</option>
													<option value="TN" <?php if( $_POST['state'] == "TN"){echo 'selected';}?>>Tennessee</option>
													<option value="TX" <?php if( $_POST['state'] == "TX"){echo 'selected';}?>>Texas</option>
													<option value="UT" <?php if( $_POST['state'] == "UT"){echo 'selected';}?>>Utah</option>
													<option value="VT" <?php if( $_POST['state'] == "VT"){echo 'selected';}?>>Vermont</option>
													<option value="VA" <?php if( $_POST['state'] == "VA"){echo 'selected';}?>>Virginia</option>
													<option value="WA" <?php if( $_POST['state'] == "WA"){echo 'selected';}?>>Washington</option>
													<option value="DC" <?php if( $_POST['state'] == "DC"){echo 'selected';}?>>Washington D.C.</option>
													<option value="WV" <?php if( $_POST['state'] == "WV"){echo 'selected';}?>>West Virginia</option>
													<option value="WI" <?php if( $_POST['state'] == "WI"){echo 'selected';}?>>Wisconsin</option>
													<option value="WY" <?php if( $_POST['state'] == "WY"){echo 'selected';}?>>Wyoming</option>
												</select>

											</div>

											<div class="col-sm-12 col-md-12 col-lg-4">

												<input type="tel" maxlength="5" name="zipcode" id="zipcode" class="w-100" placeholder="zip" required value="<?php if( isset($_POST['zipcode'])){echo $_POST['zipcode'];}?>">

											</div>

										</div>

									</div>

								</div>

								<div class="row phone-cell">

									<div class="col-sm-12 col-md-12 col-lg-3">

										<label for="phone-work"><span class="required">*</span>Cell #:</label>

									</div>

									<div class="col-sm-12 col-md-12 col-lg-9">

										<input type="tel" class="w-33" name="phone" placeholder="XXX-XXX-XXXX" id="phone" value="<?php if( isset($_POST['phone'])){echo $_POST['phone'];}?>" require>

									</div>

								</div>

								<div class="row">

									<div class="col-sm-12 col-md-12 col-lg-3">

										<label for="phone-home">Home #:</label>

									</div>

									<div class="col-sm-12 col-md-12 col-lg-9">

										<input type="tel" class="w-33" name="phone2" placeholder="XXX-XXX-XXXX" id="phone2" value="<?php if( isset($_POST['phone2'])){echo $_POST['phone2'];}?>">

									</div>

								</div>

								<div class="row phone-work">

									<div class="col-sm-12 col-md-12 col-lg-3">

										<label for="phone-work">Work #:</label>

									</div>

									<div class="col-sm-12 col-md-12 col-lg-9">

										<input type="tel" class="w-33" name="phone-work" placeholder="XXX-XXX-XXXX" id="phone-work" value="<?php if( isset($_POST['phone-work'])){echo $_POST['phone-work'];}?>" >

									</div>

								</div>



								<div class="row email">

									<div class="col-sm-12 col-md-12 col-lg-3">

										<label for="email"><span class="required">*</span>Email:</label>

									</div>

									<div class="col-sm-12 col-md-12 col-lg-9">

										<input type="text" class="w-100" name="email" id="email" value="<?php if( isset($_POST['email'])){echo $_POST['email'];}?>" required>

									</div>

								</div>

								<div class="row call-time">

									<div class="col-sm-12 col-md-12 col-lg-3">

										<label for="call-time"><span class="required">*</span>Best time to get in contact:</label>

									</div>

									<div class="col-sm-12 col-md-12 col-lg-9">

										<!-- begin new contact time -->

										<select name="best_time_to_call" class="w-33" id="best_time_to_call" required>

											<option value="">--Select--</option>

											<option value="morning" <?php if( $_POST['contact-time'] == "morning"){echo 'selected';}?>>Morning</option>

											<option value="noon" <?php if( $_POST['contact-time'] == "noon"){echo 'selected';}?>>Noon</option>

											<option value="evening" <?php if( $_POST['contact-time'] == "evening"){echo 'selected';}?>>Evening</option>


											<option value="night" <?php if( $_POST['contact-time'] == "night"){echo 'selected';}?>>Night</option>

										</select>

										<!-- end new contact time -->

									</div>

								</div>

								<div class="row contact-method">

									<div class="col-sm-12 col-md-12 col-lg-3">

										<label for="contact-method"><span class="required">*</span>Preferred method of contact:</label>

									</div>

									<div class="col-sm-12 col-md-12 col-lg-9">


										<select name="contact-method" class="w-33" id="contact-method" required>

											<option value="">--Select--</option>

											<option value="Mail" <?php if( $_POST['contact-method'] == "Mail"){echo 'selected';}?>>Mail</option>

											<option value="Phone" <?php if( $_POST['contact-method'] == "Phone"){echo 'selected';}?>>Phone</option>

											<option value="E-mail" <?php if( $_POST['contact-method'] == "E-mail"){echo 'selected';}?>>E-Mail</option>

										</select>

									</div>

								</div>

								<div class="row owner">

									<div class="col-sm-12 col-md-12 col-lg-3">

										<label for="contact-method"><span class="required">*</span>Is the Insured also the Owner?

											<span class="field-tip">
												<img class="" style="width:15px;height:14px;margin-left:2px;margin-right:2px; padding-bottom:0px;" src="/img/info.png" id="img_insured_ssn">
												<span class="tip-content">Is the person that is going to be insured going to own the policy?</span>
											</span>

										</label>

									</div>

									<div class="col-sm-12 col-md-12 col-lg-9">

										<label for="owner">Yes</label>
										<input <?php if( $_POST['owner'] == "yes"){echo 'checked';}?> type="radio" name="owner" id="owner-yes" tabindex="2" value="yes" required>

										<label for="owner">No</label>
										<input <?php if( $_POST['owner'] == "no"){echo 'checked';}?> type="radio" name="owner" id="owner-no" tabindex="3" value="no">

									</div>

								</div>

								<div class="row gov-id">

									<div class="col-sm-12 col-md-12 col-lg-3">

										<label for="gov-id"><span class="required">*</span>Government ID:</label>

									</div>

									<div class="col-sm-12 col-md-12 col-lg-9">

										<select data-val="true" name="gov-id" class="w-33" id="gov-id" required>

											<option value="">--Select--</option>

											<option value="Driver's License" <?php if( $_POST['gov-id'] == "Driver's License"){echo 'selected';}?>>Driver's License</option>

											<option value="State ID" <?php if( $_POST['gov-id'] == "State ID"){echo 'selected';}?>>State ID</option>

											<option value="Permanent Resident Card" <?php if( $_POST['gov-id'] == "Permanent Resident Card"){echo 'selected';}?>>Permanent Resident Card</option>

											<option value="None" <?php if( $_POST['gov-id'] == "None"){echo 'selected';}?>>None</option>

										</select>

									</div>

								</div>

								<div class="row DriversLicense__c">

									<div class="col-sm-12 col-md-12 col-lg-3">

										<label for="DriversLicense__c"><span class="required">*</span>Government ID #:<span class="field-tip">

											<img class="" style="width:15px;height:14px;margin-left:2px;margin-right:2px; padding-bottom:0px;" src="/img/info.png" id="img_insured_ssn">

											<span class="tip-content">Format has to match exactly, if your licesnse has dashes then type in the dashes.
											If you're still having problems give us a call at 1 (800)303-5153</span>

										</span>

									</label>



								</div>

								<div class="col-sm-12 col-md-12 col-lg-9">

									<input maxlength="49" class="w-33" type="text" data-val="true" name="DriversLicense__c" id="DriversLicense__c" required>

								</div>

							</div>

							<div class="row sale-site">

								<div class="col-sm-12">

									<h3>Site of Sale <span class="field-tip">
										<img class="" style="width:15px;height:14px;margin-left:2px;margin-right:2px; padding-bottom:0px;" src="/img/info.png" id="img_insured_ssn">
										<span class="tip-content">Where are you are completing this application?</span>
									</span></h3>

								</div>

								<div class="col-sm-12">

									<div class="row">

										<div class="col-sm-12 col-md-12 col-lg-3">

											<label for="sale-city"><span class="required">*</span>City:</label>   

										</div>

										<div class="col-sm-12 col-md-12 col-lg-9">

											<input type="text" class="w-100" name="sale-city" id="sale-city" value="<?php if( isset($_POST['sale-city'])){echo $_POST['sale-city'];}?>" required>

										</div>

									</div>

									<div class="row">

										<div class="col-sm-12 col-md-12 col-lg-3">

											<label for="sale-state"><span class="required">*</span>State:</label>   

										</div>

										<div class="col-sm-12 col-md-12 col-lg-9">

											<select name="sale-state2" id="sale-state2" required>
												<option value="">--Select--</option>
												<option value="AL" <?php if( $_POST['sale-state2'] == "AL"){echo 'selected';}?>>Alabama</option>
												<option value="AK" <?php if( $_POST['sale-state2'] == "AK"){echo 'selected';}?>>Alaska</option>
												<option value="AZ" <?php if( $_POST['sale-state2'] == "AL"){echo 'selected';}?>>Arizona</option>
												<option value="AR" <?php if( $_POST['sale-state2'] == "AR"){echo 'selected';}?>>Arkansas</option>
												<option value="CA" <?php if( $_POST['sale-state2'] == "CA"){echo 'selected';}?>>California</option>
												<option value="CO" <?php if( $_POST['sale-state2'] == "CO"){echo 'selected';}?>>Colorado</option>
												<option value="CT" <?php if( $_POST['sale-state2'] == "CT"){echo 'selected';}?>>Connecticut</option>
												<option value="DE" <?php if( $_POST['sale-state2'] == "DE"){echo 'selected';}?>>Delaware</option>
												<option value="FL" <?php if( $_POST['sale-state2'] == "FL"){echo 'selected';}?>>Florida</option>
												<option value="GA" <?php if( $_POST['sale-state2'] == "GA"){echo 'selected';}?>>Georgia</option>
												<option value="HI" <?php if( $_POST['sale-state2'] == "HI"){echo 'selected';}?>>Hawaii</option>
												<option value="ID" <?php if( $_POST['sale-state2'] == "ID"){echo 'selected';}?>>Idaho</option>
												<option value="IL" <?php if( $_POST['sale-state2'] == "IL"){echo 'selected';}?>>Illinois</option>
												<option value="IN" <?php if( $_POST['sale-state2'] == "IN"){echo 'selected';}?>>Indiana</option>
												<option value="IA" <?php if( $_POST['sale-state2'] == "IA"){echo 'selected';}?>>Iowa</option>
												<option value="KS" <?php if( $_POST['sale-state2'] == "KS"){echo 'selected';}?>>Kansas</option>
												<option value="KY" <?php if( $_POST['sale-state2'] == "KY"){echo 'selected';}?>>Kentucky</option>
												<option value="LA" <?php if( $_POST['sale-state2'] == "LA"){echo 'selected';}?>>Louisiana</option>
												<option value="ME" <?php if( $_POST['sale-state2'] == "ME"){echo 'selected';}?>>Maine</option>
												<option value="MD" <?php if( $_POST['sale-state2'] == "MD"){echo 'selected';}?>>Maryland</option>
												<option value="MA" <?php if( $_POST['sale-state2'] == "MA"){echo 'selected';}?>>Massachusetts</option>
												<option value="MI" <?php if( $_POST['sale-state2'] == "MI"){echo 'selected';}?>>Michigan</option>
												<option value="MN" <?php if( $_POST['sale-state2'] == "MN"){echo 'selected';}?>>Minnesota</option>
												<option value="MS" <?php if( $_POST['sale-state2'] == "MS"){echo 'selected';}?>>Mississippi</option>
												<option value="MO" <?php if( $_POST['sale-state2'] == "MO"){echo 'selected';}?>>Missouri</option>
												<option value="MT" <?php if( $_POST['sale-state2'] == "MT"){echo 'selected';}?>>Montana</option>
												<option value="NE" <?php if( $_POST['sale-state2'] == "NE"){echo 'selected';}?>>Nebraska</option>
												<option value="NV" <?php if( $_POST['sale-state2'] == "NV"){echo 'selected';}?>>Nevada</option>
												<option value="NH" <?php if( $_POST['sale-state2'] == "NH"){echo 'selected';}?>>New Hampshire</option>
												<option value="NJ" <?php if( $_POST['sale-state2'] == "NJ"){echo 'selected';}?>>New Jersey</option>
												<option value="NM" <?php if( $_POST['sale-state2'] == "NM"){echo 'selected';}?>>New Mexico</option>
												<option value="NY" <?php if( $_POST['sale-state2'] == "NY"){echo 'selected';}?>>New York</option>
												<option value="NC" <?php if( $_POST['sale-state2'] == "NC"){echo 'selected';}?>>North Carolina</option>
												<option value="ND" <?php if( $_POST['sale-state2'] == "ND"){echo 'selected';}?>>North Dakota</option>
												<option value="OH" <?php if( $_POST['sale-state2'] == "OH"){echo 'selected';}?>>Ohio</option>
												<option value="OK" <?php if( $_POST['sale-state2'] == "OK"){echo 'selected';}?>>Oklahoma</option>
												<option value="OR" <?php if( $_POST['sale-state2'] == "OR"){echo 'selected';}?>>Oregon</option>
												<option value="PA" <?php if( $_POST['sale-state2'] == "PA"){echo 'selected';}?>>Pennsylvania</option>
												<option value="RI" <?php if( $_POST['sale-state2'] == "RI"){echo 'selected';}?>>Rhode Island</option>
												<option value="SC" <?php if( $_POST['sale-state2'] == "SC"){echo 'selected';}?>>South Carolina</option>
												<option value="SD" <?php if( $_POST['sale-state2'] == "SD"){echo 'selected';}?>>South Dakota</option>
												<option value="TN" <?php if( $_POST['sale-state2'] == "TN"){echo 'selected';}?>>Tennessee</option>
												<option value="TX" <?php if( $_POST['sale-state2'] == "TX"){echo 'selected';}?>>Texas</option>
												<option value="UT" <?php if( $_POST['sale-state2'] == "UT"){echo 'selected';}?>>Utah</option>
												<option value="VT" <?php if( $_POST['sale-state2'] == "VT"){echo 'selected';}?>>Vermont</option>
												<option value="VA" <?php if( $_POST['sale-state2'] == "VA"){echo 'selected';}?>>Virginia</option>
												<option value="WA" <?php if( $_POST['sale-state2'] == "WA"){echo 'selected';}?>>Washington</option>
												<option value="DC" <?php if( $_POST['sale-state2'] == "DC"){echo 'selected';}?>>Washington D.C.</option>
												<option value="WV" <?php if( $_POST['sale-state2'] == "WV"){echo 'selected';}?>>West Virginia</option>
												<option value="WI" <?php if( $_POST['sale-state2'] == "WI"){echo 'selected';}?>>Wisconsin</option>
												<option value="WY" <?php if( $_POST['sale-state2'] == "WY"){echo 'selected';}?>>Wyoming</option>
											</select>

										</div>

									</div>

								</div>  




								<div class="col-sm-12 col-md-12 col-lg-6">

									<span class="custom-botton">     
										<input type="submit" value="Submit" class="custom-button" id="ysQuote1Submit2">
									</span>

								</div>

							</form>

						</div>

					</div>
					<!-- Details Ends -->



				</div>
				<!-- Container Ends -->


			</div>
		</section>


		<!-- About Section Starts -->
		<section id="about" class="about quote-region double-diagonal pt-5" style="<?php if (count($errors) > 0) { echo 'display:none;'; } ?>">

			<!-- Container Starts -->
			<div class="container double-diagonal">

				<!-- About Content Starts -->
				<div class="row ">

					<div class="col-sm-12 col-md-12">

						<form id="ysQuote1" onsubmit="event.preventDefault(); return getlifeinsurancequote();">

							<div class="row">

								<div class="col-sm-12 col-md-6 col-lg-6 pb-0 pb-lg-3">
									<div>

										<div> <label for="state">State:</label></div>

										<select data-val="true" class="w-100" name="statequote" id="statequote" required>
											<option value="">--Select--</option>
											<option value="AL">Alabama</option>
											<option value="AK">Alaska</option>
											<option value="AZ">Arizona</option>
											<option value="AR">Arkansas</option>
											<option value="CA">California</option>
											<option value="CO">Colorado</option>
											<option value="CT">Connecticut</option>
											<option value="DE">Delaware</option>
											<option value="FL">Florida</option>
											<option value="GA">Georgia</option>
											<option value="HI">Hawaii</option>
											<option value="ID">Idaho</option>
											<option value="IL">Illinois</option>
											<option value="IN">Indiana</option>
											<option value="IA">Iowa</option>
											<option value="KS">Kansas</option>
											<option value="KY">Kentucky</option>
											<option value="LA">Louisiana</option>
											<option value="ME">Maine</option>
											<option value="MD">Maryland</option>
											<option value="MA">Massachusetts</option>
											<option value="MI">Michigan</option>
											<option value="MN">Minnesota</option>
											<option value="MS">Mississippi</option>
											<option value="MO">Missouri</option>
											<option value="MT">Montana</option>
											<option value="NE">Nebraska</option>
											<option value="NV">Nevada</option>
											<option value="NH">New Hampshire</option>
											<option value="NJ">New Jersey</option>
											<option value="NM">New Mexico</option>
											<option value="NY">New York</option>
											<option value="NC">North Carolina</option>
											<option value="ND">North Dakota</option>
											<option value="OH">Ohio</option>
											<option value="OK">Oklahoma</option>
											<option value="OR">Oregon</option>
											<option value="PA">Pennsylvania</option>
											<option value="RI">Rhode Island</option>
											<option value="SC">South Carolina</option>
											<option value="SD">South Dakota</option>
											<option value="TN">Tennessee</option>
											<option value="TX">Texas</option>
											<option value="UT">Utah</option>
											<option value="VT">Vermont</option>
											<option value="VA">Virginia</option>
											<option value="WA">Washington</option>
											<option value="DC">Washington D.C.</option>
											<option value="WV">West Virginia</option>
											<option value="WI">Wisconsin</option>
											<option value="WY">Wyoming</option>
										</select>
										<hr class="d-xs-none d-lg-block">
									</div>

									<div>

										<div> <label for="gender">Gender:</label></div>

										<label for="Male">Male</label>
										<input type="radio" name="gender" id="gendermale" tabindex="2" value="Male" required>

										<label for="Female">Female</label>
										<input type="radio" name="gender" id="genderfemale" tabindex="3" value="Female">
										<hr class="d-xs-none d-lg-block">
									</div>

									<div>

										<div><label for="coverageLength">Length of Coverage:</label></div>

										<select data-val="true" class="w-100" name="coverageLength" id="coverageLength" required>
											<option value="">--Select--</option>
											<option value="1 Year Term">1 Year Term</option>
											<option value="10 Year Term">10 Year Term</option>
											<option value="15 Year Term">15 Year Term</option>
											<option value="20 Year Term">20 Year Term</option>
											<option value="25 Year Term">25 Year Term</option>
											<option value="30 Year Term">30 Year Term</option>
											<option value="35 Year Term">35 Year Term</option>
										</select>
										<hr class="d-xs-none d-lg-block">
									</div>

									<div>

										<div> <label for="height">Height:</label></div>

										<select data-val="true" name="heightFeet" id="heightFeet" required>
											<option value="">----</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
										</select>
										<label for="heightFeet">ft</label>

										<select data-val="true" name="heightInches" id="heightInches" required>
											<option value="">----</option>
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
										</select>
										<label for="heightInches">in</label>
										<h class="d-xs-none d-lg-block">
										</div>

									</div>

									<div class="col-sm-12 col-md-6 col-lg-6">

										<div>

											<div><label for="date-of-birth">Date of Birth:</label></div>

											<select data-val="true" name="dobMoth" id="dobMonth" class="w-33" required>

												<option value="">--Select--</option>
												<option value="01">January</option>
												<option value="02">February</option>
												<option value="03">March</option>
												<option value="04">April</option>
												<option value="05">May</option>
												<option value="06">June</option>
												<option value="07">July</option>
												<option value="08">August</option>
												<option value="09">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>

											</select>

											<select  name="dobDay" id="dobDay" class="w-33" required>
												<option value="">--Select--</option>
												<option value="01">1</option>
												<option value="02">2</option>
												<option value="03">3</option>
												<option value="04">4</option>
												<option value="05">5</option>
												<option value="06">6</option>
												<option value="07">7</option>
												<option value="08">8</option>
												<option value="09">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												<option value="13">13</option>
												<option value="14">14</option>
												<option value="15">15</option>
												<option value="16">16</option>
												<option value="17">17</option>
												<option value="18">18</option>
												<option value="19">19</option>
												<option value="20">20</option>
												<option value="21">21</option>
												<option value="22">22</option>
												<option value="23">23</option>
												<option value="24">24</option>
												<option value="25">25</option>
												<option value="26">26</option>
												<option value="27">27</option>
												<option value="28">28</option>
												<option value="29">29</option>
												<option value="30">30</option>
												<option value="31">31</option>
											</select>

											<select  name="dobYear" id="dobYear" class="w-33" required>
												<option value="">--Select--</option>
												<option value="2000">2000</option>
												<option value="1999">1999</option>
												<option value="1998">1998</option>
												<option value="1997">1997</option>
												<option value="1996">1996</option>
												<option value="1995">1995</option>
												<option value="1994">1994</option>
												<option value="1993">1993</option>
												<option value="1992">1992</option>
												<option value="1991">1991</option>
												<option value="1990">1990</option>
												<option value="1989">1989</option>
												<option value="1988">1988</option>
												<option value="1987">1987</option>
												<option value="1986">1986</option>
												<option value="1985">1985</option>
												<option value="1984">1984</option>
												<option value="1983">1983</option>
												<option value="1982">1982</option>
												<option value="1981">1981</option>
												<option value="1980">1980</option>
												<option value="1979">1979</option>
												<option value="1978">1978</option>
												<option value="1977">1977</option>
												<option value="1976">1976</option>
												<option value="1975">1975</option>
												<option value="1974">1974</option>
												<option value="1973">1973</option>
												<option value="1972">1972</option>
												<option value="1971">1971</option>
												<option value="1970">1970</option>
												<option value="1969">1969</option>
												<option value="1968">1968</option>
												<option value="1967">1967</option>
												<option value="1966">1966</option>
												<option value="1965">1965</option>
												<option value="1964">1964</option>
												<option value="1963">1963</option>
												<option value="1962">1962</option>
												<option value="1961">1961</option>
												<option value="1960">1960</option>
												<option value="1959">1959</option>
												<option value="1958">1958</option>
												<option value="1957">1957</option>
												<option value="1956">1956</option>
												<option value="1955">1955</option>
												<option value="1954">1954</option>
												<option value="1953">1953</option>
												<option value="1952">1952</option>
												<option value="1951">1951</option>
												<option value="1950">1950</option>
												<option value="1949">1949</option>
												<option value="1948">1948</option>
												<option value="1947">1947</option>
												<option value="1946">1946</option>
												<option value="1945">1945</option>
												<option value="1944">1944</option>
												<option value="1943">1943</option>
												<option value="1942">1942</option>
												<option value="1941">1941</option>
												<option value="1940">1940</option>
												<option value="1939">1939</option>
												<option value="1938">1938</option>
												<option value="1937">1937</option>
												<option value="1936">1936</option>
												<option value="1935">1935</option>
												<option value="1934">1934</option>
												<option value="1933">1933</option>
												<option value="1932">1932</option>
												<option value="1931">1931</option>
												<option value="1930">1930</option>
												<option value="1929">1929</option>
												<option value="1928">1928</option>
												<option value="1927">1927</option>
												<option value="1926">1926</option>
												<option value="1925">1925</option>
												<option value="1924">1924</option>
												<option value="1923">1923</option>
												<option value="1922">1922</option>
												<option value="1921">1921</option>
												<option value="1920">1920</option>
												<option value="1919">1919</option>
												<option value="1918">1918</option>
												<option value="1917">1917</option>
												<option value="1916">1916</option>
												<option value="1915">1915</option>
												<option value="1914">1914</option>
												<option value="1913">1913</option>
												<option value="1912">1912</option>
												<option value="1911">1911</option>
												<option value="1910">1910</option>
											</select>
											<hr class="d-xs-none d-lg-block">
										</div>

										<div>

											<div><label for="tobacco">Smoker/ Tobacco:</label></div>

											<label for="yes">Yes</label>
											<input type="radio" name="tobacco" id="tobaccoyes" tabindex="2" value="Yes" required>

											<label for="no">No</label>
											<input type="radio" name="tobacco" id="tobaccono" tabindex="3" value="No">
											<hr class="d-xs-none d-lg-block">
										</div>

										<div>

											<div> <label for="coverageAmount">Amount of Coverage ($):</label></div>

											<input type="number" min="100000" max="10000000" class="w-100" name="coverageAmount" id="coverageAmount" value=""
											oninvalid="this.setCustomValidity('If you\'re looking for coverage under $100,000 or over $10,000,000 please directly contact us')"
											oninput="this.setCustomValidity('')"
											required>
											<hr class="d-xs-none d-lg-block">
										</div>

										<div>
											<div><label for="weight">Weight:</label></div>
											<input onkeypress="return filteralpha(event);" type="text" maxlength="3" class="w-100" name="weight" id="weight" value="" required>
											<hr class="d-xs-none d-lg-block">
										</div>



									</div>

									<div class="col-sm-12 col-md-12 col-lg-6">

										<span class="custom-botton" >   
											<input type="submit" value="Get Your Quote" class="custom-button" id="ysQuote1Submit" />
											<div id="quotebuttonarea" tabindex="0"></div>
										</span>

									</div>

								</div>

							</form>

						</div>

					</div>
					<!-- Details Ends -->

					<br id="quoteJump">
					<div id="loadingquote" name="loadingquote" style="display:none" >
						<h2 style="font-size:1.4em;" class="text-center">
							<span class="dot-container">
								<span class="dots"></span>
								<span class="dots"></span>
								<span class="dots"></span>
								<span class="dots"></span>
								<span class="dots"></span>
								<span class="dots"></span>
								<span class="dots"></span>
								<span class="dots"></span>
								<span class="dots"></span>
								<span class="dots"></span>
							</span> 
							<b><i>&nbsp;Now finding you the best life insurance quote possible...</i></b>
						</h2></div>

						<!-- Quote Result Begins -->
						<div class="row quote-results">



							<div id="quotefrag" class="col-sm-12">



								<!-- Quote Result Ends -->
							</div>

						</div>


					</div>
					<!-- Container Ends -->

				</section>





			</div>
			<!-- Wrapper Ends -->

			<!-- Main JS Initialization File -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

			<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.inputmask.bundle.js"></script>

			<script>
				
				jQuery("input#firstName, input#lastName").on({
					keydown: function(e) {
						if (e.which === 32)
							return false;
					},
					change: function() {
						this.value = this.value.replace(/\s/g, "");
					}
				});

			</script>

			<script>

//Quote form input masks and disables the submit button
jQuery(document).ready(function () {

	jQuery('#quote-form-2').submit(function(){
		jQuery(this).children('input[type=submit]').prop('disabled', true);
	});

		jQuery('#phone').inputmask({"mask": "(999) 999-9999"}); //specifying options
		
		jQuery('#phone2').inputmask({"mask": "(999) 999-9999"}); //specifying options

      jQuery('#phone-work').inputmask({"mask": "(999) 999-9999"}); //specifying options

      jQuery('#phone-cell').inputmask({"mask": "(999) 999-9999"}); //specifying options

      jQuery('#zipcode').inputmask({"mask": "99999[-9999]"},{greedy:false}); //specifying options

      jQuery("#email").inputmask({
      	regex: "^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]+$",
      	placeholder: ""
      });

        jQuery("#ssn").inputmask("999-99-9999",{placeholder:" ", clearMaskOnLostFocus: true }); //default

    });

</script>

<?php get_footer(); ?>
