//LOL API//
$(document).ready(function(){
	var summonerName = null;
	var server = null;

	$('#getSummonerInfo').click(function(){
		summonerName = document.getElementById('summonerName').value;
		summoner = summonerName.toLowerCase();
		summoner = summoner.replace(/\s/g, '');
		if (document.getElementById('serverLAN').checked) {
  			server = 'lan';
		}else{
			server = 'na';
		}
		var postInfo = $.post('main.php', {postoperation: '1', sn: summonerName, sv: server})
			.done(function(response){
				//ESTÁ VACIO
				if(response == "ErrorVacio"){
					document.getElementById('jumbo-tron').style.visibility="hidden";
					document.getElementById('jumbo-tron').style.position="absolute";
					alert("Se debe ingresar un Summoner Name");
				}else if (response == "ErrorRequest"){
					document.getElementById('Error').innerHTML ="'" + summonerName + "'"+ " no existe en el servidor seleccionado.";
					document.getElementById('SN').innerHTML = "";
					document.getElementById("The-best").innerHTML = "";
					document.getElementById("The-worst").innerHTML = "";
					document.getElementById('League').innerHTML = "";
					document.getElementById('SummonerLvl').innerHTML = "";
					document.getElementById('Division').innerHTML = "";
					document.getElementById('LeaguePoints').innerHTML = "";
					document.getElementById('Best1').innerHTML = "";
					document.getElementById('Best2').innerHTML = "";
					document.getElementById('Best3').innerHTML = "";
					document.getElementById('Worst1').innerHTML = "";
					document.getElementById('Worst2').innerHTML = "";
					document.getElementById('Worst3').innerHTML = "";
					document.getElementById('Informacion').innerHTML = "";
					document.getElementById('jumbo-tron').style.visibility="visible";
					document.getElementById('jumbo-tron').style.position="relative";					
				}else if (response[0] == "2"){
				//UNRANKED
					var aux = response.split("~");
					document.getElementById('SN').innerHTML="Summoner Name: " + aux[1];
					document.getElementById('SummonerLvl').innerHTML="Summoner Level: " + aux[2];
					var division = '<img src="img/Divisions/' + aux[3] + '.png">'
					document.getElementById('Division').innerHTML=division + "Division: " + aux[3];
					document.getElementById("The-best").innerHTML = "The Best of the League";
					var best1 = '<img src="img/Champions/' + aux[4] + '.jpg">'
					document.getElementById('Best1').innerHTML= best1;
					var best2 = '<img src="img/Champions/' + aux[5] + '.jpg">'
					document.getElementById('Best2').innerHTML= best2;
					var best3 = '<img src="img/Champions/' + aux[6] + '.jpg">'
					document.getElementById('Best3').innerHTML= best3;
					var worst1 = '<img src="img/Champions/' + aux[7] + '.jpg">'
					document.getElementById("The-worst").innerHTML = "The Worst of the League";
					document.getElementById('Worst1').innerHTML= worst1;
					var worst2 = '<img src="img/Champions/' + aux[8] + '.jpg">'
					document.getElementById('Worst2').innerHTML= worst2;
					var worst3 = '<img src="img/Champions/' + aux[9] + '.jpg">'
					document.getElementById('Worst3').innerHTML= worst3;

					document.getElementById('LeaguePoints').innerHTML="";
					document.getElementById('League').innerHTML="";
					document.getElementById('Informacion').innerHTML= "";
					document.getElementById('Error').innerHTML = "";
					document.getElementById('jumbo-tron').style.visibility="visible";
					document.getElementById('jumbo-tron').style.position="relative";

				}
				//NO ESTÁ VACIO
				else{
					var aux = response.split("~");
					document.getElementById('SN').innerHTML= "Summoner Name: " + aux[0];
					document.getElementById('League').innerHTML = "League: " + aux[2];
					document.getElementById('SummonerLvl').innerHTML = "Summoner Level: " + aux[1];
					var division = '<img src="img/Divisions/' + aux[3] + '.png">'
					document.getElementById('Division').innerHTML=division + "Division: " + aux[3];
					document.getElementById('LeaguePoints').innerHTML = "League Points: " + aux[4];
					document.getElementById("The-best").innerHTML = "The Best of the League";
					var best1 = '<img src="img/Champions/' + aux[5] + '.jpg">'
					document.getElementById('Best1').innerHTML= best1;
					var best2 = '<img src="img/Champions/' + aux[6] + '.jpg">'
					document.getElementById('Best2').innerHTML= best2;
					var best3 = '<img src="img/Champions/' + aux[7] + '.jpg">'
					document.getElementById('Best3').innerHTML= best3;
					var worst1 = '<img src="img/Champions/' + aux[8] + '.jpg">'
					document.getElementById("The-worst").innerHTML = "The Worst of the League";
					document.getElementById('Worst1').innerHTML= worst1;
					var worst2 = '<img src="img/Champions/' + aux[9] + '.jpg">'
					document.getElementById('Worst2').innerHTML= worst2;
					var worst3 = '<img src="img/Champions/' + aux[10] + '.jpg">'
					document.getElementById('Worst3').innerHTML= worst3;
					
					document.getElementById('Error').innerHTML = "";
					document.getElementById('jumbo-tron').style.visibility="visible";
					document.getElementById('jumbo-tron').style.position="relative";
				}
				console.log(response);
			})
			.fail(function(){

			})
			.always(function() {

        });
	});
});

