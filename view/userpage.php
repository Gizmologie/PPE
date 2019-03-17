<?php
    //echo $_SESSION['id'];
?>

<div class="container">
    <div class="row">
        <div id="col1" class="col-4">
            <a href="/ppetest/view/accessBuilding.php">Obtenir l'accès au batiment</a>
            <img id="maison" src="/ppetest/img/maison.png">
        </div>
        <div id="col2" class="col-4">
            <a href="/ppetest/mrbs/web/index.php">Gerer son planning</a>
            <img id="calendar" src="/ppetest/img/calendar.png">
        </div>

        <div id="profil" class="col-3"></div>
    </div>
</div>


<script>
    $("#col1").hide();
    $("#col2").hide();
    $("#profil").hide();
    var col5 = ($("#col1").width())/2;
    console.log ("TEST 1 ");
    $.post("/ppetest/modele/userData.php", {}, function (data) {
        console.log("test 2");
        $.post("/ppetest/modele/userStatut.php", {}, function (statut) {
            console.log("test 3");
            if (statut == "user")
            {
                $("#col2").show();
                $("#calendar").width(col5);
            }
            if (statut == "admin")
            {
                $("#col1").show();
                $("#col2").show();
                $("#maison").width(col5);
                $("#calendar").width(col5);
            }
            var dataArrow = data[0];
            $("#profil").show();
            $("#profil").html("<p>NOM : "+dataArrow['username']+"</p><br><p>EMAIL : "+dataArrow['email']+"</p><br><p>Rang : "+dataArrow['statut']+"</p>");
            $("#maison").click(function () {
                window.location.replace('/ppetest/view/accessBuilding.php');
            });
            $("#calendar").click(function () {
                window.location.replace('/ppetest/mrbs/web/index.php');
            });
            }, 'json');
    },'json');

</script>