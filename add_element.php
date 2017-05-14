


<?php

    include("database.php");
    $element = $_GET['element'];
    echo $element;

    switch ($element) {

        case "highway":

?>

    <div id="add_section">

        <input id="data_element" name="data_element" value="<?php echo $element; ?>">

        <div class="row">
            <div class="col-lg-6">
                <h4>Nom de l'Autoroute : </h4>
            </div>
            <label><input class="input-md form-control" type="text" name="name_highway" placeholder="Ex : A1"/></label>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h4>Ville de départ : </h4>
            </div>

            <div class="col-lg-6">
                <select name="starting_city" id="starting_city">
                    <option value="0">Sélectionner une ville</option>
<?php

            $reponse = query_database('SELECT * FROM Ville');



            while ($starting_city = $reponse->fetch()) {
?>
                    <option value="<?php echo $starting_city['code_postal']; ?>"><?php echo $starting_city['nom_ville']; ?></option>

    <?php

                 }

    ?>
                </select>
            </div>
        </div>






        <div class="row">
            <div class="col-lg-6">
                <h4>Ville d'arrivée : </h4>
            </div>
            <div class="col-lg-6">
                <select name="arriving_city" id="arriving_city">
                    <option value="0">Sélectionner une ville</option>

        <?php
                $reponse = query_database('SELECT * FROM Ville');

                while ($arriving_city = $reponse->fetch()) {
                    ?>
                    <option value="<?php echo $arriving_city['code_postal']; ?>"><?php echo $arriving_city['nom_ville']; ?></option>
                    <?php

                }
        ?>

                </select>
            </div>
        </div>



        <div class="row">
            <div class="col-lg-6">
                <h4>Nombre de tronçon : </h4>
            </div>
            <div class="col-lg-6">
                <select name="number_portion" id="number_portion">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
        </div>




<?php

           break;

       case "city":
?>

       <div class="row">
           <div class="col-lg-6">
               <h4>Nom de la ville : </h4>
           </div>
           <label><input class="input-md form-control" type="text" name="name_city" placeholder="Ex: Paris"/></label>
       </div>


       <div class="row">
           <div class="col-lg-6">
               <h4>Code Postal : </h4>
           </div>
           <label><input class="input-md form-control" type="text" name="postal_code" placeholder="Ex: 75001"/></label>
       </div>


       <div class="row">

           <div class="col-lg-6">
               <h4>Autoroute :</h4>
           </div>
           <div class="col-lg-6">
               <select name="city_highway" id="city_highway">
                   <option value="1">data missing</option>
                   <option value="2">data missing</option>
                   <option value="3">data missing</option>
                   <option value="4">data missing</option>
                   <option value="5">data missing</option>
                   <option value="6">data missing</option>
               </select>
           </div>
       </div>

       <div class="row">

           <div class="col-lg-6">
               <h4>Tronçon :</h4>
           </div>
           <div class="col-lg-6">
               <select name="city_portion" id="city_portion">
                   <option value="1">data missing</option>
                   <option value="2">data missing</option>
                   <option value="3">data missing</option>
                   <option value="4">data missing</option>
                   <option value="5">data missing</option>
                   <option value="6">data missing</option>
               </select>
           </div>
       </div>


<?php
           break;

       case "portion":
?>

       <div class="row">
           <div class="col-lg-6">
               <h4>Code du tronçon : </h4>
           </div>
           <label><input class="input-md form-control" type="text" name="portion_code" placeholder="Ex: XXX1"/></label>
       </div>

       <div class="row">
           <div class="col-lg-6">
               <h4>Km de départ : </h4>
           </div>
           <label><input class="input-md form-control" type="text" name="starting_km" placeholder="Ex: 65"/></label>
       </div>

       <div class="row">
           <div class="col-lg-6">
               <h4>Km d'arrivée : </h4>
           </div>
           <label><input class="input-md form-control" type="text" name="arriving_km" placeholder="Ex: 258"/></label>
       </div>



       <div class="row">

           <div class="col-lg-6">
               <h4>Autoroute :</h4>
           </div>
           <div class="col-lg-6">
               <select name="portion_highway" id="portion_highway">
                   <option value="1">data missing</option>
                   <option value="2">data missing</option>
                   <option value="3">data missing</option>
                   <option value="4">data missing</option>
                   <option value="5">data missing</option>
                   <option value="6">data missing</option>
               </select>
           </div>
       </div>


       <div class="row">
           <div class="col-lg-offset-3 col-lg-3">
               <input type="radio" name="opened" value="1" checked> Ouvert<br>
           </div>
           <div class="col-lg-3">
               <input type="radio" name="opened" value="2"> Fermé<br>
           </div>
       </div>

       <div id="closed_part">
           <div class="row">
               <div class="col-lg-6">
                   <h4>Causes : </h4>
               </div>
               <label><input class="input-md form-control" type="text" name="reason_closed" placeholder="Travaux"/></label>
           </div>
       </div>


       <div class="row">
           <div class="col-lg-offset-3 col-lg-3">
               <input type="radio" name="paid" value="1" checked> Gratuit<br>
           </div>
           <div class="col-lg-3">
               <input type="radio" name="paid" value="2"> Payant<br>
           </div>
       </div>



        <div id="paid_part">
            <div class="row">
                <div class="col-lg-6">
                    <h4>Payant du Km : </h4>
                </div>
                <label><input class="input-md form-control" type="text" name="paid_starting_km" placeholder="Ex: 26"/></label>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <h4>Jusqu'au Km : </h4>
                </div>
                <label><input class="input-md form-control" type="text" name="paid_arriving_km" placeholder="Ex: 129"/></label>
            </div>
        </div>

<?php
           break;
   }

?>

        <button id="add_button" class="btn btn-md btn-default submit_button" >
            <span class="glyphicon glyphicon-ok"></span> Ajouter
        </button>

        <script src="js/add_element.js"></script>

    </div>