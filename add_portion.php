    <?php

    $id_autoroute = $_GET['id_autoroute'];

    ?>




<td>
    <input class="hidden" id="id_autoroute_hidden_2" value="<?php echo $id_autoroute; ?>">
    <input id="code_troncon_hidden" value="X">
    X
</td>
<td>
    <input id="modify_duKm" value="">
</td>
<td>
    <input id="modify_auKm" value="">
</td>

<td>
    <label class="radio-inline"><input type="radio" name="optradio" value="1" checked>Ouvert</label>
    <label class="radio-inline"><input type="radio" name="optradio" value="0">Fermé</label>

</td>
<td>
    <button name="submit_modif_portion" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span></button>
</td>


    <?php

    echo "TEST";
    ?>

<script src="js/modify_portion.js"></script>