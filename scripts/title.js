$(document).ready(function() {
//порядок вызова функций не менять местами, а добавлять в конец...
startedAJAX();//добавляет подписки в выпадающее меню
///////////////////////////////////////////////////////////////////////
function startedAJAX() {// 3
  $.ajax({
    url: '../php/titleAJAX.php',
    dataType: 'json',
    data: "subscribe",
    success: function(data) {

      data = (JSON.parse(JSON.stringify(data)));//декодирование данных
      console.log("представдение: ");
      console.log(data["findArticles"]);
      console.log("конец");
      data["findArticles"].forEach((item, i) => {
        Object.values(item).forEach((elem, i) => {
          console.log(elem);
          $(".articles").append("<div class=\"article\"><p class=\"articleID\">ID статьи в базе данных: "+ elem["id"] +"</p><div class=\"title\">"+ elem["name"] +"</div><div class=\"clarification\">"+ elem["clarification"] +"</div></div>");
        });

      });





      // Object.values(data).forEach((item, i) => {
      //   console.log(item);
      // });

      // Object.keys(data).forEach((item, i) => {
      //   console.log(item);
      // });

      data["subscribesNAME"].forEach((item, i) => {//перебор массива
        // console.log(item + " --- " + i);

        $(".downArea").append("<option>" + item + "</option>")//занесение значений в выпадающий блок

      });

      // $(".downArea").append("<option>"+dataLeinght+"</option>");
    }
  });
}

$(window).on("scroll", function () {

  if ($(window).scrollTop() > ($(window).height()/3)){
    $(".box").css({
      opacity : 0
    })
  }
  if ($(window).scrollTop() < ($(window).height()/3)){
    $(".box").css({
      opacity : 1
    })
  }
})

let q = "up";
$('html').keydown(function(eventObject){ //отлавливаем нажатие клавиш
  if (event.keyCode == 192) { //если нажали Ctrl+q
    if (q == "up") {
      $(".articleID").css({opacity: 1});
      q = "down";
    }else {
      $(".articleID").css({opacity: 0});
      q = "up";
    }
  }
});




// console.log($(document).scrollTop());
// console.log($(document).width());
// console.log($("body").innerWidth());

});