//FACEBOOK API//
// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
	console.log('statusChangeCallback');
	console.log(response);
	// The response object is returned with a status field that lets the
	// app know the current login status of the person.
	// Full docs on the response object can be found in the documentation
	// for FB.getLoginStatus().
	if (response.status === 'connected') {
	// Logged into your app and Facebook.
		testAPI();
	} else if (response.status === 'not_authorized') {
	// The person is logged into Facebook, but not your app.
	    document.getElementById('status').innerHTML = 'Please log ' +
	    'into this app.';
	} else {
	    // The person is not logged into Facebook, so we're not sure if
	    // they are logged into this app or not.
	    document.getElementById('status').innerHTML = 'Please log ' +
	    'into Facebook.';
	}
}

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}

window.fbAsyncInit = function() {
		FB.init({
		appId      : '305012859693371',
		cookie     : true,  // enable cookies to allow the server to access 
		                    // the session
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.1' // use version 2.1
	});

// Now that we've initialized the JavaScript SDK, we call 
// FB.getLoginStatus().  This function gets the state of the
// person visiting this page and can return one of three states to
// the callback you provide.  They can be:
//
// 1. Logged into your app ('connected')
// 2. Logged into Facebook, but not your app ('not_authorized')
// 3. Not logged into Facebook and can't tell if they are logged into
//    your app or not.
//
// These three cases are handled in the callback function.

FB.getLoginStatus(function(response) {
    	statusChangeCallback(response);
	});
};

// Load the SDK asynchronously
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
function testAPI() {
	console.log('Welcome! Fetching your information.... ');
	FB.api('/me', function(response) {
	console.log('Successful login for: ' + response.name);
	document.getElementById('status').innerHTML =
		'Thanks for logging in, ' + response.name + '!';
	document.getElementById('email').innerHTML =
		'Users email is: ' + response.email;
});

FB.api('/me/picture?width=180&height=180',  function(response) {
   	console.log('Successful profile picture url: ' + response.data.url);
       	document.getElementById('profilepic').innerHTML =
       		'<img src="' + response.data.url + '" alt="ProfilePic" height="180" width="180">'
	}); 
}

function logout(){
	FB.logout(function(response) {
     	// Person is now logged out
   	});
   	kill_session();
	location.reload();
}

//Extras

function kill_session() {
    if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

    xmlhttp.open("GET","session_destroyer.php",false);
    xmlhttp.send();

    document.getElementById("destroy").innerHTML=xmlhttp.responseText; 
}