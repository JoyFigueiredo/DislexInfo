
		var texto = $('#text').text();
		

		$(function(){
			
	
		var getTextNodesIn = function(el) { // Look at all the page elements and returns the text nodes
			return $(el).find(":not(iframe,script)").addBack().contents().filter(function() {
				return this.nodeType == 3; // Text node types are type 3
			});
		};
	
		// var textNodes = getTextNodesIn($("p, h1, h2, h3","*"));
		var textNodes = getTextNodesIn($("p"));
	
		function isLetter(char) {
			
			return /^[\d]$/.test(char);
		}
	
		var wordsInTextNodes = [];
		for (var i = 0; i < textNodes.length; i++) {
			var node = textNodes[i];
	
			var words = []
	
			var re = /\w+/g;
			var match;
			while ((match = re.exec(node.nodeValue)) != null) {
	
				var word = match[0];
				var position = match.index;
	
				words.push({
					length: word.length,
					position: position
				});
			}
	
			wordsInTextNodes[i] = words;
		};
	
		function messUpWords () {
			var aux =0;
	
			for (var i = 0; i < textNodes.length; i++) {
	
				var node = textNodes[i];
	
				for (var j = 0; j < wordsInTextNodes[i].length; j++) {
	
					var selecao = $('#selecao').val();
					switch(selecao){
						
						case '1':
							aux = 1/30;
							break;
						case '2':
							aux = 1/20;
							break;
						case '3':
							aux = 1/10;
							break;
	
					}
				
					// Intensidade
					
					if (Math.random() > aux) {
	
						continue;
					}
					
	
					var wordMeta = wordsInTextNodes[i][j];
	
					var word = node.nodeValue.slice(wordMeta.position, wordMeta.position + wordMeta.length);
					var before = node.nodeValue.slice(0, wordMeta.position);
					var after  = node.nodeValue.slice(wordMeta.position + wordMeta.length);
	
					node.nodeValue = before + messUpWord(word) + after;
				};
			};
		}
	
		function trocaletra(){
			if(text.indexOf('p') || text.indexOf('P')){
	
			}
			
		}
	
		function messUpWord (word) {
	
			if (word.length < 3) {
	
				return word;
			}
	
			return word[0] + messUpMessyPart(word.slice(1, -1)) + word[word.length - 1];
		}
	
		function messUpMessyPart (messyPart) {
	
			if (messyPart.length < 2) {
	
				return messyPart;
			}
			
			var a, b;
			while (!(a < b)) {
				/*
				a = text.indexOf('d');
				b = text.indexOf('b');
				*/
				
				a = getRandomInt(0, messyPart.length - 1);
				b = getRandomInt(0, messyPart.length - 1);
				
			}
	
			return messyPart.slice(0, a) + messyPart[b] + messyPart.slice(a+1, b) + messyPart[a] + messyPart.slice(b+1);
		}
	
		// From https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math/random
		function getRandomInt(min, max) {
	
			return Math.floor(Math.random() * (max - min + 1) + min);
		}
	
	
			setInterval(messUpWords, 50);
		});	