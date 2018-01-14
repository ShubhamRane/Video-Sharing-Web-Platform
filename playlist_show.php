<?php

$servername = "localhost";
$username = "root";
$password = "Kenny#123";
$dbname = "vshare";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$name = "login";
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
$playlist_name = $_GET['playlist_name'];


$conn->close();
?>



<html>
<head>
	<title>Show Playlist</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<style type="text/css">

body {
  background: #ECEEF1;
}
.header {
  margin: 10px 42%;
  font-family: Lobster;
  font-size: 30px;
  font-weight: bold;
}
.header1 {
  font-family: Lobster;
  font-size: 20px;
}
#container {

  width: 500px;
  margin: 15px 35%;
}
.video {
	padding: 10% 1%;
}
.desc {
	padding: 2%;
}

/* THIS IS THE BOX STUFF BELOW */

.box {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  border: 2px solid #ffffff;
  overflow: hidden;
  display: block;
  background: #FFFFFF;
  box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, 0.14);
  border-radius: 3px;
  margin-top: 9px;
  float: left;
  width: 392px;
  height: 108px;
  -webkit-transition: all 200ms ease-out;
  -moz-transition: all 200ms ease-out;
  -ms-transition: all 200ms ease-out;
  -o-transition: all 200ms ease-out;
  transition: all 200ms ease-out;
}

.box:hover {
  cursor:pointer;
  -moz-transform: scale(1) rotate(0deg) translateX(-2px) translateY(-2px) skewX(0deg) skewY(0deg);
  -webkit-transform: scale(1) rotate(0deg) translateX(-2px) translateY(-2px) skewX(0deg) skewY(0deg);
  -o-transform: scale(1) rotate(0deg) translateX(-2px) translateY(-2px) skewX(0deg) skewY(0deg);
  -ms-transform: scale(1) rotate(0deg) translateX(-2px) translateY(-2px) skewX(0deg) skewY(0deg);
  transform: scale(1) rotate(0deg) translateX(-2px) translateY(-2px) skewX(0deg) skewY(0deg);
  box-shadow: 5px 15px 15px 0px rgba(0, 0, 0, 0.10);
  -webkit-transition: all 200ms ease-in;
  -moz-transition: all 200ms ease-in;
  -ms-transition: all 200ms ease-in;
  -o-transition: all 200ms ease-in;
  transition: all 200ms ease-in;
}
box:active{
  border:none !important;
}
.box:focus {
  outline:none !important;
  background: #FFFFFF;
  box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.14);
  bordeR:none;
  border-left:5px solid;
  border-color:#44D0F4;
  border-radius: 3px;
  -moz-transform: scale(1) rotate(0deg) translateX(-2px) translateY(0px) skewX(0deg) skewY(0deg);
  -webkit-transform: scale(1) rotate(0deg) translateX(-2px) translateY(0px) skewX(0deg) skewY(0deg);
  -o-transform: scale(1) rotate(0deg) translateX(-2px) translateY(0px) skewX(0deg) skewY(0deg);
  -ms-transform: scale(1) rotate(0deg) translateX(-2px) translateY(0px) skewX(0deg) skewY(0deg);
  transform: scale(1) rotate(0deg) translateX(-2px) translateY(0px) skewX(0deg) skewY(0deg);
  -webkit-transition: all 100ms ease-in;
  -moz-transition: all 100ms ease-in;
  -ms-transition: all 100ms ease-in;
  -o-transition: all 100ms ease-in;
  transition: all 100ms ease-in;
}
	</style>
</head>
<body onload="checkCookie()">
<div class="header">
  Playlist Name
</div>
<div id="container">
  <div tabindex="1" class="box">
  		<div class="col-md-4">
  			<div class="video" style="border-right-width: 1px ;border-right-style : solid;border-image: linear-gradient(to bottom, black, rgba(0, 0, 0, 0)) 1 100%;">
  				 <iframe width="90" height="90"
                      src="https://www.youtube.com/embed/XGSy3_Czz8k">
                </iframe>
  			</div>
  		</div>
  		<div class="col-md-8">
  			<div class="desc">
  				<div class="header1" style="font-size: 20px; color: #900C3F">Interstellar</div>
                       <div class="other">
                          <p>
                          A team of explorers travel through a wormhole in space in an attempt to ensure humanity's survival.
                          </p>  

                      </div>
  			</div>
  		</div>
  </div>

</div>
<script type="text/javascript">
var channel_id = null;
var container = document.getElementById('container');
function getPlaylistVideo() {

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        for (x in myObj) {
            container.innerHTML += 
                  '<div tabindex="1" class="box"><div class="col-md-4"><div class="video" style="border-right-width: 1px ;border-right-style : solid;border-image: linear-gradient(to bottom, black, rgba(0, 0, 0, 0)) 1 100%;"><iframe width="90" height="90" src="' + myObj[x].url + '"></iframe></div></div><div class="col-md-8"><div class="desc"><div class="header1" style="font-size: 20px; color: #900C3F">' + myObj[x].title +'</div><div class="other"><p>description goes here</p></div></div></div></div>'
        }
        
    }
  };
  var playlist_name = "<?php echo $playlist_name ?>";
  xmlhttp.open("GET", "cgi/getfromplaylist.php?playlist_name=" + playlist_name + "&email_id=" + getCookie('emailAdress') , true);
  xmlhttp.send();

}

  // set cookie functions
                function setCookie(cname,cvalue,exdays) {
                    var d = new Date();
                    d.setTime(d.getTime() + (exdays*24*60*60*1000));
                    var expires = "expires=" + d.toGMTString();
                    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                }

                function getCookie(cname) {
                    var name = cname + "=";
                    var decodedCookie = decodeURIComponent(document.cookie);
                    var ca = decodedCookie.split(';');
                    for(var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') {
                            c = c.substring(1);
                        }
                        if (c.indexOf(name) == 0) {
                            return c.substring(name.length, c.length);
                        }
                    }
                    return "";
                }

                function checkCookie() {
                    var user=getCookie("emailAdress");
                    if (user != "") {
                        getPlaylistVideo();
                    } else {
                       
                        window.location.href = "login.html";
                       
                    }
                }
               // cookie functions over

</script>
</body>
</html>

