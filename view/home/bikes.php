 <?php
    if ($nbResult == 0) {
    ?>
     <div class="block">
         <h4>Sorry no result ; please try another search.</h4>
     </div>
     <?php

    } else {
        while ($result = $bikes->fetch()) {

        ?>

         <div class="block">
             <img src="<?php echo htmlspecialchars($result['image']); ?>" alt="bike picture" class="image" />
             <div class="overview">
                 <h3>Product details</h3>
                 <?php echo nl2br(htmlspecialchars($result['description'])); ?>
             </div>
             <div class="infos">
                 <div>
                     <div class="name"><?php echo htmlspecialchars($result['name']); ?></div>
                     <div style="color: rgb(156, 154, 150); font-size: 0.8em">
                         <?php echo htmlspecialchars($result['category_name']); ?>
                     </div>
                     <div>
                         <span>
                             <img src="public/assets/Star - On.png" alt="star on" />
                             <img src="public/assets/Star - On.png" alt="star on" />
                             <img src="public/assets/Star - On.png" alt="star on" />
                             <img src="public/assets/Star - On.png" alt="star on" />
                             <img src="public/assets/Star - On.png" alt="star on" />
                         </span>
                     </div>
                 </div>
                 <div class="infos-right">
                     <div><?php echo htmlspecialchars($result['price']); ?> $</div>
                     <div>
                         <a href="#">
                             <img src="public/assets/Cart Button.png" alt="Cart Button" />
                         </a>
                     </div>
                 </div>
             </div>
         </div>

 <?php
        }
        $bikes->closeCursor();
    }
    ?>