$(document).ready(function() {
  let lengthEl = $('.lesson-content').length;
  let a = 170, b = 243, c = 156;
  for (var i = 0; i < lengthEl; i++) {
    a += 20;
    a = (a > 255) ? a - 105 : a;
    b += 60;
    b = (b > 255) ? b - 105 : b;
    c += 70;
    c = (c > 255) ? c - 105 : c;
    $('.lesson-content').eq(i).css('background-color', 'rgb('+a+', '+b+', '+c+')');
  }
});
