// JavaScript Document
$(document).ready(function() {
  setInterval(function(){
    getHistory();
    getUserStatus();
  },500);
});

function getHistory(){
  $.ajax({
    type: "POST",
    url: "controllers/controller_record.php",
    data: "submit=View",
    dataType: "json",
    beforeSend: function(){
        //console.log("before send");
      },
    error: function(){
        //console.log("error");
      },
    success: function(data){
      //console.log("success");
    }
  }).done(function(data){
    //console.log("done");
    //console.log(data);

    var trHTML = '';
    $.each(data, function(i, data) {
        //console.log(data);
        trHTML += '<tr><td>' + data.id + '</td><td>' + data.create_datetime + '</td></tr>';
    });
    $('#records_table').empty().append(trHTML);

  });

}

function getUserStatus(){
  $.ajax({
    type: "POST",
    url: "controllers/controller_user.php",
    data: "submit=ViewID&idtag=687901711282",
    dataType: "json",
    beforeSend: function(){
        //console.log("before send");
      },
    error: function(){
        //console.log("error");
      },
    success: function(data){
      //console.log("success");
    }
  }).done(function(data){
    //console.log("done");
    //console.log(data);
    if(parseInt(data[0].status) % 2 != 0){
        $(".status_user").empty().append("<span class='verde'></span>");
    }else{
        $(".status_user").empty().append("<span class='rojo'></span>");
    }
    $(".username_user").empty().append("User: " + data[0].user);
  });

}
