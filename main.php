<?php

session_start();

	if(isset($_POST['postoperation']) && $_POST['postoperation'] == '1'){
		if($_POST['sn'] != ""){
			$makeURL1 = 'https://';
			$makeURL2 = '.api.pvp.net/api/lol/';
			$makeURL3 = '/v1.4/summoner/by-name/';
			$makeURL4 = '?api_key=01d046ad-e17a-47ba-a365-1fab660921c7';
			$makeURL5 = '/v2.5/league/by-summoner/';
			$makeURL6 = '/entry?api_key=01d046ad-e17a-47ba-a365-1fab660921c7';
			$sn = strtolower($_POST['sn']);
			$sn = preg_replace('/\s+/', '', $sn);

			//CREAR PRIMER URL (OBTENER SUMMONER id)
			$json_url = $makeURL1 . $_POST['sv'] . $makeURL2 . $_POST['sv'] . $makeURL3 . $sn . $makeURL4;
			$json = @file_get_contents($json_url);
			if (!$json){
				echo "ErrorRequest";
			}else{
				$json=str_replace('},

				]',"}

				]",$json);
				$data = json_decode($json);

				$summoner = $data->$sn->name;
				$id = $data->$sn->id;
				$level = $data->$sn->summonerLevel;
				$division = "Unranked";

				$rank = $division . $_POST['sv'];

				//CREAR SEGUNDO URL (OBTENER DIVISION)
				$json_url2 = $makeURL1 . $_POST['sv'] . $makeURL2 . $_POST['sv'] . $makeURL5 . $id . $makeURL6;
				$json2 = @file_get_contents($json_url2);
				if (!$json2){
					$con = openDB("siqueiros.qro.itesm.mx","alequipo05","elecyzos","alequipo05");

					$best1 = getBest1($con, $rank);
					$best2 = getBest2($con, $rank);
					$best3 = getBest3($con, $rank);
					$worst1 = getWorst1($con, $rank);
					$worst2 = getWorst2($con, $rank);
					$worst3 = getWorst3($con, $rank);

					closeDB($con);

					$respuesta = array("2", $summoner, $level, $division, $best1, $best2, $best3, $worst1, $worst2, $worst3);
					echo $respuesta[0];
					echo "~";
					echo $respuesta[1];
					echo "~";
					echo $respuesta[2];
					echo "~";
					echo $respuesta[3];
					echo "~";
					echo $respuesta[4];
					echo "~";
					echo $respuesta[5];
					echo "~";
					echo $respuesta[6];
					echo "~";
					echo $respuesta[7];
					echo "~";
					echo $respuesta[8];
					echo "~";
					echo $respuesta[9];
				}else{
					$json2=str_replace('},

					]',"}

					]",$json2);
					$data2 = json_decode($json2);
					$tmp = get_object_vars($data2);

					$liga = $tmp[$id][0]->name;
					$tier = $tmp[$id][0]->tier;
					$leaguePoints = $tmp[$id][0]->entries[0]->leaguePoints;
					$division = $tmp[$id][0]->entries[0]->division;
					$summonerName = $tmp[$id][0]->entries[0]->playerOrTeamName;

					$tier = ucfirst(strtolower($tier)) . " " . $division;

					$rank = $tier . $_POST['sv'];

					//OBTENER BESTS Y WORSTS
					$con = openDB("siqueiros.qro.itesm.mx","alequipo05","elecyzos","alequipo05");
					$best1 = getBest1($con, $rank);
					$best2 = getBest2($con, $rank);
					$best3 = getBest3($con, $rank);
					$worst1 = getWorst1($con, $rank);
					$worst2 = getWorst2($con, $rank);
					$worst3 = getWorst3($con, $rank);

					closeDB($con);

					$respuesta = array($summonerName, $level, $liga, $tier, $leaguePoints, $best1, $best2, $best3, $worst1, $worst2, $worst3);
					echo $respuesta[0];
					echo "~";
					echo $respuesta[1];
					echo "~";
					echo $respuesta[2];
					echo "~";
					echo $respuesta[3];
					echo "~";
					echo $respuesta[4];
					echo "~";
					echo $respuesta[5];
					echo "~";
					echo $respuesta[6];
					echo "~";
					echo $respuesta[7];
					echo "~";
					echo $respuesta[8];
					echo "~";
					echo $respuesta[9];
					echo "~";
					echo $respuesta[10];
				}
			}
		}else{
			echo "ErrorVacio";
		}
	}

function getBest1($con, $rank){
    $query = "SELECT best1 FROM division WHERE divisionServer = '" . $rank . "'";
    $result = mysqli_query($con,$query);
    while($row = $result->fetch_assoc()) {
        $res = $row["best1"];
    }
    return $res;
}

function getBest2($con, $rank){
    $query = "SELECT best2 FROM division WHERE divisionServer = '" . $rank . "'";
    $result = mysqli_query($con,$query);
    while($row = $result->fetch_assoc()) {
        $res = $row["best2"];
    }
    return $res;
}

function getBest3($con, $rank){
    $query = "SELECT best3 FROM division WHERE divisionServer = '" . $rank . "'";
    $result = mysqli_query($con,$query);
    while($row = $result->fetch_assoc()) {
        $res = $row["best3"];
    }
    return $res;
}

function getWorst1($con, $rank){
    $query = "SELECT worst1 FROM division WHERE divisionServer = '" . $rank . "'";
    $result = mysqli_query($con,$query);
    while($row = $result->fetch_assoc()) {
        $res = $row["worst1"];
    }
    return $res;
}

function getWorst2($con, $rank){
    $query = "SELECT worst2 FROM division WHERE divisionServer = '" . $rank . "'";
    $result = mysqli_query($con,$query);
    while($row = $result->fetch_assoc()) {
        $res = $row["worst2"];
    }
    return $res;
}

function getWorst3($con, $rank){
    $query = "SELECT worst3 FROM division WHERE divisionServer = '" . $rank . "'";
    $result = mysqli_query($con,$query);
    while($row = $result->fetch_assoc()) {
        $res = $row["worst3"];
    }
    return $res;
}

function openDB($route,$username,$password,$db){
	$con=mysqli_connect($route,$username,$password,$db);
    if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        return $con;
    }
}


function closeDB($db){
    mysqli_close($db);
}

?>