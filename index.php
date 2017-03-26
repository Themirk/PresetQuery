<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include('settings.php');
    mysql_connect($hostname, $username, 'alpsolut') or die("Connessione impossibile");
    mysql_select_db($db) or die("Impossibile aprire database");
    ?>
    <meta charset="UTF-8">
    <title>Selezione</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="stile.css">
    <script src="jquery-3.2.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
        //funzione per disabilitare colonne non utilizzabili
        function selezione()
        {
            var selezione = document.getElementById("tipoReport");
            var punti = document.getElementById("colonnaPunti");
            var linee = document.getElementById("colonnaLinee");
            var poligoni = document.getElementById("colonnaPoligoni");
            selezione = selezione.options[selezione.selectedIndex].value;
            console.log(selezione);
            punti.removeAttribute("disabled");
            linee.removeAttribute("disabled");
            poligoni.removeAttribute("disabled");
            if(selezione == 0)
            {
                punti.setAttribute("disabled", "true");
                linee.setAttribute("disabled", "true");
                poligoni.setAttribute("disabled", "true");
            }
            if(selezione == 1)
            {
                linee.setAttribute("disabled", "true");
                poligoni.setAttribute("disabled", "true");
            }
            if(selezione == 2)
            {
                punti.setAttribute("disabled", "true");
                poligoni.setAttribute("disabled", "true");
            }
            if(selezione == 3)
            {
                punti.setAttribute("disabled", "true");
                linee.setAttribute("disabled", "true");
            }
        }
    </script>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar navbar-default">
    <div class="navbar-header">
        <a class="navbar-brand" href="http://www.alpsolut.eu/website/">Alpsolut</a>
    </div>
</div>
    <!-- CONTAINER -->
    <div class="container">

        <!-- ROW 1 -->
        <div class="row">
            <div class="col-sm-4">
                <!-- COLONNA VUOTA PER NON FUNZIONAMENTO OFFSET -->
            </div>
            <div class="col-sm-4 offset-4">
                <!-- SELEZIONE TIPO DI REPORT -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <label for="tipoReport">Tipo di report selezionato</label>
                    </div>
                    <div class="panel-body">
                        <select id="tipoReport"class='form-control' name="tipoReport" onclick="selezione();">
                            <?php
                            $query = "SELECT * FROM qgis.tables";
                            $result = mysql_query($query);
                            while ($row = mysql_fetch_assoc($result)) {
                                echo "<option value=" . $row['idTable'] . ">" . $row['table'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <!-- ROW 2 -->
        <div class="row">

            <!-- COL 1 -->
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <label>Punti</label>
                    </div>
                    <div class="panel-body">
                        <!-- LABEL DATA -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <label>Data</label>
                            </div>
                            <div class="panel-body">
                                <input id="colonnaPunti" type='date' class='form-control' name='data' value=''
                                       placeholder="Inserisci la data"></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- COL 2 -->
            <div class="col-sm-4" >
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <label>Linee</label>
                    </div>
                    <div class="panel-body">
                        <!-- LABEL DATA -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <label>Data</label>
                            </div>
                            <div class="panel-body">
                                <input id="colonnaLinee" type='date' class='form-control' name='data' value=''
                                       placeholder="Inserisci la data"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COL 3 -->
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <label>Poligoni</label>
                    </div>
                    <div class="panel-body">
                        <!-- LABEL DATA -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <label>Data</label>
                            </div>
                            <div class="panel-body">
                                <input id="colonnaPoligoni" type='date' class='form-control' name='data' value=''
                                       placeholder="Inserisci la data"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>