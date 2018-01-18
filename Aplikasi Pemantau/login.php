<!DOCTYPE html>
<html>
   <head>
      <title>Tugas Akhir</title>
	  
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <meta name="mobile-web-app-capable" content="yes">
       
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>           <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
   </head>
   <body> 
       <h4><center>Monitoring Lansia</center></h4>
       <div class="row">
           <div class="col m4"></div>
            <div class="col m4 s12">
                <div class="row">
                    <ul class="collection">
                      <li class="collection-item">
                            <form class="col s12" action="go.php" method="get">
                              <div class="row">
                                <div class="input-field col s12">
                                  <i class="material-icons prefix">account_circle</i>
                                  <input name="id" id="icon_prefix" type="text" class="validate">
                                  <label for="icon_prefix">ID Device</label>
                                </div> 
                                  <div class="col m4 s4"></div>
                                  <div class="col m4 s4">
                                      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                
                                  </button>
                                  </div>
                                  <div class="col m4 s4"></div>
                                  
                              </div>
                            </form>
                        </li>
                    </ul>
                                
                 </div>
            </div>
           <div class="col m4"></div>
        </div>
       
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
       
   </body>
</html>