$(document).ready(function() {

startedAJAX();//добавляет подписки в выпадающее меню



function startedAJAX() {
  $.ajax({
    url: '../php/titleAJAX.php',
    dataType: 'json',
    data: "subscribe",
    success: function(data) {
      data = (JSON.parse(JSON.stringify(data)));
      // console.log(data);
      data.forEach((item, i) => {
        // console.log(item + " --- " + i);
        $(".downArea").append("<option>" + item + "</option>")
        return data;
      });


      // $(".downArea").append("<option>"+dataLeinght+"</option>");
    }
  });
}







});
