$(document).ready(function(){
     $('#search_data').tokenfield({
         autocomplete :{
             source: function(request, response)
             {
                 jQuery.get('fetch.php', {
                    query : request.term 
                 }, function(data){
                     data = JSON.parse(data);
                     response(data);
                 });
             },
             delay: 100
         }
     }); 
      
    $('#search').click(function(){
       $('#firstname').text($('#search_data').val());
    });  
      
  });


$(document).ready(function(){
     $('#search_product').tokenfield({
         autocomplete :{
             source: function(request, response)
             {
                 jQuery.get('product.php', {
                    query : request.term 
                 }, function(data){
                     data = JSON.parse(data);
                     response(data);
                 });
             },
             delay: 100
         }
     }); 
      
    $('#search').click(function(){
       $('#product_name').text($('#search_product').val());
    });  
      
  });


$(document).ready(function(){
     $('#search_name').tokenfield({
         autocomplete :{
             source: function(request, response)
             {
                 jQuery.get('product.php', {
                    query : request.term 
                 }, function(data){
                     data = JSON.parse(data);
                     response(data);
                 });
             },
             delay: 100
         }
     }); 
      
    $('#search').click(function(){
       $('#product_name').text($('#search_name').val());
    });  
      
  });






