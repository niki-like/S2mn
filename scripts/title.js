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
      // console.log(data);
      data.forEach((item, i) => {//перебор массива
        // console.log(item + " --- " + i);
        $(".downArea").append("<option>" + item + "</option>")//занесение значений в выпадающий блок
        return data;
      });


      // $(".downArea").append("<option>"+dataLeinght+"</option>");
    }
  });
}







});
