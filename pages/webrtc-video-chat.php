<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>PubRTC + Mobile</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
    <script src="js/modernizr.custom.js"></script>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />


    
</head>
<body>
<div class = "bodyDiv">
    
    <div class="md-modal md-effect-13" id="modal-13">
			<div class="md-content">
				<div>
	                 <div id="vid-box"></div>
                    <button class="md-close">
                       <i class="md-close fa fa-times-circle-o"></i>
                    </button>
                    
				</div>
			</div>
    </div>
    
    
        <form name="loginForm" id="login" action="#" onsubmit="return errWrap(login,this);">
            <span class="input input--nao">
                <input class="input__field input__field--nao" type="text" name="username" id="username" placeholder="Enter A Username"/>
                        <label class="input__label input__label--nao" for="username">
                            <span class="input__label-content input__label-content--nao">                                          
                            </span>
                        </label>
                    <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                        <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
                    </svg>
            </span>
            
               <button class="cbutton cbutton--effect-radomir" type="submit" name="login_submit" value="Log In" style="margin-top: 40px; margin-left:-10px">
						<i class="cbutton__icon fa fa-fw fa fa-sign-in"></i>
				</button>
        </form>

	<form name="callForm" id="call" action="#" onsubmit="return errWrap(makeCall,this);">
        <span class="input input--nao">
            <input class="input__field input__field--nao" type="text" name="number" id="call" placeholder="Enter User To Call!"/>
					<label class="input__label input__label--nao" for="number">
						<span class="input__label-content input__label-content--nao">                                          
                        </span>
					</label>
				<svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
				    <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
				</svg>
        </span>
        
        <button class="cbutton cbutton--effect-radomir md-trigger" type="submit" value="Call" style="margin-top: 40px; margin-left:-10px" data-modal="modal-13">
            <i class="cbutton__icon fa fa-fw fa fa fa-phone-square"></i>
        </button>

        
	</form>
    <button class="cbutton cbutton--effect-radomir md-trigger" value="Call" hidden="true" data-modal="modal-13" id="showModal"></button>
	<div class="ptext">
        <p>To Use:</p>
        <p>Enter a username and click Log in button. If input turns green you are ready to receive/place a call.</p>
        <p>In a separate browser window, log in with a different username, and place a call to the first.</p>
    </div>

     
</div>
</body>

<!--<script src="js/jquery-3.2.1.min.js"></script>-->
<script src="js/webrtccore.js"></script>
<script src="js/webrtc.js"></script>
<script type="text/javascript">

var video_out = document.getElementById("vid-box");

function login(form) {
	var phone = window.phone = PHONE({
	    number        : form.username.value || "Anonymous", // listen on username line else Anonymous
	    publish_key   : 'pub', // Your Pub Key
	    subscribe_key : 'sub', // Your Sub Key
	});	
	phone.ready(function(){form.username.style.background="#55ff5b"; form.login_submit.hidden="true"; });
	phone.receive(function(session){
	    session.connected(function(session) { video_out.appendChild(session.video); showModal();});
	    session.ended(function(session) { video_out.innerHTML=''; });
	});
	return false;
}
    
function makeCall(form){
	if (!window.phone) alert("Login First!");
	else phone.dial(form.number.value);
	return false;
}
    
function showModal(){
    $("#showModal").click();
}

function errWrap(fxn, form){
	try {
		return fxn(form);
	} catch(err) {
		alert("WebRTC is currently only supported by Chrome, Opera, and Firefox");
		return false;
	}
}

</script>
<script src="js/modalEffects.js"></script>
<script src="js/classie.js"></script>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new
		Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-46933211-3', 'auto');
	ga('send', 'pageview');

</script>

</html>
