<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bootstrap Photo Gallery Demo</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="js/jquery.bsPhotoGallery.js"></script>
    </script>
    <script>
      $(document).ready(function(){
        $('ul.first').bsPhotoGallery({
          "classes" : "col-lg-2 col-md-4 col-sm-3 col-xs-4 col-xxs-12",
          "hasModal" : true
        });
      });
    </script>
  </head>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Bree+Serif);

      body {
        background:#ebebeb;
      }
      ul {
          padding:0 0 0 0;
          margin:0 0 40px 0;
      }
      ul li {
          list-style:none;
          margin-bottom:10px;
      }
      ul li.bspHasModal {
          cursor: pointer;
      }
      .modal-body {
          padding:5px !important;
      }
      .modal-content {
          border-radius:0;
      }
      .modal-dialog img {
          text-align:center;
          margin:0 auto;
      }
    .controls{
        width:50px;
        display:block;
        font-size:11px;
        padding-top:8px;
        font-weight:bold;
    }
    .next {
        float:right;
        text-align:right;
    }
    .text {
      font-family: 'Bree Serif';
      color:#666;
      font-size:11px;
      margin-bottom:10px;
      padding:12px;
      background:#fff;
    }
    .glyphicon-remove-circle:hover {
      cursor: pointer;
    }
    @media screen and (max-width: 380px){
       .col-xxs-12 {
         width:100%;
       }
       .col-xxs-12 img {
         width:100%;
       }
    }

  </style>
  <body>

        <ul class="row first">
            <li>
                <img  src="img/20160414_162500.jpg">
                <div class="text">Consectetur adipiscing elit</div>
            </li>
            <li>
                <img  src="img/20160414_162816.jpg">
                <div class="text">Lorem ipsum dolor sit amet, labore et dolore magna aliqua. Ut enim ad minim veniam</div>
            </li>
            <li>
                <img  src="img/20160414_162836.jpg">
            </li>
            <li>
                <img  src="img/20160414_162854.jpg">
                <div class="text">Lorem, do eiusmod tempor incid Ut enim ad minim veniam</div>
            </li>

  </ul>




    </div> <!-- /container -->









  </body>


</html>
