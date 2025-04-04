 <div id="contact-body">
    <?php 
    //afficher le message d'erreur
    if(isset($info)){?>
        <p class="request_message" style="color:red">
            <?= $info?>  
        </p>
  <?php 
   }
       //afficher le message de succes
       if(isset($_SESSION['succes_message'])){?>
            <p class="request_message" style="color:green">
                <?= $_SESSION['succes_message']?>  
            </p>
      <?php 
       }
    ?>
    <form class="contact_form" action="index.php?page=contact" method="POST">
        <h2>Contact Us</h2>
        <label>Nom</label>
        <input type="text" name="username" >
        <label>Email</label>
        <input type="email" name="email" >
        <label>téléphone</label>
        <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="phone">
        <label>Message</label>
       <textarea name="message" cols="30"rows="6" ></textarea>
       <button type="submit" name="send">ENVOYER</button>
    </form>
    </div>
