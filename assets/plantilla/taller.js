$(function () {
  'use strict'
  
 

  $(document).ready(function(){ 
	 
	$(document).on("click", '.po', function (e) {
          $('[data-toggle="popover"]').popover({html:true});
    });
	
      $('.po').popover({html:true});
      
        //change comma to point
        $(document).on("change", '.comma-to-point', function (e) {
          var str = $(this).val().replace(",", ".");
          $(this).val(str);
        });

       $(document).on("click", '.po-close', function (e) {
          $('.po').popover('hide');
      });
      $(document).on("click", '.po-delete', function (e) {
          $(this).closest('tr').velocity("transition.slideRightOut");
      });
   });  
  


  
})
