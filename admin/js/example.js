function print_today() {
  // ***********************************************
  // AUTHOR: WWW.CGISCRIPT.NET, LLC
  // URL: http://www.cgiscript.net
  // Use the script, just leave this message intact.
  // Download your FREE CGI/Perl Scripts today!
  // ( http://www.cgiscript.net/scripts.htm )
  // ***********************************************
  var now = new Date();
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();
  function fourdigits(number) {
    return (number < 1000) ? number + 1900 : number;
  }
  var today =  months[now.getMonth()] + " " + date + ", " + (fourdigits(now.getYear()));
  return today;
}

// from http://www.mediacollege.com/internet/javascript/number/round.html
function roundNumber(number,decimals) {
  var newString;// The new rounded number
  decimals = Number(decimals);
  if (decimals < 1) {
    newString = (Math.round(number)).toString();
  } else {
    var numString = number.toString();
    if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
      numString += ".";// give it one at the end
    }
    var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
    var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
    var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
    if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
      if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
        while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
          if (d1 != ".") {
            cutoff -= 1;
            d1 = Number(numString.substring(cutoff,cutoff+1));
          } else {
            cutoff -= 1;
          }
        }
      }
      d1 += 1;
    } 
    if (d1 == 10) {
      numString = numString.substring(0, numString.lastIndexOf("."));
      var roundedNum = Number(numString) + 1;
      newString = roundedNum.toString() + '.';
    } else {
      newString = numString.substring(0,cutoff) + d1.toString();
    }
  }
  if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
    newString += ".";
  }
  var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
  for(var i=0;i<decimals-decs;i++) newString += "0";
  //var newNumber = Number(newString);// make it a number if you like
  return newString; // Output the result to the form field (change for your purposes)
}

function update_total() {
  var total = 0;
  $('.amount').each(function(i){
    price = $(this).html();
    if (!isNaN(price)) total += Number(price);
  });
    
  var vattotal = 0;
  $('.price').each(function(i){
    price2 = $(this).html();
    if (!isNaN(price2)) 
	{
		vattotal += Number(price2);
	}
  });
	
  //var vat =0;
  //vat = ( Number($("#vat").val()) * total) / 100;

  var tax =0;
  tax = ( Number($("#tax").val()) * total) / 100;         
    
  vattotal-=total;
  total = roundNumber(total,2);
  //vattotal = roundNumber(vattotal,2);
    
    
  $('#subtotal').html(total);
  $('#subt_hid').val(total)

  vattotal = roundNumber(vattotal,2);

  $('#vattotal').html(vattotal);
  $('#vattotal_h').val(vattotal)

  //total=Number(total)+vat;  
  total=Number(total)+tax+Number(vattotal);  
  total = roundNumber(total,2);

  $('#total').html(total);
  $('#tot_hid').val(total);
  update_balance();
}

function update_balance() {
  var due = $("#total").html();
  due = roundNumber(due,2);

  rtot = Math.round(due);
  var words = toWords(rtot);
  rtot = roundNumber(rtot,2);
  

  
  $('.due').html(due);
  $('#due_hid').val(due);
  $('.rtot').html(rtot);
  $('#round_hid').val(due);
  $('#inwords').html("Rs." + words + "Only");
  $('#towords').val("Rs." + words + "Only");
}

function update_price() {

  var row = $(this).parents('.item-row');
  var price = row.find('.cost').val() * row.find('.qty').val();

    
  amount=price; 
  amount = roundNumber(amount,2);
  price += (row.find('.vat').val() * price)/100; 
  price = roundNumber(price,2);
  isNaN(price) ? row.find('.amount').html("N/A") : row.find('.amount').html(amount);
  isNaN(price) ? row.find('.price').html("N/A") : row.find('.price').html(price);
  isNaN(price) ? row.find('.pr_hid').val("N/A") : row.find('.pr_hid').val(price);
  update_total();
  
};

function bind() {
  $(".cost").blur(update_price);
  $(".qty").blur(update_price);
  $(".vat").blur(update_price);
};

$(document).ready(function() {

  $('input').click(function(){
    $(this).select();
  });

 // $("#paid").blur(update_balance);

  $("#tax").blur(update_total);

  $("#addrow").click(function(){
	  var newR = "<tr class=\"item-row\"><td class=\"item-name\"><div class=\"delete-wpr\"> <textarea onblur=\"if(this.value=='') this.value='Item';\" onfocus=\"if(this.value=='Item') this.value='';\" name=\"item[]\">Item</textarea><i value=\"Delete\" type=\"button\" alt=\"Delete\" class=\"deleteIcon fa fa-trash\">X</i></div></td><td class=\"description\"><textarea onblur=\"if(this.value=='') this.value='Description';\" onfocus=\"if(this.value=='Description') this.value='';\" name=\"descr[]\">Description</textarea></td><td><textarea class=\"qty\" onblur=\"if(this.value=='') this.value='0.00';\" onfocus=\"if(this.value=='0.00') this.value='';\" name=\"qty[]\">0.00</textarea></td><td><textarea class=\"cost\" onblur=\"if(this.value=='') this.value='0.00';\" onfocus=\"if(this.value=='0.00') this.value='';\" name=\"cost[]\">0.00</textarea></td><td><textarea class=\"vat\" onblur=\"if(this.value=='') this.value='0.00';\" onfocus=\"if(this.value=='0.00') this.value='';\" name=\"vat[]\">0.00</textarea></td><td><textarea class=\"discount\" onblur=\"if(this.value=='') this.value='0.00';\" onfocus=\"if(this.value=='0.00') this.value='';\" name=\"discount[]\">0.00</textarea></td><td><span class=\"amount\">0.00</span><input type=\"hidden\" class=\"pr_amt\"/></td><td><span class=\"price\">0.00</span><input type=\"hidden\" class=\"pr_hid\" name=\"price[]\" /></td></tr>";   
      
    $(".item-row:last").after(newR);
    if ($(".delete").length > 0) $(".delete").show();
    bind();
  });
  
  bind();
    
    
 $(document).on("click", ".deleteIcon", function() {

   var indexDelAgent = $(this).closest('tr').index('#items tr');
   console.log("after deletion");
   console.log(indexDelAgent);

  document.getElementById("items").deleteRow(indexDelAgent);

  });
  
  $("#cancel-logo").click(function(){
    $("#logo").removeClass('edit');
  });
  $("#delete-logo").click(function(){
    $("#logo").remove();
  });
  $("#change-logo").click(function(){
    $("#logo").addClass('edit');
    $("#imageloc").val($("#image").attr('src'));
    $("#image").select();
  });
  $("#save-logo").click(function(){
    $("#image").attr('src',$("#imageloc").val());
    $("#logo").removeClass('edit');
  });
  
  $("#date").val(print_today());
  $("#customer-title").focus();
});