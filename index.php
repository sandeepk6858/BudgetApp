<?php
ini_set("display_errors",1);
require_once "config.php";
session_start();
$loginURL = $gClient->createAuthUrl();


if (isset($_GET['code'])) {
	//Generate Token
	$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
	$token_access_google = $token['access_token'];
	$gClient->setAccessToken($token_access_google);
	$service = new Google_Service_Sheets($gClient);
	
	$title = "User Data";
	
	//create googlesheet
	$spreadsheet = new Google_Service_Sheets_Spreadsheet([
	    'properties' => [
	        'title' => $title
	    ]
	]);
	$spreadsheet = $service->spreadsheets->create($spreadsheet, [
	    'fields' => 'spreadsheetId'
	]);
	
/* 	echo "<pre>";
	print_r($spreadsheet);
	echo "</pre>"; */
	
	$sheetID = $spreadsheet->spreadsheetId;
	$range = "A1:C2";
	$values[] = array("Amount Label", "Room", "Amount Label");
	
	//Update google sheet
	if(isset($_SESSION['totalAmount'])){
		   //echo $_SESSION['totalAmount'];
		$values[] = array($_SESSION['amountLabel'], $_SESSION['room'], $_SESSION['totalAmount']);
		  
	   
		$body = new Google_Service_Sheets_ValueRange([
			'values' => $values]);
		$params = [
			'valueInputOption' => 'USER_ENTERED'
		];
	    $update = $service->spreadsheets_values->append($sheetID, $range, $body, $params);
		/* echo "<pre>";
		print_r($update);
		echo "</pre>"; */
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slider App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="main.css">
</head>

<body class="h-100">
<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <!-- Form -->
            <form class="form-example" id="form" method="post">
				<label for="Number of Rooms">Number of Rooms</label>
					<div id="slider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
					<div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 0%;"></div>
					<a class="ui-slider-handle ui-state-default ui-corner-all" id="handle" href="#" style="left: 0%"></a>
					</div>
					<input id="amount" class="form-control" type="hidden" value="0"></input>
					<p id="amount-label" class="price lead">0</p><br>
					
					<label for="Importance of Outdoor Living">Importance of Outdoor Living</label>
					<select class="form-control" name="selectRoom" id="selectRoom">
					<option value="0">Select Here</option>
					<option value="Not at all">Not at all</option>
					<option value="Somewhat">Somewhat</option>
					<option value="Neutral">Neutral</option>
					<option value="Very">Very</option>
					<option value="Extremely">Extremely </option></select><br>
					
					<div class="">
						TOTAL: $<span id="totalAmount">0</span><br><br>
						<button class="btn btn-warning" type="submit" onclick="window.location = '<?php echo $loginURL ?>';" >Save</button>
					</div><br>
					<div class="">
						<?php 
							if(isset($sheetID)){
							?>
							<a href="<?php echo "https://docs.google.com/spreadsheets/d/".$sheetID;?>" target="blank">Open Sheet</a>
							<?php
							}
						?>
					</div>
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="main.js"></script>
</body>

</html>