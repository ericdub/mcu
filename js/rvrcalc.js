
function numerify(text){
  period = 0
  for (i=0; i< text.length; i++) {
    check = parseInt(text.charAt(i))
    check = check.toString()

    if (((check) == 'NaN')){
	if (text.charAt(i) == '.') {
	  if (period == 1) {
	    text = text.substring(0,i) + text.substring((i+1),(text.length))
	    period = 1
          }
	  continue
	}
	if (i==0) {
	  text = text.substring(1,(text.length))
	  continue
	}
	if (i==(text.length-1))	{
	  text = text.substring(0,(text.length-1))
	  continue
	}
	text = text.substring(0,i) + text.substring((i+1),(text.length))
    }
  }
  document.Calculator.Results.value = parseFloat(text)
  return(parseFloat(text))
}

 function Dollar_It(text) {
    dollar = text.toString();
    dec_place = dollar.indexOf(".", 0);
    if (dec_place == -1) {
      dollar = dollar + ".00";
    } else if ((dec_place + 1) == dollar.length) {
      dollar = dollar + "00";
    } else if ((dec_place + 2) == dollar.length) {
      dollar = dollar + "0";
    } else {
      dollar = dollar.substring(0, dec_place + 3);
    }
    return (dollar);
  }

 function testCalc() {
    d_rate  = (document.Calculator.dealer_rate.value.toString() != "") ? parseFloat(numerify(document.Calculator.dealer_rate.value)/100) : 0;
    d_term  = (document.Calculator.dealer_term.value.toString() != "") ? parseFloat(numerify(document.Calculator.dealer_term.value)) : 0;
    cu_rate = (document.Calculator.cu_rate.value.toString() != "") ? parseFloat(numerify(document.Calculator.cu_rate.value)/100) : 0;
    cu_term = (document.Calculator.cu_term.value.toString() != "") ? parseFloat(numerify(document.Calculator.cu_term.value)) : 0;
    amount  = (document.Calculator.finance.value.toString() != "") ? parseFloat(numerify(document.Calculator.finance.value)) : 0;
    rebate  = (document.Calculator.rebate.value.toString() != "") ? parseFloat(numerify(document.Calculator.rebate.value)) : 0;

   if (cu_rate > 0) {
	  cu_month = Math.pow( (1 + (cu_rate / 12)), (0-(cu_term * 12)) );
	  cu_month = 1 - cu_month;
	  cu_month = (cu_month != 0) ? (cu_rate / 12) / cu_month : 0;
	  cu_month = (amount - rebate) * cu_month;
      cu_total = (cu_month * (cu_term * 12));

    } else {
	  cu_month = (cu_term != 0) ? ((amount - rebate) / cu_term) : 0;
	  cu_total = amount;
    }
    if (d_rate > 0) {
      d_month = Math.pow( (1 + (d_rate / 12)), (0-(d_term * 12)) );
	  d_month = 1 - d_month;
//      alert("dmonth = " + d_month + "\n" + "drate = " + d_rate);
      d_month = (d_month != 0) ? ((d_rate / 12) / d_month) : 0;
      d_month = d_month * amount;
      d_total = (d_month * (d_term * 12));
    } else {
	  d_month = (d_term != 0) ? (amount / (d_term * 12)) : 0;
	  d_total = amount;
    }
    //display results
    document.Calculator.cu_month.value = (cu_month > 0) ? Dollar_It(cu_month) : "";
    document.Calculator.dealer_month.value = (d_month > 0) ? Dollar_It(d_month) : "";
    if ((d_total >= cu_total) && (d_total-cu_total > 0)) {
	  document.Calculator.Results.value = "Good news! Missouri Credit Union's auto loan -- plus rebate -- will save you $" + ((d_total != 0) ? Dollar_It(d_total - cu_total) : "0.00") + " over the course of the loan. The payment amount will be  $" + ((cu_month > 0) ? Dollar_It(cu_month) : "0.00") + " per month.\n\nContact a personal financial officer at Missouri Credit Union to set one up today!";
	} else if (d_total-cu_total == 0) {
	  document.Calculator.Results.value = "Looks like a match! However, don't forget about MCU's Reward Program when you pay off the auto loan and acquire another one!";
	} else {
	  document.Calculator.Results.value = "If you can afford $" + ((d_month > 0) ? Dollar_It(d_month) : "0.00") + " every month, the dealer rate will save $" + (((cu_total != 0) && (cu_total > d_total)) ? Dollar_It((cu_total - d_total)) : "0.00") + " -- over the course of the loan.\n\nContact a personal financial officer at Missouri Credit Union for a monthly payment you can afford.";
	}
  }
