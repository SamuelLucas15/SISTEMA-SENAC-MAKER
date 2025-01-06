// Lista de cores escolhidas
const colors = ["red", "blue", "green","#0ff", "#ff00ff", "#7d00ff", "#8a2be2", "yellow", "orange"];

// Seleciona todas as divs com a classe "colorful-div"
const border = document.querySelectorAll('.conteudo');

// Função para escolher uma cor aleatória da lista
function getRandomColor() {
  return colors[Math.floor(Math.random() * colors.length)];
}

// Aplica uma cor aleatória na borda esquerda de cada div
border.forEach(div => {
  div.style.borderLeftColor = getRandomColor();
});