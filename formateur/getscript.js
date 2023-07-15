
// $(document).ready(
// function(){
//   $('#sl').on('change',function(){
//    var sl =$(this).val();
//     $.ajax({
//       type:"POST",
//      url:"allaprenties.php",
//      data:{
//        idfl:sl
//      },
//      success:function(data){
//       $('#allstudents').html(data);
//       console.log(data);
//      }
//     })
//   });
//  }
//  );
function getallff(){
  $.ajax({
    url: "allfilier.php",
    type: "POST",
    dataType: "html",
    success: function(data){
      $("#allfl").html(data);
    }
  });
}
getallff();


 $(document).ready(function(){
  $('#sl').on('change', function(){
      var sl = $(this).val();
          $.ajax({
              type:'POST',
              url:'allaprenties.php',
              data:'sl='+sl,
              success:function(html){
                $('#tb').html(html);
              }
          }); 
        });
  });



 function getallapp(){
    $.ajax({
      url: "allaprenties.php",
      type: "POST",
      dataType: "html",
      success: function(data){
        $("#tb").html(data);
      }
    });

  }





  function getallapp2(){
    $.ajax({
      url: "allaprentiesgrid.php",
      type: "POST",
      dataType: "html",
      success: function(data){
        $("#tb2").html(data);
      }
    });

  }


  getallapp();
  getallapp2();
