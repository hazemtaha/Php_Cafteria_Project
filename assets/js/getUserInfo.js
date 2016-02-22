$(function(){
  $.ajax({
    url:"../controllers/usersController.php",
    method:"post",
    data:{
      "dest":"getUserInfo"
    },
    success:function(response) {
      console.log(response);
      $('#userName').text(response['u_name']);
      $('#userImg').attr('src',response['u_img']);
    },
    error:function(xmlHttpRequestObj,status,error) {
      console.log(error);
    },
    complete:function(xmlHttpRequestObj) {
      console.log("Complete ");
    },
    dataType:"json",
    async:true
  });
});