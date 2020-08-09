$(document).ready(function() {

var position = "right";
    
    
$(".switch").on("click", function(){
    
    if(position == "right"){
        $(".context").css({
            marginLeft:"-50vw"
        });
        $(".switchR").css({
            color:"#ff8e8e"
        });  
        $(".switchA").css({
            color:"#fff"
        }); 
        position = "left";
    }else{
        $(".context").css({
            marginLeft:"0vw"
        });
        $(".switchA").css({
            color:"#ff8e8e"
        }); 
        $(".switchR").css({
            color:"#fff"
        }); 
        position = "right";
    }
    
    
})
  
//$("input[name='ALogin']").on("focusout", function(){
//    $(this).load(
//        "test.php",
//        {
//            ALogin: $("input[name='ALogin']").val()
//        },
//        function(data){
//            alert(data)
//        }
//    )
//})

    
$("input[name='Enter']").on("click", function(){
    var login = $("input[name='ALogin']").val();
    var password = $("input[name='APassword']").val();
    if(login != "" && password !=""){
//        $("input[name='ALogin']").val(login);
//        $("input[name='APassword']").val(password);
        $.ajax({
            url:"php/ajax.php",
            type:$("#autorization").attr("method"),
            data:({
                ALogin:login,
                APassword:password
            }),
            beforeSand:function(){},
            success: function(data){
        alert(data);
    }
        })
    }else if(login == "" && password ==""){
        alert("поля не заполнены");
    }else if(login == "" ){
        alert("логин не заполнен");
    }else if(password == "" ){
        alert("пароль не заполнен");
    }
})
    
    
    
    
    
    
    
    
    
    
    
    
    
    



}); 