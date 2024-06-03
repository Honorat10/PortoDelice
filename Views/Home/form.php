<?php
require './function.php';
createclient();
?>
    <body>
     



           


            <div id="product-post">
                <div class="container">
                  
                    <div id="contact-us">
                        <div class="container">
                            <div class="row">
                                <div class="product-item col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">  
                                            <div class="message-form">
                                                <form action="#" method="post" class="send-message">
                                                    <div class="row">
                                                    <div class="name col-md-4">
                                                        <input type="text" name="name" id="name" placeholder="Nom compet" />
                                                    </div>
                                                    <div class="email col-md-4">
                                                        <input type="text" name="numero" id="email" placeholder="numero" />
                                                    </div>
                                                    <div class="subject col-md-4">
                                                        <input type="text" name="addresse" id="subject" placeholder="addresse" />
                                                    </div>
                                                    </div>
                                                                             
                                                  <center>  <div class="send">
                                                        <button style="width: 75%" type="submit">Commander</button>
                                                    </div></center>
                                                </form>
                                            </div>
                                        </div>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      
                </div>
            </div>


           
            <?php
require_once 'footer.php';
?>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&amp;sensor=false">
        </script>
                
    
     
    </body>
</html>