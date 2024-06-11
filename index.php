<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellota:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <title>Hackers Poulette</title>
</head>
<body>
    <header>
        <img src="./assets/images/hackers-poulette-logo.png" alt="logo">
        <div>
            <h1>Contact Us</h1>
            <p>Any question or remarks ?</p>
            <p>Just write us a message !</p>
        </div>
    </header>
    <main>
        <section class="contact__information">
            <img src="./assets/images/hackers-poulette-logo-white.png" alt="logo" class="fond">
            <h2>Contact information</h2>
            <p>Say something to start a conversation</p>
            <p><span class="material-symbols-outlined">phone_in_talk</span>+32 476/588.358</p>
            <p><span class="material-symbols-outlined">mail</span>feys.dylan.dev@gmail.com</p>
            <div class="social">
                <img src="./assets/images/twiter.svg" alt="Twitter">
                <img src="./assets/images/insta.svg" alt="Instagram">
                <img src="./assets/images/discord.svg" alt="Discord">
            </div>
            <div class="circle--big"></div>
            <div class="circle--small"></div>
        </section>
        <section class="contact__form">
            <form action="send_email.php" method="post">
                <label for="name">Name :</label><br>
                <input type="text" id="name" name="name"><br>
                <label for="lastName">Last name :</label><br>
                <input type="text" id="LastName" name="LastName"><br>
                <div class="gender">
                    <label for="gender">Gender :</label>
                    <select name="gender" id="gender">
                        <option value="M">Man</option>
                        <option value="F">Woman</option>
                    </select><br>
                </div>
                <label for="email">Adress Email :</label><br>
                <input type="email" id="email" name="email"><br>
                <label for="country">Country :</label><br>
                <input type="text" id="country" name="country"><br>
                <label for="subject">Subject :</label><br>
                <div class="form--subject">
                    <div class="form--subject--radio">
                        <label for="problem">Technical problems and troubleshooting</label>
                        <input type="radio" name="subject" id="problem" value="problem">
                    </div>
                    <div class="form--subject--radio">
                        <label for="advice">Advice and recommendations for specific projects</label>
                        <input type="radio" name="subject" id="advice" value="advice">
                    </div>
                    <div class="form--subject--radio">
                        <label for="suggest">Suggestion</label>
                        <input type="radio" name="subject" id="suggest" value="suggest">
                    </div>
                </div>
                <label for="message">Your message :</label>
                <textarea name="message" id="message" placeholder="Your message here ..."></textarea>
                <input type="text" id="website" name="website">
                <button type="submit" name="send">Send your message</button>
            </form>
        </section>
    </main>
</body>
</html>