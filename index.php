<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Veganbingo är en sida för dig som gillar bingo och veganism. Utmana dina veganvänner på en omgång eller spela själv och se hur snabbt du kan få bingo.">
	<meta name="keywords" content="Veganbingo, Vegan, Veganism, Djurrätt, Bingo, Politik, Vegetarian, Kött, Speciesism, Spel, Veganspel, Argument">
	<meta name="author" content="Veganbingo">

	<meta property="og:title" content="Veganbingo" />
	<meta property="og:type" content="website" /> 
	<meta property="og:url" content="http://veganbingo.se/" />
	<meta property="og:image" content="http://www.veganbingo.se/img/veganbingo-fb.jpg" />
	<meta property="og:description" content="Veganbingo är en sida för dig som gillar bingo och veganism. Utmana dina veganvänner på en omgång eller spela själv och se hur snabbt du kan få bingo." />

	<meta name="twitter:title" content="Veganbingo">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:url" content="http://veganbingo.se/">
	<meta name="twitter:image" content="http://www.veganbingo.se/img/veganbingo-twitter.jpg">
	<meta name="twitter:description" content="Veganbingo är en sida för dig som gillar bingo och veganism. Utmana dina veganvänner på en omgång eller spela själv och se hur snabbt du kan få bingo.">
	
	<title>Veganbingo</title>

	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	
