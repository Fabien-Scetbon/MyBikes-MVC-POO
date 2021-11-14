<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>ShopBikes</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="public/css/homecss.css" />
</head>

<body>
    <header>
        <div class="navbar">
            <div class="menu">
                <button class="toggler">
                    <a href="/">
                        <img src="public/assets/Logo.png" alt="Logo" />
                    </a>
                </button>
                <ul>
                    <li>
                        <a href="/">
                            <h1 class="hover icon" style="font-family: 'Nunito'">HOME</h1>
                        </a>
                    </li>
                    <li>
                        <a href="/">
                            <h1 class="hover icon" style="font-family: 'Nunito'">SHOP</h1>
                        </a>
                    </li>
                    <li>
                        <a href="/">
                            <h1 class="hover icon" style="font-family: 'Nunito'">MAGAZINE</h1>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="on-the-right">
                <div class="right-assets hover">
                    <a href="/">
                        <img src="public/assets/Cart Button.png" alt="" />
                    </a>
                </div>
                <div class="right-assets">

                    <?php
                    if (!isset($_SESSION['connect'])) { ?>

                        <a href="view/login/signinView.php">
                            <h1 class=" hover" style="font-family: 'Nunito'">LOGIN</h1>
                        </a>
                    <?php } else {
                        echo ('<p>Welcome ' . $_SESSION['username'] . ' !</p>
                    <a href="/index.php?action=disconnect">
                        <h1 class=" hover" >Disconnect</h1>
                    </a>');
                    } ?>


                </div>
            </div>
        </div>
        <div class="research-and-all">

            <form action="index.php?action=search" method="post">
                <!-- action dans $GET, search dans $POST -->

                <div class="form-search">
                    <button type="submit" class="search-button">
                        <img class="hover" src="public/assets/Search.png" alt="" />
                    </button>
                    <div class="search-input-algolia">
                        <div class="left-search">

                            <input class="search-input" type="text" name="search" placeholder="Your search" />

                        </div>
                        <div class="right-search">
                            <p class="algolia">Powered by Algolia</p>
                            <img src="public/assets/Sajari Logo.png" alt="Sajari Logo" style="height: 1em; width: 1em" />
                        </div>
                        <div class="black-draw"></div>
                    </div>
                </div>
            </form>

            <div class="menu-best-match">
                <h2>Best match</h2>
                <a href="/" class="hover">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                        <path d="M24 24H0V0h24v24z" fill="none" opacity=".87" />
                        <path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6-1.41-1.41z" />
                    </svg>
                </a>
                <div class="grey-draw"></div>
            </div>
        </div>
    </header>

    <section class="container">

        <div class="block1">
            <h3 style="font-family: 'Nunito'" class="title1">FILTER BY</h3>
            <nav>
                <ul>
                    <li class="unfolding">
                        <a href="/">
                            <div class="filter-title">
                                <h4>Bikes</h4>
                                <img src="public/assets/expand_more_black_24dp.svg" alt="" />

                                <div class="filter-draw"></div>
                            </div>
                        </a>
                        <ul class="under">
                            <li><a href="index.php?action=category&amp;search=mountain">Mountain Bikes</a></li>
                            <li><a href="index.php?action=category&amp;search=road">Road Bikes</a></li>
                            <li><a href="index.php?action=category&amp;search=lifestyle">Lifestyle Bikes</a></li>
                            <li><a href="index.php?action=category&amp;search=bmx">BMX Bikes</a></li>

                        </ul>
                    </li>

                    <li class="unfolding">
                        <a href="/">
                            <div class="filter-title">
                                <h4>Users</h4>
                                <img src="public/assets/expand_more_black_24dp.svg" alt="" />

                                <div class="filter-draw"></div>
                            </div>
                        </a>
                        <ul class="under">
                            <li><a href="#">Men</a></li>
                            <li><a href="#">Women</a></li>
                            <li><a href="#">Kids</a></li>
                        </ul>
                    </li>
                    <li class="unfolding">
                        <a href="/">
                            <div class="filter-title">
                                <h4>Power</h4>
                                <img src="public/assets/expand_more_black_24dp.svg" alt="" />

                                <div class="filter-draw"></div>
                            </div>
                        </a>
                        <ul class="under">
                            <li><a href="#">Normal Bikes</a></li>
                            <li><a href="#">E-bikes</a></li>
                        </ul>
                    </li>
                    <p class="title2">Price range</p>
                </ul>
            </nav>
            <div class="slidecontainer">
                <input type="range" min="1" max="10000" value="2500" class="slider" id="myRange" />
            </div>

            <div class="price-choice">
                <div class="price-range">
                    <div>0 $</div>
                    <div>10 000 $</div>
                </div>
                <div id="demo"></div>
            </div>
        </div>

        <?php

        include_once('bikes.php');
        ?>

    </section>
    <?php
    include_once('footer.php');
    ?>

    <script type="text/javascript" src="public/script.js"></script>
</body>

</html>