
$(function(){
  'use strict';
  var winH  = $(window).height();
  var blu =$('.upp').innerHeight();
  var navv =$('.navbar').innerHeight();
  $('.slider, .carousel-item ').height(winH- (blu + navv));


    $(" .features-w li").click(function(){
      $(this).addClass("active").siblings().removeClass("active");

      if( $(this).data('class')==='All' ) {
      $('.stk .col-md-3').css('opacity','1');
     }else {
      $('.stk .col-md-3').css('opacity','0.2');
      $($(this).data('class')).parent().css('opacity','1');
      }


    });


    if( $(this).data('class')==='all' ) {
    $('.stk .col-lg-3').show();
   }else {
    $('..stk .col-lg-3').hide();
    $($(this).data('class')).show();
    }




  });
