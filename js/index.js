var board = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
var rowbingo = [];
var colbingo = [];
var diagonalbingo = [];

function format(str) {
	var links = str.match(/(http.*?)(?=\")/g);
	if(links) {
		var i = 1;
		var tmp = str.replace(/<\/a>/g, function getLink() { return '(' + i++ + ')'; });
		tmp = tmp.replace(/(<([^>]+)>)/g, '');
		tmp += '\n';
		$.each(links, function(index, value) {
			tmp += '\n(' + (index+1) + ') ' + value;
		});
		return tmp;
	}
	return str;
}

function copyToClipboard(elementId) {
	// Put text into hidden textarea
	$('#copyhelp').val($('#' + elementId)[0].innerHTML);

	// Format text
	var tmp = format($('#copyhelp').val());

	// Replace old text with formatted text
	$('#copyhelp').val(tmp);

	// Highlight its content
	$('#copyhelp').focus();
	$('#copyhelp').select();

	// Copy the highlighted text to clipboard
	document.execCommand("copy");
}

function rowBingo(board) {
	var row;
	var nextrow = 4;

	for(var i = 0; i < board.length; i++) {
		row = ((i+1)/5)-1;
		if(jQuery.inArray(row, rowbingo) == -1) {
			if(board[i] == 0) {
				i = nextrow;
				nextrow += 5;
			}
			else if(i % 5 == 4) {
				rowbingo.push(row);
				for(var j = i - 4; j < i+1; j++) {
					board[j] += 1;
					$('#item-' + j).addClass('flex-item-bingo');
				}
				return 1;
			}
		}
	}
	return 0;
}

function colBingo(board) {
	for(var i = 0; i < 5; i++) {
		if(jQuery.inArray(i, colbingo) == -1) {
			if(board[i] > 0) {
				for(var j = i+5; j < 25; j += 5) {
					if(board[j] == 0) break;
					else if(j > 19 && j < 25) {
						colbingo.push(j%5);
						for(var k = j - 20; k <= j; k += 5) {
							board[k] += 1;
							$('#item-' + k).addClass('flex-item-bingo');
						}
						return 1;
					}
				}
			}
		}
	}
	return 0;
}

function diagonalBingo(board) {
	var ret = 0;
	if(jQuery.inArray(1, diagonalbingo) == -1) {
		for(var i = 0; i < 25; i += 6) {
			if(board[i] == 0) break;
			else if(i == 24) {
				diagonalbingo.push(1);
				for(var j = 0; j < 25; j += 6) {
					board[j] += 1;
					$('#item-' + j).addClass('flex-item-bingo');
				}
				ret = 1;
			}
		}
	}
	if(jQuery.inArray(2, diagonalbingo) == -1) {
		for(var i = 4; i < 21; i += 4) {
			if(board[i] == 0) break;
			else if(i == 20) {
				diagonalbingo.push(2);
				for(var j = 4; j < 21; j += 4) {
					board[j] += 1;
					$('#item-' + j).addClass('flex-item-bingo');
				}
				ret = 1;
			}
		}
	}
	return ret;
}


function bingoCheck(board, ding) {
	var row = rowBingo(board);
	var col = colBingo(board);
	var dia = diagonalBingo(board);
	if((row || col || dia) && ding) {
		$('#cover-bingo').fadeIn(200);
		$('#ding')[0].play();
	}
}

function getRow(n) {
	return 	(n < 5) ? 0 : 
			(n > 4 && n < 10) ? 1 : 
			(n > 9 && n < 15) ? 2 : 
			(n > 14 && n < 20) ? 3 : 4;
}

function getCol(n) {
	return n%5;
}

function getDiagonal(n) {
	return (n == 12) ? 3 : (n % 6 == 0) ? 1 : (n % 4 == 0) ? 2 : 0;
}

function decreaseDeclass(n) {
	current = board[n];
	if(current > 0)
		board[n] -= 1;
	switch(current) {
		case 1: $('#item-' + n).removeClass('flex-item-checked');
		case 2: $('#item-' + n).removeClass('flex-item-bingo');
	}
}

function removePiece(n) {
	// find row, col and diagonal position
	var row = getRow(n);
	var col = getCol(n);
	var diagonal = getDiagonal(n);

	var rowbingopos = jQuery.inArray(row, rowbingo);
	var colbingopos = jQuery.inArray(col, colbingo);
	var diagonalbingopos = jQuery.inArray(diagonal, diagonalbingo);

	console.log('rowbingopos: ' + rowbingopos);
	console.log('colbingopos: ' + colbingopos);

	var current;

	// remove piece
	board[n] = 0;
	$('#item-' + n).removeClass('flex-item-checked flex-item-bingo');
	$('#item-' + n).find('.flex-item-piece').fadeOut(200);
	$('#cover-' + n).fadeOut(200);

	// decrease and declass row
	if(rowbingopos != -1) {
		rowbingo.splice(rowbingopos, 1)
		for(var i = row*5; i < (row*5)+5; i++) {
			console.log('Decreasing row: ' + i);
			decreaseDeclass(i);
		}
	}

	// decrease and declass column
	if(colbingopos != -1) {
		rowbingo.splice(colbingopos, 1)
		for(var i = col; i <= col+20; i += 5) {
			console.log('Decreasing col: ' + i);
			decreaseDeclass(i);
		}
	}

	// decrease and declass diagonal
	if(diagonal > 0 && diagonalbingopos != -1) {
		var pos; 
		if(diagonal == 1) {
			for(var i = 0; i < 25; i += 6)
				decreaseDeclass(i);
			pos = jQuery.inArray(1, diagonalbingo);
			console.log('Decreasing diagonal 1: ' + i);
			if(pos != -1)
				diagonalbingo.splice(pos,1);
		}
		else if(diagonal == 2) {
			for(var i = 4; i <= 20; i += 4)
				decreaseDeclass(i);
			pos = jQuery.inArray(2, diagonalbingo);
			console.log('Decreasing diagonal 2: ' + i);
			if(pos != -1)
				diagonalbingo.splice(pos,1);
		}
		else if(diagonal == 3) {
			for(var i = 0; i < 25; i += 6)
				decreaseDeclass(i);
			for(var i = 4; i <= 20; i += 4)
				decreaseDeclass(i);
			pos = jQuery.inArray(1, diagonalbingo);
			if(pos != -1)
				diagonalbingo.splice(pos,1);
			pos = jQuery.inArray(2, diagonalbingo);
			if(pos != -1)
				diagonalbingo.splice(pos,1);
			console.log('Decreases both diagonals');
		}
	}

		console.log(board);
}

$(function() {
	var firstClick = 1;


	$('.flex-item').click(function() {
		var no = $(this).attr('data-grid-no');

		$(this).find('.flex-item-piece').fadeIn(200);
		if($(this).hasClass('flex-item-checked') || $(this).hasClass('flex-item-bingo')) {
			$('#cover-' + no).fadeIn(200);
		}
		else {
			$('#click-' + (Math.floor(Math.random() * 5) + 1))[0].play();
			//$.playSound('sounds/click' + (Math.floor(Math.random() * 5) + 1));
			$(this).addClass('flex-item-checked');
			board[no] += 1;
			bingoCheck(board, true);
		}

		if(firstClick) {
			
			setTimeout(function() {
			 	$('.tip').fadeIn(500);
			}, 200);

			firstClick = 0;
			setTimeout(function() {
			 	$('.tip').fadeOut(1000);
			}, 3000);
		}
		// console.log(board);
	});

	$('.btn-copy').click(function() {
		copyToClipboard($(this).attr('data-copy'));
	});

	$('.btn-remove').click(function() {
		removePiece($(this).attr('data-remove'));
	});

	$('.btn-close').click(function() {
		$('#' + $(this).attr('data-close')).fadeOut(200);
	});
	$('.fade-helper').click(function() {
		$(this).fadeOut(200);
	});
	$('.flex-item-cover-wrapper').click(function(event){
	    event.stopPropagation();
	});


});
