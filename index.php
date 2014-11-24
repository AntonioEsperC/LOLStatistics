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
					<p >This App will help you to reach the next division faster, steps:</p>
					
  						<li>Sign in with your facebook account in order to personalize the App</li>
  						<li>Enter your summoner name</li>
  						<li>Select server (LAN or NA)</li>
  						<li>Click on search summoner</li>
  						<li>Scroll down and see the best or worst champions from your division</li>
  						<li>Play with the best champions</li>
  						<li>Share</li>
				
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

					<div id = "switch" name="switch" value="switch" clas="switch">
						<div class="register-switch">
						      <input type="radio" name="sex" value="F" id="noCheck" class="register-switch-input" onclick="javascript:yesnoCheck();" checked>
						      <label for="noCheck" class="register-switch-label">BEST</label>
						      <input type="radio" name="sex" value="M" id="yesCheck" class="register-switch-input" onclick="javascript:yesnoCheck();">
						      <label for="yesCheck" class="register-switch-label">WORST</label>
						 </div>


	 					<div id="ifYes" style="display:none">
						<p id="The-worst"></p>
						<div class="col-lg-4"><p class="champions"  id="Worst1"></p></div>
						<div class="col-lg-4"><p class="champions"  id="Worst2"></p></div>
						<div class="col-lg-4"><p class="champions"  id="Worst3"></p></div>
						</div>

						<div id="ifNo">
						<p id="The-best"></p>
						<div class="col-lg-4"><p class="champions" id="Best1"></p></div>
						<div class="col-lg-4"><p class="champions" id="Best2"></p></div>
						<div class="col-lg-4"><p class="champions" id="Best3"></p></div>
						</div>
						
					</div>

			
					<p id="Error"></p>

					<p id="Informacion"></p>
					<p id="destroy"></p>

					<p id="Error"></p>

					<p id="Informacion"></p>
					<p id="destroy"></p>
			</div>
		</div>


	<?php
		include("footer.php");
	?>
