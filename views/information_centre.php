<div class="content">
    <?php if (isset($_GET["id"])): ?>
        <?php
        $id =mysqli_real_escape_string($conn,$_GET["id"]);
        $_SESSION['id'] = $id;
        $sql = "SELECT * FROM centres WHERE Id_centre = '" . $id."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="centre-image">
                    <img src="images/<?php echo($id); ?>.jpg" alt="Photo du Centre" class="centre-img" />
                    <h1 class="centre-title"><?php echo($row["Nom"]); ?></h1>
                </div>
                <div class="info-container">
                    <div class="centre-info">
                        <p><strong>Adresse:</strong> <?php echo($row["Adresse"]); ?></p>
                        <p><strong>Téléphone:</strong> <?php echo($row["Telephone"]); ?></p>
                        <p><strong>Email:</strong> <?php echo($row["Mail"]); ?></p>
                        <p><strong>Horaire:</strong> <?php echo($row["Horaire"]); ?></p>
                    </div>
                    <div class="activite-info">
                        <h2>Activités Sportives</h2>
                        <ul>
                            <?php
                            $sql1 = "SELECT * FROM sport WHERE sport.Id_centre = '" . $id."'";
                            $result1 = $conn->query($sql1);
                            if ($result1->num_rows > 0):
                                while($row = $result1->fetch_assoc()): ?>
                                    <li>
                                        <strong><?php echo($row["Nom"]); ?></strong><br>
                                        <em>Horaire:</em> <?php echo($row["Horaire_sport"]); ?><br>
                                        <em>Info:</em> <?php echo($row["Information"]); ?><br>
                                        <em>Prix:</em> <?php echo($row["prix"]); ?>
                                    </li>
                                <?php endwhile;
                            endif;
                            ?>
                        </ul>
                        <a href="index.php?page=inscription" class="inscription-btn">Inscription au centre</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    <?php endif; ?>
</div>
