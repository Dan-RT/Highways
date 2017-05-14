
<title>Liste Tronçon</title>
<link href="CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10">

            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Tronçon</th>
                    <th>Km initial</th>
                    <th>Km final</th>
                    <th>État</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>23</td>
                    <td>Ouvert</td>
                    <td>
                        <button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
                        <button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>23</td>
                    <td>78</td>
                    <td>Ouvert</td>
                    <td>
                        <button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
                        <button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>78</td>
                    <td>98</td>
                    <td>Ouvert</td>
                    <td>
                        <button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></button>
                        <button class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></button>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>


</div>



<div class="container">

</div>




<?php

if ($tmp_portion->id_autoroute() == $tmp_highway->id_autoroute()) {
    ?>
    <td>
        <?php
        echo $tmp_portion->code_troncon();
        ?>
    </td>
    <?php
}
?>