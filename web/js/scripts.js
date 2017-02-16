$(function(){






  //SELECT
  $(".piece").click(function(){
    //remove red border color if user clicked another piece
    if($("td").hasClass("on")){
      $("td").css("border", "2px solid black");
      $("td").removeClass("on");
    };

    //add red border and pass current XY positionif user clicked specific piece
    $(this).css("border", "3px solid red");
    $(this).addClass("on");
    var thisPosition = this.id.replace(/[^0-9]*/g,"");
    var thisXPosition = thisPosition[1];
    var thisYPosition = thisPosition[0];
    $("#clicked-x").val(thisXPosition);
    $("#clicked-y").val(thisYPosition);
  });

});
