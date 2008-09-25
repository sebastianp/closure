// 
//  closure.js
//  closure / javascript support
//  
//  Created by Sebastian Pascu <sebi@ic3berg.de> on 2008-09-16.
//  Copyright 2008 Ic3berg.de. All rights reserved.
// 

// update with YOUR domain
my_domain = "http://localhost";

$(document).ready(
	function() {
	  // open external links in new window. first tag with 'new-window' class
	  // only within div.post, elsewhere the design has priority
    $("div.post a[href^='http:']").addClass('new-window');
    // remove class for local links, I'm sure there's a better way
	  $("div.post a[href^='"+my_domain+"']").removeClass('new-window');
	  
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

