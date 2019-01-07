<?php
/**
 * Template Name: Calculator
 *
 * Life insurance calculator
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}



get_header();

?> 
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/form.css" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery.steps.css" />
<style>
<style>
.calchead {color:#ff0086;background-color:#000000;font-weight:bold;padding:5px;}
.crow {margin-top:20px;}
#totalneeded {font-size:3.5em;text-align:center;}
</style>
<section class="img-header img-header-quote1">

				<!-- Main Heading Starts -->
				<div class="text-center top-text">

					<h1 class="text-white">Free life insurance calculator</h1>

				</div>
				<!-- Main Heading Ends -->
		
			</section>
					
			<!-- About Section Starts -->
			<section id="rowdetails" class="about quote-region double-diagonal pt-5">

				<!-- Container Starts -->
				<div class="container pt-5">
					
					<form>
					 <div class="row">
						
						<div class="col-md-12">
						
							<style>
							.calchead {color:#ff0086;font-weight:bold;font-size:1.2em;}
							.calcheadbg {background-color:#000000;padding:5px;}
							.crow {margin-top:20px;}
							.bigheader{font-size:1.5em;}
							</style>
							
							
							
							
							<div id="life-insurance-calculator-steps">
								<h3>Annual Salary</h3>
								<section>
									
										
										<div class="row">
											<div class="col-md-12 text-white calcheadbg">
											Add up your salary. Calculate the number of years you think your family will need your salary. (5 to 10 years is typical)
											</div>
										</div>
										<div class="row crow">
											<div class="col-md-6">
											Annual Salary	
											</div>
											<div class="col-md-6">
											<input type="text" class="form-control" id="salary" name="salary" maxlength="25">
											</div>
										</div>
										<div class="row crow">
											<div class="col-md-6">
											Years of life insurance needed
											</div>
											<div class="col-md-6">
											<input type="number" class="form-control" id="yearsofcoverage" name="yearsofcoverage" maxlength="25">
											</div>
										</div>
										
										<div class="row crow">
											<div class="col-md-6">
											
											</div>
											<div class="col-md-6">
											Total Life Insurance Needs For My Salary: <div id="total1" name="total1"></div>
											</div>
										</div>
									
									
								</section>
								<h3>Debts</h3>
								<section>
										<div class="row">
											<div class="col-md-12 text-white calcheadbg">
											<span class="calchead">2.</span>  Add up your debts. Include student loans, Auto Loans, credit cards and mortgage.
											</div>
										</div>
										 
										<div class="row crow">
											<div class="col-md-6">
											Student Loans
											</div>
											<div class="col-md-6">
											<input type="text" class="form-control" id="studentloans" name="studentloans" maxlength="25">
											</div>
										</div>
										<div class="row crow">
											<div class="col-md-6">
											Auto Loans
											</div>
											<div class="col-md-6">
											<input type="text" class="form-control" id="autoloans" name="autoloans" maxlength="25">
											</div>
										</div>
										
										<div class="row crow">
											<div class="col-md-6">
											Credit Cards
											</div>
											<div class="col-md-6">
											<input type="text" class="form-control" id="creditcards" name="creditcards" maxlength="25">
											</div>
										</div>
											
										<div class="row crow">
											<div class="col-md-6">
											Mortgage
											</div>
											<div class="col-md-6">
											<input type="text" class="form-control" id="mortgage" name="mortgage" maxlength="25">
											</div>
										</div>
											
										<div class="row crow">
											<div class="col-md-6">
											Other
											</div>
											<div class="col-md-6">
											<input type="text" class="form-control" id="othercost" name="othercost" maxlength="25">
											</div>
										</div>	
										<div class="row crow">
											<div class="col-md-6">
											
											</div>
											<div class="col-md-6">
											Total Life Insurance Needs For My Debt: <div id="total2" name="total2"></div>
											</div>
										</div>
								</section>
								<h3>Responsibilities</h3>
								<section>
										<div class="row">
											<div class="col-md-12 text-white calcheadbg">
											<span class="calchead">3.</span> Add up your family responsibilities. If you’re a stay-at-home parent, include the cost of replacing your responsibilities like child care.  Consider future needs like college tuitiion and funeral costs.
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
											Monthly daycare Expense by child
											</div>
											<div class="col-md-6">
											<input type="text" class="form-control" id="daycareexpenses" name="daycareexpenses" maxlength="25">
											</div>
										</div>	
										
										<div class="row crow">
											<div class="col-md-6">
											Number of months of daycare expenses remaining <span style="font-size: 0.65em !important;">(ex. 2 year old will require daycare for 3 additional years (36 months). A 1 year old would require 4 additional years (48 months).</span>
											</div>
											<div class="col-md-6">
											<input type="number" class="form-control" id="daycareremaining" name="daycareremaining" maxlength="25">
											</div>
										</div>	
										
										<div class="row">
											<div class="col-md-6">
											Future Children's Tuition
											</div>
											<div class="col-md-6">
											<input type="text" class="form-control" id="futuretuition" name="futuretuition" maxlength="25">
											</div>
										</div>	
										
										<div class="row crow">
											<div class="col-md-6">
											Funeral Costs
											</div>
											<div class="col-md-6">
											<input type="text" class="form-control" id="funeralcosts" name="funeralcosts" maxlength="25">
											<br>
											<span style="font-size:.9em;">Total Life Insurance Needs For Responsibilities: <div id="total3" name="total3"></div></span>
											</div>
										</div>	
										
										
								</section>
								<h3>Assets</h3>
								<section>
									<div class="row">
										<div class="col-md-12 text-white calcheadbg">
										<span class="calchead">4.</span>  Subtract your liquid assets. Add up your savings, existing college funds and other life insurance policies. Deduct that amount from your total.
										</div>
									</div>
									 
									<div class="row crow">
										<div class="col-md-6">
										Savings Account
										</div>
										<div class="col-md-6">
										<input type="text" class="form-control" id="savingsaccount" name="savingsaccount" maxlength="25">
										</div>
									</div>
									<div class="row crow">
										<div class="col-md-6">
										College Tuition Fund
										</div>
										<div class="col-md-6">
										<input type="text" class="form-control" id="collegetuition" name="collegetuition" maxlength="25">
										</div>
									</div>
										
									<div class="row crow">
										<div class="col-md-6">
										Brokerage Accounts
										</div>
										<div class="col-md-6">
										<input type="text" class="form-control" id="brokerageaccounts" name="brokerageaccounts" maxlength="25">
										</div>
									</div>
									
									<div class="row crow">
										<div class="col-md-6">
											Other Life Insurance Policies
										</div>
										<div class="col-md-6">
										<input type="text" class="form-control" id="otherinsurance" name="otherinsurance" maxlength="25">
										</div>
									</div>
									
									<div class="row crow">
										<div class="col-md-6">
											Other Assets
										</div>
										<div class="col-md-6">
										<input type="text" class="form-control" id="otherassets" name="otherassets" maxlength="25">
										<br>
										Total Assets To Cover My Beneficiaries: <div id="total4" name="total4"></div>
										</div>
									</div>
									
								</section>
								<h3>Total</h3>
								<section>
									<br>
									<div class="row">
										<div class="col-md-12 calchead text-center bigheader">
										<i>Total Amount of Life Insurance Needed</i>
										</div>
									</div>
									 
									<div class="row crow">
										<div class="col-md-12">
											<script>
											
											function gotolifequote() {
												
												
												var str = document.getElementById('totalneeded').innerHTML;
												var res = str.split(".");
												
												var str2 = res[0];
												var res2 = str2.replace("$", "");
												var res3 = res2.replace(",", "");
												var res4 = res3.replace(",", "");
												var res5 = res4.replace(",", "");
												var res6 = res5.replace(",", "");
												var res7 = res6.replace(",", "");
												
												document.location.href="/get-a-life-insurance-quote/?coverageAmount="+res7;
											}
											
											</script>
											<div id="totalneeded">$0.00</div>
											<br>
											<div style="text-align:center;">
											<a href="#" onclick="gotolifequote();return false">Click Here To Get A Quote Based On Your Insurance Needs Above.</a>
											</div>
										</div>
									</div>
								
								</section>
						
						
									
							
						</div>
						
						
						
						
				
			   </form>
				
				</div>
			</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.inputmask.bundle.js"></script>				
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.steps.min.js"></script>				
<script>
			$("#life-insurance-calculator-steps").steps({
				headerTag: "h3",
				bodyTag: "section",
				transitionEffect: "slideLeft",
				autoFocus: true
			});
		/* <a href="#" onclick="calctotal(); return false;">calc</a> */
			function calctotal() {
				
				
				
				var salary = parseInt($('#salary').inputmask('unmaskedvalue'));
				var yearsofcoverage = parseInt($('#yearsofcoverage').inputmask('unmaskedvalue'));
			
				var studentloans = parseInt($('#studentloans').inputmask('unmaskedvalue'));
				var autoloans = parseInt($('#autoloans').inputmask('unmaskedvalue'));
				var creditcards = parseInt($('#creditcards').inputmask('unmaskedvalue'));
				var mortgage = parseInt($('#mortgage').inputmask('unmaskedvalue'));
				var othercost = parseInt($('#othercost').inputmask('unmaskedvalue'));
				
				
				var daycareexpenses = parseInt($('#daycareexpenses').inputmask('unmaskedvalue'));
				var daycareremaining = parseInt($('#daycareremaining').inputmask('unmaskedvalue'));
				var futuretuition = parseInt($('#futuretuition').inputmask('unmaskedvalue'));
				var funeralcosts = parseInt($('#funeralcosts').inputmask('unmaskedvalue'));
				
				
				var savingsaccount = parseInt($('#savingsaccount').inputmask('unmaskedvalue'));
				var collegetuition = parseInt($('#collegetuition').inputmask('unmaskedvalue'));
				var brokerageaccounts = parseInt($('#brokerageaccounts').inputmask('unmaskedvalue'));
				var otherinsurance = parseInt($('#otherinsurance').inputmask('unmaskedvalue'));
				var otherassets = parseInt($('#otherassets').inputmask('unmaskedvalue'));
		
				if(isNaN(salary)) { salary = 0; } 
				if(isNaN(yearsofcoverage)) { yearsofcoverage = 0; } 
				if(isNaN(studentloans)) { studentloans = 0; } 
				if(isNaN(autoloans)) { autoloans = 0; } 
				if(isNaN(creditcards)) { creditcards = 0; } 
				if(isNaN(mortgage)) { mortgage = 0; } 
				if(isNaN(othercost)) { othercost = 0; } 
				if(isNaN(daycareexpenses)) { daycareexpenses = 0; } 
				if(isNaN(daycareremaining)) { daycareremaining = 0; } 
				if(isNaN(futuretuition)) { futuretuition = 0; } 
				if(isNaN(funeralcosts)) { funeralcosts = 0; } 
				if(isNaN(savingsaccount)) { savingsaccount = 0; } 
				if(isNaN(collegetuition)) { collegetuition = 0; } 
				if(isNaN(brokerageaccounts)) { brokerageaccounts = 0; } 
				if(isNaN(otherinsurance)) { otherinsurance = 0; } 
				if(isNaN(otherassets)) { otherassets = 0; } 
		
		
				var ttl1 = (salary * yearsofcoverage);
				
			
					
				 $('#total1').text(formatCurrency(ttl1)); 
			
				var ttl2 = (studentloans + autoloans + creditcards + mortgage + othercost);
				
				$('#total2').text(formatCurrency(ttl2)); 
			
			
				var ttl3 = ( (futuretuition + funeralcosts) + (daycareexpenses * daycareremaining) );
				
				 $('#total3').text(formatCurrency(ttl3)); 
				
				var ttl4 = (savingsaccount + collegetuition + brokerageaccounts + otherinsurance + otherassets);
				
				 $('#total4').text(formatCurrency(ttl4)); 
								
				
				var ttls1 = (ttl1 + ttl2 + ttl3);
	
				if (ttls1 > ttl4) {
						
					
				
					var ttl5 = ( ttls1 - ttl4 );
				
					
					if(ttl5 > 0) {
				
						$('#totalneeded').text(formatCurrency(ttl5));
					}
				
					
				}
				
				
				
			}
			
			$( "#salary" ).focusout(function() { calctotal(); return false;});		
			$( "#yearsofcoverage" ).focusout(function() { calctotal(); return false;});
			$( "#studentloans" ).focusout(function() { calctotal(); return false;});
			$( "#autoloans" ).focusout(function() { calctotal(); return false;});
			$( "#creditcards" ).focusout(function() { calctotal(); return false;});
			$( "#mortgage" ).focusout(function() { calctotal(); return false;});
			$( "#othercost" ).focusout(function() { calctotal(); return false;});
			$( "#daycareexpenses" ).focusout(function() { calctotal(); return false;});
			$( "#daycareremaining" ).focusout(function() { calctotal(); return false;});
			$( "#futuretuition" ).focusout(function() { calctotal(); return false;});
			$( "#funeralcosts" ).focusout(function() { calctotal(); return false;});
			$( "#savingsaccount" ).focusout(function() { calctotal(); return false;});
			$( "#collegetuition" ).focusout(function() { calctotal(); return false;});
			$( "#brokerageaccounts" ).focusout(function() { calctotal(); return false;});
			$( "#otherinsurance" ).focusout(function() { calctotal(); return false;});
			$( "#otherassets" ).focusout(function() { calctotal(); return false;});

			
			 $('#salary').inputmask({ alias: 'currency', digits: 2, rightAlign: 0, clearMaskOnLostFocus: true });
			 $('#studentloans').inputmask({ alias: 'currency', digits: 2, rightAlign: 0, clearMaskOnLostFocus: true });
			 $('#autoloans').inputmask({ alias: 'currency', digits: 2, rightAlign: 0, clearMaskOnLostFocus: true });
			 $('#creditcards').inputmask({ alias: 'currency', digits: 2, rightAlign: 0, clearMaskOnLostFocus: true });
			 $('#mortgage').inputmask({ alias: 'currency', digits: 2, rightAlign: 0, clearMaskOnLostFocus: true });
			 $('#othercost').inputmask({ alias: 'currency', digits: 2, rightAlign: 0, clearMaskOnLostFocus: true });
			 $('#daycareexpenses').inputmask({ alias: 'currency', digits: 2, rightAlign: 0, clearMaskOnLostFocus: true });
			 $('#futuretuition').inputmask({ alias: 'currency', digits: 2, rightAlign: 0, clearMaskOnLostFocus: true });
			 $('#funeralcosts').inputmask({ alias: 'currency', digits: 2, rightAlign: 0, clearMaskOnLostFocus: true });
			 $('#savingsaccount').inputmask({ alias: 'currency', digits: 2, rightAlign: 0, clearMaskOnLostFocus: true });
			 $('#collegetuition').inputmask({ alias: 'currency', digits: 2, rightAlign: 0, clearMaskOnLostFocus: true });
			 $('#brokerageaccounts').inputmask({ alias: 'currency', digits: 2, rightAlign: 0, clearMaskOnLostFocus: true });
			 $('#otherinsurance').inputmask({ alias: 'currency', digits: 2, rightAlign: 0, clearMaskOnLostFocus: true });
			 $('#otherassets').inputmask({ alias: 'currency', digits: 2, rightAlign: 0, clearMaskOnLostFocus: true });
			 
			function formatCurrency(total) {
				var neg = false;
				if(total < 0) {
					neg = true;
					total = Math.abs(total);
				}
				return (neg ? "-$" : '$') + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
			}
			
			
		</script>
<?php

while ( have_posts() ) : the_post();
	get_template_part( 'loop-templates/content', 'empty' );
endwhile;

get_footer();
