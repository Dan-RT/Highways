<?php

    $element = $_GET['element'];
    //echo $element;

    switch ($element) {

        case "highway":

?>

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
            <h4>Ville d'arrivée : </h4>
        </div>
        <div class="col-lg-6">
            <select name="arriving_city" id="arriving_city">
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

<?php
           break;
   }

?>

            <button id="add_button" class="btn btn-md btn-default submit_button" >
                <span class="glyphicon glyphicon-ok"></span> Ajouter
            </button>


