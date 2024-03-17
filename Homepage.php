<html>
    <head>
        <title>Home Page</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                
            }
            .container{
                width: 100%;
                height: 100vh;
                background-image:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.1)), url('./img/background1.jpg');
                background-repeat: no-repeat;
                background-size: cover;
                background-position:center;
                transition:5s;
                animation-name:animate;
                animation-direction:alternate-reverse;
                animation-duration:20s;
                animation-fill-mode:forwards;
                animation-iteration-count:infinite;
                animation-play-state:running;
                animation-timing-function:ease-in-out;
            }
            @keyframes animate{
                0%{
                  
                    background-image: url('./img/background1.jpg') ;
                }
                20%{
                    background-image:url('./img/bg2.jpg');
                }
                40%{
                    background-image:url('./img/bg3.jpg');
                }
            }
            nav{
                width: 100%;
                height: 10vh;
                background:rgba(0,0,0,0.2);
                color: white;
                display: flex;
                justify-content: space-between;
                align-items: center;
                text-transform: uppercase;
            }
            nav .menu{
                width: 40%;
                display: flex;
                justify-content: space-around;
                
            }
            nav .logo{
                width: 25%;
                text-align: center;
                display:flex;
                justify-content:space-around;
            }
            nav .menu a{
                width: 25%;
                font-size:15px;
                color: white;
                text-decoration: none;
                font-weight: bold;
            }
            main{
                width: 100%;
                height: 85vh;
                display:flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                color: white;
            }
            section a {
                padding: 12px 30px;
                border-radius: 4px;
                outline: none;
                text-transform: uppercase;
                font-size: 13px;
                font-weight: 500;
                text-decoration: none;
                letter-spacing: 1px;
                transition:all .5s ease;
            }
            section .btntwo{
                background:#00b894;
                color: white;
            }
            section h1{
                margin: 20px 0 90px 0;
                font-size: 55px;
                font-weight: 700px;
                color:white;
                text-shadow: 2px 1px 5px black;
                text-transform: uppercase;
            }
            .logo h1:hover{
                background-color:grey;
            }
            .menu a:hover{
                background-color:grey;
            }
            </style>
    </head>
    <body>
        <div></div>
            <header class="container">
                <nav>
                <div class="logo"><h3>E-Medical Reports</h3>
                <h1 onclick="home()">Home</h1></div>
                <div class="menu">
                    <a href="./patitent_login.php" class="patitent_login">Patient  Login</a>
                    <a href="./doctor login.php" class="OfficialLogin">Doctor Login</a>
                    <a href="./chat.html" class="OfficialLogin">Chat with Doctor</a>
                </div>
                </nav>
                <main>
                    <section>
                    <h1>Enhancing Well-being: Exploring Paths to Optimal Health</h1>
                        <a href="./signupoption.html" class="btntwo">Sign Here</a></a>
                   </section>
                </main>
           </header>
           <script>
               function home()
               {
                   window.location="./Home page.php";
               }
           </script>
    </body>
</html>