<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyNycers Login</title>
	<!-- CSS -->
    <link href="reset.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,600" type="text/css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <link href="jumbotron.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<style>
		.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		}

		@media (min-width: 768px) {
		.bd-placeholder-img-lg {
		  font-size: 3.5rem;
		}
		}
		</style>

	<!-- Metadata tags -->
    <meta name="salesforce-community" content="https://<?php echo getenv('SALESFORCE_COMMUNITY_URL');?>">
    <meta name="salesforce-client-id" content="<?php echo getenv('SALESFORCE_CLIENT_ID');?>">
    <meta name="salesforce-redirect-uri" content="https://<?php echo getenv('SALESFORCE_HEROKUAPP_URL');?>/_callback.php">
    <meta name="salesforce-mode" content="<?php echo getenv('SALESFORCE_MODE');?>">
    <meta name="salesforce-namespace" content="<?php echo getenv('SALESFORCE_NAMESPACE');?>">
    <meta name="salesforce-target" content="#sign-in-link">
    <meta name="salesforce-save-access-token" content="true">
    <meta name="salesforce-forgot-password-enabled" content="<?php echo getenv('SALESFORCE_FORGOT_PASSWORD_ENABLED');?>">
    <meta name="salesforce-self-register-enabled" content="<?php echo getenv('SALESFORCE_SELF_REGISTER_ENABLED');?>">
    <meta name="salesforce-login-handler" content="onLogin">
    <meta name="salesforce-logout-handler" content="onLogout">
    <meta name="salesforce-save-access-token" content="false">

	<!-- Login Scripts -->
	<link href="https://<?php echo getenv('SALESFORCE_COMMUNITY_URL');?>/servlet/servlet.loginwidgetcontroller?type=css" rel="stylesheet" type="text/css" />

    <script src="https://<?php echo getenv('SALESFORCE_COMMUNITY_URL');?>/servlet/servlet.loginwidgetcontroller?type=javascript_widget&min=false&cacheMaxAge=120" async defer></script>
  </head>
  
  <body style="padding-top: 0px;">
	<main role="main">
	    <nav class="navbar navbar-expand-md">
	        <img src="https://emeddedlogindarkinsv3.herokuapp.com/header.png" alt="Responsive image" style="width: 100%">
	    </nav>

	  <div class="container-fluid" style="padding-left: 40px; padding-right: 40px;">
	    <!-- Example row of columns -->
	    <div class="row">
	      <div class="col-md-8">
				<img src="https://emeddedlogindarkinsv3.herokuapp.com/body.png" class="img-fluid" alt="Responsive image">
	      </div>
		<!-- Login renders for communities login -->
	      <div class="col-md-4">
			<div class="media">
			<div class="media-body">
				<ul>
					<li><div style="padding-top: 100px"></div></li>
			        <li>
			        	<h6>Ebedded Login Approach</h6>
						<div id="sign-in-link" style="position: inherit;top: 5px;right: 5px; display: inline-block; vertical-align: top;width: 100%;"></div>
			        </li>
			        <li>
			        	<br/>
			        	<h6>Native Salesforce</h6>
						<a class="btn btn-primary" href="https://play01-nycers-play01.cs32.force.com/single/s" role="button" style="width: 100%">Log In</a>
			        </li>
			     </ul>
			  </div>
			</div>
	      </div>
	    </div>
	  </div> <!-- /container -->

	</main>
 </body>

<footer class="container-fluid" style="padding-top: 40px;">
	<img src="https://emeddedlogindarkinsv3.herokuapp.com/footer.png" class="img-fluid" alt="Responsive image" style="width:100%">
</footer>
	

	
	<script>


	function onLogin(identity) {
		
		var targetDiv = document.querySelector(SFIDWidget.config.target);	
		

		/*
		var avatar = document.createElement('a'); 
	 	avatar.href = "https:play01-nycers-play01.cs32.force.com/single";
	 	//avatar.href = "javascript:showIdentityOverlay();"
		
		var img = document.createElement('img'); 
	 	img.src = identity.photos.thumbnail; 
		img.className = "sfid-avatar";
	
		var username = document.createElement('span'); 
		username.innerHTML = identity.username;
		username.className = "sfid-avatar-name"; */
	
		var iddiv = document.createElement('div'); 
	 	iddiv.id = "sfid-identity";
		
		//avatar.appendChild(img);
		//avatar.appendChild(username);
		//iddiv.appendChild(avatar);		
	
		targetDiv.innerHTML = '';
		targetDiv.appendChild(iddiv); 

		var redirect = location.replace("https://play01-nycers-play01.cs32.force.com/single/s");
		
	}
	
	/*
	function showIdentityOverlay() {

		var lightbox = document.createElement('div'); 
	 	lightbox.className = "sfid-lightbox";
	 	lightbox.id = "sfid-login-overlay";
		lightbox.setAttribute("onClick", "SFIDWidget.cancel();");
		
		var wrapper = document.createElement('div'); 
	 	wrapper.id = "identity-wrapper";
		wrapper.onclick = function(event) {
		    event = event || window.event // cross-browser event
    
		    if (event.stopPropagation) {
		        // W3C standard variant
		        event.stopPropagation()
		    } else {
		        // IE variant
		        event.cancelBubble = true
		    }
		}
		
		var content = document.createElement('div'); 
	 	content.id = "sfid-content";

		var community = document.createElement('a');
		var commURL = document.querySelector('meta[name="salesforce-community"]').content;
		community.href = commURL;
		community.innerHTML = "Go to the Community";
		community.setAttribute("style", "float:left");
		content.appendChild(community);


		var logout = document.createElement('a'); 
	 	logout.href = "javascript:SFIDWidget.logout();SFIDWidget.cancel();";
		logout.innerHTML = "logout";
		logout.setAttribute("style", "float:right");
		content.appendChild(logout);
		
		var t = document.createElement('div'); 
	 	t.id = "sfid-token";
		t.className = "sfid-mb24";
		
		var p = document.createElement('pre'); 
	 	p.innerHTML = JSON.stringify(SFIDWidget.openid_response, undefined, 2);
		t.appendChild(p);
		
		content.appendChild(t);

		
		wrapper.appendChild(content);
		lightbox.appendChild(wrapper);
		
		document.body.appendChild(lightbox);	
		
	}*/
	
	
	function onLogout() {
		SFIDWidget.init();

	}


	</script>
	
  </body>
</html>