// 
//  closure.js
//  closure / javascript support
//  
//  Created by Sebastian Pascu <sebi@ic3berg.de> on 2008-09-16.
//  Copyright 2008 Ic3berg.de. All rights reserved.
// 

$(document).ready(
	function() {
	  // open external links in new window. first tag with 'new-window' class
	  // only within div.post, elsewhere the design has priority
    $("div.post a").filter(function(){
      if(this.hostname && this.hostname!=window.location.hostname)
        return 1;
    }).addClass('new-window').addClass("external-link");

	  // next, add on click event to previosly tagged links
	  $(".new-window").click(
	    function(){
        if(this.href==undefined) {
          alert("Oops, we got a stray link here: "+$(this).html());
          return;
        }
        window.open(this.href);
        return false;
	    }
	  );
	  // slide the #thinbox-body div
    $("#toggle-more-info").toggle(
      function(){
        $(this).html("☒");
        $("#more-info").slideDown(300);
      },
      function(){
        $(this).html("✚");
        $("#more-info").slideUp(300);
      }
    );
	}
)

