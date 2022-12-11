<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: ../Authentification/index.php");
    ob_end_clean();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../_layouts/libs.php") ?>


    <link rel="stylesheet" href="chat.css">

</head>
<!-- body -->

<body class="main-layout">

    <!-- end loader -->
    <!-- header -->
    <header>
        <div class="header_top">
            <div style="padding-left:10px;">
                <div class="row">
                    <div class="col">
                        <ul class="contat_infoma">
                            <li>

                                <?php if (isset($_SESSION['id'])) : ?>
                                <!-- is connected -->
                                <!-- <a href="../Profile/index.php"><i class="fa fa-user"></i> <?php echo $_SESSION['prenom'] . " " . $_SESSION['nom'] ?></a>  -->
                                <a href="../Home/">< Back</a>&nbsp;
                                <img style="width:30px;height:30px;object-fit:cover;border-radius:50%;margin-right:2px;"
                                            src="../uploads/utilisateurs/<?php echo $_SESSION['image']; ?>" alt="image">
                                        <?php echo $_SESSION['prenom'] . " " . $_SESSION['nom'] ?>

                                
                                <?php endif ?>
                            </li>
                        </ul>
                    </div>

                    
                </div>
            </div>
        </div>
    </header>
    <!-- end banner -->



  <!-- BEGIN: Content-->
  <div class="app-content content">
    <div style="background: white;"  class="content-wrapper">
      


    <?php
                    include("../../config.php");
                    include("../../Controllers/utilisateursController.php");
                    $utilisateursController = new utilisateursController();
                    //$users = $utilisateursController->afficherutilisateurs();
                    if ((!isset($_GET['search']))) {
                        $users = $utilisateursController->afficherutilisateurs();
                      }else{
                        $users=$utilisateursController->searchUtilisateurs($_GET['search']);
                      }
                    ?>

    <div class="d-flex">
        <div class="d-flex flex-column flex-shrink-0 p-3 Mixchat-sidenav">
            <span class="fs-4 discussionsText">Discussions</span>
            <div class="row my-1">

                <div class="col-8">
                <input class="form-control" style="width: 123%;" type="text" id="search" placeholder="Recherche.." <?php if (isset($_GET['search'])): ?>
                value="<?php echo $_GET['search'] ?>"
                <?php endif ?>> 
                </div>

                <div class="col-4">
                <button onclick="search()" class="btn pull-right" style="padding: 6px 9px 5px 9px;; background: #FFC10D; margin-right: 13px;"  
                data-bs-toggle="tooltip" data-bs-placement="top" title="Recherche">
                <i class="fa fa-search" style="color: white;"></i>
                </button>
                </div>
            </div>
            <ul class="nav nav-pills flex-column mb-auto discussions-list">

                     <?php foreach ($users as $user): ?>
                    <li class="nav-item">
                        <a href="friend.php?id=<?php echo $user['id'] ?>" class="discussionItem  <?php if ($_SESSION['id'] == $user['id']) : ?> activeDiscussion <?php endif ?>">
                            <img style="object-fit: cover;" src="../uploads/utilisateurs/<?php echo $user['image']; ?>" alt="avatar">
                                    <div class='discussionContent'>
                                <p class='discussionUsername'><?php echo $user["prenom"]." ".$user["nom"];?></p>
                                <p style="text-transform: capitalize;" class='discussionMessage'><?php echo $user["role"];?></p>
                            </div>
                        </a>
                    </li>
                    <?php endforeach ?>


            </ul>


        </div>


        <div class='mixchatContent'>

            
                <div class='activeFriend'>
                    <div style="padding: 7px;" class='d-flex'>
                    <img style="object-fit: cover;" src="../uploads/utilisateurs/<?php echo $_SESSION['image']; ?>" alt="avatar">

                    <div style="margin-left: 9px">
                            <p class='discussionUsername'><?php echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?></p>
                            <p class='discussionMessage' style="text-transform: capitalize;"><?php echo $_SESSION['role'] ?></p>
                        </div>
                    </div>
                </div>
            

                <?php
                    
                    include("../../Controllers/messageController.php");
                    $messageController = new messageController();
                    $messages = $messageController->getMessages($_SESSION['id'],$_SESSION['id']);
                ?>

            <div id='messagesContainer' class='messagesContainer'>
                
            <?php foreach ($messages as $msg): ?>
              <?php if ($msg['type'] == "text") : ?> 
                <div class="message-container MCRight">
                                <div class='message-row'>
                                    <div style="flex-direction: row-reverse" class='d-flex'>
                                        <div class="chat-content-right">
                                        <?php echo $msg['message']; ?>
                                        </div>
                                    </div>
                                </div>
                </div>
              <?php endif ?>

              <?php if ($msg['type'] == "image") : ?> 
                <div class="message-container MCRight">
                                <div class="message-row">
                                    <div style="flex-direction: row-reverse" class="d-flex">
                                        <div style="padding: 7px;" class="chat-content-right">
                                            <img class="img-inside-message" src="<?php echo $msg['message']; ?>"  alt="message-img"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
              <?php endif ?>

              <?php if ($msg['type'] == "combined") : ?> 
              <?php $values = explode("#",$msg['message']); ?>

                <div class="message-container MCRight">
                                <div class="message-row">
                                    <div style="flex-direction: row-reverse" class="d-flex">
                                        <div style="padding: 7px" class="chat-content-right">
                                            <p class="chat-content-text-right"><?php echo $values[0]; ?></p>
                                            <img class="img-inside-message" src="<?php echo $values[1]; ?>"  alt="message-img"/>
                                        </div>
                                    </div>
                                </div>
                            </div>


              <?php endif ?>
            <?php endforeach ?>


            

                            


                        
                            

                        
                            


                            




            </div>

            <div id="upload-section" class="upload-section">
                <div style="position: relative;width: 76px;">
                    <img id="upload-section-img" class="upload-section-img" src="../uploads/utilisateurs/<?php echo $_SESSION['image']; ?>" alt="uploadedimage">
                    <button onclick="hideUploadSection()" class="delete-upload-img-btn"> <i class="fa fa-close"></i> </button>
                </div>


            </div>
            <div class='Mixchat-sendContainer'>

                <form onsubmit="sendMessage(event)" autoComplete="off">
                    <input autoComplete="false" name="hidden" type="text" style="display: none"/>

                    <input onchange="onImageUpload(event)" type="file" id='MixchatFileInput' style="display: none"/>
                    <button style="padding: 0;" type="button" onclick="triggerFileChooser()" class="uploadBtn"><img style="height: 30px;width: 30px;" src="../images/uploadimg4.png" alt="uploadimg"></button>
                    <input id='MixchatInput' class='Mixchat-input' type='text' placeholder='Aa' />

                    <button type='submit' class='Mixchat-sendBtn'>
                        <img class='send-message' src="../images/send-message4.png" alt="sendMessage"/>
                    </button>
                </form>

            </div>

        </div>
    </div>








    </div>
    <!-- END: Content-->




















        <!-- Javascript files-->
        <script src="jquery-3.6.0.min.js"></script>

        <script>
        let messageImage = "";
        const triggerFileChooser = () => {
            document.getElementById("MixchatFileInput").click();
        }

        const hideUploadSection = () => {
            document.getElementById("upload-section").style.display = "none";
            messageImage = "";
        }

        const onImageUpload = (event) => {
            let file = event.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => {
                console.log("image message :", reader);
                messageImage = reader.result.toString();
                document.getElementById("upload-section-img").src = reader.result.toString();
                document.getElementById("upload-section").style.display = "flex";

            };
            reader.onerror = function (error) {
                console.log('Error: ', error);
            };
        }

        const sendMessage = (event) => {
            event.preventDefault();

            const messageContent =document.getElementById('MixchatInput').value;



            if(messageImage && messageContent){ //send text and image


                $.ajax({
                    url: "addMessage.php",
                    data: {
                        'sender':<?php echo $_SESSION['id']; ?>,
                        'receiver':<?php echo $_SESSION['id']; ?>,
                        'type':'combined',
                        'message':messageContent+"#"+messageImage
                    },
                    type: 'POST',
                    dataType: "json",
                    success: function (data) {
                        if(data.message === "added"){

                            document.getElementById("messagesContainer").insertAdjacentHTML('beforeend','' +
                                '<div class="message-container MCRight">' +
                                    '<div class="message-row">' +
                                        '<div style="flex-direction: row-reverse" class="d-flex">' +
                                            '<div style="padding: 7px;" class="chat-content-right">' +
                                                '<p class="chat-content-right">'+messageContent+'</p>'+
                                                '<img class="img-inside-message" src="'+messageImage+'"  alt="message-img"/>'+
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>'
                            );
                            document.getElementById('MixchatInput').value = "";
                            hideUploadSection();
                        }else{
                            console.log("something went wrong",data)
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        console.log("Ajax request failed. data");
                    }
                })
            }else if(document.getElementById('MixchatInput').value){ //send text only

                $.ajax({
                    url: "addMessage.php",
                    data: {
                        'sender':<?php echo $_SESSION['id']; ?>,
                        'receiver':<?php echo $_SESSION['id']; ?>,
                        'type':'text',
                        'message':messageContent
                    },
                    type: 'POST',
                    dataType: "json",
                    success: function (data) {
                        if(data.message === "added"){
                            document.getElementById("messagesContainer").insertAdjacentHTML('beforeend','<div class="message-container MCRight"><div class="message-row"><div style="flex-direction: row-reverse" class="d-flex"><div class="chat-content-right">'+messageContent+'</div></div></div></div>');
                            document.getElementById('MixchatInput').value = "";
                        }else{
                            console.log("something went wrong",data)
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        console.log("Ajax request failed. data");
                    }
                });
            }else if(messageImage){//send image only

                $.ajax({
                    url: "addMessage.php",
                    data: {
                        'sender':<?php echo $_SESSION['id']; ?>,
                        'receiver':<?php echo $_SESSION['id']; ?>,
                        'type':'image',
                        'message':messageImage
                    },
                    type: 'POST',
                    dataType: "json",
                    success: function (data) {
                        if(data.message === "added"){
                            document.getElementById("messagesContainer").insertAdjacentHTML('beforeend','' +
                                '<div class="message-container MCRight">' +
                                    '<div class="message-row">' +
                                        '<div style="flex-direction: row-reverse" class="d-flex">' +
                                            '<div style="padding: 7px;" class="chat-content-right">' +
                                                '<img class="img-inside-message" src="'+messageImage+'"  alt="message-img"/>'+
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>'
                            );
                            document.getElementById('MixchatInput').value = "";
                            hideUploadSection();
                        }else{
                            console.log("something went wrong",data)
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        console.log("Ajax request failed. data");
                    }
                })
            }else{
                console.log("no message ")
            }
        }

        // function search() {
        //     var search=document.getElementById('search').value;
        //     if (search=="") {;
        //         location.href = "index.php";
        //     }
        //     if (search!="") {
        //         location.href = "index.php?search="+search;
        //     }
        // }

    </script>


</body>

</html>