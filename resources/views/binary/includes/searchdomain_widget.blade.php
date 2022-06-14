<div class="wrapper" style="margin-top:-50px;">
    <h1>Check Domain Name Availability</h1><br><br>
    <div class="cont">

        <!--<form action="" method="GET">-->
        <!--    <span class="batman">  <input id="searchBar" class="field" type="text" name="domain" placeholder="Search domain name..." value="<?php //if(isset($_GET['domain'])){ echo $_GET['domain']; } ?>"></span>-->
        <!--    <button type="submit" id="btnSearch" class="btn-search"><i class="fa fa-search"></i></button>-->
        <!--</form>-->

        <form action="" method="GET">
            <span class="batman">
                <input id="searchBar" required class="field" type="text" name="domain"
                    placeholder="Search domain name..."
                    value="<?php if(isset($_GET['domain'])){ echo $_GET['domain']; } ?>" style=""
                    autocomplete="domain"></span>
            <button type="submit" id="btnSearch" class="btn-search"><i class="fa fa-search"></i></button>

        </form>

    </div>
    <?php
        error_reporting(0);
        if(isset($_GET['domain']) && !empty($_GET['domain'])){
            $domain = $_GET['domain'];
            if ( gethostbyname($domain) != $domain ) {
                echo "<h3 class='fail'>Domain Already Registered!</h3>";
            }
            else {
                echo "<h3 class='success'>Hurry, your domain is available!, you can register it.</h3>";
            }
        }
    ?>
</div>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
<meta content="width=device-width, initial-scale=1" name="viewport" />
<style type="text/css">
    .batman [type=text] {
        padding: 20px;
        font-size: 20px;
        color: #8D0000;
        margin-top: 8px;


    }


    .batman {
        /*background-color: #8D0000;*/
        padding: 40px;
        margin: -70px;
        margin-bottom: 70px;
        border-radius: 30px;
        border: 0;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.09);
        max-width: 950px;
        min-width: 625px;
    }




    body,
    h2,
    h3 {
        font-weight: normal;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        color: #333;
    }

    /* body {

        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 90vh;
        margin-top: ;
    } */

    h2 {
        font-size: 26px;
        text-align: center;
    }

    h1 {
        font-size: 26px;
        text-align: center;
        margin-top: -70px;
    }

    h3 {
        font-size: 24px;
    }

    h3.success {
        color: #008000;
        text-align: center;
        padding: 20px;
    }

    h3.fail {
        color: #8D0000;
        ;
        text-align: center;

    }

    .cont {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;


    }

    .field {
        padding: 6px 10px;
        width: 700px;
        max-width: 100%;
        border: solid;
        margin-top: 1px;
        margin-right: 8px;
        font-size: 1em;
        border-radius: 50px;
        /*border-bottom: #8D0000; solid 2px;*/
        transition: 0.3s;
    }

    .searchbar::placeholder {
        font-size: 50px;

    }

    .searchbar:focus {
        outline: none;
    }

    .btn-search {
        cursor: pointer;
        text-decoration: none !important;
        font-size: 40px;
        padding-top: 8px;
        padding-bottom: 5px;
        background-color: transparent;
        margin-left: 20px;
        border: none;
        outline: none;

    }

    @media (min-width: 320px) {

        .batman {
            /*background-color: #8D0000;*/
            padding: 25px;
            width: 100%;
            margin: -70px;
            margin-bottom: 70px;
            border-radius: 50px;
            border: 0;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.09);
            max-width: 950px min-width: 625px
        }


        .btn-search {
            font-size: 20px;
            margin-left: 30px;
        }




        .batman [type=text] {
            padding: 8px;
            font-size: 13px;
            color: #8D0000;
            margin-top: 8px;
        }

        .field {
            padding: 6px 10px;
            width: 220px;
            max-width: 70%;
            /*border: solid;*/
            margin-top: 1px;
            margin-right: 10px;
            margin-left: 10px;
            font-size: 1em;
            /*border-bottom: #8D0000; solid 2px;*/
            transition: 0.3s;

        }

        .cont {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding-left: 120px;
        }
    }


    @media (min-width: 640px) {


        .batman {
            /*background-color: #8D0000;*/
            padding: 25px;
            margin: -70px;
            margin-bottom: 70px;
            border-radius: 50px;
            border: 0;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.09);
            max-width: 950px min-width: 625px
        }


        .btn-search {
            font-size: 20px;
            margin-left: 30px;
        }




        .batman input[type=text] {
            padding: 8px;
            font-size: 10px;
            color: #8D0000;
            margin-top: 8px;
        }

        .field {
            padding: 6px 10px;
            width: 300px;
            max-width: 70%;
            /*border: solid;*/
            margin-top: 1px;
            margin-right: 10px;
            margin-left: 10px;
            font-size: 1em;
            /*border-bottom: #8D0000; solid 2px;*/
            transition: 0.3s;

        }

        .cont {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding-left: 150px;
        }





    }

    @media (min-width: 768px) {
        .field {

            max-width: 100%;
        }

        .cont {
            padding-left: 50px;
        }

       .batman input[type=text] {
            font-size: 13px;

        }

    }

    @media all and (max-width: 1141px) and (min-width: 1024px) {


        .field {

            max-width: 100%;
        }

        .cont {
            padding-left: 50px;
        }

        .batman input[type=text] {
            font-size: 13px;

        }

    }


    @media (min-width: 1400px) {

        .field {

            max-width: 100%;
        }

        .cont {
            padding-left: 50px;
        }

        .batman input[type=text] {
            font-size: 13px;

        }
    }
</style>