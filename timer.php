<?php
	session_start();
	
		if(isset($_POST['back']))
 			header("Location: index.php");		
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Countdown</title>
		<link rel="stylesheet" href="style.css">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		
	</head>
	<style>
	.vertical-center {

		  min-height: 10vh; /* These two lines are counted as one :-)       */
		  
		  align-items: center;
		}
		.form-horizontal{
			margin-top: 15em;
		}
	</style>
	<body class="container vertical-center" style="background-image: url('https://cdn.shutterstock.com/shutterstock/videos/3006571/thumb/1.jpg?i10c=img.resize(height:160)'); color:antiquewhite; background-size: cover; ">
		<div id="app" style="max-height: 100px;"></div>
		
		<script type="text/javascript">
			
		 
			var m  = Number("<?php echo $_SESSION['min']; ?>");
			var h  = Number("<?php echo $_SESSION['hr']; ?>");
			var s  = Number("<?php echo $_SESSION['sec']; ?>");
			var v = h*3600 + m * 60 + s;
			if (v==0)
			{
				alert("Enter a value");
				window.location.href = "index.php";
			}
				
			const FULL_DASH_ARRAY = 283;
			const WARNING_THRESHOLD = 10;
			const ALERT_THRESHOLD = 5;


			const COLOR_CODES = {
			  info: {
				color: "white"
			  },
			  warning: {
				color: "orange",
				threshold: WARNING_THRESHOLD
			  },
			  alert: {
				color: "red",
				threshold: ALERT_THRESHOLD
			  }
			};

			console.log(v);
			const TIME_LIMIT = v;
			let timePassed = 0;
			let timeLeft = TIME_LIMIT;
			let timerInterval = null;
			let remainingPathColor = COLOR_CODES.info.color;

			document.getElementById("app").innerHTML = `
			<div class="base-timer">
			  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
				<g class="base-timer__circle">
				  <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
				  <path
					id="base-timer-path-remaining"
					stroke-dasharray="283"
					class="base-timer__path-remaining ${remainingPathColor}"
					d="
					  M 50, 50
					  m -45, 0
					  a 45,45 0 1,0 90,0
					  a 45,45 0 1,0 -90,0
					"
				  ></path>
				</g>
			  </svg>
			  <span id="base-timer-label" class="base-timer__label">${formatTime(
				timeLeft
			  )}</span>
			</div>
			`;

			startTimer();

			function onTimesUp() {
			  clearInterval(timerInterval);
			}

			function startTimer() {
			  timerInterval = setInterval(() => {
				timePassed += 1;
				timeLeft = TIME_LIMIT - timePassed;
				document.getElementById("base-timer-label").innerHTML = formatTime(
				  timeLeft
				);
				setCircleDasharray();
				setRemainingPathColor(timeLeft);

				if (timeLeft === 0) {
				  onTimesUp();
				}
			  }, 1000);
			}

			function formatTime(time) {
				let hour = Math.floor(time / 3600);
				let mn = time % 3600;
			  let minutes = Math.floor(mn / 60);
			  let seconds = time % 60;
				
			  if (seconds < 10) {
				seconds = `0${seconds}`;
			  }
			  if(minutes <10)
				  {
					  minutes = `0${minutes}`;
				  }
				if(minutes <10)
				  {
					  hour = `0${hour}`;
				  }

			  return `${hour}:${minutes}:${seconds}`;
			}

			function setRemainingPathColor(timeLeft) {
			  const { alert, warning, info } = COLOR_CODES;
			  if (timeLeft <= alert.threshold) {
				document
				  .getElementById("base-timer-path-remaining")
				  .classList.remove(warning.color);
				document
				  .getElementById("base-timer-path-remaining")
				  .classList.add(alert.color);
			  } else if (timeLeft <= warning.threshold) {
				document
				  .getElementById("base-timer-path-remaining")
				  .classList.remove(info.color);
				document
				  .getElementById("base-timer-path-remaining")
				  .classList.add(warning.color);
			  }
			}

			function calculateTimeFraction() {
			  const rawTimeFraction = timeLeft / TIME_LIMIT;
			  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
			}

			function setCircleDasharray() {
			  const circleDasharray = `${(
				calculateTimeFraction() * FULL_DASH_ARRAY
			  ).toFixed(0)} 283`;
			  document
				.getElementById("base-timer-path-remaining")
				.setAttribute("stroke-dasharray", circleDasharray);
			}

		</script>
		<form class="form-horizontal" method="post" class="row col-12" >
			<button href="index.php" name="back" class="btn btn-primary">Back</button>
		</form>

	</body>
</html>	 