/* MASK */
$(function() {
  $('#moeda').maskMoney({
      thousands: '',
      decimal: '.'
  });

})

/* MENU HAMBURGUER */
function menu(el) {
  var display = document.getElementById(el).style.display;
  if(display == "block")
      document.getElementById(el).style.display = 'none';
  else
      document.getElementById(el).style.display = 'block';
}
