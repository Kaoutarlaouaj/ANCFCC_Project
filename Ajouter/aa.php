<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    <fieldset id="groupedLabels">
                    <legend>Coordonnées:</legend>
                    <br>
                    <div class="row cf-ro"> 
                            <label>X :</label>
                            <div class="col-sm-8"><input type="text" name="x" required></div>
                    </div>
                    <br>
                            <div class="row cf-ro"> 
                             <label>Y :</label>
                             <div class="col-sm-8"><input type="text" name="y" required></div>
                            </div>
                </fieldset>
                <input type="hidden" name="formId" value="<?php echo $row["id"]; ?>">
                    
                    <button  name="deleteForm" id="DF" class='btn btn-sm btn-danger' style="margin-left: -43px;
                margin-top: -5669px;">Supprimer</button>
                    <button name="updateForm" id="UF" class='btn btn-sm btn-warning' style="margin-left: 28px;
                 margin-top: -5669px;">Modifier</button>
    </form>
    <?php
  
    ?>
   
</html>