<?php
include("../controller/EventC.php");
include("../model/Event.php");
$EventC = new EventC();

if (($_POST)) {
    $titre = trim($_POST["title"]);
    $desc = trim($_POST["desc"]);
    $date = ($_POST["date"]);
    $uploaddir = '../../uploads/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);

    $img = basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    } else {
        echo "Possible file upload attack!\n";
    }
    $event = new Event(null, $titre, $desc, $img, $date);
    $EventC->ajouterEvent($event);
    header('Location:list-events.php?status=added');
}
include("../includes/header.php");

?>
<div class="container">
    <a href="list-events.php" class="btn btn-light mb-3">
        << Go Back</a>


            <div class="card border-primary ">
                <div class="card-header bg-primary  text-white">
                    <strong><i class="fa fa-plus"></i> Ajouter un evenement</strong>
                </div>
                <div class="card-body">
                    <form id="form" action="" method="POST"  enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="title" class="col-form-label">Titre</label>
                                <input type="text" class="form-control" id='title' name="title" placeholder="Titre" onkeyup="checkTitle(this)">
                                <small style="display:none;color:red;" id='etitre'>Error Message</small>

                            </div>
                            <div class="form-group col-12">
                                <label for="name" class="col-form-label">Description</label>
                                <textarea type="text" class="form-control" id="desc" name="desc" onkeyup="checkDesc(this)"></textarea>
                                <small style="display:none;color:red;" id='eDesc'>Error Message</small>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="Date" class="col-form-label">Date</label>
                                <input type="datetime-local" class="form-control" id="date" name="date" onchange="checkDate(this)">
                                <small style="display:none;color:red;" id='eDate'>Error Message</small>

                            </div>

                            <div class="form-group col-4">

                            </div>
                            <div class="form-group col-4">
                                <label for="Date" class="col-form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" onchange="checkImage(this)">
                                <small style="display:none;color:red;" id='eImage'>Error Message</small>

                            </div>
                        </div>
                        <div class="row h-20"><br><br></div>
                        <button type="button" onclick="check()" class="btn btn-success"><i class="fa fa-check-circle"></i> Sauvgarder</button>
                    </form>
                </div>
            </div>
            <br>
</div>
</div>



<script>
    function checkTitle(input) {
        const re = /^[a-zA-Z0-9 ]+$/;
        var err = document.getElementById("etitre");
        console.log(err, input.value)
        if (re.test(input.value.trim()) && checkLength(input, 3, 50) == 0) {
            input.style.border = "2px solid #2ecc71";
            err.style.display = "none";
            return true;

        } else {
            err.innerHTML = "Titre invalide";
            if (checkLength(input, 3, 50) == 0) {
                err.innerHTML += " <br>doit contenir des lettres et des chiffres "
            }
            if (checkLength(input, 3, 50) == -1) {
                err.innerHTML += "<br> doit contenir au moins 3 caractères"

            }
            if (checkLength(input, 3,50) == 1) {
                err.innerHTML += "<br> doit contenir au plus 50 caractères"

            }

            input.style.border = "2px solid red";

            err.style.display = "block";
            return false;


        }
    }

    function checkDesc(input) {
        const re = /^[a-zA-Z0-9 ]+$/;
        var err = document.getElementById("eDesc");

        if (re.test(input.value.trim()) && checkLength(input, 5, 25) == 0) {
            input.style.border = "2px solid #2ecc71";
            err.style.display = "none";
            return true;

        } else {
            err.innerHTML = "Description invalide";
            if (checkLength(input, 5, 255) == 0) {
                err.innerHTML += " <br>doit contenir des lettres"
            }
            if (checkLength(input, 5, 255) == -1) {
                err.innerHTML += "<br> doit contenir au moins 5    caractères"

            }
            if (checkLength(input, 5, 255) == 1) {
                err.innerHTML += "<br> doit contenir au plus 255 caractères"

            }
            input.style.border = "2px solid red";

            err.style.display = "block";
            return false;
        }
    }

    function checkDate(input) {
        var err = document.getElementById("eDate");

        if (input.value.length > 0) {
            input.style.border = "2px solid #2ecc71";
            err.style.display = "none";
            return true;
        } else {
            input.style.border = "2px solid red";

            err.innerHTML = "Date invalide";

            err.innerHTML += " <br>vous devez selectionner une Date";

            err.style.display = "block";

            return false;


        }
    }
    //validate file type image
    function checkImage(input) {
        var err = document.getElementById("eImage");
        if (input.value.length > 0) {
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(input.value)) {
                input.value = '';

                input.style.border = "2px solid red";

                err.innerHTML = "Image invalide";

                err.innerHTML += " <br>Vous devez selectionner une image";

                err.style.display = "block";

                return false;
            } else {
                input.style.border = "2px solid #2ecc71";
                err.style.display = "none";
                return true;
            }


        } else {
            input.style.border = "2px solid red";

            err.innerHTML = "Image invalide";

            err.innerHTML += " <br>Vous devez selectionner une image";

            err.style.display = "block";

            return false;


        }
    }


    //check input Length
    function checkLength(input, min, max) {
        if (input.value.length < min) {
            return -1;
        } else if (input.value.length > max) {
            return 1;
        } else {
            return 0;
        }
    }



    function check() {
        var title = document.getElementById("title");
        var desc = document.getElementById("desc");
        var date = document.getElementById("date");
        var image = document.getElementById("image");

        ct = checkTitle(title);
        cd = checkDesc(desc);
        cdate = checkDate(date);
        cimage = checkImage(image);
        if (ct && cd && cdate && cimage) {
            document.getElementById("form").submit();
        }


        return false;
    }
</script>


</body>