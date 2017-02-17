$(function(){

  //SELECT
  $(".piece").click(function(){
    if($("td").hasClass("piece-selected") && $("td").hasClass("position-selected")){
      if($(this).children().hasClass("player1")){
        console.log("case1");
        $(".position-selected").css("border", "2px solid black");
        $(".piece-selected").css("border", "2px solid black");
        $("td").removeClass("piece-selected");
        $("td").removeClass("position-selected");
        $(this).css("border", "4px solid green");
        $(this).addClass("piece-selected");
      }
      else{
        console.log("Case2");
        $(".position-selected").css("border", "2px solid black");
        $("td").removeClass("position-selected");
        $(this).css("border", "4px solid red");
        $(this).addClass("position-selected");
      }
    }

    //2. If player ALREADY selected piece and NOT choose any position:
    if($("td").hasClass("piece-selected") && !($(this).children().hasClass("player1"))){
      console.log("case3");
      $(this).css("border", "4px solid red");
      $(this).addClass("position-selected");
    }
    else if ($("td").hasClass("piece-selected")){
      console.log("case4");
      $(".piece-selected").css("border", "2px solid black");
      $("td").removeClass("piece-selected");
      $(this).css("border", "4px solid green");
      $(this).addClass("piece-selected");
    }
    //1. no piece or positions are selected (beginning)
    else if ($(this).children().hasClass("player1")){
      console.log("case5");
      $(this).css("border", "4px solid green");
      $(this).addClass("piece-selected");
    }


    //Passing Player's position and Moving&Attack Position
    var thisPosition = $(".piece-selected").attr('id');
    var moveAttackPosition = $(".position-selected").attr('id');

    if(thisPosition && moveAttackPosition){
      thisPosition = thisPosition.replace(/[^0-9]*/g,"");
      moveAttackPosition = moveAttackPosition.replace(/[^0-9]*/g,"");

      var thisRPos = thisPosition[1];
      var thisCPos = thisPosition[0];
      var moveAtckRPos = moveAttackPosition[1];
      var moveAtckCPos = moveAttackPosition[0];
      $("#this_r").val(thisRPos);
      $("#this_c").val(thisCPos);
      $("#move_atck_r").val(moveAtckRPos);
      $("#move_atck_c").val(moveAtckCPos);
    }
  });
});
