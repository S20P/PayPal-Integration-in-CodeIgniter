<em>&copy; 2019</em>


<script type="text/javascript" src="<?php echo base_url();?>assets/js/optimize.js"></script>
<script>
  window.fbAsyncInit = function() {
	FB.init({
	  appId            : '287859101811792',
	  autoLogAppEvents : true,
	  xfbml            : true,
	  version          : 'v2.10'
	});
	FB.AppEvents.logPageView();
  };

  (function(d, s, id){
	 var js, fjs = d.getElementsByTagName(s)[0];
	 if (d.getElementById(id)) {return;}
	 js = d.createElement(s); js.id = id;
	 js.src = "//connect.facebook.net/en_US/sdk.js";
	 fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
 <script>
 $('#metabtn_defaut').click(function(){
     console.log("you access to share meta orignal");
	FB.ui({
		method: 'share',
		href: window.location.href
	},
	function (response) {
	// Action after response
    console.log("response",response);
	});

});
 </script>


 <!-- Share Dynamic Content with og meta tags to objects -->

        </body>
</html>