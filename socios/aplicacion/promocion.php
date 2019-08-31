      <!-- erubiel cisneros -->
    <div class="col-md-10">
            <div id="mycarousel" class="carousel slide" data-ride="carousel">
      <!-- indicadores -->
                       <ol class="carousel-indicators">
                              <?php 
                               $a=0;
                               $query=$conexionBD->query("SELECT * FROM promocionsocio ");
                               while( $promo = $query->fetch_array()){  
                              ?> 
                              <li data-target="#mycarousel" data-slide-to="<?php echo $a++; ?>"> </li>
                              <?php
                               }
                               ?> 
                        </ol>
                <div class="carousel-inner" role="listbox">
                    <?php
                      $pro=$conexionBD->query("SELECT * FROM promocionsocio ");
                          while( $img = $pro->fetch_array()){ 
                    ?>
                    <div class="item">
                    <img src="<?php echo $img['urlImagen'].'/'.$img['nombreImagen']; ?>" class="img responsive" alt="<?php $img['nombreImagen']; ?>" >
                              
                    </div>
                    <?php
                          }
                    ?> 
                                 
                </div>        
                        
             </div>
             
             
    </div> 
          
         
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
       
      
     
    
   
  
 










