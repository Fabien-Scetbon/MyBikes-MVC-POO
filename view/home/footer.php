 <footer>

     <span class="page-number">
         <?php

         if(isset($page)) {
            for ($i = 1; $i <= $nbPages; $i++) {
                if ($i == $page) { ?>
                 <a style="background-color: RGBa(0, 0, 0, 0.8); color: white; font-weight: bold; border-radius:10px"> <?php echo $i; ?></a>
             <?php } else {  ?>
                 <a href=" index.php?action=page&amp;pageId=<?php echo $i; ?>"> <?php echo $i; ?></a>
         <?php }
            } 
        } else { ?>

             <a style="background-color: RGBa(0, 0, 0, 0.8); color: white; font-weight: bold; border-radius:10px">1</a>
             <?php
        }
                ?>
     </span>

 </footer>