<?php
	include('header.php');
?>

		<div class="container-fluid">
    		<div class="header">
    			<nav>
          			<ul class="nav nav-pills pull-right">
          				<li role="presentation">
							<a href="#"><fb:login-button size="large" scope="public_profile,email" onlogin="checkLoginState();">
							</fb:login-button></a>
						</li>
						<li role="presentation"><a class="menu-tab" href="#" onclick="logout()">Logout</a></li>
					</ul>
        		</nav>
        		<h2 class="logo">League of Legends Statistics</h2>
      
        	</div>

			<div class="col-lg-6">
				<div class="jumbotron jumbo-profile">
					<div class="facebook-status">
						<h2 id="status"></h2>
						<p id="email"></p>
						<div class="profilepic" id="profilepic"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="jumbotron jumbo-intro">
			        <h1>LOL Stats</h1>
			        <p class="lead"><br>Login with your facebook user and search for your League Of Legends summoner name. <br>Obtain the best and worst champion selection of your division so you can improve.</p>
			    </div>	
			</div>	
			<div class="col-lg-12">	
				<div class="jumbotron jumbotron-inverse">
					<p>Parte de rafa</p>
				</div>
			</div>
	
			<div class="col-lg-12">	
				<div class="jumbotron ">
					<div class="form-group">
						<div class="col-lg-4"></div>
						<div class="col-lg-4"><input type="text" class="summoner-input form-control input-lg " id="summonerName" placeholder="Summoner name" name="summonerName" autocomplete="off"/></div>
					</div>
					<div class="form-group">
						<div class="col-xs-6"><input type="radio" class="radio-text" autocomplete="off" id="serverLAN" name="server" value="LAN" checked><p>Latin America North</p></div>
						<div class="col-xs-6"><input type="radio" class="radio-text" id="serverNA" name="server" value="NA"><p>North America</p></div>
					</div>
					
					<input type="button" class="btn btn-success btn-lg" id="getSummonerInfo" name="getSummoner" value="Search Summoner"/></br>

					</br><div class="fb-share-button" data-href="https://teamfive.manmora.com/LOLStatistics" data-layout="button"></div>
				</div>
			</div>
			<div class="col-lg-12 jumbo-tron jumbotron" id="jumbo-tron" >	

					<p id="SN"></p>
					<p id="SummonerLvl"></p>
					<p id="League"></p>
					<p id="Division"></p>
					<p id="LeaguePoints"></p>

					<div id="The-best" class="bg-title"></div>
					<div class="col-lg-4"><p class="champions" id="Best1"></p></div>
					<div class="col-lg-4"><p class="champions" id="Best2"></p></div>
					<div class="col-lg-4"><p class="champions" id="Best3"></p></div>
					<div id="The-worst" class="bg-title"></div>
					<div class="col-lg-4"><p class="champions"  id="Worst1"></p></div>
					<div class="col-lg-4"><p class="champions"  id="Worst2"></p></div>
					<div class="col-lg-4"><p class="champions"  id="Worst3"></p></div>

					<p id="Error"></p>

					<p id="Informacion"></p>
					<p id="destroy"></p>

			</div>
		</div>

	<?php
		include("footer.php");
	?>
