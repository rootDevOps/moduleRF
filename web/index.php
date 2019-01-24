<?php session_start(); ?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- <META HTTP-EQUIV="REFRESH" CONTENT="1"> -->

    <title>TEST TAGS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style type="text/css">
      section{ width: 100%; float: left; }
      article{ width: calc(100%/2 - 20px); padding: 10px; float: left;}

      table{ width: 100%;}
      tr:nth-child(odd){  background: #e9e9e9;}
      tr:nth-child(even){ background: #f3f3f3;}
    </style>

    <script type="text/javascript">
      function getHistory(){
        $.ajax({
          type: "POST",
          url: "controllers/controller_record.php",
          data: "submit=View",
          dataType: "json",
          beforeSend: function(){
              console.log("before send");
            },
          error: function(){
              console.log("error");
            },
          success: function(data){
            console.log("success");
          }
        }).done(function(data){
          console.log("done");
          console.log(data);

          var trHTML = '';
          $.each(data, function(i, data) {
              console.log(data);
              trHTML += '<tr><td>' + data.id + '</td><td>' + data.create_datetime + '</td></tr>';
          });
          $('#records_table').append(trHTML);

        });

      }

      function getUserStatus(){
        $.ajax({
          type: "POST",
          url: "controllers/controller_user.php",
          data: "submit=ViewID&tag=123456789",
          dataType: "json",
          beforeSend: function(){
              console.log("before send");
            },
          error: function(){
              console.log("error");
            },
          success: function(data){
            console.log("success");
          }
        }).done(function(data){
          console.log("done");
          console.log(data);
          if(data[0].status != 0){
            $(".status_user").empty().append("Welcome!");
          }else{
            $(".status_user").empty().append("See you!");
          }
          $(".username_user").empty().append(data[0].user);
        });

      }
      getHistory();
      getUserStatus();
    </script>


  </head>

  <body>
    <section>
      <article>
        <center><h3>Status</h3></center>
        <h1 class="status_user">ss</h1>
        <br />
        <h1 class="username_user">ss</h1>

      </article>
      <article>
        <center><h3>Records</h3></center>
        <table id="records_table">
          <tr>
            <th>id</th>
            <th>Last access</th>
          </tr>
        </table>
      </article>
    </section>
  </body>
</html>
