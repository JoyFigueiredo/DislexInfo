
	  		const timer = document.getElementById('contador');
			  var min = 0;
			  var sec = 0;
			  var stoptime = true;
			  var resultados = [];
			  var respostas = [];
			  var count=0;
		
		  function mudar_numero(){
			  var aux = $('#dificuldade_s').val();
			  $('#dificuldade_i').val(aux);
		  }
		  
		  function startTimer() {
			  if (stoptime == true) {
				  stoptime = false;
				  timerCycle();
			  }
		  }
		  function stopTimer() {
			  if (stoptime == false) {
			  stoptime = true;
			  }
		  }
  
		  function timerCycle() {
			  if (stoptime == false) {
			  sec = parseInt(sec);
			  min = parseInt(min);
  
			  sec = sec + 1;
  
			  if (sec == 60) {
			  min = min + 1;
			  sec = 0;
			  }
  
			  if (sec < 10 || sec == 0) {
			  sec = '0' + sec;
			  }
			  if (min < 10 || min == 0) {
			  min = '0' + min;
			  }
  
			  timer.innerHTML = min + ':' + sec;
  
			  setTimeout("timerCycle()", 1000);
		  }
		  }
  
		  function resetTimer() {
			  timer.innerHTML = '00:00';
			  sec = 0;
			  min = 0;
		  }
		  
		  function confirma(){
			  var dificuldade = $('#dificuldade_select').val();
			  var auxiliar;
			  
			  switch(dificuldade){
				  case '1':
					  auxiliar=1;
					  break;
				  case '2':
					  auxiliar=6;
					  break;
				  case '3':
					  auxiliar=10;
					  break;
			  }
			  var aux = $('#dificuldade_s').val();
			  var valor = Math.floor(Math.random() * 5)+auxiliar;
			  $('#numero_um').val(valor);
					  
			  resultados[count] = aux*valor;
			  var resp = $('#resultado').val();
			  respostas[count] = resp;
			  if(count==5){
				  stopTimer();
				  var acertos=0;
				  for(var i=0; i<5; i++){
					  if(respostas[i+1] == resultados[i]){
						  acertos++;
					  }
				  }
				  alert('Acertos: ' + acertos);
				  count=0;
				  respostas = [];
				  resultados = [];
				  $('#proximo').addClass('hide');
				  $('#btninicio').removeClass('disabled');
			  }
			  count++;
		  }
		  
		  function tabuada(){
				  var dificuldade = $('#dificuldade_select').val();
				  var tabua = $('#dificuldade_s').val();
				  
				  if(dificuldade==null || tabua==null){
					  alert('Dificuldade ou tabuada não selecionada.');
				  }else{
				  resetTimer();
				  startTimer();
				  $('#proximo').removeClass('hide');
				  confirma();
				  $('#btninicio').addClass('disabled');
				  }
			  //facil = 1 a 5
			  //medio = 5 a 9
			  //dificil = 11 a 15
		  }