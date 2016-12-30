
<?php 
$string = file_get_contents('comments_json.json');
$json_a = json_decode($string, true);
$comments = array();
$answers = array();

foreach($json_a as $a => $b) {
	array_push($comments, $b['comment']);
	array_push($answers, $b['answer']);
}

// The indentions looks a bit messy here but, for some reason, it was required to 
// print pretty HTML.
for($i = 0; $i < 5; $i++) { ?>
				<div class="flex-container">
<?php for($j = 0; $j < 5; $j++) { 
					$id = (($i*5) + $j); ?>
					<div class="flex-item" id="item-<?=$id?>" data-grid-no="<?=$id?>">
						<!-- <div class="flex-item-content"><?=$comments[(($i*5) + $j)]?></div> -->
						<img src="img/pieces/<?=$id+1?>.png" class="piece" id="piece-<?=$id?>">
						<div class="flex-item-piece"></div>
					</div>
<?php } ?>
				</div>

<?php } 
for($i = 0; $i < 25; $i++) { ?>
				<div class="fade-helper" id="cover-<?=$i?>">
					<div class="flex-item-cover">
						<div class="flex-item-cover-wrapper">
							<div class="flex-item-cover-content">
								<button class="btn btn-close" data-close="cover-<?=$i?>"><i class="fa fa-times" aria-hidden="true"></i> Stäng</button>
								<h2><?=$comments[$i]?></h2>
								<p class="answer" id="answer-<?=$i?>"><?=$answers[$i]?></p>
							</div>
							<div class="buttons">
								<button class="btn btn-copy" data-copy="answer-<?=$i?>"><i class="fa fa-clipboard" aria-hidden="true"></i> Kopiera svar</button>
								<button class="btn btn-remove" data-remove="<?=$i?>"><i class="fa fa-undo" aria-hidden="true"></i> Ta bort bricka</button>
							</div>
						</div>
					</div>
				</div>

<?php } ?>