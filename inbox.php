<?php session_start();
require 'core/conversation.php';
require 'core/user.php';
if(!isset($_SESSION['user'])){
    header('location:login.php');die();
}
$userID = $_SESSION['user']->id;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/boolzapp.css">
    <title>BoolzApp</title>
</head>

<body>
    <header>
        <div class="header_left">
            <img src="https://reidday.files.wordpress.com/2015/07/albert-einstein-facts-300x300.jpg" alt="profile">
            <div class="icons_left">
                <i class="fas fa-circle-notch"></i>
                <i class="fas fa-comment-alt"></i>
                <i class="fas fa-ellipsis-v"></i>
            </div>
        </div>
        <div class="header_right">
            <img src="http://www.professionalcounselingschool.it/wp-content/uploads/2019/04/Socrate-300x300.jpg"
                alt="openchat">
            <div class="name">
                <h4 class="firstname">Socrates</h4>
                <small>Last seen today at <span class="message_time">18:30</span></small>
            </div>
            <div class="icons_right">
                <i class="fas fa-search"></i>
                <i class="fas fa-paperclip"></i>
                <i class="fas fa-ellipsis-v"></i>
            </div>
        </div>
    </header>

    <section>
        <div class="container_left">
            <div class="search_bar">
                <i class="fas fa-search"></i>
                <input class="searchme" type="text" placeholder="Search or start new chat">
            </div>
            <div class="chat_list">

                <?php
        if($converSation = getConversationByUserId($userID)) {
            if($converSation->num_rows > 0)
            {
                while($convers = $converSation->fetch_object()){
                    if($convers->user_1 === $userID){
                        $user = getUserById($convers->user_2);
                    } else{
                        $user = getUserById($convers->user_1);
                    }
                    $user = $user->fetch_object();
                    if($user){
                ?>
                <div class="contact active" data-chat="<?= $user->id ?>">
                    <img src="http://www.professionalcounselingschool.it/wp-content/uploads/2019/04/Socrate-300x300.jpg"
                        alt="openchat">
                    <div class="name">
                        <h4 class="firstname"><?= $user->name ?></h4><small class="message_time"><?= $user->las_seen ?></small><br>
                        <small class="sentence">True knowledge exists in knowing that you know nothing</small>
                    </div>
                </div>
                <?php
                    }
                }
            }
        }
        ?>

            </div>
        </div>

        <div class="container_right">
            <div class="message_container">
                <div class="message_box active" data-chat="0">
                    <div class="message white">
                        <p>True knowledge exists in knowing that you know nothing</p>
                        <h6>05:15</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>

                    <div class="message green">
                        <p>Imagination is more important than knowledge</p>
                        <h6>05:30</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message_box" data-chat="1">
                    <div class="message white">
                        <p>The happiness of your life depends upon the quality of your thoughts</p>
                        <h6>05:15</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>

                    <div class="message green">
                        <p>Imagination is more important than knowledge</p>
                        <h6>05:30</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message_box" data-chat="2">
                    <div class="message white">
                        <p>Do not spoil what you have by desiring what you have not</p>
                        <h6>05:15</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>

                    <div class="message green">
                        <p>Imagination is more important than knowledge</p>
                        <h6>05:30</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message_box" data-chat="3">
                    <div class="message white">
                        <p>Human behavior flows from three main sources: desire, emotion, and knowledge</p>
                        <h6>05:15</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>

                    <div class="message green">
                        <p>Imagination is more important than knowledge</p>
                        <h6>05:30</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message_box" data-chat="4">
                    <div class="message white">
                        <p>The man who moves a mountain begins by carrying away small stones</p>
                        <h6>05:15</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>

                    <div class="message green">
                        <p>Imagination is more important than knowledge</p>
                        <h6>05:30</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message_box" data-chat="5">
                    <div class="message white">
                        <p>Where the willingness is great, the difficulties cannot be great</p>
                        <h6>05:15</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>

                    <div class="message green">
                        <p>Imagination is more important than knowledge</p>
                        <h6>05:30</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message_box" data-chat="6">
                    <div class="message white">
                        <p>Do not dwell in the past, do not dream of the future, concentrate the mind on the present
                            moment</p>
                        <h6>05:15</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>

                    <div class="message green">
                        <p>Imagination is more important than knowledge</p>
                        <h6>05:30</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message_box" data-chat="7">
                    <div class="message white">
                        <p>In the midst of chaos, there is also opportunity. Opportunities multiply as they are seized
                        </p>
                        <h6>05:15</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>

                    <div class="message green">
                        <p>Imagination is more important than knowledge</p>
                        <h6>05:30</h6><i class="fas fa-chevron-down"></i>
                        <div class="message_dropdown">
                            <div class="message_options">
                                <div class="message_info">Info</div>
                                <div class="message_delete">Delete</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <div class="type_message">
                    <i class="fas fa-smile"></i>
                    <input class="type_here" type="text" placeholder="Type a message">
                    <i class="fas fa-paper-plane"></i>
                    <i class="fas fa-microphone"></i>
                </div>
            </footer>
        </div>
    </section>

    <div class="template">
        <div class="message green">
            <p class="content">Something new</p>
            <h6 class="message_time">5:55</h6><i class="fas fa-chevron-down"></i>
            <div class="message_dropdown">
                <div class="message_options">
                    <div class="message_info">Info</div>
                    <div class="message_delete">Delete</div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/boolzapp.js" charset="utf-8"></script>
</body>

</html>
