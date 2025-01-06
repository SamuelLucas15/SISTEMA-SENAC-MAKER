$(document).ready(function(){
  $('.search_select_box select').selectpicker();
});

$(document).ready( function () {
  $('#myTable').DataTable({
    searching: true,  
    responsive: true,
    language: {
      url:"https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
    }
  });
});

const button = document.querySelector(".botao")
const modal = document.querySelector("dialog")
const exit = document.querySelector(".fa-xmark")
const fundo = document.querySelector(".fundo-grey")

button.onclick = () => {
  modal.showModal()
  fundo.classList.toggle('ativado')
}
exit.onclick = () => {
  modal.close()
  fundo.classList.remove('ativado')
}