</head>
<body>
	<div class="wrapper">
		
		<div class="bingo-card">
			<img src="img/logo.png" alt="Veganbingo logo" class="header-logo">
			<div class="tip">Klicka på brickan igen för att få exempel på svar</div>
			<div class="grid">
				<?php include('_grid.php'); ?>

			</div>

			<div class="info instructions">
			<p>Lägg en bricka när du hör någon av kommentarerna. <br>
			Om du klickar på en lagd bricka får du svar på tal.</p>
			</div>

			<hr>
			
			<div class="social">
				<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.veganbingo.se%2F&amp;src=sdkpreparse" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> DELA PÅ FACEBOOK</a>
				<span onclick="$('#cover-about').fadeIn(200);"><i class="fa fa-question-circle" aria-hidden="true"></i> OM VEGANBINGO</span>
				<a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Fveganbingo.se&ref_src=twsrc%5Etfw&text=Spela%20Veganbingo%20med%20dig%20sj%C3%A4lv%20eller%20med%20en%20v%C3%A4n!&tw_p=tweetbutton&url=http%3A%2F%2Fveganbingo.se" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> DELA PÅ TWITTER</a>
				
			</div>

			<div class="fade-helper" id="cover-about">
				<div class="flex-item-cover">
					<div class="flex-item-cover-wrapper">
						<div class="flex-item-cover-content">
							<button class="btn btn-close" data-close="cover-about"><i class="fa fa-times" aria-hidden="true"></i></button>
							<h2>Om Veganbingo</h2>
							<p>
								Veganbingo är en sida för dig som gillar bingo och veganism. Utmana dina vänner på en omgång eller spela själv och se hur snabbt du kan få bingo. Lägg en bricka genom att trycka direkt på din mobiltelefon eller skriv ut bingobrickan och spela på gammalt hederligt sätt. Om du spelar en rad, två rader eller hela brickan bestämmer du själv. 
							</p>
							<p>
								Veganbingo är skapad av några personer som tycker att djur har rätt att leva för sin egen skull.
							</p>
							<p>
								Lycka till!
							</p>
							
							<p>
								<a href="img/veganbingo_pdf.pdf" target="_blank">Ladda ner en PDF-version av bingobrickan här.</a><br>
								<a href="img/veganbingo.jpg" target="_blank">Ladda ner en JPG-version av bingobrickan här.</a>
							</p>
							
							<h3>Kontakta oss</h3>
							<div id="form-messages"></div>
							<form id="ajax-contact" class="contact" action="php/mailer.php" method="POST">
								<input type="text" id="name" name="name" placeholder="Namn" required></input>
								<input type="email" id="email" name="email" placeholder="E-post" required></input>
								<textarea id="msg" name="msg" rows="6" placeholder="Meddelande" required></textarea>
								<div class="g-recaptcha" data-sitekey="6LdyHAwUAAAAAA6Uzb0xn_YyYcr9QBWDCB_Gyitm" style=""></div>
						</div>
						<div class="buttons">
								<input class="btn" type="submit" value="Skicka meddelande"></input>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="fade-helper" id="cover-bingo">
				<div class="flex-item-cover">
					<div class="flex-item-cover-wrapper">
						<div class="flex-item-cover-content">
							<button class="btn btn-close" data-close="cover-bingo"><i class="fa fa-times" aria-hidden="true"></i></button>

							<p class="bingo-top">Grattis Du har fått</p>
		
							<h1>VEGAN<br>BINGO</h1>
							<div class="bingo-share">
								<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.veganbingo.se%2F&amp;src=sdkpreparse" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> DELA PÅ FACEBOOK</a>
								<a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Fveganbingo.se&ref_src=twsrc%5Etfw&text=Jag%20har%20f	%C3%A5tt%20veganbingo!&tw_p=tweetbutton&url=http%3A%2F%2Fveganbingo.se" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> DELA PÅ TWITTER</a>
							</div>
							
							
							<div class="corner ctl">
								<div class="corner-base"></div>
								<div class="corner-middle"></div>
								<div class="corner-corner"></div>
							</div>

							<div class="corner ctr">
								<div class="corner-base"></div>
								<div class="corner-middle"></div>
								<div class="corner-corner"></div>
							</div>

							<div class="corner cbl">
								<div class="corner-base"></div>
								<div class="corner-middle"></div>
								<div class="corner-corner"></div>
							</div>

							<div class="corner cbr">
								<div class="corner-base"></div>
								<div class="corner-middle"></div>
								<div class="corner-corner"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>

		<div class="corner ctl">
			<div class="corner-base"></div>
			<div class="corner-middle"></div>
			<div class="corner-corner"></div>
		</div>

		<div class="corner ctr">
			<div class="corner-base"></div>
			<div class="corner-middle"></div>
			<div class="corner-corner"></div>
		</div>

		<div class="corner cbl">
			<div class="corner-base"></div>
			<div class="corner-middle"></div>
			<div class="corner-corner"></div>
		</div>

		<div class="corner cbr">
			<div class="corner-base"></div>
			<div class="corner-middle"></div>
			<div class="corner-corner"></div>
		</div>

		<textarea id="copyhelp"></textarea>
		
		<audio id="click-1" preload="auto" autobuffer>
			<source src="sounds/click1.ogg" type="audio/ogg">
			<source src="sounds/click1.mp3" type="audio/mpeg">
		</audio>
		<audio id="click-2" preload="auto" autobuffer>
			<source src="sounds/click2.ogg" type="audio/ogg">
			<source src="sounds/click2.mp3" type="audio/mpeg">
		</audio>
		<audio id="click-3" preload="auto" autobuffer>
			<source src="sounds/click3.ogg" type="audio/ogg">
			<source src="sounds/click3.mp3" type="audio/mpeg">
		</audio>
		<audio id="click-4" preload="auto" autobuffer>
			<source src="sounds/click4.ogg" type="audio/ogg">
			<source src="sounds/click4.mp3" type="audio/mpeg">
		</audio>
		<audio id="click-5" preload="auto" autobuffer>
			<source src="sounds/click5.ogg" type="audio/ogg">
			<source src="sounds/click5.mp3" type="audio/mpeg">
		</audio>
		<audio id="ding" preload="auto" autobuffer>
			<source src="sounds/bingo.ogg" type="audio/ogg">
			<source src="sounds/bingo.mp3" type="audio/mpeg">
		</audio>

	</div>
	
	<script src="js/jquery-2.2.0.js"></script>
	<script src="js/jquery.playSound.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/index.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	

</body>
</html>
