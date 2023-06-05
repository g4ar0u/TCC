const questoes = document.querySelectorAll('.questoes');
const alternativas = document.querySelectorAll('.alternativas');
const bntRestart = document.querySelector('.finish button');

let currentIndex = 0;
let questionsCorrect = 0;
let questionsIncorrect = 0;

bntRestart.onclick = () => {
    currentIndex = 0;
    questionsCorrect = 0;
    questionsIncorrect = 0;
    document.querySelector('.finish span').innerHTML = "";

    questoes.forEach((questao) => {
        questao.classList.add("d-none");
    });
    questoes[0].classList.remove('d-none');
}

questoes[0].classList.remove('d-none');

alternativas.forEach((alternativa) => {
    
    alternativa.addEventListener('click', () => {
        if(alternativa.getAttribute("data-correct") == 1) {
            questionsCorrect++;
        }
        else{
            if (currentIndex == questoes.length - 1) {
                questionsIncorrect++
            }
        }
    
        if(currentIndex < questoes.length - 1) {
            currentIndex++;
            questoes[currentIndex-1].classList.add('d-none');
            questoes[currentIndex].classList.remove('d-none');
                
        }else{
            if (questionsIncorrect == 0) {
                document.querySelector('.finish span').innerHTML = `Você acertou ${questionsCorrect} de ${questoes.length}`;
                if(questoes.length == questionsCorrect) {
                    document.getElementById('quizzForm').submit();
                }
            }else{
                alert("Reinicie o Quizz para tentar novamente!");
            }

        }
            
    });
    
 });