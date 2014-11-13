<?php
	include('header.php');
?>

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status"></div>
<div id="email"></div>
<div id="profilepic"></div>

<button type="button" onclick="logout()">Logout</button></br></br>

<input type="text" id="summonerName" name="summonerName" autocomplete="off"/>
<input type="button" id="getSummonerInfo" name="getSummoner" value="Search Summoner"/></br>
<input type="radio" autocomplete="off" id="serverLAN" name="server" value="LAN" checked>Latin America North</br>
<input type="radio" id="serverNA" name="server" value="NA">North America

</br><div class="fb-share-button" data-href="https://teamfive.manmora.com/LOLStatistics" data-layout="button"></div>

</br></br>

<div id="SN"></div>
<div id="SummonerLvl"></div>
<div id="League"></div>
<div id="Division"></div>
<div id="LeaguePoints"></div>

<div id="Best1"></div>
<div id="Best2"></div>
<div id="Best3"></div>

<div id="Worst1"></div>
<div id="Worst2"></div>
<div id="Worst3"></div>

<div id="Error"></div>

<div id="Informacion"></div>
<div id="destroy"></div>

<?php
	include("footer.php");
?>