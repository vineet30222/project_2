<?php
require "core.php";
if(!loggedin()){
  header('Location: index.php');
}
else {
  if(!isset($_GET['a'])){
  $a='Location: yearbook.php/?a='.$_SESSION['login_user'];
  header($a);
}}
if(isset($_POST['logout'])){
  session_destroy();
  header('Location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="../static/css/bootstrap.css">
    <link rel="stylesheet" href="../static/css/yearbook.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body  style="background-color:rgb(0,147,187);">
    <div id="particles-js" style="position:fixed;height:100%;width:100%;"></div>
      <div style="position:absolute;left:140px;right:140px;">
        <div class="cover" style="background-size:cover;background-image:url('../static/img/yearbook.jpg')"></div>
        <img class="ppic" src="../static/img/d.jpeg">
        <div class="row combo" style="">
          <div class="col-5 comments" style="overflow:scroll;">

            <div class="element">
                  <div class="row">

                        <div class="col-4">
                            <img class="img" src="../static/img/d.jpeg">
                        </div>
                        <div class="col">

                            <h4>Vineet Agrawal</h4>
                            <h5  class="des" style="color: red;letter-spacing:2px;">III C.S.E.</h5>

                          </div>
                    </div>


                    <span>hey u r greather_thanmdjgjgg
                    fhdfhdfthdfhdfghdfg
                    dfghdfh
                    dfghdfhdfh
                    dfghdfhdfh
                    dfghdfhdfh
                    fhdfhdfthdfhdfghdfgdfgfgh
                    dfghdfhhdf
                    fhdfhdfthdfhdfghdfghdf
                    figcaptiondf
                    g
                    dfghdfhdfhhdf
                    h1h1h1h1h1h1h1h1dfghdfhdfhhdfhdf

                    fieldset
                    dh
                    dd
                    fh
                    dfghdfhdfhhdfdh
                    dyyj

                    dy
                    gy
                    </span>







            </div>

            <div class="element">
                  <div class="row">

                        <div class="col-4">
                            <img class="img" src="d.jpg">
                        </div>
                        <div class="col cen">

                            <h4>Vineet Agrawal</h4><br>
                            <h5  class="des" style="color: red;">CTO</h5>

                          </div>
                    </div>


                    <span>hey u r greather_thanmdjgjgg
                    fhdfhdfthdfhdfghdfg
                    dfghdfh
                    dfghdfhdfh
                    dfghdfhdfh
                    dfghdfhdfh
                    fhdfhdfthdfhdfghdfgdfgfgh
                    dfghdfhhdf
                    fhdfhdfthdfhdfghdfghdf
                    figcaptiondf
                    g
                    dfghdfhdfhhdf
                    h1h1h1h1h1h1h1h1dfghdfhdfhhdfhdf

                    fieldset
                    dh
                    dd
                    fh
                    dfghdfhdfhhdfdh
                    dyyj

                    dy
                    gy
                    </span>







            </div>

            <div class="element">
                  <div class="row">

                        <div class="col-4">
                            <img class="img" src="d.jpg">
                        </div>
                        <div class="col cen">

                            <h4>Vineet Agrawal</h4><br>
                            <h5  class="des" style="color: red;">CTO</h5>

                          </div>
                    </div>


                    <span>hey u r greather_thanmdjgjgg
                    fhdfhdfthdfhdfghdfg
                    dfghdfh
                    dfghdfhdfh
                    dfghdfhdfh
                    dfghdfhdfh
                    fhdfhdfthdfhdfghdfgdfgfgh
                    dfghdfhhdf
                    fhdfhdfthdfhdfghdfghdf
                    figcaptiondf
                    g
                    dfghdfhdfhhdf
                    h1h1h1h1h1h1h1h1dfghdfhdfhhdfhdf

                    fieldset
                    dh
                    dd
                    fh
                    dfghdfhdfhhdfdh
                    dyyj

                    dy
                    gy
                    </span>







            </div>

            <div class="element">
                  <div class="row">

                        <div class="col-4">
                            <img class="img" src="d.jpg">
                        </div>
                        <div class="col cen">

                            <h4>Vineet Agrawal</h4><br>
                            <h5  class="des" style="color: red;">CTO</h5>

                          </div>
                    </div>


                    <span>hey u r greather_thanmdjgjgg
                    fhdfhdfthdfhdfghdfg
                    dfghdfh
                    dfghdfhdfh
                    dfghdfhdfh
                    dfghdfhdfh
                    fhdfhdfthdfhdfghdfgdfgfgh
                    dfghdfhhdf
                    fhdfhdfthdfhdfghdfghdf
                    figcaptiondf
                    g
                    dfghdfhdfhhdf
                    h1h1h1h1h1h1h1h1dfghdfhdfhhdfhdf

                    fieldset
                    dh
                    dd
                    fh
                    dfghdfhdfhhdfdh
                    dyyj

                    dy
                    gy
                    </span>







            </div>


          </div>
          <div class="col-7">
          <h1 style="margin-left:30px;color:white;">Add Comment <img style="width:100px;height:100px;"src="../static/img/com.png"></h1>
            <div>
                <textarea placeholder="Love us? Tell us Why" style="width:70%; height:200px;margin-Top:20px;margin-left:30px;border-radius:10px;padding:10px 25px 0px 25px;font-size:25px;"></textarea>
            </div>
          </div>

        </div>
      </div>
    <script type="text/javascript" src="../static/js/particles.js"></script>
    <script type="text/javascript" src="../static/js/app.js"></script>
    <script type="text/javascript" src="../static/js/swiper.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../static/js/bootstrap.min.js"></script>
  </body>
</html>
