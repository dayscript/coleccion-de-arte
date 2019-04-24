function scroll_(){
   jQuery(".obra .group-left").mCustomScrollbar();


}
jQuery(document).ready(function(){
      scroll_();
      jQuery(window).resize(function(){
       scroll_();
      });
}); 

