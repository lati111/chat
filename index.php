<?php
session_start();
//$_SESSION["ID"] = 1;
require_once __DIR__ . '/chat.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chat receiver</title>
</head>
<body>
<input type="hidden" id="userID" value="<?php echo $_SESSION["ID"] ?>">
<p><b>current user ID is <?php echo $_SESSION["ID"] ?></b></p>
<div>
    <label for=""><b>your ID: </b><input type="number" id="userInput"></label>
    <button onclick="changeID()">submit</button>
</div>
<br>
<div>
    <label for=""><b>receiver ID:</b> <input type="number" id="targetID"></label>
    <br>
    <label for=""><b>message:</b> <input type="text" id="messageInput"></label>
    <br>
    <button onclick="sendMessage()">submit</button>
</div>

<ul id="chatlog">

</ul>

<?php

?>
<script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
<script>
    const pusher = new Pusher("68f57aa5e3617bb4abe6", {
        cluster: "eu",
    });

    let channel = pusher.subscribe('chatterbox');
    channel.bind('user' + document.getElementById("userID").value, function(data) {
        const messageItem = document.createElement("li");
        messageItem.classList.add("message");
        messageItem.textContent = data.message;
        document.getElementById("chatlog").append(messageItem);
    });

    function sendMessage() {
        const message = document.getElementById("messageInput").value;

        let http = new XMLHttpRequest();
        let url = 'sendMessage.php';
        let params = `ID=${document.getElementById("targetID").value}&message=${message}`;
        http.open('POST', url, true);

        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {
            if(http.readyState == 4 && http.status == 200) {
                console.log(http.responseText);
            }
        }
        http.send(params);
    }

    function changeID() {
        let http = new XMLHttpRequest();
        let url = 'login.php';
        let params = `ID=${document.getElementById("userInput").value}]`;
        http.open('POST', url, true);

        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {
            if(http.readyState == 4 && http.status == 200) {
                console.log(http.responseText);
            }
        }
        http.send(params);
        location.reload();
    }
</script>
</body>
</html>
