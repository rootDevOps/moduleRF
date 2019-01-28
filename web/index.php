<?php session_start(); ?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TEST TAGS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="views/js/functions.js"></script>
    <link rel="stylesheet" type="text/css" href="views/css/template.css" media="screen,projection" />
  </head>

  <body>
    <section>
      <article>
        <h1 class="status_user">Wait...</h1>
        <br /><br />

        <h1>Detalles:</h1>
        <h2 class="username_user">Wait...</h2>

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
