<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">





    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-mD7nXNl5aXE7g4pdQECzP5tAkN2P6Jw2hShD23zRy0BegVzF7XsVoC4Q3rl5kkM7" crossorigin="anonymous">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Include jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/fontawesome-6/css/all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
</head>

<?php
// use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\maincontroller;

$org =  App\Models\Organization::all();

foreach ($org as $key => $value) {

    $organization =  $value->organization_name;
    $logo =  $value->logo;
}
$id = session()->get("user_id")['user_id'];
$theme_colors = App\Models\users::where("user_id", $id)->get();

foreach ($theme_colors as $key => $value2) {

    $theme_color = $value2->theme;
}

?>


<style>
    .theme {
        color: <?php echo $theme_color; ?> !important;

    }

    /*------------------------------------------------------------------
[Master Stylesheet]

Project:  CoolAdmin
Version:	1.0
Last change:	08/10/2018 [Add Define a table of contents Link]
Assigned to:	Hau Nguyen
Primary use:	Open Source
-------------------------------------------------------------------*/
    /*------------------------------------------------------------------
[LAYOUT]

* body
    + Header / header
	+ Page Content / .page-content .name-page
        + Section Layouts / section .name-section
        ...
	+ Footer / footer

-------------------------------------------------------------------*/
    /*------------------------------------------------------------------
# [Color codes]

# Text Color (text): #666666
# Text Color Deep (Text, title): #333333

------------------------------------------------------------------*/
    /*------------------------------------------------------------------
[Typography]

Notes:	decreasing heading by 0.4em with every subsequent heading level
-------------------------------------------------------------------*/
    /*-----------------------------------------------------*/
    /*                   SETTINGS                          */
    /*-----------------------------------------------------*/
    /*-----------------------------------------------------*/
    /*                   TOOLS                             */
    /*-----------------------------------------------------*/
    /*-----------------------------------------------------*/
    /*                   GENERIC                           */
    /*-----------------------------------------------------*/
    /* ----- Normalize ----- */
    * {
        margin: 0;
        padding: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .form-control .select2 .select2-container .select2-container--default {
        width: 100% !important;
    }

    /* width */
    ::-webkit-scrollbar {
        width: 9px;
    }




    /* Track */
    ::-webkit-scrollbar-track {
        border-radius: 5px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background-color: #aaa;
        border-radius: 1px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background-color: #767474;

        border-radius: 1px;
    }

    ul {
        margin: 0;
    }

    button,
    input[type='button'] {
        cursor: pointer;
    }

    button:focus,
    input:focus,
    textarea:focus {
        outline: none;
    }

    input,
    textarea {
        border: none;
    }

    button {
        border: none;
        background: none;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    p {
        margin: 0;
    }

    .table-responsive {
        padding-right: 1px;
    }

    .card {
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    .btn {
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    /* ----- Typography ----- */
    body {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 1.625;
        color: #666;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: #333333;
        font-weight: 700;
        margin: 0;
        line-height: 1.2;
    }

    h1 {
        font-size: 36px;
    }

    h2 {
        font-size: 30px;
    }

    h3 {
        font-size: 24px;
    }

    h4 {
        font-size: 18px;
    }

    h5 {
        font-size: 15px;
    }

    h6 {
        font-size: 13px;
    }

    blockquote {
        margin: 0;
    }

    strong {
        font-weight: 700;
    }

    /*-----------------------------------------------------*/
    /*                   ELEMENTS                          */
    /*-----------------------------------------------------*/
    /* ----- Title ----- */
    .title--sbold {
        font-weight: 600;
    }

    .title-1 {
        text-transform: capitalize;
        font-weight: 400;
        font-size: 30px;
    }

    .title-2 {
        text-transform: capitalize;
        font-weight: 400;
        font-size: 24px;
        line-height: 1;
    }

    .title-3 {
        text-transform: capitalize;
        font-weight: 400;
        font-size: 24px;
        color: #333;
    }

    .title-3 i {
        margin-right: 13px;
        vertical-align: baseline;
    }

    .title-4 {
        font-weight: 500;
        font-size: 30px;
        color: #393939;
    }

    .title-5 {
        text-transform: capitalize;
        font-size: 22px;
        font-weight: 500;
        color: #393939;
    }

    .title-6 {
        font-size: 24px;
        font-weight: 500;
        color: #fff;
    }

    .heading-title {
        font-size: 24px;
        font-weight: 500;
        color: #333;
        text-transform: capitalize;
        margin-bottom: 10px;
    }

    /* ----- Links ----- */
    a {
        display: inline-block;
    }

    a:hover,
    a:focus,
    a:active {
        text-decoration: none;
        outline: none;
    }

    a:hover,
    a {
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    /*-----------------------------------------------------*/
    /*                   OBJECTS                           */
    /*-----------------------------------------------------*/
    /* ----- Section----- */
    section {
        position: relative;
    }

    .section__content {
        position: relative;
        margin: 0 auto;
        z-index: 1;
    }

    .section__content--w1830 {
        max-width: 1830px;
    }

    .section__content--p30 {
        padding: 0 30px;
    }

    @media (max-width: 991px) {
        .section__content--p30 {
            padding: 0;
        }
    }

    .section__content--p35 {
        padding: 0 35px;
    }

    /* ----- Page Wrapper----- */
    /*Override Grid Bootstrap*/
    @media (min-width: 1200px) {
        .container {
            max-width: 1320px;
        }
    }

    /*Page Objects*/
    .page-wrapper {
        overflow: hidden;
        background: #e5e5e5;
        padding-bottom: 8vh;
    }

    @media (max-width: 991px) {
        .page-wrapper {
            overflow: auto;
            background: #e5e5e5;
            padding-bottom: 12vh;
        }
    }

    .page-container {
        background: #e5e5e5;
        padding-left: 300px;
    }

    @media (max-width: 991px) {
        .page-container {
            position: relative;
            top: 88px;
            padding-left: 0;
        }
    }

    .page-container2 {
        background: #f2f2f2;
        padding-left: 300px;
    }

    @media (max-width: 991px) {
        .page-container2 {
            position: relative;
            padding-left: 0;
        }
    }

    .page-container3 {
        background: #f7f7f7;
    }

    .main-content {
        padding-top: 116px;
        min-height: 100vh;
    }

    @media (max-width: 991px) {
        .main-content {
            padding-top: 50px;
            padding-bottom: 100px;
        }
    }

    .page-content--bgf7 {
        background: #f7f7f7;
    }

    .page-content--bge5 {
        background: #e5e5e5;
        height: 100vh;
    }

    .login-wrap {
        max-width: 540px;
        padding-top: 8vh;
        margin: 0 auto;
    }

    .login-logo {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-checkbox {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    .login-checkbox label input[type="checkbox"] {
        margin-right: 8px;
    }

    .login-checkbox>label>a {
        color: #ff2e44;
    }

    @media (max-width: 991px) {
        .login-checkbox {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }
    }

    .login-form .form-group label {
        display: block;
    }

    .login-content {
        background: #fff;
        padding: 30px 30px 20px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
    }

    .social-login-content {
        border-top: 1px solid #e7e7e7;
        border-bottom: 1px solid #e7e7e7;
        padding: 20px 0px;
    }

    .register-link {
        padding-top: 15px;
        text-align: center;
        font-size: 14px;
    }

    .register-link>p>a {
        color: #ff2e44;
    }

    .fontawesome-list-wrap {
        background: #fff;
        border: 1px solid #C9CDD7;
        padding: 20px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
    }

    .fontawesome-list__title {
        padding-bottom: 20px;
        border-bottom: 1px solid #C9CDD7;
        margin-bottom: 20px;
        margin-top: 30px;
    }

    .fa-hover a {
        color: #666;
        font-size: 15px;
    }

    .fa-hover a i {
        margin-right: 10px;
    }

    .fa-hover a:hover {
        color: #333;
    }

    .main-content--pb30 {
        padding-bottom: 30px;
    }

    /*-----------------------------------------------------*/
    /*                   COMPONENTS                        */
    /*-----------------------------------------------------*/
    /* ----- Buttons----- */
    .au-btn {
        line-height: 45px;
        padding: 0 35px;
        text-transform: uppercase;
        color: #fff;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .au-btn:hover {
        color: #fff;
        background: #3868cd;
    }

    .au-btn--blue2 {
        background: #00aced;
    }

    .au-btn--blue2:hover {
        background: #00a2e3;
    }

    .au-btn--block {
        display: block;
        width: 100%;
    }

    .au-btn-icon i {
        vertical-align: baseline;
        margin-right: 5px;
    }

    .au-btn--blue {
        background: <?php echo $theme_color; ?>;
    }

    .au-btn--green {
        background: #63c76a;
    }

    .au-btn--green:hover {
        background: #59bd60;
    }

    .au-btn-plus {
        position: absolute;
        height: 45px;
        width: 45px;
        background: #63c76a;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        transition: all 0.3s ease;
        bottom: -22.5px;
        right: 45px;
        z-index: 3;
    }

    .au-btn-plus i {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        font-size: 15px;
        font-weight: 500;
        color: #fff;
    }

    .au-btn-plus:hover {
        background: #59bd60;
    }

    .au-btn-load {
        background: #808080;
        padding: 0 40px;
        font-size: 15px;
        color: #fff;
    }

    .au-btn-load:hover {
        background: #767676;
    }

    .au-btn-filter {
        font-size: 14px;
        color: #808080;
        background: #fff;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        -webkit-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
        -moz-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
        box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
        padding: 0 15px;
        line-height: 40px;
        text-transform: capitalize;
    }

    .au-btn-filter i {
        margin-right: 5px;
    }

    .au-btn--small {
        padding: 0 20px;
        line-height: 40px;
        font-size: 14px;
    }

    /*Page Loader*/
    .page-loader {
        background: #f8f8f8;
        bottom: 0;
        left: 0;
        position: fixed;
        right: 0;
        top: 0;
        z-index: 99999;
    }

    .page-loader__spin {
        width: 35px;
        height: 35px;
        position: absolute;
        top: 50%;
        left: 50%;
        border-top: 6px solid #f6f6f6;
        border-right: 6px solid #f6f6f6;
        border-bottom: 6px solid #f6f6f6;
        border-left: 6px solid #1b1b1b;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        -webkit-animation: spinner 1000ms infinite linear;
        -moz-animation: spinner 1000ms infinite linear;
        -o-animation: spinner 1000ms infinite linear;
        animation: spinner 1000ms infinite linear;
        z-index: 100000;
    }

    @-webkit-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-moz-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-o-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    /* ----- Form ----- */
    .form-header {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
    }

    @media (max-width: 991px) {
        .form-header {
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }
    }

    .form-header2 .au-btn--submit {
        border: none;
        line-height: 45px;
    }

    .form-header2 .au-input {
        border-color: rgba(255, 255, 255, 0.2);
        background: rgba(255, 255, 255, 0.051);
        color: #999;
    }

    .form-header2 .au-input::-webkit-input-placeholder {
        /* WebKit, Blink, Edge */
        color: #999;
    }

    .form-header2 .au-input:-moz-placeholder {
        /* Mozilla Firefox 4 to 18 */
        color: #999;
        opacity: 1;
    }

    .form-header2 .au-input::-moz-placeholder {
        /* Mozilla Firefox 19+ */
        color: #999;
        opacity: 1;
    }

    .form-header2 .au-input:-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: #999;
    }

    .form-header2 .au-input:-ms-input-placeholder {
        /* Microsoft Edge */
        color: #999;
    }

    /* ----- Input ----- */
    .au-input {
        line-height: 43px;
        border: 1px solid #e5e5e5;
        font-size: 14px;
        color: #666;
        padding: 0 17px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .au-input--style2 {
        color: #808080;
        line-height: 43px;
        border: 1px solid #e5e5e5;
        font-size: 14px;
        padding: 0 17px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .au-input--full {
        width: 100%;
    }

    .au-input--h65 {
        line-height: 63px;
        font-size: 16px;
        color: #808080;
    }

    .au-input--w300 {
        min-width: 300px;
    }

    .au-input--w435 {
        min-width: 435px;
    }

    @media (max-width: 767px) {
        .au-input--w435 {
            min-width: 230px;
        }
    }

    .au-form-icon {
        position: relative;
    }

    .au-form-icon .au-input {
        padding-right: 80px;
    }

    .au-form-icon--sm {
        position: relative;
    }

    .au-form-icon--sm .au-input {
        padding-right: 43px;
    }

    .au-input-icon {
        position: absolute;
        top: 1px;
        right: 12px;
        width: 63px;
        height: 63px;
        line-height: 63px;
        text-align: center;
        display: block;
    }

    .au-input-icon i {
        font-size: 30px;
        color: #808080;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .au-input--xl {
        min-width: 935px;
    }

    @media (max-width: 1600px) {
        .au-input--xl {
            min-width: 350px;
        }
    }

    @media (max-width: 991px) {
        .au-input--xl {
            min-width: 350px;
        }
    }

    @media (max-width: 767px) {
        .au-input--xl {
            min-width: 150px;
        }
    }

    .au-btn--submit {
        position: relative;
        right: 0;
        min-width: 65px;
        line-height: 43px;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        background: <?php echo $theme_color; ?>;
        margin-left: -3px;
    }

    .au-btn--submit:hover {
        background: #3868cd;
    }

    .au-btn--submit>i {
        font-size: 20px;
        color: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .au-btn--submit2 {
        height: 43px;
        width: 43px;
        position: absolute;
        top: 1px;
        right: 0;
    }

    .au-btn--submit2 i {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        color: #4c4c4c;
        font-size: 20px;
    }

    .rs-select2--sm {
        width: 114px;
    }

    .rs-select2--md {
        width: 160px;
    }

    .select2-container {
        display: block;
        max-width: 100% !important;
        width: auto !important;
        outline: none;
    }

    .rs-select2--dark {
        display: inline-block;
    }

    @media (max-width: 767px) {
        .rs-select2--dark {
            display: block;
            margin-right: 0;
            margin-bottom: 10px;
        }
    }

    .rs-select2--dark .select2-container--default .select2-selection--single {
        border: none;
        outline: none;
        padding-left: 18px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        height: 40px;
        background: #808080;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .rs-select2--dark .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #fff;
        font-size: 14px;
    }

    .rs-select2--dark .select2-container .select2-selection--single .select2-selection__rendered {
        padding: 0;
    }

    .rs-select2--dark .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px;
        top: 0;
        right: 13px;
    }

    .rs-select2--dark .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #fff transparent transparent transparent;
    }

    .rs-select2--dark .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
        border-color: transparent transparent #fff transparent;
    }

    .rs-select2--dark .select2-container--open .select2-dropdown,
    .rs-select2--trans .select2-container--open .select2-dropdown,
    .rs-select2--light .select2-container--open .select2-dropdown,
    .rs-select2--trans .select2-container--open .select2-dropdown {
        font-size: 14px;
        box-shadow: 0px 2px 15px 3px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        border: 1px solid #e0e0e0;
        margin-top: 8px;
        overflow: hidden;
    }

    .rs-select2--dark .select2-container--open .select2-dropdown .select2-results__option,
    .rs-select2--trans .select2-container--open .select2-dropdown .select2-results__option,
    .rs-select2--light .select2-container--open .select2-dropdown .select2-results__option {
        padding: 8px 16px;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background: <?php echo $theme_color; ?>;
    }

    .select2-container--default.select2-container--open.select2-container--below .select2-selection--single,
    .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
    }

    .rs-select2--border .select2-container--default .select2-selection--single,

    .rs-select2--dark2 .select2-container--default .select2-selection--single {
        background: #555;
    }

    .rs-select2--light {
        display: inline-block;
    }

    @media (max-width: 767px) {
        .rs-select2--light {
            display: block;
            margin-right: 0;
            margin-bottom: 10px;
        }
    }

    .rs-select2--light .select2-container--default .select2-selection--single {
        border: none;
        outline: none;
        padding-left: 18px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        height: 40px;
        background: #fff;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
        -moz-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
        box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
    }

    .rs-select2--light .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #808080;
        font-size: 14px;
    }

    .rs-select2--light .select2-container .select2-selection--single .select2-selection__rendered {
        padding: 0;
    }

    .rs-select2--light .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px;
        top: 0;
        right: 13px;
    }

    .rs-select2--light .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #808080 transparent transparent transparent;
    }

    .rs-select2--light .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
        border-color: transparent transparent #808080 transparent;
    }

    .rs-select2--light v .select2-container--open .select2-dropdown {
        font-size: 14px;
    }

    .rs-select2--border .select2-container--default .select2-selection--single {
        background: transparent;
        border: 1px solid #e5e5e5;
    }

    .rs-select2--border .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #808080;
    }

    .rs-select2--border .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #808080 transparent transparent transparent;
    }

    .rs-select2--border .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
        border-color: transparent transparent #808080 transparent;
    }

    .rs-select2--trans .select2-container--default .select2-selection--single {
        border: none;
        outline: none;
    }

    .rs-select2--trans .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #808080;
        font-size: 14px;
        padding-left: 0;
    }

    .rs-select2--trans .select2-container--open .select2-dropdown {
        font-size: 14px;
    }

    .au-checkbox {
        display: block;
        position: relative;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .au-checkbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .au-checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 22px;
        width: 22px;
        background-color: #fff;
        border: 2px solid #e5e5e5;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
    }

    .au-checkbox:hover input~.au-checkmark {
        background-color: transparent;
    }

    .au-checkbox input:checked~.au-checkmark {
        background-color: transparent;
    }

    .au-checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .au-checkbox input:checked~.au-checkmark:after {
        display: block;
    }

    .au-checkbox .au-checkmark:after {
        left: 5px;
        top: -1px;
        width: 9px;
        height: 15px;
        border: solid #00ad5f;
        border-width: 0 4px 4px 0;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .form-control {
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
    }

    .card {
        margin-bottom: 30px;
    }

    .input-group-addon {
        background-color: transparent;
        border-left: 0;
    }

    .input-group-addon,
    .input-group-btn {
        white-space: nowrap;
        vertical-align: middle;
    }

    .input-group-addon {
        padding: .5rem .75rem;
        margin-bottom: 0;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.25;
        color: #495057;
        text-align: center;
        background-color: #e9ecef;
        border: 1px solid rgba(0, 0, 0, 0.15);
        -webkit-border-radius: .25rem;
        -moz-border-radius: .25rem;
        border-radius: .25rem;
    }

    /* ----- Header ----- */
    .header-desktop {
        background: #f5f5f5;
        -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        position: fixed;
        top: 0;
        right: 0;
        left: 300px;
        height: 75px;
        z-index: 3;
    }

    .header-desktop .section__content {
        overflow: visible;
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    @media (max-width: 991px) {
        .header-desktop {
            position: relative;
            top: 0;
            left: 0;
            height: 170px;
        }
    }

    .header-desktop .mess-dropdown {
        top: 51px;
    }

    .header-desktop .email-dropdown {
        top: 51px;
    }

    .header-desktop .notifi-dropdown {
        top: 51px;
    }

    @media (max-width: 991px) {
        .logo {
            text-align: center;
        }
    }

    .header-wrap {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .header-wrap .account-item>.content {
            display: none;
        }
    }

    @media (max-width: 991px) {
        .header-wrap {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .header-wrap .mess-dropdown {
            left: 0;
        }

        .header-wrap .mess-dropdown::before {
            left: 0;
        }

        .header-wrap .notifi-dropdown {
            left: -83px;
        }

        .header-wrap .notifi-dropdown::before {
            left: 79px;
        }
    }

    .header-button {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    @media (max-width: 991px) {
        .header-button {
            margin-top: 30px;
            width: 100%;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }
    }

    .noti-wrap {
        height: 45px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .noti-wrap .noti__item:last-child {
        margin-right: 50px;
    }

    @media (max-width: 1200px) {
        .noti-wrap .noti__item:last-child {
            margin-right: 30px;
        }
    }

    @media (max-width: 991px) {
        .noti-wrap .noti__item:last-child {
            margin-right: 0;
        }
    }

    .noti__item {
        position: relative;
        margin-right: 35px;
        display: inline-block;
        cursor: pointer;
    }

    @media (max-width: 1200px) {
        .noti__item {
            margin-right: 25px;
        }
    }

    @media (max-width: 767px) {
        .noti__item {
            margin-right: 20px;
        }
    }

    .noti__item:hover i {
        color: #999;
    }

    .noti__item i {
        font-size: 30px;
        color: #a9b3c9;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        transition: all 0.5s ease;
        vertical-align: middle;
    }

    @media (max-width: 767px) {
        .noti__item i {
            font-size: 24px;
        }
    }

    .noti__item .quantity {
        position: absolute;
        display: inline-block;
        top: -4px;
        right: -7px;
        height: 15px;
        width: 15px;
        line-height: 15px;
        text-align: center;
        background: #ff4b5a;
        color: #fff;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        font-size: 12px;
    }

    .account-wrap {
        position: relative;
    }

    .account-item {
        cursor: pointer;
    }

    .account-item .image {
        width: 45px;
        height: 45px;
        float: left;
        overflow: hidden;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    .account-item .image>img {
        width: 100%;
    }

    .account-item>.content {
        margin-left: 45px;
        padding: 9px 0;
        padding-left: 12px;
    }

    .account-item>.content>a {
        color: #333;
        text-transform: capitalize;
        font-weight: 500;
    }

    .account-item>.content>a:after {
        font-family: "Material-Design-Iconic-Font";
        font-weight: 500;
        content: '\f2f9';
        display: inline-block;
        font-size: 16px;
        margin-left: 5px;
    }

    .account-item>.content>a:hover {
        color: #666;
    }

    .account-dropdown {
        min-width: 305px;
        position: absolute;
        top: 58px;
        right: 0;
        background: #fff;
        -webkit-box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
        -webkit-transform: scale(0);
        -moz-transform: scale(0);
        -ms-transform: scale(0);
        -o-transform: scale(0);
        transform: scale(0);
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        -moz-transition: all 0.4s ease;
        transition: all 0.4s ease;
        -webkit-transform-origin: right top;
        -moz-transform-origin: right top;
        -ms-transform-origin: right top;
        -o-transform-origin: right top;
        transform-origin: right top;
        z-index: 3;
    }

    .account-dropdown .info {
        padding: 25px;
        border-top: 1px solid #f5f5f5;
        border-bottom: 1px solid #f2f2f2;
    }

    .account-dropdown .info .image {
        float: left;
        height: 65px;
        width: 65px;
        overflow: hidden;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    .account-dropdown .info .content {
        margin-left: 65px;
        padding: 11px 0;
        padding-left: 12px;
    }

    .account-dropdown .info .content .name {
        line-height: -webkit-calc(20/16);
        line-height: -moz-calc(20/16);
        line-height: calc(20/16);
    }

    .account-dropdown .info .content .name a {
        color: #333;
        font-weight: 500;
        text-transform: capitalize;
    }

    .account-dropdown .info .content .name a:hover {
        color: #666;
    }

    .account-dropdown .info .content .email {
        font-size: 13px;
        color: #999;
        line-height: -webkit-calc(20/13);
        line-height: -moz-calc(20/13);
        line-height: calc(20/13);
    }

    .account-dropdown:after {
        content: '';
        display: block;
        width: 19px;
        height: 19px;
        border-bottom: 9px solid #fff;
        border-top: 9px solid transparent;
        border-left: 9px solid transparent;
        border-right: 9px solid transparent;
        position: absolute;
        top: -18px;
        right: 33px;
    }

    .account-dropdown__item a {
        display: block;
        color: #333;
        padding: 15px 25px;
        font-size: 14px;
    }

    .account-dropdown__item a:hover {
        background: <?php echo $theme_color; ?>;
        color: #fff;
    }

    .account-dropdown__item a i {
        line-height: 1;
        margin-right: 20px;
        font-size: 18px;
        vertical-align: middle;
    }

    .account-dropdown__body {
        padding: 12px 0;
    }

    .account-dropdown__footer {
        border-top: 1px solid #f2f2f2;
    }

    .account-dropdown__footer a {
        display: block;
        color: #333;
        padding: 15px 25px;
        font-size: 14px;
    }

    .account-dropdown__footer a:hover {
        background: <?php echo $theme_color; ?>;
        color: #fff;
    }

    .account-dropdown__footer a i {
        line-height: 1;
        margin-right: 20px;
        font-size: 18px;
        vertical-align: middle;
    }

    .menu-sidebar {
        width: 300px;
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        background: #fff;
        overflow-y: auto;
    }

    .menu-sidebar .logo {
        background: #f5f5f5;
        height: 75px;
        padding: 0 35px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        border-right: 1px solid #e5e5e5;
        position: relative;
        z-index: 3;
    }

    .menu-sidebar .navbar__list .navbar__sub-list {
        display: none;
        padding-left: 34px;
    }

    .menu-sidebar .navbar__list .navbar__sub-list li a {
        padding: 11.5px 0;
    }

    .menu-sidebar__content {
        position: relative;
        height: -webkit-calc(100vh - 75px);
        height: -moz-calc(100vh - 75px);
        height: calc(100vh - 75px);
    }

    .navbar-sidebar {
        padding: 35px;
        padding-bottom: 0;
    }

    .navbar-sidebar .navbar__list li a {
        display: block;
        color: #555;
        font-size: 16px;
        padding: 15px 0;
    }

    .navbar-sidebar .navbar__list li a i {
        margin-right: 19px;
    }

    .navbar-sidebar .navbar__list li a:hover {
        color: <?php echo $theme_color; ?>;
    }

    .navbar-sidebar .navbar__list li.active>a {
        color: <?php echo $theme_color; ?>;
    }

    .has-sub {
        position: relative;
    }

    .header-mobile {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
    }

    .header-mobile .header-mobile__bar {
        padding: 15px 0;
    }

    .header-mobile .header-mobile-inner {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    .header-mobile .hamburger {
        width: 36px;
        height: 36px;
        padding: 0;
        line-height: 1;
        vertical-align: top;
        background: #fff;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .header-mobile .hamburger .hamburger-box {
        width: 20px;
        height: 15px;
    }

    .header-mobile .hamburger .hamburger-box .hamburger-inner {
        width: 20px;
        height: 2px;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
    }

    .header-mobile .hamburger .hamburger-box .hamburger-inner:before {
        width: 20px;
        height: 2px;
        top: 6px;
    }

    .header-mobile .hamburger .hamburger-box .hamburger-inner:after {
        top: 12px;
        width: 20px;
        height: 2px;
    }

    .header-mobile .navbar-mobile {
        display: none;
        position: absolute;
        width: 100%;
        top: 88px;
        z-index: 20;
    }

    .header-mobile .navbar-mobile .navbar-mobile__list {
        background: #f8f8f8;
    }

    .header-mobile .navbar-mobile .navbar-mobile__list>li>a {
        padding-left: 15px !important;
    }

    .header-mobile .navbar-mobile .navbar-mobile__list li a {
        color: #555;
        display: block;
        padding: 10px 15px;
        padding-right: 25px;
        padding-left: 0;
        border-bottom: 1px solid #e6e6e6;
        text-transform: capitalize;
        line-height: inherit;
    }

    .header-mobile .navbar-mobile .navbar-mobile__list li a:hover {
        color: <?php echo $theme_color; ?>;
    }

    .header-mobile .navbar-mobile .navbar-mobile__list li a>i {
        margin-right: 19px;
    }

    .header-mobile .navbar-mobile .navbar-mobile__list li.has-dropdown>a:after {
        content: '\f105';
        font-family: FontAwesome, cursive;
        float: right;
        font-size: 16px;
        line-height: 22px;
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .header-mobile .navbar-mobile .navbar-mobile__list li.has-dropdown>a.active::after {
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
    }

    .header-mobile .navbar-mobile .navbar-mobile__dropdown {
        padding-left: 35px;
        display: none;
    }

    .navbar-mobile-sub__list {
        display: none;
        padding-left: 30px;
        background: #fff;
    }

    .header-mobile .navbar-mobile .navbar-mobile-sub__list li a {
        padding-left: 15px;
    }

    .header-mobile-2 {
        background: #393939;
        position: static;
    }

    .header-mobile-2.header-mobile .navbar-mobile {
        top: 82px;
    }

    .header-mobile-2.header-mobile .hamburger {
        background: transparent;
    }

    .header-mobile-2.header-mobile .hamburger .hamburger-box .hamburger-inner {
        background: #fff;
    }

    .header-mobile-2.header-mobile .hamburger .hamburger-box .hamburger-inner::before {
        background: #fff;
    }

    .header-mobile-2.header-mobile .hamburger .hamburger-box .hamburger-inner::after {
        background: #fff;
    }

    .sub-header-mobile-2 {
        background: #fff;
        padding: 15px;
    }

    .sub-header-mobile-2 .header__tool {
        -webkit-box-pack: end;
        -webkit-justify-content: flex-end;
        -moz-box-pack: end;
        -ms-flex-pack: end;
        justify-content: flex-end;
    }

    .sub-header-mobile-2 .header__tool .header-button-item {
        color: #a9b3c9;
    }

    .sub-header-mobile-2 .header__tool .account-wrap .account-item--style2 .content a {
        color: #333;
    }

    .sub-header-mobile-2 .header__tool .notifi-dropdown {
        top: 49px;
    }

    .sub-header-mobile-2 .header__tool .setting-dropdown {
        top: 49px;
    }

    .hamburger.is-active .hamburger-box .hamburger-inner:after {
        -webkit-transform: translate3d(0, -12px, 0) rotate(-90deg);
        -moz-transform: translate3d(0, -12px, 0) rotate(-90deg);
        transform: translate3d(0, -12px, 0) rotate(-90deg);
    }

    .mess-dropdown,
    .email-dropdown,
    .notifi-dropdown,
    .setting-dropdown {
        position: absolute;
        z-index: 9999;
        min-width: 340px;
        background: #fff;
        -webkit-box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
        border: 1px solid #e5e5e5;
        -webkit-transform: scale(0);
        -moz-transform: scale(0);
        -ms-transform: scale(0);
        -o-transform: scale(0);
        transform: scale(0);
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        -moz-transition: all 0.4s ease;
        transition: all 0.4s ease;
        -webkit-transform-origin: left top;
        -moz-transform-origin: left top;
        -ms-transform-origin: left top;
        -o-transform-origin: left top;
        transform-origin: left top;
        top: 100%;
        left: 0;
    }

    .mess-dropdown:before,
    .email-dropdown:before,
    .notifi-dropdown:before,
    .setting-dropdown:before {
        content: '';
        display: block;
        width: 19px;
        height: 19px;
        border-bottom: 9px solid #fff;
        border-top: 9px solid transparent;
        border-left: 9px solid transparent;
        border-right: 9px solid transparent;
        position: absolute;
        top: -17px;
        left: 55px;
        z-index: 3;
    }

    .mess__title,
    .email__title,
    .notifi__title {
        padding: 22px;
        border-bottom: 1px solid #f2f2f2;
        cursor: default;
    }

    .mess__title p,
    .email__title p,
    .notifi__title p {
        line-height: -webkit-calc(29/14);
        line-height: -moz-calc(29/14);
        line-height: calc(29/14);
        font-size: 14px;
        color: #808080;
    }

    .mess__footer a,
    .email__footer a,
    .notifi__footer a {
        display: block;
        text-transform: capitalize;
        text-align: center;
        font-size: 14px;
        color: <?php echo $theme_color; ?>;
        padding: 24px 0;
    }

    .mess__footer a:hover,
    .email__footer a:hover,
    .notifi__footer a:hover {
        color: #3868cd;
    }

    .mess-dropdown {
        top: 49px;
        left: -55px;
    }

    .mess__item {
        padding: 19px 22px;
        padding-bottom: 14px;
        border-bottom: 1px solid #f2f2f2;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .mess__item:hover {
        background: #f7f7f7;
    }

    .mess__item .image {
        margin-right: 15px;
    }

    .mess__item .content {
        width: -webkit-calc(100% - 55px);
        width: -moz-calc(100% - 55px);
        width: calc(100% - 55px);
        text-align: left;
    }

    .mess__item .content h6 {
        font-size: 14px;
        font-weight: 600;
        padding-top: 4px;
    }

    .mess__item .content p {
        font-size: 14px;
        color: #555;
        line-height: -webkit-calc(24/14);
        line-height: -moz-calc(24/14);
        line-height: calc(24/14);
        margin-bottom: 4px;
    }

    .mess__item .content .time {
        font-size: 12px;
        color: #999;
    }

    .email-dropdown {
        top: 49px;
        left: -53px;
    }

    .email__item {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        padding: 19px 22px;
        padding-bottom: 14px;
        border-bottom: 1px solid #f2f2f2;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .email__item:hover {
        background: #f7f7f7;
    }

    .email__item .image {
        margin-right: 15px;
    }

    .email__item .content {
        width: -webkit-calc(100% - 55px);
        width: -moz-calc(100% - 55px);
        width: calc(100% - 55px);
        text-align: left;
        font-size: 14px;
    }

    .email__item .content p {
        color: #555;
        line-height: 1;
        padding-top: 4px;
        margin-bottom: 3px;
    }

    .email__item .content span {
        font-size: 12px;
        color: #999;
    }

    .notifi-dropdown {
        left: -117px;
        top: 49px;
    }

    .notifi-dropdown::before {
        left: 63px;
    }

    .notifi__item {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        padding: 19px 22px;
        padding-bottom: 14px;
        border-bottom: 1px solid #f2f2f2;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .notifi__item:hover {
        background: #f7f7f7;
    }

    .notifi__item .img-cir {
        position: relative;
        margin-right: 15px;
    }

    .notifi__item .img-cir i {
        font-size: 22px;
        color: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .notifi__item .content {
        width: -webkit-calc(100% - 55px);
        width: -moz-calc(100% - 55px);
        width: calc(100% - 55px);
        text-align: left;
        font-size: 14px;
    }

    .notifi__item .content p {
        color: #555;
        line-height: 1;
        padding-top: 5px;
        margin-bottom: 2px;
    }

    .notifi__item .content .date {
        font-size: 12px;
        color: #999;
    }

    .show-dropdown .js-dropdown {
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
        transform: scale(1);
    }

    .menu-sidebar-min {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
    }

    .menu-sidebar2 {
        width: 300px;
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        background: #fff;
        overflow-y: auto;
        height: 100vh;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        transition: all 0.5s ease;
        z-index: 1000;
    }

    .menu-sidebar2 .logo {
        height: 75px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        background: <?php echo $theme_color; ?>;
        padding: 0 35px;
    }

    @media (max-width: 991px) {
        .menu-sidebar2 {
            top: 0;
            right: -300px;
            left: auto;
            -webkit-box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .menu-sidebar2.show-sidebar {
            right: 0;
        }
    }

    .account2 {
        padding: 38px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -moz-box-orient: vertical;
        -moz-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        border-bottom: 1px solid #f2f2f2;
    }

    .account2 .name {
        text-transform: capitalize;
        font-weight: 500;
        font-size: 20px;
        margin-top: 20px;
        margin-bottom: 5px;
    }

    .account2>a {
        font-size: 14px;
        color: #999;
    }

    .account2>a:hover {
        color: #666;
    }

    .menu-sidebar2__content {
        height: -webkit-calc(100vh - 75px);
        height: -moz-calc(100vh - 75px);
        height: calc(100vh - 75px);
        border-right: 1px solid #e5e5e5;
        position: relative;
    }

    .navbar-sidebar2 .navbar__list li {
        position: relative;
        cursor: pointer;
    }

    .navbar-sidebar2 .navbar__list li .arrow {
        position: absolute;
        right: 15px;
        top: 0;
        text-align: center;
        vertical-align: middle;
        height: 63px;
        width: 63px;
        line-height: 63px;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .navbar-sidebar2 .navbar__list li .arrow.up {
        -webkit-transform: rotate(-180deg);
        -moz-transform: rotate(-180deg);
        -ms-transform: rotate(-180deg);
        -o-transform: rotate(-180deg);
        transform: rotate(-180deg);
    }

    .navbar-sidebar2 .navbar__list li .arrow i {
        font-size: 16px;
        color: #999;
    }

    .navbar-sidebar2 .navbar__list li:hover>a {
        color: <?php echo $theme_color; ?>;
    }

    .navbar-sidebar2 .navbar__list li a {
        font-size: 16px;
        color: #555;
        display: block;
        padding: 18px 35px;
        border-bottom: 1px solid #f2f2f2;
    }

    .navbar-sidebar2 .navbar__list li a>i {
        margin-right: 20px;
    }

    .navbar-sidebar2 .navbar__list li.active>a {
        color: <?php echo $theme_color; ?>;
    }

    .navbar-sidebar2 .navbar__sub-list {
        display: none;
    }

    .navbar-sidebar2 .navbar__sub-list li {
        background: #f5f5f5;
    }

    .navbar-sidebar2 .navbar__sub-list li a {
        border-color: #ebebeb;
    }

    .inbox-num {
        position: absolute;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        right: 34px;
        width: 30px;
        height: 30px;
        background: #ff4b5a;
        text-align: center;
        line-height: 30px;
        font-size: 14px;
        color: #fff;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    .header-desktop2 {
        height: 75px;
        background: <?php echo $theme_color; ?>;
        position: fixed;
        z-index: 1001;
        top: 0;
        right: 0;
        left: 300px;
    }

    @media (max-width: 991px) {
        .header-desktop2 {
            left: 0;
            position: relative;
        }
    }

    .header-desktop2 .section__content {
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .header-wrap2 {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: end;
        -webkit-justify-content: flex-end;
        -moz-box-pack: end;
        -ms-flex-pack: end;
        justify-content: flex-end;
    }

    @media (max-width: 991px) {
        .header-wrap2 {
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }
    }

    .header-button .notifi-dropdown::before {
        left: 117px;
    }

    .header-button2 {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
    }

    .header-button2 .header-button-item:last-child {
        margin-right: 0;
    }

    .header-button2 .header-button-item {
        cursor: pointer;
    }

    .header-button2 .header-button-item i {
        vertical-align: middle;
    }

    .header-button2 .header-button-item .search-dropdown {
        top: 52px;
    }

    @media (max-width: 991px) {
        .header-button2 .header-button-item .search-dropdown {
            top: 63px;
            right: -75px;
            -webkit-transform-origin: 70% top;
            -moz-transform-origin: 70% top;
            -ms-transform-origin: 70% top;
            -o-transform-origin: 70% top;
            transform-origin: 70% top;
        }

        .header-button2 .header-button-item .search-dropdown::before {
            right: 79px;
        }
    }

    .header-button2 .header-button-item .notifi-dropdown {
        top: 52px;
        left: auto;
        right: -68px;
        -webkit-transform-origin: right top;
        -moz-transform-origin: right top;
        -ms-transform-origin: right top;
        -o-transform-origin: right top;
        transform-origin: right top;
    }

    .header-button2 .header-button-item .notifi-dropdown::before {
        margin-left: 0;
        left: auto;
        right: 68px;
    }

    @media (max-width: 991px) {
        .header-button2 .header-button-item .notifi-dropdown {
            top: 63px;
            right: -48px;
            -webkit-transform-origin: 80% top;
            -moz-transform-origin: 80% top;
            -ms-transform-origin: 80% top;
            -o-transform-origin: 80% top;
            transform-origin: 80% top;
        }

        .header-button2 .header-button-item .notifi-dropdown::before {
            margin-left: 0;
            left: auto;
            right: 45px;
        }
    }

    .header-button-item {
        font-size: 30px;
        color: #fff;
        margin-right: 34px;
        position: relative;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    @media (max-width: 767px) {
        .header-button-item {
            font-size: 22px;
            margin-right: 15px;
        }
    }

    .has-noti>i {
        position: relative;
    }

    .has-noti>i:after {
        content: '';
        height: 8px;
        width: 8px;
        background: #ff4b5a;
        position: absolute;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        top: 0;
        right: -6px;
    }

    .search-dropdown {
        -webkit-box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
        min-width: 340px;
        position: absolute;
        top: 61px;
        right: -125px;
        -webkit-transform: scale(0);
        -moz-transform: scale(0);
        -ms-transform: scale(0);
        -o-transform: scale(0);
        transform: scale(0);
        -webkit-transform-origin: center top;
        -moz-transform-origin: center top;
        -ms-transform-origin: center top;
        -o-transform-origin: center top;
        transform-origin: center top;
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        -moz-transition: all 0.4s ease;
        transition: all 0.4s ease;
        z-index: 5;
    }

    .search-dropdown::before {
        content: '';
        display: block;
        width: 19px;
        height: 19px;
        border-bottom: 9px solid #fff;
        border-top: 9px solid transparent;
        border-left: 9px solid transparent;
        border-right: 9px solid transparent;
        position: absolute;
        top: -18px;
        right: 125px;
    }

    .search-dropdown form {
        height: 63px;
    }

    .search-dropdown form .au-input {
        padding-left: 53px;
        font-size: 14px;
        border: none;
        color: #666;
    }

    .search-dropdown .search-dropdown__icon {
        position: absolute;
        top: 0;
        left: 26px;
        font-size: 24px;
        color: #c9c9c9;
        height: 63px;
        line-height: 63px;
    }

    .setting-menu {
        position: fixed;
        min-width: 300px;
        right: -300px;
        top: 54px;
        background: #fff;
        text-align: left;
        -webkit-box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.1);
        height: -webkit-calc(100vh - 75px);
        height: -moz-calc(100vh - 75px);
        height: calc(100vh - 75px);
        -webkit-transition: all .5s ease;
        -o-transition: all .5s ease;
        -moz-transition: all .5s ease;
        transition: all .5s ease;
    }

    .setting-menu:before {
        content: '';
        display: block;
        width: 19px;
        height: 19px;
        border-bottom: 9px solid #fff;
        border-top: 9px solid transparent;
        border-left: 9px solid transparent;
        border-right: 9px solid transparent;
        position: absolute;
        top: -18px;
        right: 47px;
    }

    .setting-menu .account-dropdown__body {
        border-bottom: 1px solid #f2f2f2;
    }

    .setting-menu .account-dropdown__item a {
        color: #555;
    }

    .setting-menu .account-dropdown__item a:hover {
        color: #fff;
    }

    .show-sidebar {
        right: 0;
    }

    .header-desktop3 {
        background: #393939;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        height: 76px;
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 999;
        -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    }

    .header-desktop3 .section__content {
        position: absolute;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        left: 0;
        right: 0;
    }

    @media (max-width: 1315px) and (min-width: 992px) {
        .header-desktop3 .section__content {
            padding: 0 15px;
        }
    }

    .header-desktop3 .header-button-item {
        color: #ccc;
    }

    .header3-wrap {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        position: relative;
    }

    .header3-wrap .header__navbar {
        width: 100%;
        position: absolute;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
        top: -12px;
    }

    .header__logo {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        position: relative;
        z-index: 3;
    }

    .header__navbar ul {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .header__navbar ul li {
        position: relative;
    }

    .header__navbar ul li:last-child a {
        border-right: 1px solid rgba(255, 255, 255, 0.102);
    }

    .header__navbar ul li a {
        display: block;
        font-size: 16px;
        color: #ccc;
        padding: 25px 30px;
        border-left: 1px solid rgba(255, 255, 255, 0.102);
    }

    .header__navbar ul li a i {
        margin-right: 13px;
    }

    .header__navbar ul li a:hover {
        color: <?php echo $theme_color; ?>;
    }

    .header__navbar ul li a:hover .bot-line {
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
        transform: scale(1);
        opacity: 1;
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    @media (max-width: 1570px) and (min-width: 992px) {
        .header__navbar ul li a {
            padding: 25px 15px;
        }
    }

    @media (max-width: 1315px) and (min-width: 992px) {
        .header__navbar ul li a {
            font-size: 13px;
            padding: 27px 15px;
        }

        .header__navbar ul li a i {
            margin-right: 5px;
        }
    }

    .header__navbar ul li.active>a {
        color: <?php echo $theme_color; ?>;
    }

    .header__navbar ul li.active>a .bot-line {
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
        transform: scale(1);
        opacity: 1;
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .header__navbar ul.header3-sub-list {
        display: block;
    }

    .header__navbar li.has-sub:hover>.header3-sub-list {
        opacity: 1;
        -webkit-transform: scaleY(1);
        -moz-transform: scaleY(1);
        -ms-transform: scaleY(1);
        -o-transform: scaleY(1);
        transform: scaleY(1);
        -webkit-transition: all .3s ease;
        -o-transition: all .3s ease;
        -moz-transition: all .3s ease;
        transition: all .3s ease;
    }

    .header__navbar .header3-sub-list {
        position: absolute;
        min-width: 260px;
        background: #fff;
        -webkit-box-shadow: 0px 3px 20px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 3px 20px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 3px 20px 0px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        opacity: 0;
        -webkit-transform: scaleY(0);
        -moz-transform: scaleY(0);
        -ms-transform: scaleY(0);
        -o-transform: scaleY(0);
        transform: scaleY(0);
        -webkit-transform-origin: top center;
        -moz-transform-origin: top center;
        -ms-transform-origin: top center;
        -o-transform-origin: top center;
        transform-origin: top center;
        -webkit-transition: all .3s ease;
        -o-transition: all .3s ease;
        -moz-transition: all .3s ease;
        transition: all .3s ease;
    }

    .header__navbar .header3-sub-list li a {
        font-size: 15px;
        color: #777777;
        padding: 10px 22px;
        border: none;
        border-bottom: 1px solid #e1e6eb;
    }

    .header__navbar .header3-sub-list li a:hover {
        color: <?php echo $theme_color; ?>;
        background: #f7f7f7;
    }

    .header__tool {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .header__tool .notifi-dropdown {
        left: -68px;
        top: 53px;
    }

    .header__tool .notifi-dropdown::before {
        left: 70px;
    }

    .header__tool .header-button-item {
        margin-right: 40px;
    }

    @media (max-width: 1570px) and (min-width: 992px) {
        .header__tool .header-button-item {
            margin-right: 20px;
        }
    }

    @media (max-width: 1315px) and (min-width: 992px) {
        .header__tool .header-button-item {
            margin-right: 20px;
            font-size: 24px;
        }
    }

    @media (max-width: 1315px) and (min-width: 992px) {
        .header__tool .account-item>.content {
            display: none;
        }
    }

    .bot-line {
        position: absolute;
        width: 100%;
        height: 3px;
        background: <?php echo $theme_color; ?>;
        left: 0;
        bottom: 0;
        opacity: 0;
        -webkit-transform: scale(0);
        -moz-transform: scale(0);
        -ms-transform: scale(0);
        -o-transform: scale(0);
        transform: scale(0);
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        transition: all 0.3s ease;
        -webkit-transform-origin: top center;
        -moz-transform-origin: top center;
        -ms-transform-origin: top center;
        -o-transform-origin: top center;
        transform-origin: top center;
    }

    .setting-dropdown {
        top: 54px;
        left: -97px;
        border: none;
        min-width: 305px;
    }

    .setting-dropdown::before {
        left: 99px;
    }

    .setting-dropdown .account-dropdown__body {
        border-bottom: 1px solid #f2f2f2;
    }

    .setting-dropdown .account-dropdown__body:last-child {
        border-bottom: none;
    }

    .setting-dropdown .account-dropdown__item a {
        color: #555;
    }

    .setting-dropdown .account-dropdown__item a:hover {
        color: #fff;
    }

    .header-button-item {
        cursor: pointer;
    }

    .notifi-dropdown--no-bor {
        border: none;
    }

    .notifi-dropdown .notifi__item {
        cursor: pointer;
    }

    .account-item--style2 .image {
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
    }

    .account-item--style2 .content a {
        font-size: 16px;
        color: #ccc;
        font-weight: 500;
    }

    .account-item--style2 .content a:hover {
        color: #fff;
    }

    .account-item--style2 .account-dropdown {
        top: 61px;
    }

    .account-item--style2 .account-dropdown .info .image {
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
    }

    .header-desktop4 {
        -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 999;
        background: #fff;
    }

    @media (max-width: 991px) {
        .header-desktop4 {
            position: static;
        }
    }

    .header4-wrap {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    .header4-wrap .header__logo {
        margin: 11.5px 0;
    }

    .header4-wrap .header__tool .header-button-item {
        color: #a9b3c9;
    }

    @media (max-width: 991px) {
        .header4-wrap .header__tool .header-button-item {
            margin-right: 20px;
        }
    }

    .header4-wrap .header__tool .notifi-dropdown {
        top: 51px;
    }

    @media (max-width: 991px) {
        .header4-wrap .header__tool .notifi-dropdown {
            left: -220px;
            -webkit-transform-origin: 60% 0%;
            -moz-transform-origin: 60% 0%;
            -ms-transform-origin: 60% 0%;
            -o-transform-origin: 60% 0%;
            transform-origin: 60% 0%;
        }
    }

    .header4-wrap .header__tool .setting-dropdown {
        border: 1px solid #e5e5e5;
        top: 51px;
    }

    @media (max-width: 991px) {
        .header4-wrap .header__tool .setting-dropdown {
            left: -240px;
            -webkit-transform-origin: 85% 0%;
            -moz-transform-origin: 85% 0%;
            -ms-transform-origin: 85% 0%;
            -o-transform-origin: 85% 0%;
            transform-origin: 85% 0%;
        }
    }

    .header4-wrap .header__tool .account-dropdown {
        top: 59px;
    }

    @media (max-width: 1315px) and (min-width: 992px) {
        .header4-wrap .header__tool .account-item>.content {
            display: block;
        }
    }

    @media (max-width: 991px) {
        .header4-wrap .header__tool .account-item>.content {
            display: none;
        }
    }

    .header4-wrap .header__tool .account-item--style2 .content a {
        color: #333;
    }

    .header4-wrap .header__tool .account-item--style2 .content a:hover {
        color: #222;
    }

    .navbar-sidebar3 {
        padding-right: 20px;
    }

    .navbar-sidebar3 .navbar__list li.active>a {
        background: <?php echo $theme_color; ?>;
        color: #fff;
    }

    .navbar-sidebar3 .navbar__list li.active>a>.arrow>i {
        color: #fff;
    }

    .navbar-sidebar3 .navbar__list li a {
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        padding: 18px 27px;
        border-bottom: none;
    }

    .navbar-sidebar3 .navbar__sub-list {
        padding-left: 36px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .navbar-sidebar3 .navbar__sub-list li {
        background: transparent;
    }

    .navbar-sidebar3 .navbar__sub-list li a {
        padding: 11.5px 27px;
    }

    .navbar-sidebar3 .has-sub.open>a {
        background: #fff;
        border: 1px solid #e5e5e5;
    }

    @media (max-width: 1199px) {
        .navbar-sidebar3 {
            padding-right: 0;
            margin-bottom: 30px;
        }
    }

    /* ----- Overview ----- */
    .overview-wrap {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    @media (max-width: 767px) {
        .overview-wrap {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .overview-wrap .button {
            -webkit-box-ordinal-group: 2;
            -webkit-order: 1;
            -moz-box-ordinal-group: 2;
            -ms-flex-order: 1;
            order: 1;
        }

        .overview-wrap h2 {
            -webkit-box-ordinal-group: 3;
            -webkit-order: 2;
            -moz-box-ordinal-group: 3;
            -ms-flex-order: 2;
            order: 2;
        }
    }

    .overview-item {
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        padding: 30px;
        padding-bottom: 0;
        -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        margin-bottom: 40px;
    }

    @media (min-width: 992px) and (max-width: 1519px) {
        .overview-item {
            padding-left: 15px;
            padding-right: 15px;
        }
    }

    .overview-item--c1 {
        background-image: -moz-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
        background-image: -webkit-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
        background-image: -ms-linear-gradient(90deg, #3f5efb 0%, #fc466b 100%);
    }

    .overview-item--c2 {
        background-image: -moz-linear-gradient(90deg, #11998e 0%, #38ef7d 100%);
        background-image: -webkit-linear-gradient(90deg, #11998e 0%, #38ef7d 100%);
        background-image: -ms-linear-gradient(90deg, #11998e 0%, #38ef7d 100%);
    }

    .overview-item--c3 {
        background-image: -moz-linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
        background-image: -webkit-linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
        background-image: -ms-linear-gradient(90deg, #ee0979 0%, #ff6a00 100%);
    }

    .overview-item--c4 {
        background-image: -moz-linear-gradient(90deg, #45b649 0%, #dce35b 100%);
        background-image: -webkit-linear-gradient(90deg, #45b649 0%, #dce35b 100%);
        background-image: -ms-linear-gradient(90deg, #45b649 0%, #dce35b 100%);
    }

    .overview-box .icon {
        display: inline-block;
        vertical-align: top;
        margin-right: 15px;
    }

    .overview-box .icon i {
        font-size: 60px;
        color: #fff;
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .overview-box .icon {
            margin-right: 3px;
        }

        .overview-box .icon i {
            font-size: 30px;
        }
    }

    @media (max-width: 991px) {
        .overview-box .icon {
            font-size: 46px;
        }
    }

    .overview-box .text {
        font-weight: 300;
        display: inline-block;
    }

    .overview-box .text h2 {
        font-weight: 300;
        color: #fff;
        font-size: 36px;
        line-height: 1;
        margin-bottom: 5px;
    }

    .overview-box .text span {
        font-size: 18px;
        color: rgba(255, 255, 255, 0.6);
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .overview-box .text {
            display: inline-block;
        }

        .overview-box .text h2 {
            font-size: 20px;
            margin-bottom: 0;
        }

        .overview-box .text span {
            font-size: 14px;
        }
    }

    @media (max-width: 991px) {
        .overview-box .text h2 {
            font-size: 26px;
        }

        .overview-box .text span {
            font-size: 15px;
        }
    }

    .overview-chart {
        height: 115px;
        position: relative;
    }

    .overview-chart canvas {
        width: 100%;
    }

    /* ----- Card ----- */
    .au-card {
        -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        padding: 40px;
        padding-right: 35px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        background: #fff;
        overflow: hidden;
    }

    .au-card--border {
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    .au-card--border .au-card-title {
        -webkit-border-top-left-radius: 3px;
        -moz-border-radius-topleft: 3px;
        border-top-left-radius: 3px;
        -webkit-border-top-right-radius: 3px;
        -moz-border-radius-topright: 3px;
        border-top-right-radius: 3px;
    }

    .au-card--border .au-card-title .bg-overlay {
        -webkit-border-top-left-radius: 3px;
        -moz-border-radius-topleft: 3px;
        border-top-left-radius: 3px;
        -webkit-border-top-right-radius: 3px;
        -moz-border-radius-topright: 3px;
        border-top-right-radius: 3px;
    }

    .au-card-bordered {
        border: 1px solid #e5e5e5;
        background: #fff;
        padding: 40px;
        padding-top: 42px;
        padding-right: 55px;
        margin-bottom: 40px;
    }

    .au-card--bg-blue {
        background-image: -moz-linear-gradient(90deg, #396afc 0%, #2948ff 100%);
        background-image: -webkit-linear-gradient(90deg, #396afc 0%, #2948ff 100%);
        background-image: -ms-linear-gradient(90deg, #396afc 0%, #2948ff 100%);
    }

    .au-card-top-countries {
        padding: 40px;
        padding-top: 25px;
        padding-bottom: 29px;
    }

    .au-card--no-shadow {
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
    }

    .au-card--no-pad {
        padding: 0;
    }

    .au-card-title {
        position: relative;
        padding: 40px;
        padding-top: 45px;
        padding-bottom: 47px;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        -webkit-border-top-left-radius: 10px;
        -moz-border-radius-topleft: 10px;
        border-top-left-radius: 10px;
        -webkit-border-top-right-radius: 10px;
        -moz-border-radius-topright: 10px;
        border-top-right-radius: 10px;
        -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    }

    .au-card-title .bg-overlay {
        -webkit-border-top-left-radius: 10px;
        -moz-border-radius-topleft: 10px;
        border-top-left-radius: 10px;
        -webkit-border-top-right-radius: 10px;
        -moz-border-radius-topright: 10px;
        border-top-right-radius: 10px;
    }

    .au-card-title h3 {
        position: relative;
        z-index: 2;
        color: #fff;
        font-weight: 400;
    }

    .au-card-title h3 i {
        color: #fff;
        font-size: 24px;
        margin-right: 12px;
    }

    .au-task {
        color: #808080;
    }

    .au-task--border .au-task__title {
        border-left: 1px solid #e5e5e5;
        border-right: 1px solid #e5e5e5;
    }

    .au-task--border .au-task-list {
        border-left: 1px solid #e5e5e5;
        border-right: 1px solid #e5e5e5;
    }

    .au-task--border .au-task__footer {
        border: 1px solid #e5e5e5;
        border-top: none;
    }

    .au-task__title {
        padding: 27px 15px;
        padding-left: 40px;
        padding-bottom: 22px;
        border-bottom: 1px solid #f2f2f2;
        font-size: 14px;
    }

    .au-task-list {
        height: 424px;
        position: relative;
        overflow-y: auto;
    }

    .au-task__item {
        border-bottom: 1px solid #f2f2f2;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .au-task__item:hover {
        background: #f7f7f7;
    }

    .au-task__item-inner {
        padding: 26px 15px;
        padding-left: 40px;
    }

    .au-task__item-inner .task {
        font-size: 16px;
        margin-bottom: 6px;
    }

    .au-task__item-inner .task a {
        font-size: 16px;
        color: #808080;
        font-weight: 400;
    }

    .au-task__item-inner .task a:hover {
        color: #333;
    }

    .au-task__item-inner .time {
        font-size: 14px;
        color: #555;
        text-transform: uppercase;
        font-weight: 600;
    }

    .au-task__item--danger .au-task__item-inner {
        border-left: 3px solid #fa4251;
    }

    .au-task__item--warning .au-task__item-inner {
        border-left: 3px solid #ffa037;
    }

    .au-task__item--primary .au-task__item-inner {
        border-left: 3px solid <?php echo $theme_color; ?>;
    }

    .au-task__item--success .au-task__item-inner {
        border-left: 3px solid #00ad5f;
    }

    .au-task__footer {
        text-align: center;
        padding-top: 35px;
        padding-bottom: 45px;
    }

    .au-message__footer {
        text-align: center;
        padding-top: 35px;
        padding-bottom: 45px;
    }

    .au-message p {
        color: #808080;
    }

    .au-message-list {
        height: 424px;
        position: relative;
        overflow-y: auto;
    }

    .au-message__noti {
        padding: 25px 15px;
        padding-left: 40px;
        padding-bottom: 22px;
        border-bottom: 1px solid #f2f2f2;
    }

    .au-message__noti p {
        font-size: 14px;
    }

    .au-message__noti p span {
        font-weight: 600;
    }

    .au-message__item {
        border-bottom: 1px solid #f2f2f2;
        cursor: pointer;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .au-message__item:hover {
        background: #f7f7f7;
    }

    .au-message__item-inner {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        padding: 19px 40px;
        padding-right: 50px;
        padding-bottom: 25px;
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .au-message__item-inner {
            padding: 15px;
            padding-right: 10px;
            padding-bottom: 15px;
        }
    }

    @media (max-width: 767px) {
        .au-message__item-inner {
            padding: 15px;
            padding-right: 10px;
            padding-bottom: 15px;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-align: start;
            -webkit-align-items: flex-start;
            -moz-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
        }
    }

    .au-message__item-time {
        margin-top: 26px;
    }

    .au-message__item-time span {
        font-size: 14px;
        color: #808080;
    }

    .au-message__item-text .text {
        margin-left: 60px;
        padding: 7px 0;
        padding-left: 23px;
    }

    .au-message__item-text .text .name {
        font-size: 16px;
        font-weight: 600;
        color: #666;
        margin-bottom: 2px;
    }

    .au-message__item-text .text p {
        color: #808080;
    }

    @media (max-width: 767px) {
        .au-message__item-text .text {
            margin: 0;
            padding: 0;
        }
    }

    .avatar-wrap {
        position: relative;
        float: left;
    }

    @media (max-width: 767px) {
        .avatar-wrap {
            float: none;
            display: inline-block;
            margin-bottom: 20px;
        }
    }

    .online .avatar::after {
        background: #63c76a;
    }

    .avatar {
        height: 60px;
        width: 60px;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        overflow: hidden;
    }

    .avatar::after {
        content: '';
        display: block;
        height: 15px;
        width: 15px;
        background: #ccc;
        border: 2px solid #fff;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        position: absolute;
        bottom: 0;
        right: 0;
    }

    .avatar--small {
        height: 50px;
        width: 50px;
    }

    .avatar--tiny {
        height: 32px;
        width: 32px;
    }

    .avatar--tiny::after {
        display: none;
    }

    .au-message__item.unread .au-message__item-inner {
        border-left: 3px solid #999;
    }

    .au-message__item.unread .au-message__item-text .text .name {
        color: #333;
    }

    .au-message__item.unread .au-message__item-text .text p {
        color: #333;
    }

    .au-chat--border .au-chat__title {
        border-left: 1px solid #e5e5e5;
        border-right: 1px solid #e5e5e5;
    }

    .au-chat--border .au-chat__content {
        border-left: 1px solid #e5e5e5;
        border-right: 1px solid #e5e5e5;
    }

    .au-chat--border .au-chat-textfield {
        border: 1px solid #e5e5e5;
        border-top: none;
    }

    .au-chat__title {
        border-bottom: 1px solid #f2f2f2;
    }

    .au-chat-info {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        padding: 12px 40px;
    }

    .au-chat-info .avatar-wrap {
        float: none;
        display: inline-block;
        margin-bottom: 0;
    }

    .au-chat-info .nick {
        margin-left: 15px;
    }

    .au-chat-info .nick a {
        font-weight: 600;
        font-size: 16px;
        color: #333;
    }

    .au-chat-info .nick a:hover {
        color: #666;
    }

    .au-chat__content {
        height: 400px;
        overflow: auto;
        padding: 30px 40px;
        padding-bottom: 0;
        position: relative;
    }

    .au-chat__content2 .recei-mess {
        max-width: 240px;
        -webkit-border-top-left-radius: 3px;
        -moz-border-radius-topleft: 3px;
        border-top-left-radius: 3px;
        -webkit-border-bottom-left-radius: 3px;
        -moz-border-radius-bottomleft: 3px;
        border-bottom-left-radius: 3px;
        -webkit-border-top-right-radius: 15px;
        -moz-border-radius-topright: 15px;
        border-top-right-radius: 15px;
        -webkit-border-bottom-right-radius: 15px;
        -moz-border-radius-bottomright: 15px;
        border-bottom-right-radius: 15px;
    }

    .au-chat__content2 .send-mess {
        max-width: 240px;
        -webkit-border-top-right-radius: 3px;
        -moz-border-radius-topright: 3px;
        border-top-right-radius: 3px;
        -webkit-border-bottom-right-radius: 3px;
        -moz-border-radius-bottomright: 3px;
        border-bottom-right-radius: 3px;
        -webkit-border-top-left-radius: 15px;
        -moz-border-radius-topleft: 15px;
        border-top-left-radius: 15px;
        -webkit-border-bottom-left-radius: 15px;
        -moz-border-radius-bottomleft: 15px;
        border-bottom-left-radius: 15px;
    }

    .mess-time {
        font-size: 14px;
        color: #999;
    }

    .recei-mess-wrap {
        text-align: center;
    }

    .recei-mess {
        background: #f2f2f2;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
        padding: 12px 25px;
        max-width: 390px;
        margin-bottom: 2px;
        text-align: left;
    }

    .recei-mess__inner {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        margin-top: 6px;
    }

    .recei-mess__inner .avatar--tiny {
        -webkit-align-self: flex-end;
        -ms-flex-item-align: end;
        align-self: flex-end;
        justify-self: flex-start;
        margin-right: 10px;
    }

    .recei-mess-list {
        width: -webkit-calc(100% - 42px);
        width: -moz-calc(100% - 42px);
        width: calc(100% - 42px);
    }

    .recei-mess-list .recei-mess:last-child {
        margin-bottom: 0;
    }

    .send-mess-wrap {
        text-align: center;
        margin-top: 20px;
    }

    .send-mess__inner {
        margin-top: 6px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: end;
        -webkit-justify-content: flex-end;
        -moz-box-pack: end;
        -ms-flex-pack: end;
        justify-content: flex-end;
    }

    .send-mess {
        background: <?php echo $theme_color; ?>;
        color: #fff;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
        padding: 12px 25px;
        max-width: 390px;
        margin-bottom: 2px;
        text-align: left;
    }

    .au-chat-textfield {
        padding: 40px;
        padding-top: 32px;
        padding-bottom: 50px;
    }

    .au-inbox-wrap {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        width: 200%;
        -webkit-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .au-inbox-wrap.show-chat-box {
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
    }

    .au-message {
        width: 50%;
    }

    .au-chat {
        width: 50%;
    }

    .task-progress {
        border: 1px solid #e5e5e5;
        background: #fff;
        padding: 40px;
        padding-top: 42px;
        padding-right: 55px;
        padding-bottom: 74px;
        margin-bottom: 40px;
    }

    .task-progress .title-3 {
        margin-bottom: 32px;
    }

    .task-progress .au-progress {
        padding: 11px 0;
    }

    .recent-report2 {
        border: 1px solid #e5e5e5;
        background: #fff;
        padding: 40px;
        padding-top: 42px;
        padding-right: 55px;
        padding-bottom: 51px;
        margin-bottom: 40px;
    }

    .recent-report2 .recent-rep2-chart {
        height: 230px;
    }

    .recent-report2 .chart-info {
        margin-bottom: 45px;
    }

    @media (min-width: 992px) and (max-width: 1519px) {
        .recent-report2 .chart-info {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }
    }

    @media (max-width: 991px) {
        .recent-report2 .chart-info {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }
    }

    .recent-report2 .chart-info__left {
        -webkit-align-self: flex-end;
        -ms-flex-item-align: end;
        align-self: flex-end;
        margin-bottom: -5px;
    }

    @media (min-width: 992px) and (max-width: 1519px) {
        .recent-report2 .chart-info__left {
            -webkit-align-self: auto;
            -ms-flex-item-align: auto;
            align-self: auto;
            margin-bottom: 30px;
            margin-top: 20px;
        }
    }

    @media (max-width: 991px) {
        .recent-report2 .chart-info__left {
            -webkit-align-self: auto;
            -ms-flex-item-align: auto;
            align-self: auto;
            margin-bottom: 30px;
            margin-top: 20px;
        }
    }

    .user-data {
        border: 1px solid #e5e5e5;
        background: #fff;
        padding-top: 44px;
    }

    .user-data .title-3 {
        padding-left: 40px;
        padding-right: 55px;
    }

    .user-data .filters {
        padding-left: 40px;
        padding-right: 55px;
    }

    .user-data__footer {
        padding: 29px 0;
        text-align: center;
    }

    .map-data {
        border: 1px solid #e5e5e5;
        background: #fff;
        padding: 40px;
        padding-top: 44px;
        padding-right: 60px;
    }

    .recent-report3,
    .chart-percent-3 {
        background: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        padding-top: 45px;
        padding-left: 40px;
        padding-right: 50px;
        padding-bottom: 50px;
    }

    .recent-report3 .title-wrap {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        margin-bottom: 27px;
    }

    .recent-report3 .title-wrap .chart-info-wrap {
        margin-top: 3px;
    }

    .recent-report3 .title-wrap .chart-note {
        font-size: 14px;
        margin-right: 30px;
    }

    .chart-percent-3 {
        padding-bottom: 60px;
    }

    .chart-percent-3 .chart-note {
        display: block;
        font-size: 14px;
    }

    /* ----- Charts ----- */
    #chartjs-tooltip {
        opacity: 1;
        position: absolute;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        -webkit-transition: all .1s ease;
        -o-transition: all .1s ease;
        -moz-transition: all .1s ease;
        transition: all .1s ease;
        pointer-events: none;
        -webkit-transform: translate(-50%, 0);
        -moz-transform: translate(-50%, 0);
        -ms-transform: translate(-50%, 0);
        -o-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
    }

    .recent-report {
        padding-bottom: 65px;
        margin-bottom: 60px;
    }

    .chart-info {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-box-align: baseline;
        -webkit-align-items: baseline;
        -moz-box-align: baseline;
        -ms-flex-align: baseline;
        align-items: baseline;
        margin-bottom: 30px;
        font-size: 14px;
    }

    .chart-note {
        text-transform: capitalize;
        display: inline-block;
        margin-right: 12px;
        font-size: 14px;
    }

    .chart-note .dot {
        margin-right: 7px;
    }

    .chart-statis {
        display: inline-block;
        margin-right: 35px;
    }

    .chart-statis i {
        font-size: 18px;
        margin-right: 5px;
    }

    .chart-statis .label {
        display: block;
        text-transform: capitalize;
        line-height: 1.2;
    }

    .chart-statis .index {
        font-size: 18px;
        color: #333;
    }

    .recent-report__chart canvas {
        height: 250px;
        width: 100%;
    }

    .chart-percent-card {
        margin-bottom: 60px;
        padding-top: 47px;
    }

    .chart-percent-card .chart-note {
        margin-bottom: 8px;
    }

    .incre i {
        color: #63c76a;
    }

    .decre i {
        color: #ff4b5a;
    }

    .dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
    }

    .dot--blue {
        background: #00b5e9;
    }

    .dot--green {
        background: #00ad5f;
    }

    .dot--red {
        background: #fa4251;
    }

    .chart-note-wrap {
        margin-top: 20px;
    }

    .percent-chart {
        padding-right: 65px;
        padding-bottom: 40px;
        padding-top: 27px;
    }

    @media (min-width: 992px) and (max-width: 1519px) {
        .percent-chart {
            padding-right: 0;
        }
    }

    .statistic-chart {
        padding-top: 22px;
    }

    .statistic-chart-1,
    .top-campaign,
    .chart-percent-2 {
        background: #fff;
        padding: 0 40px;
        padding-top: 45px;
        padding-bottom: 50px;
        -webkit-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
        -moz-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
        box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    .statistic-chart-1 {
        padding-bottom: 42px;
        margin-bottom: 40px;
    }

    .statistic-chart-1-note {
        margin-top: 18px;
        padding-left: 8px;
    }

    .statistic-chart-1-note span {
        font-size: 14px;
        color: #808080;
    }

    .statistic-chart-1-note .big {
        font-size: 18px;
        color: #393939;
    }

    .top-campaign {
        padding-bottom: 97px;
        margin-bottom: 40px;
    }

    .chart-percent-2 {
        margin-bottom: 40px;
        padding-bottom: 70px;
    }

    .chart-percent-2 .chart-info {
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        margin-bottom: 0;
        margin-top: 30px;
    }

    .chart-percent-2 .chart-info .chart-note {
        margin-right: 34px;
    }

    .chart-percent-2 .chart-info .chart-note:last-child {
        margin-right: 0;
    }

    /* ----- Table ----- */
    .table {
        margin: 0;
    }

    .table-responsive.table--no-card {
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        -webkit-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        -moz-box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);
    }

    .table-earning thead th {
        background: #333;
        font-size: 16px;
        color: #fff;
        vertical-align: middle;
        font-weight: 400;
        text-transform: capitalize;
        line-height: 1;
        padding: 22px 40px;
        white-space: nowrap;
    }

    .table-earning thead th.text-right {
        padding-left: 15px;
        padding-right: 65px;
    }

    .table-earning tbody td {
        color: #808080;
        padding: 12px 40px;
        white-space: nowrap;
    }

    .table-earning tbody td.text-right {
        padding-left: 15px;
        padding-right: 65px;
    }

    .table-earning tbody tr:hover td {
        color: #555;
        cursor: pointer;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #fff;
    }

    .table-striped tbody tr:nth-of-type(even) {
        background-color: #f5f5f5;
    }

    .table-top-countries tbody td {
        white-space: nowrap;
        font-size: 14px;
        color: #fff;
        padding: 14px 5px;
        border-top: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .table-top-countries tbody tr:last-child td {
        border-bottom: none;
    }

    .table-wrap {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    @media (min-width: 992px) and (max-width: 1519px) {
        .table-wrap {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }
    }

    @media (max-width: 991px) {
        .table-wrap {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }
    }

    .table-style1 {
        max-width: 280px;
        margin-bottom: 30px;
    }

    .table-style1 .table tr:last-child td {
        border-bottom: none;
    }

    .table-style1 .table tr td:last-child {
        padding-right: 30px;
    }

    .table-style1 .table td {
        font-size: 14px;
        color: #808080;
        border-top: none;
        border-bottom: 1px solid #f2f2f2;
        padding: 12px 6px;
        vertical-align: middle;
    }

    .table-data {
        height: 472px;
        overflow-y: auto;
    }

    .table-data thead tr td {
        font-size: 12px;
        font-weight: 600;
        color: #808080;
        text-transform: uppercase;
    }

    .table-data .table td {
        border-top: none;
        border-bottom: 1px solid #f2f2f2;
        padding-top: 23px;
        padding-bottom: 33px;
        padding-left: 40px;
        padding-right: 10px;
    }

    .table-data .table tr td:last-child {
        padding-right: 24px;
    }

    .table-data tbody tr:hover td .more {
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
        transform: scale(1);
    }

    .table-data__info h6 {
        font-size: 14px;
        color: #808080;
        text-transform: capitalize;
        font-weight: 400;
    }

    .table-data__info span a {
        font-size: 12px;
        color: #999;
    }

    .table-data__info span a:hover {
        color: #666;
    }

    .more {
        display: inline-block;
        cursor: pointer;
        width: 30px;
        height: 30px;
        background: #e5e5e5;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        position: relative;
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        -moz-transition: all 0.4s ease;
        transition: all 0.4s ease;
        -webkit-transform: scale(0);
        -moz-transform: scale(0);
        -ms-transform: scale(0);
        -o-transform: scale(0);
        transform: scale(0);
    }

    .more i {
        font-size: 20px;
        color: #808080;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .role {
        display: inline-block;
        line-height: 30px;
        font-size: 14px;
        color: #fff;
        padding: 0 15px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-transform: capitalize;
    }

    .role.admin {
        background: #fa4251;
    }

    .role.user {
        background: #00b5e9;
    }

    .role.member {
        background: #57b846;
    }

    .table-top-campaign.table td {
        border-top: none;
        border-bottom: 1px solid #e5e5e5;
        font-size: 14px;
        padding: 12px 6px;
    }

    .table-top-campaign.table tr td:first-child {
        color: #808080;
    }

    .table-top-campaign.table tr td:last-child {
        color: <?php echo $theme_color; ?>;
        text-align: right;
    }

    .table-top-campaign.table tr:last-child td {
        border-bottom: none;
    }

    @media (min-width: 1200px) {
        .table-responsive-data2 {
            overflow: visible;
        }
    }

    .table-data2 {
        border-collapse: collapse;
        overflow: visible;
    }

    .table-data2.table thead th {
        font-size: 12px;
        color: #555;
        text-transform: uppercase;
        border: none;
        font-weight: 600;
        vertical-align: top;
        padding: 15px 40px;
        padding-right: 10px;
    }

    .table-data2.table thead th:first-child {
        padding-right: 0;
    }

    .table-data2.table tbody {
        background: #fff;
    }

    .table-data2.table tbody tr td:first-child {
        -webkit-border-top-left-radius: 3px;
        -moz-border-radius-topleft: 3px;
        border-top-left-radius: 3px;
        -webkit-border-bottom-left-radius: 3px;
        -moz-border-radius-bottomleft: 3px;
        border-bottom-left-radius: 3px;
        vertical-align: top;
    }

    .table-data2.table tbody tr td:first-child .au-checkbox {
        margin-top: 5px;
    }

    @media (max-width: 1199px) {
        .table-data2.table tbody tr td:first-child {
            vertical-align: middle;
        }

        .table-data2.table tbody tr td:first-child .au-checkbox {
            margin-top: 0;
        }
    }

    .table-data2.table tbody tr td:last-child {
        -webkit-border-top-right-radius: 3px;
        -moz-border-radius-topright: 3px;
        border-top-right-radius: 3px;
        -webkit-border-bottom-right-radius: 3px;
        -moz-border-radius-bottomright: 3px;
        border-bottom-right-radius: 3px;
        padding-right: 35px;
    }

    .table-data2.table tbody td {
        font-size: 14px;
        color: #808080;
        vertical-align: middle;
        padding: 25px 40px;
        padding-right: 10px;
        border: none;
    }

    .table-data2.table tbody td.desc {
        color: <?php echo $theme_color; ?>;
    }

    .table-data2 .spacer {
        height: 5px;
        background: transparent;
    }

    .tr-shadow {
        -webkit-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
        -moz-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
        box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
    }

    .table-data__tool {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        margin-bottom: 28px;
    }

    .table-data__tool .table-data__tool-left>div {
        margin-right: 12px;
    }

    .table-data__tool .table-data__tool-right>button {
        margin-right: 12px;
    }

    @media (max-width: 991px) {
        .table-data__tool {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .table-data__tool .table-data__tool-right {
            margin-top: 10px;
        }

        .table-data__tool .table-data__tool-right>button {
            margin-right: 0;
            margin-bottom: 10px;
        }
    }

    .table-data-feature {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: end;
        -webkit-justify-content: flex-end;
        -moz-box-pack: end;
        -ms-flex-pack: end;
        justify-content: flex-end;
    }

    .table-data-feature .item {
        display: block;
        height: 30px;
        width: 30px;
        position: relative;
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        background: #e5e5e5;
        margin-right: 5px;
    }

    .table-data-feature .item:last-child {
        margin-right: 0;
    }

    .table-data-feature .item i {
        font-size: 20px;
        color: #808080;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .block-email {
        font-size: 14px;
        color: #808080;
        display: inline-block;
        background: #f2f2f2;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        line-height: 30px;
        padding: 0 14px;
    }

    .status--process {
        color: #00ad5f;
    }

    .status--denied {
        color: #fa4251;
    }

    .table-data3 thead {
        background: #333;
    }

    .table-data3 thead tr th {
        font-size: 16px;
        color: #fff;
        font-weight: 400;
        text-transform: capitalize;
        padding: 18px 40px;
        padding-right: 10px;
    }

    .table-data3 thead tr th:first-child {
        -webkit-border-top-left-radius: 3px;
        -moz-border-radius-topleft: 3px;
        border-top-left-radius: 3px;
    }

    .table-data3 thead tr th:last-child {
        -webkit-border-top-right-radius: 3px;
        -moz-border-radius-topright: 3px;
        border-top-right-radius: 3px;
    }

    .table-data3 thead tr th:last-child {
        text-align: right;
        padding-right: 50px;
    }

    .table-data3 tbody tr td:last-child {
        text-align: right;
        padding-right: 50px;
    }

    .table-data3 tbody tr {
        border-left: 1px solid #e5e5e5;
        border-right: 1px solid #e5e5e5;
    }

    .table-data3 tbody tr:last-child td:first-child {
        -webkit-border-bottom-left-radius: 8px;
        -moz-border-radius-bottomleft: 8px;
        border-bottom-left-radius: 8px;
    }

    .table-data3 tbody tr:last-child td:last-child {
        -webkit-border-bottom-right-radius: 8px;
        -moz-border-radius-bottomright: 8px;
        border-bottom-right-radius: 8px;
    }

    .table-data3 tbody td {
        border-bottom: 1px solid #f5f5f5;
        background: #fff;
        font-size: 14px;
        color: #808080;
        padding: 12px 40px;
        padding-right: 10px;
    }

    .table-data3 tbody td.process {
        color: #00ad5f;
    }

    .table-data3 tbody td.denied {
        color: #fa4251;
    }

    /* ----- Footer ----- */
    .copyright {
        text-align: center;
        padding: 60px 0;
        padding-top: 20px;
    }

    .copyright p {
        font-size: 14px;
        color: #666;
        line-height: -webkit-calc(24/14);
        line-height: -moz-calc(24/14);
        line-height: calc(24/14);
    }

    /* ----- Breadcrumb ----- */
    .au-breadcrumb {
        height: 75px;
        background: #fff;
        position: relative;
        z-index: 0;
    }

    @media (max-width: 991px) {
        .au-breadcrumb {
            height: 130px;
        }

        .au-breadcrumb.m-t-75 {
            margin-top: 0;
        }
    }

    .au-breadcrumb .section__content {
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .au-breadcrumb-content {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    @media (max-width: 991px) {
        .au-breadcrumb-content {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -moz-box-orient: vertical;
            -moz-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -moz-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .au-breadcrumb-content .au-breadcrumb-left {
            -webkit-box-ordinal-group: 3;
            -webkit-order: 2;
            -moz-box-ordinal-group: 3;
            -ms-flex-order: 2;
            order: 2;
        }

        .au-breadcrumb-content>button {
            margin-bottom: 15px;
        }
    }

    .au-breadcrumb-span {
        font-size: 14px;
        color: #999;
        display: inline-block;
    }

    .au-breadcrumb__list {
        display: inline-block;
        margin-left: 5px;
    }

    .au-breadcrumb__list li {
        font-size: 14px;
        color: #999;
    }

    .au-breadcrumb__list .list-inline-item:not(:last-child) {
        margin-right: 5px;
    }

    .au-breadcrumb__list .active a {
        color: #999;
    }

    .au-breadcrumb__list .active a:hover {
        color: #333;
    }

    .au-breadcrumb2 {
        padding-top: 48px;
        padding-bottom: 50px;
    }

    .au-breadcrumb2 .au-breadcrumb-span {
        color: #808080;
    }

    .au-breadcrumb2 .au-breadcrumb__list .active a {
        color: #808080;
    }

    .au-breadcrumb2 .au-breadcrumb__list .active a:hover {
        color: #666;
    }

    .au-breadcrumb2 .au-breadcrumb__list li {
        color: #808080;
    }

    @media (max-width: 991px) {
        .au-breadcrumb2 .au-breadcrumb-left {
            margin-top: 20px;
        }
    }

    .au-breadcrumb3 .au-breadcrumb__list .active a:hover {
        color: #ccc;
    }

    .line-seprate {
        height: 1px;
        width: 100%;
        background: #e5e5e5;
        border: none;
        margin-top: 20px;
        margin-bottom: 0;
    }

    .welcome2 {
        background: #393939;
    }

    .welcome2-inner {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -moz-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    .welcome2-inner .welcome2-greeting {
        width: -webkit-calc(100% - 500px);
        width: -moz-calc(100% - 500px);
        width: calc(100% - 500px);
    }

    .welcome2-inner form {
        height: 45px;
    }

    @media (max-width: 991px) {
        .welcome2-inner {
            -webkit-box-orient: vertical;
            -webkit-box-direction: reverse;
            -webkit-flex-direction: column-reverse;
            -moz-box-orient: vertical;
            -moz-box-direction: reverse;
            -ms-flex-direction: column-reverse;
            flex-direction: column-reverse;
        }

        .welcome2-inner.m-t-60 {
            margin-top: 0;
        }

        .welcome2-inner .welcome2-greeting {
            width: 100%;
        }

        .welcome2-inner form {
            margin-bottom: 30px;
            margin-top: 30px;
            -webkit-align-self: flex-start;
            -ms-flex-item-align: start;
            align-self: flex-start;
        }
    }

    .welcome2-greeting h1 {
        margin-bottom: 12px;
    }

    .welcome2-greeting p {
        font-size: 14px;
        color: #808080;
    }

    /* ----- Statistic ----- */
    .statistic {
        padding-top: 57px;
    }

    .statistic__item {
        border: 1px solid #e5e5e5;
        background: #fff;
        padding: 20px 30px;
        position: relative;
        min-height: 180px;
        overflow: hidden;
        margin-bottom: 40px;
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .statistic__item {
            padding: 20px 10px;
        }
    }

    .statistic__item h2 {
        font-size: 36px;
        font-weight: 300;
        color: <?php echo $theme_color; ?>;
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .statistic__item h2 {
            font-size: 22px;
        }
    }

    .statistic__item .desc {
        font-size: 18px;
        text-transform: uppercase;
        font-weight: 300;
        color: rgba(128, 128, 128, 0.6);
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .statistic__item .desc {
            font-size: 13px;
        }
    }

    .statistic__item .icon {
        display: inline-block;
        position: absolute;
        bottom: -50px;
        right: -7px;
    }

    .statistic__item .icon i {
        font-size: 180px;
        color: #808080;
        opacity: .2;
        line-height: 1;
        vertical-align: baseline;
    }

    .statistic__item--green {
        background: #00b26f;
    }

    .statistic__item--orange {
        background: #ff8300;
    }

    .statistic__item--blue {
        background: #00b5e9;
    }

    .statistic__item--red {
        background: #fa4251;
    }

    /* ----- Statistic 2 ----- */
    .statistic2 {
        padding-top: 50px;
    }

    .statistic2 .statistic__item {
        border: none;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        -webkit-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
        -moz-box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
        box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.03);
    }

    .statistic2 .statistic__item h2 {
        color: #fff;
    }

    .statistic2 .statistic__item .desc {
        color: rgba(255, 255, 255, 0.6);
    }

    /* ----- Progress ----- */
    .au-progress .au-progress__bar {
        height: 10px;
        position: relative;
        background: #d9d9d9;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }

    .au-progress .au-progress__bar .au-progress__inner {
        position: absolute;
        width: 0;
        top: 0;
        left: 0;
        bottom: 0;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-transition: width 1s ease-in-out;
        -o-transition: width 1s ease-in-out;
        -moz-transition: width 1s ease-in-out;
        transition: width 1s ease-in-out;
        background-color: <?php echo $theme_color; ?>;
        overflow: visible;
    }

    .au-progress__title {
        font-size: 14px;
        color: #808080;
        display: inline-block;
        margin-bottom: 9px;
    }

    .au-progress__value {
        font-size: 14px;
        color: #808080;
        position: absolute;
        top: -28px;
        right: -15px;
    }

    /* ----- Alert ----- */
    .au-alert {
        border: 1px solid #fff;
        background: #fff;
        border-left: 3px solid #fff;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
        margin: 0;
        -webkit-border-top-right-radius: 3px;
        -moz-border-radius-topright: 3px;
        border-top-right-radius: 3px;
        -webkit-border-bottom-right-radius: 3px;
        -moz-border-radius-bottomright: 3px;
        border-bottom-right-radius: 3px;
        padding: 0;
        padding: 15px 30px;
    }

    .au-alert.alert-dismissible .close {
        font-size: 16px;
        color: black;
        opacity: 0.2;
        padding: 0 23px;
        top: 0;
        bottom: 0;
    }

    .au-alert>i {
        font-size: 30px;
        color: #00ad5f;
        vertical-align: middle;
        margin-right: 10px;
    }

    .au-alert .content {
        font-size: 16px;
        color: #808080;
    }

    .au-alert-success {
        background: #e5f6eb;
        border-color: #d9f1e3;
        border-left-color: #00ad5f;
    }

    .au-alert--70per {
        width: 70.5%;
        margin: 0 auto;
    }

    @media (max-width: 991px) {
        .au-alert--70per {
            width: 95%;
        }
    }

    /* Switch */
    .switch.switch-default {
        position: relative;
        display: inline-block;
        vertical-align: top;
        width: 40px;
        height: 24px;
        background-color: transparent;
        cursor: pointer;
    }

    .switch.switch-default .switch-input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .switch.switch-default .switch-label {
        position: relative;
        display: block;
        height: inherit;
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
        background-color: #fff;
        border: 1px solid #f2f2f2;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        -webkit-transition: opacity background .15s ease-out;
        -o-transition: opacity background .15s ease-out;
        -moz-transition: opacity background .15s ease-out;
        transition: opacity background .15s ease-out;
    }

    .switch.switch-default .switch-input:checked~.switch-label::before {
        opacity: 0;
    }

    .switch.switch-default .switch-input:checked~.switch-label::after {
        opacity: 1;
    }

    .switch.switch-default .switch-handle {
        position: absolute;
        top: 2px;
        left: 2px;
        width: 20px;
        height: 20px;
        background: #fff;
        border: 1px solid #f2f2f2;
        -webkit-border-radius: 1px;
        -moz-border-radius: 1px;
        border-radius: 1px;
        -webkit-transition: left .15s ease-out;
        -o-transition: left .15s ease-out;
        -moz-transition: left .15s ease-out;
        transition: left .15s ease-out;
    }

    .switch.switch-default .switch-input:checked~.switch-handle {
        left: 18px;
    }

    .switch.switch-default.switch-lg {
        width: 48px;
        height: 28px;
    }

    .switch.switch-default.switch-lg .switch-label {
        font-size: 12px;
    }

    .switch.switch-default.switch-lg .switch-handle {
        width: 24px;
        height: 24px;
    }

    .switch.switch-default.switch-lg .switch-input:checked~.switch-handle {
        left: 22px;
    }

    .switch.switch-default.switch-sm {
        width: 32px;
        height: 20px;
    }

    .switch.switch-default.switch-sm .switch-label {
        font-size: 8px;
    }

    .switch.switch-default.switch-sm .switch-handle {
        width: 16px;
        height: 16px;
    }

    .switch.switch-default.switch-sm .switch-input:checked~.switch-handle {
        left: 14px;
    }

    .switch.switch-default.switch-xs {
        width: 24px;
        height: 16px;
    }

    .switch.switch-default.switch-xs .switch-label {
        font-size: 7px;
    }

    .switch.switch-default.switch-xs .switch-handle {
        width: 12px;
        height: 12px;
    }

    .switch.switch-default.switch-xs .switch-input:checked~.switch-handle {
        left: 10px;
    }

    .switch.switch-text {
        position: relative;
        display: inline-block;
        vertical-align: top;
        width: 48px;
        height: 24px;
        background-color: transparent;
        cursor: pointer;
    }

    .switch.switch-text .switch-input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .switch.switch-text .switch-label {
        position: relative;
        display: block;
        height: inherit;
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
        background-color: #fff;
        border: 1px solid #f2f2f2;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        -webkit-transition: opacity background .15s ease-out;
        -o-transition: opacity background .15s ease-out;
        -moz-transition: opacity background .15s ease-out;
        transition: opacity background .15s ease-out;
    }

    .switch.switch-text .switch-label::before,
    .switch.switch-text .switch-label::after {
        position: absolute;
        top: 50%;
        width: 50%;
        margin-top: -.5em;
        line-height: 1;
        text-align: center;
        -webkit-transition: inherit;
        -o-transition: inherit;
        -moz-transition: inherit;
        transition: inherit;
    }

    .switch.switch-text .switch-label::before {
        right: 1px;
        color: #e9ecef;
        content: attr(data-off);
    }

    .switch.switch-text .switch-label::after {
        left: 1px;
        color: #fff;
        content: attr(data-on);
        opacity: 0;
    }

    .switch.switch-text .switch-input:checked~.switch-label::before {
        opacity: 0;
    }

    .switch.switch-text .switch-input:checked~.switch-label::after {
        opacity: 1;
    }

    .switch.switch-text .switch-handle {
        position: absolute;
        top: 2px;
        left: 2px;
        width: 20px;
        height: 20px;
        background: #fff;
        border: 1px solid #f2f2f2;
        -webkit-border-radius: 1px;
        -moz-border-radius: 1px;
        border-radius: 1px;
        -webkit-transition: left .15s ease-out;
        -o-transition: left .15s ease-out;
        -moz-transition: left .15s ease-out;
        transition: left .15s ease-out;
    }

    .switch.switch-text .switch-input:checked~.switch-handle {
        left: 26px;
    }

    .switch.switch-text.switch-lg {
        width: 56px;
        height: 28px;
    }

    .switch.switch-text.switch-lg .switch-label {
        font-size: 12px;
    }

    .switch.switch-text.switch-lg .switch-handle {
        width: 24px;
        height: 24px;
    }

    .switch.switch-text.switch-lg .switch-input:checked~.switch-handle {
        left: 30px;
    }

    .switch.switch-text.switch-sm {
        width: 40px;
        height: 20px;
    }

    .switch.switch-text.switch-sm .switch-label {
        font-size: 8px;
    }

    .switch.switch-text.switch-sm .switch-handle {
        width: 16px;
        height: 16px;
    }

    .switch.switch-text.switch-sm .switch-input:checked~.switch-handle {
        left: 22px;
    }

    .switch.switch-text.switch-xs {
        width: 32px;
        height: 16px;
    }

    .switch.switch-text.switch-xs .switch-label {
        font-size: 7px;
    }

    .switch.switch-text.switch-xs .switch-handle {
        width: 12px;
        height: 12px;
    }

    .switch.switch-text.switch-xs .switch-input:checked~.switch-handle {
        left: 18px;
    }

    .switch.switch-icon {
        position: relative;
        display: inline-block;
        vertical-align: top;
        width: 48px;
        height: 24px;
        background-color: transparent;
        cursor: pointer;
    }

    .switch.switch-icon .switch-input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .switch.switch-icon .switch-label {
        position: relative;
        display: block;
        height: inherit;
        font-family: FontAwesome;
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
        background-color: #fff;
        border: 1px solid #f2f2f2;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        -webkit-transition: opacity background .15s ease-out;
        -o-transition: opacity background .15s ease-out;
        -moz-transition: opacity background .15s ease-out;
        transition: opacity background .15s ease-out;
    }

    .switch.switch-icon .switch-label::before,
    .switch.switch-icon .switch-label::after {
        position: absolute;
        top: 50%;
        width: 50%;
        margin-top: -.5em;
        line-height: 1;
        text-align: center;
        -webkit-transition: inherit;
        -o-transition: inherit;
        -moz-transition: inherit;
        transition: inherit;
    }

    .switch.switch-icon .switch-label::before {
        right: 1px;
        color: #e9ecef;
        content: attr(data-off);
    }

    .switch.switch-icon .switch-label::after {
        left: 1px;
        color: #fff;
        content: attr(data-on);
        opacity: 0;
    }

    .switch.switch-icon .switch-input:checked~.switch-label::before {
        opacity: 0;
    }

    .switch.switch-icon .switch-input:checked~.switch-label::after {
        opacity: 1;
    }

    .switch.switch-icon .switch-handle {
        position: absolute;
        top: 2px;
        left: 2px;
        width: 20px;
        height: 20px;
        background: #fff;
        border: 1px solid #f2f2f2;
        -webkit-border-radius: 1px;
        -moz-border-radius: 1px;
        border-radius: 1px;
        -webkit-transition: left .15s ease-out;
        -o-transition: left .15s ease-out;
        -moz-transition: left .15s ease-out;
        transition: left .15s ease-out;
    }

    .switch.switch-icon .switch-input:checked~.switch-handle {
        left: 26px;
    }

    .switch.switch-icon.switch-lg {
        width: 56px;
        height: 28px;
    }

    .switch.switch-icon.switch-lg .switch-label {
        font-size: 12px;
    }

    .switch.switch-icon.switch-lg .switch-handle {
        width: 24px;
        height: 24px;
    }

    .switch.switch-icon.switch-lg .switch-input:checked~.switch-handle {
        left: 30px;
    }

    .switch.switch-icon.switch-sm {
        width: 40px;
        height: 20px;
    }

    .switch.switch-icon.switch-sm .switch-label {
        font-size: 8px;
    }

    .switch.switch-icon.switch-sm .switch-handle {
        width: 16px;
        height: 16px;
    }

    .switch.switch-icon.switch-sm .switch-input:checked~.switch-handle {
        left: 22px;
    }

    .switch.switch-icon.switch-xs {
        width: 32px;
        height: 16px;
    }

    .switch.switch-icon.switch-xs .switch-label {
        font-size: 7px;
    }

    .switch.switch-icon.switch-xs .switch-handle {
        width: 12px;
        height: 12px;
    }

    .switch.switch-icon.switch-xs .switch-input:checked~.switch-handle {
        left: 18px;
    }

    .switch.switch-3d {
        position: relative;
        display: inline-block;
        vertical-align: top;
        width: 40px;
        height: 24px;
        background-color: transparent;
        cursor: pointer;
    }

    .switch.switch-3d .switch-input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .switch.switch-3d .switch-label {
        position: relative;
        display: block;
        height: inherit;
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
        background-color: #f8f9fa;
        border: 1px solid #f2f2f2;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        -webkit-transition: opacity background .15s ease-out;
        -o-transition: opacity background .15s ease-out;
        -moz-transition: opacity background .15s ease-out;
        transition: opacity background .15s ease-out;
    }

    .switch.switch-3d .switch-input:checked~.switch-label::before {
        opacity: 0;
    }

    .switch.switch-3d .switch-input:checked~.switch-label::after {
        opacity: 1;
    }

    .switch.switch-3d .switch-handle {
        position: absolute;
        top: 0;
        left: 0;
        width: 24px;
        height: 24px;
        background: #fff;
        border: 1px solid #f2f2f2;
        -webkit-border-radius: 1px;
        -moz-border-radius: 1px;
        border-radius: 1px;
        -webkit-transition: left .15s ease-out;
        -o-transition: left .15s ease-out;
        -moz-transition: left .15s ease-out;
        transition: left .15s ease-out;
        border: 0;
        -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .switch.switch-3d .switch-input:checked~.switch-handle {
        left: 16px;
    }

    .switch.switch-3d.switch-lg {
        width: 48px;
        height: 28px;
    }

    .switch.switch-3d.switch-lg .switch-label {
        font-size: 12px;
    }

    .switch.switch-3d.switch-lg .switch-handle {
        width: 28px;
        height: 28px;
    }

    .switch.switch-3d.switch-lg .switch-input:checked~.switch-handle {
        left: 20px;
    }

    .switch.switch-3d.switch-sm {
        width: 32px;
        height: 20px;
    }

    .switch.switch-3d.switch-sm .switch-label {
        font-size: 8px;
    }

    .switch.switch-3d.switch-sm .switch-handle {
        width: 20px;
        height: 20px;
    }

    .switch.switch-3d.switch-sm .switch-input:checked~.switch-handle {
        left: 12px;
    }

    .switch.switch-3d.switch-xs {
        width: 24px;
        height: 16px;
    }

    .switch.switch-3d.switch-xs .switch-label {
        font-size: 7px;
    }

    .switch.switch-3d.switch-xs .switch-handle {
        width: 16px;
        height: 16px;
    }

    .switch.switch-3d.switch-xs .switch-input:checked~.switch-handle {
        left: 8px;
    }

    .switch-pill .switch-label,
    .switch.switch-3d .switch-label,
    .switch-pill .switch-handle,
    .switch.switch-3d .switch-handle {
        -webkit-border-radius: 50em !important;
        -moz-border-radius: 50em !important;
        border-radius: 50em !important;
    }

    .switch-pill .switch-label::before,
    .switch.switch-3d .switch-label::before {
        right: 2px !important;
    }

    .switch-pill .switch-label::after,
    .switch.switch-3d .switch-label::after {
        left: 2px !important;
    }

    .switch-primary>.switch-input:checked~.switch-label {
        background: <?php echo $theme_color; ?> !important;
        border-color: #2858be;
    }

    .switch-primary>.switch-input:checked~.switch-handle {
        border-color: #2858be;
    }

    .switch-primary-outline>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: <?php echo $theme_color; ?>;
    }

    .switch-primary-outline>.switch-input:checked~.switch-label::after {
        color: <?php echo $theme_color; ?>;
    }

    .switch-primary-outline>.switch-input:checked~.switch-handle {
        border-color: <?php echo $theme_color; ?>;
    }

    .switch-primary-outline-alt>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: <?php echo $theme_color; ?>;
    }

    .switch-primary-outline-alt>.switch-input:checked~.switch-label::after {
        color: <?php echo $theme_color; ?>;
    }

    .switch-primary-outline-alt>.switch-input:checked~.switch-handle {
        background: <?php echo $theme_color; ?> !important;
        border-color: <?php echo $theme_color; ?>;
    }

    .switch-secondary>.switch-input:checked~.switch-label {
        background: #868e96 !important;
        border-color: #6c757d;
    }

    .switch-secondary>.switch-input:checked~.switch-handle {
        border-color: #6c757d;
    }

    .switch-secondary-outline>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: #868e96;
    }

    .switch-secondary-outline>.switch-input:checked~.switch-label::after {
        color: #868e96;
    }

    .switch-secondary-outline>.switch-input:checked~.switch-handle {
        border-color: #868e96;
    }

    .switch-secondary-outline-alt>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: #868e96;
    }

    .switch-secondary-outline-alt>.switch-input:checked~.switch-label::after {
        color: #868e96;
    }

    .switch-secondary-outline-alt>.switch-input:checked~.switch-handle {
        background: #868e96 !important;
        border-color: #868e96;
    }

    .switch-success>.switch-input:checked~.switch-label {
        background: #28a745 !important;
        border-color: #1e7e34;
    }

    .switch-success>.switch-input:checked~.switch-handle {
        border-color: #1e7e34;
    }

    .switch-success-outline>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: #28a745;
    }

    .switch-success-outline>.switch-input:checked~.switch-label::after {
        color: #28a745;
    }

    .switch-success-outline>.switch-input:checked~.switch-handle {
        border-color: #28a745;
    }

    .switch-success-outline-alt>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: #28a745;
    }

    .switch-success-outline-alt>.switch-input:checked~.switch-label::after {
        color: #28a745;
    }

    .switch-success-outline-alt>.switch-input:checked~.switch-handle {
        background: #28a745 !important;
        border-color: #28a745;
    }

    .switch-info>.switch-input:checked~.switch-label {
        background: #17a2b8 !important;
        border-color: #117a8b;
    }

    .switch-info>.switch-input:checked~.switch-handle {
        border-color: #117a8b;
    }

    .switch-info-outline>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: #17a2b8;
    }

    .switch-info-outline>.switch-input:checked~.switch-label::after {
        color: #17a2b8;
    }

    .switch-info-outline>.switch-input:checked~.switch-handle {
        border-color: #17a2b8;
    }

    .switch-info-outline-alt>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: #17a2b8;
    }

    .switch-info-outline-alt>.switch-input:checked~.switch-label::after {
        color: #17a2b8;
    }

    .switch-info-outline-alt>.switch-input:checked~.switch-handle {
        background: #17a2b8 !important;
        border-color: #17a2b8;
    }

    .switch-warning>.switch-input:checked~.switch-label {
        background: #ffc107 !important;
        border-color: #d39e00;
    }

    .switch-warning>.switch-input:checked~.switch-handle {
        border-color: #d39e00;
    }

    .switch-warning-outline>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: #ffc107;
    }

    .switch-warning-outline>.switch-input:checked~.switch-label::after {
        color: #ffc107;
    }

    .switch-warning-outline>.switch-input:checked~.switch-handle {
        border-color: #ffc107;
    }

    .switch-warning-outline-alt>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: #ffc107;
    }

    .switch-warning-outline-alt>.switch-input:checked~.switch-label::after {
        color: #ffc107;
    }

    .switch-warning-outline-alt>.switch-input:checked~.switch-handle {
        background: #ffc107 !important;
        border-color: #ffc107;
    }

    .switch-danger>.switch-input:checked~.switch-label {
        background: #ff4b5a !important;
        border-color: #ff182b;
    }

    .switch-danger>.switch-input:checked~.switch-handle {
        border-color: #ff182b;
    }

    .switch-danger-outline>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: #ff4b5a;
    }

    .switch-danger-outline>.switch-input:checked~.switch-label::after {
        color: #ff4b5a;
    }

    .switch-danger-outline>.switch-input:checked~.switch-handle {
        border-color: #ff4b5a;
    }

    .switch-danger-outline-alt>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: #ff4b5a;
    }

    .switch-danger-outline-alt>.switch-input:checked~.switch-label::after {
        color: #ff4b5a;
    }

    .switch-danger-outline-alt>.switch-input:checked~.switch-handle {
        background: #ff4b5a !important;
        border-color: #ff4b5a;
    }

    .switch-light>.switch-input:checked~.switch-label {
        background: #f8f9fa !important;
        border-color: #dae0e5;
    }

    .switch-light>.switch-input:checked~.switch-handle {
        border-color: #dae0e5;
    }

    .switch-light-outline>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: #f8f9fa;
    }

    .switch-light-outline>.switch-input:checked~.switch-label::after {
        color: #f8f9fa;
    }

    .switch-light-outline>.switch-input:checked~.switch-handle {
        border-color: #f8f9fa;
    }

    .switch-light-outline-alt>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: #f8f9fa;
    }

    .switch-light-outline-alt>.switch-input:checked~.switch-label::after {
        color: #f8f9fa;
    }

    .switch-light-outline-alt>.switch-input:checked~.switch-handle {
        background: #f8f9fa !important;
        border-color: #f8f9fa;
    }

    .switch-dark>.switch-input:checked~.switch-label {
        background: #343a40 !important;
        border-color: #1d2124;
    }

    .switch-dark>.switch-input:checked~.switch-handle {
        border-color: #1d2124;
    }

    .switch-dark-outline>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: #343a40;
    }

    .switch-dark-outline>.switch-input:checked~.switch-label::after {
        color: #343a40;
    }

    .switch-dark-outline>.switch-input:checked~.switch-handle {
        border-color: #343a40;
    }

    .switch-dark-outline-alt>.switch-input:checked~.switch-label {
        background: #fff !important;
        border-color: #343a40;
    }

    .switch-dark-outline-alt>.switch-input:checked~.switch-label::after {
        color: #343a40;
    }

    .switch-dark-outline-alt>.switch-input:checked~.switch-handle {
        background: #343a40 !important;
        border-color: #343a40;
    }

    /*-----------------------------------------------------*/
    /*                   TRUMPS                            */
    /*-----------------------------------------------------*/
    /*Padding, margin*/
    .p-b-0 {
        padding-bottom: 0px;
    }

    .p-t-0 {
        padding-top: 0px;
    }

    .p-r-0 {
        padding-right: 0px;
    }

    .p-l-0 {
        padding-left: 0px;
    }

    .m-b-0 {
        margin-bottom: 0px;
    }

    .m-t-0 {
        margin-top: 0px;
    }

    .m-r-0 {
        margin-right: 0px;
    }

    .m-l-0 {
        margin-left: 0px;
    }

    .p-b-5 {
        padding-bottom: 5px;
    }

    .p-t-5 {
        padding-top: 5px;
    }

    .p-r-5 {
        padding-right: 5px;
    }

    .p-l-5 {
        padding-left: 5px;
    }

    .m-b-5 {
        margin-bottom: 5px;
    }

    .m-t-5 {
        margin-top: 5px;
    }

    .m-r-5 {
        margin-right: 5px;
    }

    .m-l-5 {
        margin-left: 5px;
    }

    .p-b-10 {
        padding-bottom: 10px;
    }

    .p-t-10 {
        padding-top: 10px;
    }

    .p-r-10 {
        padding-right: 10px;
    }

    .p-l-10 {
        padding-left: 10px;
    }

    .m-b-10 {
        margin-bottom: 10px;
    }

    .m-t-10 {
        margin-top: 10px;
    }

    .m-r-10 {
        margin-right: 10px;
    }

    .m-l-10 {
        margin-left: 10px;
    }

    .p-b-15 {
        padding-bottom: 15px;
    }

    .p-t-15 {
        padding-top: 15px;
    }

    .p-r-15 {
        padding-right: 15px;
    }

    .p-l-15 {
        padding-left: 15px;
    }

    .m-b-15 {
        margin-bottom: 15px;
    }

    .m-t-15 {
        margin-top: 15px;
    }

    .m-r-15 {
        margin-right: 15px;
    }

    .m-l-15 {
        margin-left: 15px;
    }

    .p-b-20 {
        padding-bottom: 20px;
    }

    .p-t-20 {
        padding-top: 20px;
    }

    .p-r-20 {
        padding-right: 20px;
    }

    .p-l-20 {
        padding-left: 20px;
    }

    .m-b-20 {
        margin-bottom: 20px;
    }

    .m-t-20 {
        margin-top: 20px;
    }

    .m-r-20 {
        margin-right: 20px;
    }

    .m-l-20 {
        margin-left: 20px;
    }

    .p-b-25 {
        padding-bottom: 25px;
    }

    .p-t-25 {
        padding-top: 25px;
    }

    .p-r-25 {
        padding-right: 25px;
    }

    .p-l-25 {
        padding-left: 25px;
    }

    .m-b-25 {
        margin-bottom: 25px;
    }

    .m-t-25 {
        margin-top: 25px;
    }

    .m-r-25 {
        margin-right: 25px;
    }

    .m-l-25 {
        margin-left: 25px;
    }

    .p-b-30 {
        padding-bottom: 30px;
    }

    .p-t-30 {
        padding-top: 30px;
    }

    .p-r-30 {
        padding-right: 30px;
    }

    .p-l-30 {
        padding-left: 30px;
    }

    .m-b-30 {
        margin-bottom: 30px;
    }

    .m-t-30 {
        margin-top: 30px;
    }

    .m-r-30 {
        margin-right: 30px;
    }

    .m-l-30 {
        margin-left: 30px;
    }

    .p-b-35 {
        padding-bottom: 35px;
    }

    .p-t-35 {
        padding-top: 35px;
    }

    .p-r-35 {
        padding-right: 35px;
    }

    .p-l-35 {
        padding-left: 35px;
    }

    .m-b-35 {
        margin-bottom: 35px;
    }

    .m-t-35 {
        margin-top: 35px;
    }

    .m-r-35 {
        margin-right: 35px;
    }

    .m-l-35 {
        margin-left: 35px;
    }

    .p-b-40 {
        padding-bottom: 40px;
    }

    .p-t-40 {
        padding-top: 40px;
    }

    .p-r-40 {
        padding-right: 40px;
    }

    .p-l-40 {
        padding-left: 40px;
    }

    .m-b-40 {
        margin-bottom: 40px;
    }

    .m-t-40 {
        margin-top: 40px;
    }

    .m-r-40 {
        margin-right: 40px;
    }

    .m-l-40 {
        margin-left: 40px;
    }

    .p-b-45 {
        padding-bottom: 45px;
    }

    .p-t-45 {
        padding-top: 45px;
    }

    .p-r-45 {
        padding-right: 45px;
    }

    .p-l-45 {
        padding-left: 45px;
    }

    .m-b-45 {
        margin-bottom: 45px;
    }

    .m-t-45 {
        margin-top: 45px;
    }

    .m-r-45 {
        margin-right: 45px;
    }

    .m-l-45 {
        margin-left: 45px;
    }

    .p-b-50 {
        padding-bottom: 50px;
    }

    .p-t-50 {
        padding-top: 50px;
    }

    .p-r-50 {
        padding-right: 50px;
    }

    .p-l-50 {
        padding-left: 50px;
    }

    .m-b-50 {
        margin-bottom: 50px;
    }

    .m-t-50 {
        margin-top: 50px;
    }

    .m-r-50 {
        margin-right: 50px;
    }

    .m-l-50 {
        margin-left: 50px;
    }

    .p-b-55 {
        padding-bottom: 55px;
    }

    .p-t-55 {
        padding-top: 55px;
    }

    .p-r-55 {
        padding-right: 55px;
    }

    .p-l-55 {
        padding-left: 55px;
    }

    .m-b-55 {
        margin-bottom: 55px;
    }

    .m-t-55 {
        margin-top: 55px;
    }

    .m-r-55 {
        margin-right: 55px;
    }

    .m-l-55 {
        margin-left: 55px;
    }

    .p-b-60 {
        padding-bottom: 60px;
    }

    .p-t-60 {
        padding-top: 60px;
    }

    .p-r-60 {
        padding-right: 60px;
    }

    .p-l-60 {
        padding-left: 60px;
    }

    .m-b-60 {
        margin-bottom: 60px;
    }

    .m-t-60 {
        margin-top: 60px;
    }

    .m-r-60 {
        margin-right: 60px;
    }

    .m-l-60 {
        margin-left: 60px;
    }

    .p-b-65 {
        padding-bottom: 65px;
    }

    .p-t-65 {
        padding-top: 65px;
    }

    .p-r-65 {
        padding-right: 65px;
    }

    .p-l-65 {
        padding-left: 65px;
    }

    .m-b-65 {
        margin-bottom: 65px;
    }

    .m-t-65 {
        margin-top: 65px;
    }

    .m-r-65 {
        margin-right: 65px;
    }

    .m-l-65 {
        margin-left: 65px;
    }

    .p-b-70 {
        padding-bottom: 70px;
    }

    .p-t-70 {
        padding-top: 70px;
    }

    .p-r-70 {
        padding-right: 70px;
    }

    .p-l-70 {
        padding-left: 70px;
    }

    .m-b-70 {
        margin-bottom: 70px;
    }

    .m-t-70 {
        margin-top: 70px;
    }

    .m-r-70 {
        margin-right: 70px;
    }

    .m-l-70 {
        margin-left: 70px;
    }

    .p-b-75 {
        padding-bottom: 75px;
    }

    .p-t-75 {
        padding-top: 75px;
    }

    .p-r-75 {
        padding-right: 75px;
    }

    .p-l-75 {
        padding-left: 75px;
    }

    .m-b-75 {
        margin-bottom: 75px;
    }

    .m-t-75 {
        margin-top: 75px;
    }

    .m-r-75 {
        margin-right: 75px;
    }

    .m-l-75 {
        margin-left: 75px;
    }

    .p-b-80 {
        padding-bottom: 80px;
    }

    .p-t-80 {
        padding-top: 80px;
    }

    .p-r-80 {
        padding-right: 80px;
    }

    .p-l-80 {
        padding-left: 80px;
    }

    .m-b-80 {
        margin-bottom: 80px;
    }

    .m-t-80 {
        margin-top: 80px;
    }

    .m-r-80 {
        margin-right: 80px;
    }

    .m-l-80 {
        margin-left: 80px;
    }

    .p-b-85 {
        padding-bottom: 85px;
    }

    .p-t-85 {
        padding-top: 85px;
    }

    .p-r-85 {
        padding-right: 85px;
    }

    .p-l-85 {
        padding-left: 85px;
    }

    .m-b-85 {
        margin-bottom: 85px;
    }

    .m-t-85 {
        margin-top: 85px;
    }

    .m-r-85 {
        margin-right: 85px;
    }

    .m-l-85 {
        margin-left: 85px;
    }

    .p-b-90 {
        padding-bottom: 90px;
    }

    .p-t-90 {
        padding-top: 90px;
    }

    .p-r-90 {
        padding-right: 90px;
    }

    .p-l-90 {
        padding-left: 90px;
    }

    .m-b-90 {
        margin-bottom: 90px;
    }

    .m-t-90 {
        margin-top: 90px;
    }

    .m-r-90 {
        margin-right: 90px;
    }

    .m-l-90 {
        margin-left: 90px;
    }

    .p-b-95 {
        padding-bottom: 95px;
    }

    .p-t-95 {
        padding-top: 95px;
    }

    .p-r-95 {
        padding-right: 95px;
    }

    .p-l-95 {
        padding-left: 95px;
    }

    .m-b-95 {
        margin-bottom: 95px;
    }

    .m-t-95 {
        margin-top: 95px;
    }

    .m-r-95 {
        margin-right: 95px;
    }

    .m-l-95 {
        margin-left: 95px;
    }

    .p-b-100 {
        padding-bottom: 100px;
    }

    .p-t-100 {
        padding-top: 100px;
    }

    .p-r-100 {
        padding-right: 100px;
    }

    .p-l-100 {
        padding-left: 100px;
    }

    .m-b-100 {
        margin-bottom: 100px;
    }

    .m-t-100 {
        margin-top: 100px;
    }

    .m-r-100 {
        margin-right: 100px;
    }

    .m-l-100 {
        margin-left: 100px;
    }

    .p-b-105 {
        padding-bottom: 105px;
    }

    .p-t-105 {
        padding-top: 105px;
    }

    .p-r-105 {
        padding-right: 105px;
    }

    .p-l-105 {
        padding-left: 105px;
    }

    .m-b-105 {
        margin-bottom: 105px;
    }

    .m-t-105 {
        margin-top: 105px;
    }

    .m-r-105 {
        margin-right: 105px;
    }

    .m-l-105 {
        margin-left: 105px;
    }

    .p-b-110 {
        padding-bottom: 110px;
    }

    .p-t-110 {
        padding-top: 110px;
    }

    .p-r-110 {
        padding-right: 110px;
    }

    .p-l-110 {
        padding-left: 110px;
    }

    .m-b-110 {
        margin-bottom: 110px;
    }

    .m-t-110 {
        margin-top: 110px;
    }

    .m-r-110 {
        margin-right: 110px;
    }

    .m-l-110 {
        margin-left: 110px;
    }

    .p-b-115 {
        padding-bottom: 115px;
    }

    .p-t-115 {
        padding-top: 115px;
    }

    .p-r-115 {
        padding-right: 115px;
    }

    .p-l-115 {
        padding-left: 115px;
    }

    .m-b-115 {
        margin-bottom: 115px;
    }

    .m-t-115 {
        margin-top: 115px;
    }

    .m-r-115 {
        margin-right: 115px;
    }

    .m-l-115 {
        margin-left: 115px;
    }

    .p-b-120 {
        padding-bottom: 120px;
    }

    .p-t-120 {
        padding-top: 120px;
    }

    .p-r-120 {
        padding-right: 120px;
    }

    .p-l-120 {
        padding-left: 120px;
    }

    .m-b-120 {
        margin-bottom: 120px;
    }

    .m-t-120 {
        margin-top: 120px;
    }

    .m-r-120 {
        margin-right: 120px;
    }

    .m-l-120 {
        margin-left: 120px;
    }

    .p-b-125 {
        padding-bottom: 125px;
    }

    .p-t-125 {
        padding-top: 125px;
    }

    .p-r-125 {
        padding-right: 125px;
    }

    .p-l-125 {
        padding-left: 125px;
    }

    .m-b-125 {
        margin-bottom: 125px;
    }

    .m-t-125 {
        margin-top: 125px;
    }

    .m-r-125 {
        margin-right: 125px;
    }

    .m-l-125 {
        margin-left: 125px;
    }

    .p-b-130 {
        padding-bottom: 130px;
    }

    .p-t-130 {
        padding-top: 130px;
    }

    .p-r-130 {
        padding-right: 130px;
    }

    .p-l-130 {
        padding-left: 130px;
    }

    .m-b-130 {
        margin-bottom: 130px;
    }

    .m-t-130 {
        margin-top: 130px;
    }

    .m-r-130 {
        margin-right: 130px;
    }

    .m-l-130 {
        margin-left: 130px;
    }

    .p-b-135 {
        padding-bottom: 135px;
    }

    .p-t-135 {
        padding-top: 135px;
    }

    .p-r-135 {
        padding-right: 135px;
    }

    .p-l-135 {
        padding-left: 135px;
    }

    .m-b-135 {
        margin-bottom: 135px;
    }

    .m-t-135 {
        margin-top: 135px;
    }

    .m-r-135 {
        margin-right: 135px;
    }

    .m-l-135 {
        margin-left: 135px;
    }

    .p-b-140 {
        padding-bottom: 140px;
    }

    .p-t-140 {
        padding-top: 140px;
    }

    .p-r-140 {
        padding-right: 140px;
    }

    .p-l-140 {
        padding-left: 140px;
    }

    .m-b-140 {
        margin-bottom: 140px;
    }

    .m-t-140 {
        margin-top: 140px;
    }

    .m-r-140 {
        margin-right: 140px;
    }

    .m-l-140 {
        margin-left: 140px;
    }

    .p-b-145 {
        padding-bottom: 145px;
    }

    .p-t-145 {
        padding-top: 145px;
    }

    .p-r-145 {
        padding-right: 145px;
    }

    .p-l-145 {
        padding-left: 145px;
    }

    .m-b-145 {
        margin-bottom: 145px;
    }

    .m-t-145 {
        margin-top: 145px;
    }

    .m-r-145 {
        margin-right: 145px;
    }

    .m-l-145 {
        margin-left: 145px;
    }

    .p-b-150 {
        padding-bottom: 150px;
    }

    .p-t-150 {
        padding-top: 150px;
    }

    .p-r-150 {
        padding-right: 150px;
    }

    .p-l-150 {
        padding-left: 150px;
    }

    .m-b-150 {
        margin-bottom: 150px;
    }

    .m-t-150 {
        margin-top: 150px;
    }

    .m-r-150 {
        margin-right: 150px;
    }

    .m-l-150 {
        margin-left: 150px;
    }

    .p-b-155 {
        padding-bottom: 155px;
    }

    .p-t-155 {
        padding-top: 155px;
    }

    .p-r-155 {
        padding-right: 155px;
    }

    .p-l-155 {
        padding-left: 155px;
    }

    .m-b-155 {
        margin-bottom: 155px;
    }

    .m-t-155 {
        margin-top: 155px;
    }

    .m-r-155 {
        margin-right: 155px;
    }

    .m-l-155 {
        margin-left: 155px;
    }

    .p-b-160 {
        padding-bottom: 160px;
    }

    .p-t-160 {
        padding-top: 160px;
    }

    .p-r-160 {
        padding-right: 160px;
    }

    .p-l-160 {
        padding-left: 160px;
    }

    .m-b-160 {
        margin-bottom: 160px;
    }

    .m-t-160 {
        margin-top: 160px;
    }

    .m-r-160 {
        margin-right: 160px;
    }

    .m-l-160 {
        margin-left: 160px;
    }

    .p-b-165 {
        padding-bottom: 165px;
    }

    .p-t-165 {
        padding-top: 165px;
    }

    .p-r-165 {
        padding-right: 165px;
    }

    .p-l-165 {
        padding-left: 165px;
    }

    .m-b-165 {
        margin-bottom: 165px;
    }

    .m-t-165 {
        margin-top: 165px;
    }

    .m-r-165 {
        margin-right: 165px;
    }

    .m-l-165 {
        margin-left: 165px;
    }

    .p-b-170 {
        padding-bottom: 170px;
    }

    .p-t-170 {
        padding-top: 170px;
    }

    .p-r-170 {
        padding-right: 170px;
    }

    .p-l-170 {
        padding-left: 170px;
    }

    .m-b-170 {
        margin-bottom: 170px;
    }

    .m-t-170 {
        margin-top: 170px;
    }

    .m-r-170 {
        margin-right: 170px;
    }

    .m-l-170 {
        margin-left: 170px;
    }

    .p-b-175 {
        padding-bottom: 175px;
    }

    .p-t-175 {
        padding-top: 175px;
    }

    .p-r-175 {
        padding-right: 175px;
    }

    .p-l-175 {
        padding-left: 175px;
    }

    .m-b-175 {
        margin-bottom: 175px;
    }

    .m-t-175 {
        margin-top: 175px;
    }

    .m-r-175 {
        margin-right: 175px;
    }

    .m-l-175 {
        margin-left: 175px;
    }

    .p-b-180 {
        padding-bottom: 180px;
    }

    .p-t-180 {
        padding-top: 180px;
    }

    .p-r-180 {
        padding-right: 180px;
    }

    .p-l-180 {
        padding-left: 180px;
    }

    .m-b-180 {
        margin-bottom: 180px;
    }

    .m-t-180 {
        margin-top: 180px;
    }

    .m-r-180 {
        margin-right: 180px;
    }

    .m-l-180 {
        margin-left: 180px;
    }

    .p-b-185 {
        padding-bottom: 185px;
    }

    .p-t-185 {
        padding-top: 185px;
    }

    .p-r-185 {
        padding-right: 185px;
    }

    .p-l-185 {
        padding-left: 185px;
    }

    .m-b-185 {
        margin-bottom: 185px;
    }

    .m-t-185 {
        margin-top: 185px;
    }

    .m-r-185 {
        margin-right: 185px;
    }

    .m-l-185 {
        margin-left: 185px;
    }

    .p-b-190 {
        padding-bottom: 190px;
    }

    .p-t-190 {
        padding-top: 190px;
    }

    .p-r-190 {
        padding-right: 190px;
    }

    .p-l-190 {
        padding-left: 190px;
    }

    .m-b-190 {
        margin-bottom: 190px;
    }

    .m-t-190 {
        margin-top: 190px;
    }

    .m-r-190 {
        margin-right: 190px;
    }

    .m-l-190 {
        margin-left: 190px;
    }

    .p-b-195 {
        padding-bottom: 195px;
    }

    .p-t-195 {
        padding-top: 195px;
    }

    .p-r-195 {
        padding-right: 195px;
    }

    .p-l-195 {
        padding-left: 195px;
    }

    .m-b-195 {
        margin-bottom: 195px;
    }

    .m-t-195 {
        margin-top: 195px;
    }

    .m-r-195 {
        margin-right: 195px;
    }

    .m-l-195 {
        margin-left: 195px;
    }

    .p-b-200 {
        padding-bottom: 200px;
    }

    .p-t-200 {
        padding-top: 200px;
    }

    .p-r-200 {
        padding-right: 200px;
    }

    .p-l-200 {
        padding-left: 200px;
    }

    .m-b-200 {
        margin-bottom: 200px;
    }

    .m-t-200 {
        margin-top: 200px;
    }

    .m-r-200 {
        margin-right: 200px;
    }

    .m-l-200 {
        margin-left: 200px;
    }

    .p-b-205 {
        padding-bottom: 205px;
    }

    .p-t-205 {
        padding-top: 205px;
    }

    .p-r-205 {
        padding-right: 205px;
    }

    .p-l-205 {
        padding-left: 205px;
    }

    .m-b-205 {
        margin-bottom: 205px;
    }

    .m-t-205 {
        margin-top: 205px;
    }

    .m-r-205 {
        margin-right: 205px;
    }

    .m-l-205 {
        margin-left: 205px;
    }

    .p-b-210 {
        padding-bottom: 210px;
    }

    .p-t-210 {
        padding-top: 210px;
    }

    .p-r-210 {
        padding-right: 210px;
    }

    .p-l-210 {
        padding-left: 210px;
    }

    .m-b-210 {
        margin-bottom: 210px;
    }

    .m-t-210 {
        margin-top: 210px;
    }

    .m-r-210 {
        margin-right: 210px;
    }

    .m-l-210 {
        margin-left: 210px;
    }

    .p-b-215 {
        padding-bottom: 215px;
    }

    .p-t-215 {
        padding-top: 215px;
    }

    .p-r-215 {
        padding-right: 215px;
    }

    .p-l-215 {
        padding-left: 215px;
    }

    .m-b-215 {
        margin-bottom: 215px;
    }

    .m-t-215 {
        margin-top: 215px;
    }

    .m-r-215 {
        margin-right: 215px;
    }

    .m-l-215 {
        margin-left: 215px;
    }

    .p-b-220 {
        padding-bottom: 220px;
    }

    .p-t-220 {
        padding-top: 220px;
    }

    .p-r-220 {
        padding-right: 220px;
    }

    .p-l-220 {
        padding-left: 220px;
    }

    .m-b-220 {
        margin-bottom: 220px;
    }

    .m-t-220 {
        margin-top: 220px;
    }

    .m-r-220 {
        margin-right: 220px;
    }

    .m-l-220 {
        margin-left: 220px;
    }

    .p-b-225 {
        padding-bottom: 225px;
    }

    .p-t-225 {
        padding-top: 225px;
    }

    .p-r-225 {
        padding-right: 225px;
    }

    .p-l-225 {
        padding-left: 225px;
    }

    .m-b-225 {
        margin-bottom: 225px;
    }

    .m-t-225 {
        margin-top: 225px;
    }

    .m-r-225 {
        margin-right: 225px;
    }

    .m-l-225 {
        margin-left: 225px;
    }

    .p-b-230 {
        padding-bottom: 230px;
    }

    .p-t-230 {
        padding-top: 230px;
    }

    .p-r-230 {
        padding-right: 230px;
    }

    .p-l-230 {
        padding-left: 230px;
    }

    .m-b-230 {
        margin-bottom: 230px;
    }

    .m-t-230 {
        margin-top: 230px;
    }

    .m-r-230 {
        margin-right: 230px;
    }

    .m-l-230 {
        margin-left: 230px;
    }

    .p-b-235 {
        padding-bottom: 235px;
    }

    .p-t-235 {
        padding-top: 235px;
    }

    .p-r-235 {
        padding-right: 235px;
    }

    .p-l-235 {
        padding-left: 235px;
    }

    .m-b-235 {
        margin-bottom: 235px;
    }

    .m-t-235 {
        margin-top: 235px;
    }

    .m-r-235 {
        margin-right: 235px;
    }

    .m-l-235 {
        margin-left: 235px;
    }

    .p-b-240 {
        padding-bottom: 240px;
    }

    .p-t-240 {
        padding-top: 240px;
    }

    .p-r-240 {
        padding-right: 240px;
    }

    .p-l-240 {
        padding-left: 240px;
    }

    .m-b-240 {
        margin-bottom: 240px;
    }

    .m-t-240 {
        margin-top: 240px;
    }

    .m-r-240 {
        margin-right: 240px;
    }

    .m-l-240 {
        margin-left: 240px;
    }

    .p-b-245 {
        padding-bottom: 245px;
    }

    .p-t-245 {
        padding-top: 245px;
    }

    .p-r-245 {
        padding-right: 245px;
    }

    .p-l-245 {
        padding-left: 245px;
    }

    .m-b-245 {
        margin-bottom: 245px;
    }

    .m-t-245 {
        margin-top: 245px;
    }

    .m-r-245 {
        margin-right: 245px;
    }

    .m-l-245 {
        margin-left: 245px;
    }

    .p-b-250 {
        padding-bottom: 250px;
    }

    .p-t-250 {
        padding-top: 250px;
    }

    .p-r-250 {
        padding-right: 250px;
    }

    .p-l-250 {
        padding-left: 250px;
    }

    .m-b-250 {
        margin-bottom: 250px;
    }

    .m-t-250 {
        margin-top: 250px;
    }

    .m-r-250 {
        margin-right: 250px;
    }

    .m-l-250 {
        margin-left: 250px;
    }

    @media (max-width: 1023px) {
        .p-lg-b-0 {
            padding-bottom: 0px;
        }

        .p-lg-t-0 {
            padding-top: 0px;
        }

        .p-lg-r-0 {
            padding-right: 0px;
        }

        .p-lg-l-0 {
            padding-left: 0px;
        }

        .m-lg-b-0 {
            margin-bottom: 0px;
        }

        .m-lg-t-0 {
            margin-top: 0px;
        }

        .m-lg-r-0 {
            margin-right: 0px;
        }

        .m-lg-l-0 {
            margin-left: 0px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-0 {
            padding-bottom: 0px;
        }

        .p-md-t-0 {
            padding-top: 0px;
        }

        .p-md-r-0 {
            padding-right: 0px;
        }

        .p-md-l-0 {
            padding-left: 0px;
        }

        .m-md-b-0 {
            margin-bottom: 0px;
        }

        .m-md-t-0 {
            margin-top: 0px;
        }

        .m-md-r-0 {
            margin-right: 0px;
        }

        .m-md-l-0 {
            margin-left: 0px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-0 {
            padding-bottom: 0px;
        }

        .p-sm-t-0 {
            padding-top: 0px;
        }

        .p-sm-r-0 {
            padding-right: 0px;
        }

        .p-sm-l-0 {
            padding-left: 0px;
        }

        .m-sm-b-0 {
            margin-bottom: 0px;
        }

        .m-sm-t-0 {
            margin-top: 0px;
        }

        .m-sm-r-0 {
            margin-right: 0px;
        }

        .m-sm-l-0 {
            margin-left: 0px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-0 {
            padding-bottom: 0px;
        }

        .p-xs-t-0 {
            padding-top: 0px;
        }

        .p-xs-r-0 {
            padding-right: 0px;
        }

        .p-xs-l-0 {
            padding-left: 0px;
        }

        .m-xs-b-0 {
            margin-bottom: 0px;
        }

        .m-xs-t-0 {
            margin-top: 0px;
        }

        .m-xs-r-0 {
            margin-right: 0px;
        }

        .m-xs-l-0 {
            margin-left: 0px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-5 {
            padding-bottom: 5px;
        }

        .p-lg-t-5 {
            padding-top: 5px;
        }

        .p-lg-r-5 {
            padding-right: 5px;
        }

        .p-lg-l-5 {
            padding-left: 5px;
        }

        .m-lg-b-5 {
            margin-bottom: 5px;
        }

        .m-lg-t-5 {
            margin-top: 5px;
        }

        .m-lg-r-5 {
            margin-right: 5px;
        }

        .m-lg-l-5 {
            margin-left: 5px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-5 {
            padding-bottom: 5px;
        }

        .p-md-t-5 {
            padding-top: 5px;
        }

        .p-md-r-5 {
            padding-right: 5px;
        }

        .p-md-l-5 {
            padding-left: 5px;
        }

        .m-md-b-5 {
            margin-bottom: 5px;
        }

        .m-md-t-5 {
            margin-top: 5px;
        }

        .m-md-r-5 {
            margin-right: 5px;
        }

        .m-md-l-5 {
            margin-left: 5px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-5 {
            padding-bottom: 5px;
        }

        .p-sm-t-5 {
            padding-top: 5px;
        }

        .p-sm-r-5 {
            padding-right: 5px;
        }

        .p-sm-l-5 {
            padding-left: 5px;
        }

        .m-sm-b-5 {
            margin-bottom: 5px;
        }

        .m-sm-t-5 {
            margin-top: 5px;
        }

        .m-sm-r-5 {
            margin-right: 5px;
        }

        .m-sm-l-5 {
            margin-left: 5px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-5 {
            padding-bottom: 5px;
        }

        .p-xs-t-5 {
            padding-top: 5px;
        }

        .p-xs-r-5 {
            padding-right: 5px;
        }

        .p-xs-l-5 {
            padding-left: 5px;
        }

        .m-xs-b-5 {
            margin-bottom: 5px;
        }

        .m-xs-t-5 {
            margin-top: 5px;
        }

        .m-xs-r-5 {
            margin-right: 5px;
        }

        .m-xs-l-5 {
            margin-left: 5px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-10 {
            padding-bottom: 10px;
        }

        .p-lg-t-10 {
            padding-top: 10px;
        }

        .p-lg-r-10 {
            padding-right: 10px;
        }

        .p-lg-l-10 {
            padding-left: 10px;
        }

        .m-lg-b-10 {
            margin-bottom: 10px;
        }

        .m-lg-t-10 {
            margin-top: 10px;
        }

        .m-lg-r-10 {
            margin-right: 10px;
        }

        .m-lg-l-10 {
            margin-left: 10px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-10 {
            padding-bottom: 10px;
        }

        .p-md-t-10 {
            padding-top: 10px;
        }

        .p-md-r-10 {
            padding-right: 10px;
        }

        .p-md-l-10 {
            padding-left: 10px;
        }

        .m-md-b-10 {
            margin-bottom: 10px;
        }

        .m-md-t-10 {
            margin-top: 10px;
        }

        .m-md-r-10 {
            margin-right: 10px;
        }

        .m-md-l-10 {
            margin-left: 10px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-10 {
            padding-bottom: 10px;
        }

        .p-sm-t-10 {
            padding-top: 10px;
        }

        .p-sm-r-10 {
            padding-right: 10px;
        }

        .p-sm-l-10 {
            padding-left: 10px;
        }

        .m-sm-b-10 {
            margin-bottom: 10px;
        }

        .m-sm-t-10 {
            margin-top: 10px;
        }

        .m-sm-r-10 {
            margin-right: 10px;
        }

        .m-sm-l-10 {
            margin-left: 10px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-10 {
            padding-bottom: 10px;
        }

        .p-xs-t-10 {
            padding-top: 10px;
        }

        .p-xs-r-10 {
            padding-right: 10px;
        }

        .p-xs-l-10 {
            padding-left: 10px;
        }

        .m-xs-b-10 {
            margin-bottom: 10px;
        }

        .m-xs-t-10 {
            margin-top: 10px;
        }

        .m-xs-r-10 {
            margin-right: 10px;
        }

        .m-xs-l-10 {
            margin-left: 10px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-15 {
            padding-bottom: 15px;
        }

        .p-lg-t-15 {
            padding-top: 15px;
        }

        .p-lg-r-15 {
            padding-right: 15px;
        }

        .p-lg-l-15 {
            padding-left: 15px;
        }

        .m-lg-b-15 {
            margin-bottom: 15px;
        }

        .m-lg-t-15 {
            margin-top: 15px;
        }

        .m-lg-r-15 {
            margin-right: 15px;
        }

        .m-lg-l-15 {
            margin-left: 15px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-15 {
            padding-bottom: 15px;
        }

        .p-md-t-15 {
            padding-top: 15px;
        }

        .p-md-r-15 {
            padding-right: 15px;
        }

        .p-md-l-15 {
            padding-left: 15px;
        }

        .m-md-b-15 {
            margin-bottom: 15px;
        }

        .m-md-t-15 {
            margin-top: 15px;
        }

        .m-md-r-15 {
            margin-right: 15px;
        }

        .m-md-l-15 {
            margin-left: 15px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-15 {
            padding-bottom: 15px;
        }

        .p-sm-t-15 {
            padding-top: 15px;
        }

        .p-sm-r-15 {
            padding-right: 15px;
        }

        .p-sm-l-15 {
            padding-left: 15px;
        }

        .m-sm-b-15 {
            margin-bottom: 15px;
        }

        .m-sm-t-15 {
            margin-top: 15px;
        }

        .m-sm-r-15 {
            margin-right: 15px;
        }

        .m-sm-l-15 {
            margin-left: 15px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-15 {
            padding-bottom: 15px;
        }

        .p-xs-t-15 {
            padding-top: 15px;
        }

        .p-xs-r-15 {
            padding-right: 15px;
        }

        .p-xs-l-15 {
            padding-left: 15px;
        }

        .m-xs-b-15 {
            margin-bottom: 15px;
        }

        .m-xs-t-15 {
            margin-top: 15px;
        }

        .m-xs-r-15 {
            margin-right: 15px;
        }

        .m-xs-l-15 {
            margin-left: 15px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-20 {
            padding-bottom: 20px;
        }

        .p-lg-t-20 {
            padding-top: 20px;
        }

        .p-lg-r-20 {
            padding-right: 20px;
        }

        .p-lg-l-20 {
            padding-left: 20px;
        }

        .m-lg-b-20 {
            margin-bottom: 20px;
        }

        .m-lg-t-20 {
            margin-top: 20px;
        }

        .m-lg-r-20 {
            margin-right: 20px;
        }

        .m-lg-l-20 {
            margin-left: 20px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-20 {
            padding-bottom: 20px;
        }

        .p-md-t-20 {
            padding-top: 20px;
        }

        .p-md-r-20 {
            padding-right: 20px;
        }

        .p-md-l-20 {
            padding-left: 20px;
        }

        .m-md-b-20 {
            margin-bottom: 20px;
        }

        .m-md-t-20 {
            margin-top: 20px;
        }

        .m-md-r-20 {
            margin-right: 20px;
        }

        .m-md-l-20 {
            margin-left: 20px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-20 {
            padding-bottom: 20px;
        }

        .p-sm-t-20 {
            padding-top: 20px;
        }

        .p-sm-r-20 {
            padding-right: 20px;
        }

        .p-sm-l-20 {
            padding-left: 20px;
        }

        .m-sm-b-20 {
            margin-bottom: 20px;
        }

        .m-sm-t-20 {
            margin-top: 20px;
        }

        .m-sm-r-20 {
            margin-right: 20px;
        }

        .m-sm-l-20 {
            margin-left: 20px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-20 {
            padding-bottom: 20px;
        }

        .p-xs-t-20 {
            padding-top: 20px;
        }

        .p-xs-r-20 {
            padding-right: 20px;
        }

        .p-xs-l-20 {
            padding-left: 20px;
        }

        .m-xs-b-20 {
            margin-bottom: 20px;
        }

        .m-xs-t-20 {
            margin-top: 20px;
        }

        .m-xs-r-20 {
            margin-right: 20px;
        }

        .m-xs-l-20 {
            margin-left: 20px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-25 {
            padding-bottom: 25px;
        }

        .p-lg-t-25 {
            padding-top: 25px;
        }

        .p-lg-r-25 {
            padding-right: 25px;
        }

        .p-lg-l-25 {
            padding-left: 25px;
        }

        .m-lg-b-25 {
            margin-bottom: 25px;
        }

        .m-lg-t-25 {
            margin-top: 25px;
        }

        .m-lg-r-25 {
            margin-right: 25px;
        }

        .m-lg-l-25 {
            margin-left: 25px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-25 {
            padding-bottom: 25px;
        }

        .p-md-t-25 {
            padding-top: 25px;
        }

        .p-md-r-25 {
            padding-right: 25px;
        }

        .p-md-l-25 {
            padding-left: 25px;
        }

        .m-md-b-25 {
            margin-bottom: 25px;
        }

        .m-md-t-25 {
            margin-top: 25px;
        }

        .m-md-r-25 {
            margin-right: 25px;
        }

        .m-md-l-25 {
            margin-left: 25px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-25 {
            padding-bottom: 25px;
        }

        .p-sm-t-25 {
            padding-top: 25px;
        }

        .p-sm-r-25 {
            padding-right: 25px;
        }

        .p-sm-l-25 {
            padding-left: 25px;
        }

        .m-sm-b-25 {
            margin-bottom: 25px;
        }

        .m-sm-t-25 {
            margin-top: 25px;
        }

        .m-sm-r-25 {
            margin-right: 25px;
        }

        .m-sm-l-25 {
            margin-left: 25px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-25 {
            padding-bottom: 25px;
        }

        .p-xs-t-25 {
            padding-top: 25px;
        }

        .p-xs-r-25 {
            padding-right: 25px;
        }

        .p-xs-l-25 {
            padding-left: 25px;
        }

        .m-xs-b-25 {
            margin-bottom: 25px;
        }

        .m-xs-t-25 {
            margin-top: 25px;
        }

        .m-xs-r-25 {
            margin-right: 25px;
        }

        .m-xs-l-25 {
            margin-left: 25px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-30 {
            padding-bottom: 30px;
        }

        .p-lg-t-30 {
            padding-top: 30px;
        }

        .p-lg-r-30 {
            padding-right: 30px;
        }

        .p-lg-l-30 {
            padding-left: 30px;
        }

        .m-lg-b-30 {
            margin-bottom: 30px;
        }

        .m-lg-t-30 {
            margin-top: 30px;
        }

        .m-lg-r-30 {
            margin-right: 30px;
        }

        .m-lg-l-30 {
            margin-left: 30px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-30 {
            padding-bottom: 30px;
        }

        .p-md-t-30 {
            padding-top: 30px;
        }

        .p-md-r-30 {
            padding-right: 30px;
        }

        .p-md-l-30 {
            padding-left: 30px;
        }

        .m-md-b-30 {
            margin-bottom: 30px;
        }

        .m-md-t-30 {
            margin-top: 30px;
        }

        .m-md-r-30 {
            margin-right: 30px;
        }

        .m-md-l-30 {
            margin-left: 30px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-30 {
            padding-bottom: 30px;
        }

        .p-sm-t-30 {
            padding-top: 30px;
        }

        .p-sm-r-30 {
            padding-right: 30px;
        }

        .p-sm-l-30 {
            padding-left: 30px;
        }

        .m-sm-b-30 {
            margin-bottom: 30px;
        }

        .m-sm-t-30 {
            margin-top: 30px;
        }

        .m-sm-r-30 {
            margin-right: 30px;
        }

        .m-sm-l-30 {
            margin-left: 30px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-30 {
            padding-bottom: 30px;
        }

        .p-xs-t-30 {
            padding-top: 30px;
        }

        .p-xs-r-30 {
            padding-right: 30px;
        }

        .p-xs-l-30 {
            padding-left: 30px;
        }

        .m-xs-b-30 {
            margin-bottom: 30px;
        }

        .m-xs-t-30 {
            margin-top: 30px;
        }

        .m-xs-r-30 {
            margin-right: 30px;
        }

        .m-xs-l-30 {
            margin-left: 30px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-35 {
            padding-bottom: 35px;
        }

        .p-lg-t-35 {
            padding-top: 35px;
        }

        .p-lg-r-35 {
            padding-right: 35px;
        }

        .p-lg-l-35 {
            padding-left: 35px;
        }

        .m-lg-b-35 {
            margin-bottom: 35px;
        }

        .m-lg-t-35 {
            margin-top: 35px;
        }

        .m-lg-r-35 {
            margin-right: 35px;
        }

        .m-lg-l-35 {
            margin-left: 35px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-35 {
            padding-bottom: 35px;
        }

        .p-md-t-35 {
            padding-top: 35px;
        }

        .p-md-r-35 {
            padding-right: 35px;
        }

        .p-md-l-35 {
            padding-left: 35px;
        }

        .m-md-b-35 {
            margin-bottom: 35px;
        }

        .m-md-t-35 {
            margin-top: 35px;
        }

        .m-md-r-35 {
            margin-right: 35px;
        }

        .m-md-l-35 {
            margin-left: 35px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-35 {
            padding-bottom: 35px;
        }

        .p-sm-t-35 {
            padding-top: 35px;
        }

        .p-sm-r-35 {
            padding-right: 35px;
        }

        .p-sm-l-35 {
            padding-left: 35px;
        }

        .m-sm-b-35 {
            margin-bottom: 35px;
        }

        .m-sm-t-35 {
            margin-top: 35px;
        }

        .m-sm-r-35 {
            margin-right: 35px;
        }

        .m-sm-l-35 {
            margin-left: 35px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-35 {
            padding-bottom: 35px;
        }

        .p-xs-t-35 {
            padding-top: 35px;
        }

        .p-xs-r-35 {
            padding-right: 35px;
        }

        .p-xs-l-35 {
            padding-left: 35px;
        }

        .m-xs-b-35 {
            margin-bottom: 35px;
        }

        .m-xs-t-35 {
            margin-top: 35px;
        }

        .m-xs-r-35 {
            margin-right: 35px;
        }

        .m-xs-l-35 {
            margin-left: 35px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-40 {
            padding-bottom: 40px;
        }

        .p-lg-t-40 {
            padding-top: 40px;
        }

        .p-lg-r-40 {
            padding-right: 40px;
        }

        .p-lg-l-40 {
            padding-left: 40px;
        }

        .m-lg-b-40 {
            margin-bottom: 40px;
        }

        .m-lg-t-40 {
            margin-top: 40px;
        }

        .m-lg-r-40 {
            margin-right: 40px;
        }

        .m-lg-l-40 {
            margin-left: 40px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-40 {
            padding-bottom: 40px;
        }

        .p-md-t-40 {
            padding-top: 40px;
        }

        .p-md-r-40 {
            padding-right: 40px;
        }

        .p-md-l-40 {
            padding-left: 40px;
        }

        .m-md-b-40 {
            margin-bottom: 40px;
        }

        .m-md-t-40 {
            margin-top: 40px;
        }

        .m-md-r-40 {
            margin-right: 40px;
        }

        .m-md-l-40 {
            margin-left: 40px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-40 {
            padding-bottom: 40px;
        }

        .p-sm-t-40 {
            padding-top: 40px;
        }

        .p-sm-r-40 {
            padding-right: 40px;
        }

        .p-sm-l-40 {
            padding-left: 40px;
        }

        .m-sm-b-40 {
            margin-bottom: 40px;
        }

        .m-sm-t-40 {
            margin-top: 40px;
        }

        .m-sm-r-40 {
            margin-right: 40px;
        }

        .m-sm-l-40 {
            margin-left: 40px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-40 {
            padding-bottom: 40px;
        }

        .p-xs-t-40 {
            padding-top: 40px;
        }

        .p-xs-r-40 {
            padding-right: 40px;
        }

        .p-xs-l-40 {
            padding-left: 40px;
        }

        .m-xs-b-40 {
            margin-bottom: 40px;
        }

        .m-xs-t-40 {
            margin-top: 40px;
        }

        .m-xs-r-40 {
            margin-right: 40px;
        }

        .m-xs-l-40 {
            margin-left: 40px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-45 {
            padding-bottom: 45px;
        }

        .p-lg-t-45 {
            padding-top: 45px;
        }

        .p-lg-r-45 {
            padding-right: 45px;
        }

        .p-lg-l-45 {
            padding-left: 45px;
        }

        .m-lg-b-45 {
            margin-bottom: 45px;
        }

        .m-lg-t-45 {
            margin-top: 45px;
        }

        .m-lg-r-45 {
            margin-right: 45px;
        }

        .m-lg-l-45 {
            margin-left: 45px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-45 {
            padding-bottom: 45px;
        }

        .p-md-t-45 {
            padding-top: 45px;
        }

        .p-md-r-45 {
            padding-right: 45px;
        }

        .p-md-l-45 {
            padding-left: 45px;
        }

        .m-md-b-45 {
            margin-bottom: 45px;
        }

        .m-md-t-45 {
            margin-top: 45px;
        }

        .m-md-r-45 {
            margin-right: 45px;
        }

        .m-md-l-45 {
            margin-left: 45px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-45 {
            padding-bottom: 45px;
        }

        .p-sm-t-45 {
            padding-top: 45px;
        }

        .p-sm-r-45 {
            padding-right: 45px;
        }

        .p-sm-l-45 {
            padding-left: 45px;
        }

        .m-sm-b-45 {
            margin-bottom: 45px;
        }

        .m-sm-t-45 {
            margin-top: 45px;
        }

        .m-sm-r-45 {
            margin-right: 45px;
        }

        .m-sm-l-45 {
            margin-left: 45px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-45 {
            padding-bottom: 45px;
        }

        .p-xs-t-45 {
            padding-top: 45px;
        }

        .p-xs-r-45 {
            padding-right: 45px;
        }

        .p-xs-l-45 {
            padding-left: 45px;
        }

        .m-xs-b-45 {
            margin-bottom: 45px;
        }

        .m-xs-t-45 {
            margin-top: 45px;
        }

        .m-xs-r-45 {
            margin-right: 45px;
        }

        .m-xs-l-45 {
            margin-left: 45px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-50 {
            padding-bottom: 50px;
        }

        .p-lg-t-50 {
            padding-top: 50px;
        }

        .p-lg-r-50 {
            padding-right: 50px;
        }

        .p-lg-l-50 {
            padding-left: 50px;
        }

        .m-lg-b-50 {
            margin-bottom: 50px;
        }

        .m-lg-t-50 {
            margin-top: 50px;
        }

        .m-lg-r-50 {
            margin-right: 50px;
        }

        .m-lg-l-50 {
            margin-left: 50px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-50 {
            padding-bottom: 50px;
        }

        .p-md-t-50 {
            padding-top: 50px;
        }

        .p-md-r-50 {
            padding-right: 50px;
        }

        .p-md-l-50 {
            padding-left: 50px;
        }

        .m-md-b-50 {
            margin-bottom: 50px;
        }

        .m-md-t-50 {
            margin-top: 50px;
        }

        .m-md-r-50 {
            margin-right: 50px;
        }

        .m-md-l-50 {
            margin-left: 50px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-50 {
            padding-bottom: 50px;
        }

        .p-sm-t-50 {
            padding-top: 50px;
        }

        .p-sm-r-50 {
            padding-right: 50px;
        }

        .p-sm-l-50 {
            padding-left: 50px;
        }

        .m-sm-b-50 {
            margin-bottom: 50px;
        }

        .m-sm-t-50 {
            margin-top: 50px;
        }

        .m-sm-r-50 {
            margin-right: 50px;
        }

        .m-sm-l-50 {
            margin-left: 50px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-50 {
            padding-bottom: 50px;
        }

        .p-xs-t-50 {
            padding-top: 50px;
        }

        .p-xs-r-50 {
            padding-right: 50px;
        }

        .p-xs-l-50 {
            padding-left: 50px;
        }

        .m-xs-b-50 {
            margin-bottom: 50px;
        }

        .m-xs-t-50 {
            margin-top: 50px;
        }

        .m-xs-r-50 {
            margin-right: 50px;
        }

        .m-xs-l-50 {
            margin-left: 50px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-55 {
            padding-bottom: 55px;
        }

        .p-lg-t-55 {
            padding-top: 55px;
        }

        .p-lg-r-55 {
            padding-right: 55px;
        }

        .p-lg-l-55 {
            padding-left: 55px;
        }

        .m-lg-b-55 {
            margin-bottom: 55px;
        }

        .m-lg-t-55 {
            margin-top: 55px;
        }

        .m-lg-r-55 {
            margin-right: 55px;
        }

        .m-lg-l-55 {
            margin-left: 55px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-55 {
            padding-bottom: 55px;
        }

        .p-md-t-55 {
            padding-top: 55px;
        }

        .p-md-r-55 {
            padding-right: 55px;
        }

        .p-md-l-55 {
            padding-left: 55px;
        }

        .m-md-b-55 {
            margin-bottom: 55px;
        }

        .m-md-t-55 {
            margin-top: 55px;
        }

        .m-md-r-55 {
            margin-right: 55px;
        }

        .m-md-l-55 {
            margin-left: 55px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-55 {
            padding-bottom: 55px;
        }

        .p-sm-t-55 {
            padding-top: 55px;
        }

        .p-sm-r-55 {
            padding-right: 55px;
        }

        .p-sm-l-55 {
            padding-left: 55px;
        }

        .m-sm-b-55 {
            margin-bottom: 55px;
        }

        .m-sm-t-55 {
            margin-top: 55px;
        }

        .m-sm-r-55 {
            margin-right: 55px;
        }

        .m-sm-l-55 {
            margin-left: 55px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-55 {
            padding-bottom: 55px;
        }

        .p-xs-t-55 {
            padding-top: 55px;
        }

        .p-xs-r-55 {
            padding-right: 55px;
        }

        .p-xs-l-55 {
            padding-left: 55px;
        }

        .m-xs-b-55 {
            margin-bottom: 55px;
        }

        .m-xs-t-55 {
            margin-top: 55px;
        }

        .m-xs-r-55 {
            margin-right: 55px;
        }

        .m-xs-l-55 {
            margin-left: 55px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-60 {
            padding-bottom: 60px;
        }

        .p-lg-t-60 {
            padding-top: 60px;
        }

        .p-lg-r-60 {
            padding-right: 60px;
        }

        .p-lg-l-60 {
            padding-left: 60px;
        }

        .m-lg-b-60 {
            margin-bottom: 60px;
        }

        .m-lg-t-60 {
            margin-top: 60px;
        }

        .m-lg-r-60 {
            margin-right: 60px;
        }

        .m-lg-l-60 {
            margin-left: 60px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-60 {
            padding-bottom: 60px;
        }

        .p-md-t-60 {
            padding-top: 60px;
        }

        .p-md-r-60 {
            padding-right: 60px;
        }

        .p-md-l-60 {
            padding-left: 60px;
        }

        .m-md-b-60 {
            margin-bottom: 60px;
        }

        .m-md-t-60 {
            margin-top: 60px;
        }

        .m-md-r-60 {
            margin-right: 60px;
        }

        .m-md-l-60 {
            margin-left: 60px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-60 {
            padding-bottom: 60px;
        }

        .p-sm-t-60 {
            padding-top: 60px;
        }

        .p-sm-r-60 {
            padding-right: 60px;
        }

        .p-sm-l-60 {
            padding-left: 60px;
        }

        .m-sm-b-60 {
            margin-bottom: 60px;
        }

        .m-sm-t-60 {
            margin-top: 60px;
        }

        .m-sm-r-60 {
            margin-right: 60px;
        }

        .m-sm-l-60 {
            margin-left: 60px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-60 {
            padding-bottom: 60px;
        }

        .p-xs-t-60 {
            padding-top: 60px;
        }

        .p-xs-r-60 {
            padding-right: 60px;
        }

        .p-xs-l-60 {
            padding-left: 60px;
        }

        .m-xs-b-60 {
            margin-bottom: 60px;
        }

        .m-xs-t-60 {
            margin-top: 60px;
        }

        .m-xs-r-60 {
            margin-right: 60px;
        }

        .m-xs-l-60 {
            margin-left: 60px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-65 {
            padding-bottom: 65px;
        }

        .p-lg-t-65 {
            padding-top: 65px;
        }

        .p-lg-r-65 {
            padding-right: 65px;
        }

        .p-lg-l-65 {
            padding-left: 65px;
        }

        .m-lg-b-65 {
            margin-bottom: 65px;
        }

        .m-lg-t-65 {
            margin-top: 65px;
        }

        .m-lg-r-65 {
            margin-right: 65px;
        }

        .m-lg-l-65 {
            margin-left: 65px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-65 {
            padding-bottom: 65px;
        }

        .p-md-t-65 {
            padding-top: 65px;
        }

        .p-md-r-65 {
            padding-right: 65px;
        }

        .p-md-l-65 {
            padding-left: 65px;
        }

        .m-md-b-65 {
            margin-bottom: 65px;
        }

        .m-md-t-65 {
            margin-top: 65px;
        }

        .m-md-r-65 {
            margin-right: 65px;
        }

        .m-md-l-65 {
            margin-left: 65px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-65 {
            padding-bottom: 65px;
        }

        .p-sm-t-65 {
            padding-top: 65px;
        }

        .p-sm-r-65 {
            padding-right: 65px;
        }

        .p-sm-l-65 {
            padding-left: 65px;
        }

        .m-sm-b-65 {
            margin-bottom: 65px;
        }

        .m-sm-t-65 {
            margin-top: 65px;
        }

        .m-sm-r-65 {
            margin-right: 65px;
        }

        .m-sm-l-65 {
            margin-left: 65px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-65 {
            padding-bottom: 65px;
        }

        .p-xs-t-65 {
            padding-top: 65px;
        }

        .p-xs-r-65 {
            padding-right: 65px;
        }

        .p-xs-l-65 {
            padding-left: 65px;
        }

        .m-xs-b-65 {
            margin-bottom: 65px;
        }

        .m-xs-t-65 {
            margin-top: 65px;
        }

        .m-xs-r-65 {
            margin-right: 65px;
        }

        .m-xs-l-65 {
            margin-left: 65px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-70 {
            padding-bottom: 70px;
        }

        .p-lg-t-70 {
            padding-top: 70px;
        }

        .p-lg-r-70 {
            padding-right: 70px;
        }

        .p-lg-l-70 {
            padding-left: 70px;
        }

        .m-lg-b-70 {
            margin-bottom: 70px;
        }

        .m-lg-t-70 {
            margin-top: 70px;
        }

        .m-lg-r-70 {
            margin-right: 70px;
        }

        .m-lg-l-70 {
            margin-left: 70px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-70 {
            padding-bottom: 70px;
        }

        .p-md-t-70 {
            padding-top: 70px;
        }

        .p-md-r-70 {
            padding-right: 70px;
        }

        .p-md-l-70 {
            padding-left: 70px;
        }

        .m-md-b-70 {
            margin-bottom: 70px;
        }

        .m-md-t-70 {
            margin-top: 70px;
        }

        .m-md-r-70 {
            margin-right: 70px;
        }

        .m-md-l-70 {
            margin-left: 70px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-70 {
            padding-bottom: 70px;
        }

        .p-sm-t-70 {
            padding-top: 70px;
        }

        .p-sm-r-70 {
            padding-right: 70px;
        }

        .p-sm-l-70 {
            padding-left: 70px;
        }

        .m-sm-b-70 {
            margin-bottom: 70px;
        }

        .m-sm-t-70 {
            margin-top: 70px;
        }

        .m-sm-r-70 {
            margin-right: 70px;
        }

        .m-sm-l-70 {
            margin-left: 70px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-70 {
            padding-bottom: 70px;
        }

        .p-xs-t-70 {
            padding-top: 70px;
        }

        .p-xs-r-70 {
            padding-right: 70px;
        }

        .p-xs-l-70 {
            padding-left: 70px;
        }

        .m-xs-b-70 {
            margin-bottom: 70px;
        }

        .m-xs-t-70 {
            margin-top: 70px;
        }

        .m-xs-r-70 {
            margin-right: 70px;
        }

        .m-xs-l-70 {
            margin-left: 70px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-75 {
            padding-bottom: 75px;
        }

        .p-lg-t-75 {
            padding-top: 75px;
        }

        .p-lg-r-75 {
            padding-right: 75px;
        }

        .p-lg-l-75 {
            padding-left: 75px;
        }

        .m-lg-b-75 {
            margin-bottom: 75px;
        }

        .m-lg-t-75 {
            margin-top: 75px;
        }

        .m-lg-r-75 {
            margin-right: 75px;
        }

        .m-lg-l-75 {
            margin-left: 75px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-75 {
            padding-bottom: 75px;
        }

        .p-md-t-75 {
            padding-top: 75px;
        }

        .p-md-r-75 {
            padding-right: 75px;
        }

        .p-md-l-75 {
            padding-left: 75px;
        }

        .m-md-b-75 {
            margin-bottom: 75px;
        }

        .m-md-t-75 {
            margin-top: 75px;
        }

        .m-md-r-75 {
            margin-right: 75px;
        }

        .m-md-l-75 {
            margin-left: 75px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-75 {
            padding-bottom: 75px;
        }

        .p-sm-t-75 {
            padding-top: 75px;
        }

        .p-sm-r-75 {
            padding-right: 75px;
        }

        .p-sm-l-75 {
            padding-left: 75px;
        }

        .m-sm-b-75 {
            margin-bottom: 75px;
        }

        .m-sm-t-75 {
            margin-top: 75px;
        }

        .m-sm-r-75 {
            margin-right: 75px;
        }

        .m-sm-l-75 {
            margin-left: 75px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-75 {
            padding-bottom: 75px;
        }

        .p-xs-t-75 {
            padding-top: 75px;
        }

        .p-xs-r-75 {
            padding-right: 75px;
        }

        .p-xs-l-75 {
            padding-left: 75px;
        }

        .m-xs-b-75 {
            margin-bottom: 75px;
        }

        .m-xs-t-75 {
            margin-top: 75px;
        }

        .m-xs-r-75 {
            margin-right: 75px;
        }

        .m-xs-l-75 {
            margin-left: 75px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-80 {
            padding-bottom: 80px;
        }

        .p-lg-t-80 {
            padding-top: 80px;
        }

        .p-lg-r-80 {
            padding-right: 80px;
        }

        .p-lg-l-80 {
            padding-left: 80px;
        }

        .m-lg-b-80 {
            margin-bottom: 80px;
        }

        .m-lg-t-80 {
            margin-top: 80px;
        }

        .m-lg-r-80 {
            margin-right: 80px;
        }

        .m-lg-l-80 {
            margin-left: 80px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-80 {
            padding-bottom: 80px;
        }

        .p-md-t-80 {
            padding-top: 80px;
        }

        .p-md-r-80 {
            padding-right: 80px;
        }

        .p-md-l-80 {
            padding-left: 80px;
        }

        .m-md-b-80 {
            margin-bottom: 80px;
        }

        .m-md-t-80 {
            margin-top: 80px;
        }

        .m-md-r-80 {
            margin-right: 80px;
        }

        .m-md-l-80 {
            margin-left: 80px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-80 {
            padding-bottom: 80px;
        }

        .p-sm-t-80 {
            padding-top: 80px;
        }

        .p-sm-r-80 {
            padding-right: 80px;
        }

        .p-sm-l-80 {
            padding-left: 80px;
        }

        .m-sm-b-80 {
            margin-bottom: 80px;
        }

        .m-sm-t-80 {
            margin-top: 80px;
        }

        .m-sm-r-80 {
            margin-right: 80px;
        }

        .m-sm-l-80 {
            margin-left: 80px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-80 {
            padding-bottom: 80px;
        }

        .p-xs-t-80 {
            padding-top: 80px;
        }

        .p-xs-r-80 {
            padding-right: 80px;
        }

        .p-xs-l-80 {
            padding-left: 80px;
        }

        .m-xs-b-80 {
            margin-bottom: 80px;
        }

        .m-xs-t-80 {
            margin-top: 80px;
        }

        .m-xs-r-80 {
            margin-right: 80px;
        }

        .m-xs-l-80 {
            margin-left: 80px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-85 {
            padding-bottom: 85px;
        }

        .p-lg-t-85 {
            padding-top: 85px;
        }

        .p-lg-r-85 {
            padding-right: 85px;
        }

        .p-lg-l-85 {
            padding-left: 85px;
        }

        .m-lg-b-85 {
            margin-bottom: 85px;
        }

        .m-lg-t-85 {
            margin-top: 85px;
        }

        .m-lg-r-85 {
            margin-right: 85px;
        }

        .m-lg-l-85 {
            margin-left: 85px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-85 {
            padding-bottom: 85px;
        }

        .p-md-t-85 {
            padding-top: 85px;
        }

        .p-md-r-85 {
            padding-right: 85px;
        }

        .p-md-l-85 {
            padding-left: 85px;
        }

        .m-md-b-85 {
            margin-bottom: 85px;
        }

        .m-md-t-85 {
            margin-top: 85px;
        }

        .m-md-r-85 {
            margin-right: 85px;
        }

        .m-md-l-85 {
            margin-left: 85px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-85 {
            padding-bottom: 85px;
        }

        .p-sm-t-85 {
            padding-top: 85px;
        }

        .p-sm-r-85 {
            padding-right: 85px;
        }

        .p-sm-l-85 {
            padding-left: 85px;
        }

        .m-sm-b-85 {
            margin-bottom: 85px;
        }

        .m-sm-t-85 {
            margin-top: 85px;
        }

        .m-sm-r-85 {
            margin-right: 85px;
        }

        .m-sm-l-85 {
            margin-left: 85px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-85 {
            padding-bottom: 85px;
        }

        .p-xs-t-85 {
            padding-top: 85px;
        }

        .p-xs-r-85 {
            padding-right: 85px;
        }

        .p-xs-l-85 {
            padding-left: 85px;
        }

        .m-xs-b-85 {
            margin-bottom: 85px;
        }

        .m-xs-t-85 {
            margin-top: 85px;
        }

        .m-xs-r-85 {
            margin-right: 85px;
        }

        .m-xs-l-85 {
            margin-left: 85px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-90 {
            padding-bottom: 90px;
        }

        .p-lg-t-90 {
            padding-top: 90px;
        }

        .p-lg-r-90 {
            padding-right: 90px;
        }

        .p-lg-l-90 {
            padding-left: 90px;
        }

        .m-lg-b-90 {
            margin-bottom: 90px;
        }

        .m-lg-t-90 {
            margin-top: 90px;
        }

        .m-lg-r-90 {
            margin-right: 90px;
        }

        .m-lg-l-90 {
            margin-left: 90px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-90 {
            padding-bottom: 90px;
        }

        .p-md-t-90 {
            padding-top: 90px;
        }

        .p-md-r-90 {
            padding-right: 90px;
        }

        .p-md-l-90 {
            padding-left: 90px;
        }

        .m-md-b-90 {
            margin-bottom: 90px;
        }

        .m-md-t-90 {
            margin-top: 90px;
        }

        .m-md-r-90 {
            margin-right: 90px;
        }

        .m-md-l-90 {
            margin-left: 90px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-90 {
            padding-bottom: 90px;
        }

        .p-sm-t-90 {
            padding-top: 90px;
        }

        .p-sm-r-90 {
            padding-right: 90px;
        }

        .p-sm-l-90 {
            padding-left: 90px;
        }

        .m-sm-b-90 {
            margin-bottom: 90px;
        }

        .m-sm-t-90 {
            margin-top: 90px;
        }

        .m-sm-r-90 {
            margin-right: 90px;
        }

        .m-sm-l-90 {
            margin-left: 90px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-90 {
            padding-bottom: 90px;
        }

        .p-xs-t-90 {
            padding-top: 90px;
        }

        .p-xs-r-90 {
            padding-right: 90px;
        }

        .p-xs-l-90 {
            padding-left: 90px;
        }

        .m-xs-b-90 {
            margin-bottom: 90px;
        }

        .m-xs-t-90 {
            margin-top: 90px;
        }

        .m-xs-r-90 {
            margin-right: 90px;
        }

        .m-xs-l-90 {
            margin-left: 90px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-95 {
            padding-bottom: 95px;
        }

        .p-lg-t-95 {
            padding-top: 95px;
        }

        .p-lg-r-95 {
            padding-right: 95px;
        }

        .p-lg-l-95 {
            padding-left: 95px;
        }

        .m-lg-b-95 {
            margin-bottom: 95px;
        }

        .m-lg-t-95 {
            margin-top: 95px;
        }

        .m-lg-r-95 {
            margin-right: 95px;
        }

        .m-lg-l-95 {
            margin-left: 95px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-95 {
            padding-bottom: 95px;
        }

        .p-md-t-95 {
            padding-top: 95px;
        }

        .p-md-r-95 {
            padding-right: 95px;
        }

        .p-md-l-95 {
            padding-left: 95px;
        }

        .m-md-b-95 {
            margin-bottom: 95px;
        }

        .m-md-t-95 {
            margin-top: 95px;
        }

        .m-md-r-95 {
            margin-right: 95px;
        }

        .m-md-l-95 {
            margin-left: 95px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-95 {
            padding-bottom: 95px;
        }

        .p-sm-t-95 {
            padding-top: 95px;
        }

        .p-sm-r-95 {
            padding-right: 95px;
        }

        .p-sm-l-95 {
            padding-left: 95px;
        }

        .m-sm-b-95 {
            margin-bottom: 95px;
        }

        .m-sm-t-95 {
            margin-top: 95px;
        }

        .m-sm-r-95 {
            margin-right: 95px;
        }

        .m-sm-l-95 {
            margin-left: 95px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-95 {
            padding-bottom: 95px;
        }

        .p-xs-t-95 {
            padding-top: 95px;
        }

        .p-xs-r-95 {
            padding-right: 95px;
        }

        .p-xs-l-95 {
            padding-left: 95px;
        }

        .m-xs-b-95 {
            margin-bottom: 95px;
        }

        .m-xs-t-95 {
            margin-top: 95px;
        }

        .m-xs-r-95 {
            margin-right: 95px;
        }

        .m-xs-l-95 {
            margin-left: 95px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-100 {
            padding-bottom: 100px;
        }

        .p-lg-t-100 {
            padding-top: 100px;
        }

        .p-lg-r-100 {
            padding-right: 100px;
        }

        .p-lg-l-100 {
            padding-left: 100px;
        }

        .m-lg-b-100 {
            margin-bottom: 100px;
        }

        .m-lg-t-100 {
            margin-top: 100px;
        }

        .m-lg-r-100 {
            margin-right: 100px;
        }

        .m-lg-l-100 {
            margin-left: 100px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-100 {
            padding-bottom: 100px;
        }

        .p-md-t-100 {
            padding-top: 100px;
        }

        .p-md-r-100 {
            padding-right: 100px;
        }

        .p-md-l-100 {
            padding-left: 100px;
        }

        .m-md-b-100 {
            margin-bottom: 100px;
        }

        .m-md-t-100 {
            margin-top: 100px;
        }

        .m-md-r-100 {
            margin-right: 100px;
        }

        .m-md-l-100 {
            margin-left: 100px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-100 {
            padding-bottom: 100px;
        }

        .p-sm-t-100 {
            padding-top: 100px;
        }

        .p-sm-r-100 {
            padding-right: 100px;
        }

        .p-sm-l-100 {
            padding-left: 100px;
        }

        .m-sm-b-100 {
            margin-bottom: 100px;
        }

        .m-sm-t-100 {
            margin-top: 100px;
        }

        .m-sm-r-100 {
            margin-right: 100px;
        }

        .m-sm-l-100 {
            margin-left: 100px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-100 {
            padding-bottom: 100px;
        }

        .p-xs-t-100 {
            padding-top: 100px;
        }

        .p-xs-r-100 {
            padding-right: 100px;
        }

        .p-xs-l-100 {
            padding-left: 100px;
        }

        .m-xs-b-100 {
            margin-bottom: 100px;
        }

        .m-xs-t-100 {
            margin-top: 100px;
        }

        .m-xs-r-100 {
            margin-right: 100px;
        }

        .m-xs-l-100 {
            margin-left: 100px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-105 {
            padding-bottom: 105px;
        }

        .p-lg-t-105 {
            padding-top: 105px;
        }

        .p-lg-r-105 {
            padding-right: 105px;
        }

        .p-lg-l-105 {
            padding-left: 105px;
        }

        .m-lg-b-105 {
            margin-bottom: 105px;
        }

        .m-lg-t-105 {
            margin-top: 105px;
        }

        .m-lg-r-105 {
            margin-right: 105px;
        }

        .m-lg-l-105 {
            margin-left: 105px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-105 {
            padding-bottom: 105px;
        }

        .p-md-t-105 {
            padding-top: 105px;
        }

        .p-md-r-105 {
            padding-right: 105px;
        }

        .p-md-l-105 {
            padding-left: 105px;
        }

        .m-md-b-105 {
            margin-bottom: 105px;
        }

        .m-md-t-105 {
            margin-top: 105px;
        }

        .m-md-r-105 {
            margin-right: 105px;
        }

        .m-md-l-105 {
            margin-left: 105px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-105 {
            padding-bottom: 105px;
        }

        .p-sm-t-105 {
            padding-top: 105px;
        }

        .p-sm-r-105 {
            padding-right: 105px;
        }

        .p-sm-l-105 {
            padding-left: 105px;
        }

        .m-sm-b-105 {
            margin-bottom: 105px;
        }

        .m-sm-t-105 {
            margin-top: 105px;
        }

        .m-sm-r-105 {
            margin-right: 105px;
        }

        .m-sm-l-105 {
            margin-left: 105px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-105 {
            padding-bottom: 105px;
        }

        .p-xs-t-105 {
            padding-top: 105px;
        }

        .p-xs-r-105 {
            padding-right: 105px;
        }

        .p-xs-l-105 {
            padding-left: 105px;
        }

        .m-xs-b-105 {
            margin-bottom: 105px;
        }

        .m-xs-t-105 {
            margin-top: 105px;
        }

        .m-xs-r-105 {
            margin-right: 105px;
        }

        .m-xs-l-105 {
            margin-left: 105px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-110 {
            padding-bottom: 110px;
        }

        .p-lg-t-110 {
            padding-top: 110px;
        }

        .p-lg-r-110 {
            padding-right: 110px;
        }

        .p-lg-l-110 {
            padding-left: 110px;
        }

        .m-lg-b-110 {
            margin-bottom: 110px;
        }

        .m-lg-t-110 {
            margin-top: 110px;
        }

        .m-lg-r-110 {
            margin-right: 110px;
        }

        .m-lg-l-110 {
            margin-left: 110px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-110 {
            padding-bottom: 110px;
        }

        .p-md-t-110 {
            padding-top: 110px;
        }

        .p-md-r-110 {
            padding-right: 110px;
        }

        .p-md-l-110 {
            padding-left: 110px;
        }

        .m-md-b-110 {
            margin-bottom: 110px;
        }

        .m-md-t-110 {
            margin-top: 110px;
        }

        .m-md-r-110 {
            margin-right: 110px;
        }

        .m-md-l-110 {
            margin-left: 110px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-110 {
            padding-bottom: 110px;
        }

        .p-sm-t-110 {
            padding-top: 110px;
        }

        .p-sm-r-110 {
            padding-right: 110px;
        }

        .p-sm-l-110 {
            padding-left: 110px;
        }

        .m-sm-b-110 {
            margin-bottom: 110px;
        }

        .m-sm-t-110 {
            margin-top: 110px;
        }

        .m-sm-r-110 {
            margin-right: 110px;
        }

        .m-sm-l-110 {
            margin-left: 110px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-110 {
            padding-bottom: 110px;
        }

        .p-xs-t-110 {
            padding-top: 110px;
        }

        .p-xs-r-110 {
            padding-right: 110px;
        }

        .p-xs-l-110 {
            padding-left: 110px;
        }

        .m-xs-b-110 {
            margin-bottom: 110px;
        }

        .m-xs-t-110 {
            margin-top: 110px;
        }

        .m-xs-r-110 {
            margin-right: 110px;
        }

        .m-xs-l-110 {
            margin-left: 110px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-115 {
            padding-bottom: 115px;
        }

        .p-lg-t-115 {
            padding-top: 115px;
        }

        .p-lg-r-115 {
            padding-right: 115px;
        }

        .p-lg-l-115 {
            padding-left: 115px;
        }

        .m-lg-b-115 {
            margin-bottom: 115px;
        }

        .m-lg-t-115 {
            margin-top: 115px;
        }

        .m-lg-r-115 {
            margin-right: 115px;
        }

        .m-lg-l-115 {
            margin-left: 115px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-115 {
            padding-bottom: 115px;
        }

        .p-md-t-115 {
            padding-top: 115px;
        }

        .p-md-r-115 {
            padding-right: 115px;
        }

        .p-md-l-115 {
            padding-left: 115px;
        }

        .m-md-b-115 {
            margin-bottom: 115px;
        }

        .m-md-t-115 {
            margin-top: 115px;
        }

        .m-md-r-115 {
            margin-right: 115px;
        }

        .m-md-l-115 {
            margin-left: 115px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-115 {
            padding-bottom: 115px;
        }

        .p-sm-t-115 {
            padding-top: 115px;
        }

        .p-sm-r-115 {
            padding-right: 115px;
        }

        .p-sm-l-115 {
            padding-left: 115px;
        }

        .m-sm-b-115 {
            margin-bottom: 115px;
        }

        .m-sm-t-115 {
            margin-top: 115px;
        }

        .m-sm-r-115 {
            margin-right: 115px;
        }

        .m-sm-l-115 {
            margin-left: 115px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-115 {
            padding-bottom: 115px;
        }

        .p-xs-t-115 {
            padding-top: 115px;
        }

        .p-xs-r-115 {
            padding-right: 115px;
        }

        .p-xs-l-115 {
            padding-left: 115px;
        }

        .m-xs-b-115 {
            margin-bottom: 115px;
        }

        .m-xs-t-115 {
            margin-top: 115px;
        }

        .m-xs-r-115 {
            margin-right: 115px;
        }

        .m-xs-l-115 {
            margin-left: 115px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-120 {
            padding-bottom: 120px;
        }

        .p-lg-t-120 {
            padding-top: 120px;
        }

        .p-lg-r-120 {
            padding-right: 120px;
        }

        .p-lg-l-120 {
            padding-left: 120px;
        }

        .m-lg-b-120 {
            margin-bottom: 120px;
        }

        .m-lg-t-120 {
            margin-top: 120px;
        }

        .m-lg-r-120 {
            margin-right: 120px;
        }

        .m-lg-l-120 {
            margin-left: 120px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-120 {
            padding-bottom: 120px;
        }

        .p-md-t-120 {
            padding-top: 120px;
        }

        .p-md-r-120 {
            padding-right: 120px;
        }

        .p-md-l-120 {
            padding-left: 120px;
        }

        .m-md-b-120 {
            margin-bottom: 120px;
        }

        .m-md-t-120 {
            margin-top: 120px;
        }

        .m-md-r-120 {
            margin-right: 120px;
        }

        .m-md-l-120 {
            margin-left: 120px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-120 {
            padding-bottom: 120px;
        }

        .p-sm-t-120 {
            padding-top: 120px;
        }

        .p-sm-r-120 {
            padding-right: 120px;
        }

        .p-sm-l-120 {
            padding-left: 120px;
        }

        .m-sm-b-120 {
            margin-bottom: 120px;
        }

        .m-sm-t-120 {
            margin-top: 120px;
        }

        .m-sm-r-120 {
            margin-right: 120px;
        }

        .m-sm-l-120 {
            margin-left: 120px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-120 {
            padding-bottom: 120px;
        }

        .p-xs-t-120 {
            padding-top: 120px;
        }

        .p-xs-r-120 {
            padding-right: 120px;
        }

        .p-xs-l-120 {
            padding-left: 120px;
        }

        .m-xs-b-120 {
            margin-bottom: 120px;
        }

        .m-xs-t-120 {
            margin-top: 120px;
        }

        .m-xs-r-120 {
            margin-right: 120px;
        }

        .m-xs-l-120 {
            margin-left: 120px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-125 {
            padding-bottom: 125px;
        }

        .p-lg-t-125 {
            padding-top: 125px;
        }

        .p-lg-r-125 {
            padding-right: 125px;
        }

        .p-lg-l-125 {
            padding-left: 125px;
        }

        .m-lg-b-125 {
            margin-bottom: 125px;
        }

        .m-lg-t-125 {
            margin-top: 125px;
        }

        .m-lg-r-125 {
            margin-right: 125px;
        }

        .m-lg-l-125 {
            margin-left: 125px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-125 {
            padding-bottom: 125px;
        }

        .p-md-t-125 {
            padding-top: 125px;
        }

        .p-md-r-125 {
            padding-right: 125px;
        }

        .p-md-l-125 {
            padding-left: 125px;
        }

        .m-md-b-125 {
            margin-bottom: 125px;
        }

        .m-md-t-125 {
            margin-top: 125px;
        }

        .m-md-r-125 {
            margin-right: 125px;
        }

        .m-md-l-125 {
            margin-left: 125px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-125 {
            padding-bottom: 125px;
        }

        .p-sm-t-125 {
            padding-top: 125px;
        }

        .p-sm-r-125 {
            padding-right: 125px;
        }

        .p-sm-l-125 {
            padding-left: 125px;
        }

        .m-sm-b-125 {
            margin-bottom: 125px;
        }

        .m-sm-t-125 {
            margin-top: 125px;
        }

        .m-sm-r-125 {
            margin-right: 125px;
        }

        .m-sm-l-125 {
            margin-left: 125px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-125 {
            padding-bottom: 125px;
        }

        .p-xs-t-125 {
            padding-top: 125px;
        }

        .p-xs-r-125 {
            padding-right: 125px;
        }

        .p-xs-l-125 {
            padding-left: 125px;
        }

        .m-xs-b-125 {
            margin-bottom: 125px;
        }

        .m-xs-t-125 {
            margin-top: 125px;
        }

        .m-xs-r-125 {
            margin-right: 125px;
        }

        .m-xs-l-125 {
            margin-left: 125px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-130 {
            padding-bottom: 130px;
        }

        .p-lg-t-130 {
            padding-top: 130px;
        }

        .p-lg-r-130 {
            padding-right: 130px;
        }

        .p-lg-l-130 {
            padding-left: 130px;
        }

        .m-lg-b-130 {
            margin-bottom: 130px;
        }

        .m-lg-t-130 {
            margin-top: 130px;
        }

        .m-lg-r-130 {
            margin-right: 130px;
        }

        .m-lg-l-130 {
            margin-left: 130px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-130 {
            padding-bottom: 130px;
        }

        .p-md-t-130 {
            padding-top: 130px;
        }

        .p-md-r-130 {
            padding-right: 130px;
        }

        .p-md-l-130 {
            padding-left: 130px;
        }

        .m-md-b-130 {
            margin-bottom: 130px;
        }

        .m-md-t-130 {
            margin-top: 130px;
        }

        .m-md-r-130 {
            margin-right: 130px;
        }

        .m-md-l-130 {
            margin-left: 130px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-130 {
            padding-bottom: 130px;
        }

        .p-sm-t-130 {
            padding-top: 130px;
        }

        .p-sm-r-130 {
            padding-right: 130px;
        }

        .p-sm-l-130 {
            padding-left: 130px;
        }

        .m-sm-b-130 {
            margin-bottom: 130px;
        }

        .m-sm-t-130 {
            margin-top: 130px;
        }

        .m-sm-r-130 {
            margin-right: 130px;
        }

        .m-sm-l-130 {
            margin-left: 130px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-130 {
            padding-bottom: 130px;
        }

        .p-xs-t-130 {
            padding-top: 130px;
        }

        .p-xs-r-130 {
            padding-right: 130px;
        }

        .p-xs-l-130 {
            padding-left: 130px;
        }

        .m-xs-b-130 {
            margin-bottom: 130px;
        }

        .m-xs-t-130 {
            margin-top: 130px;
        }

        .m-xs-r-130 {
            margin-right: 130px;
        }

        .m-xs-l-130 {
            margin-left: 130px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-135 {
            padding-bottom: 135px;
        }

        .p-lg-t-135 {
            padding-top: 135px;
        }

        .p-lg-r-135 {
            padding-right: 135px;
        }

        .p-lg-l-135 {
            padding-left: 135px;
        }

        .m-lg-b-135 {
            margin-bottom: 135px;
        }

        .m-lg-t-135 {
            margin-top: 135px;
        }

        .m-lg-r-135 {
            margin-right: 135px;
        }

        .m-lg-l-135 {
            margin-left: 135px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-135 {
            padding-bottom: 135px;
        }

        .p-md-t-135 {
            padding-top: 135px;
        }

        .p-md-r-135 {
            padding-right: 135px;
        }

        .p-md-l-135 {
            padding-left: 135px;
        }

        .m-md-b-135 {
            margin-bottom: 135px;
        }

        .m-md-t-135 {
            margin-top: 135px;
        }

        .m-md-r-135 {
            margin-right: 135px;
        }

        .m-md-l-135 {
            margin-left: 135px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-135 {
            padding-bottom: 135px;
        }

        .p-sm-t-135 {
            padding-top: 135px;
        }

        .p-sm-r-135 {
            padding-right: 135px;
        }

        .p-sm-l-135 {
            padding-left: 135px;
        }

        .m-sm-b-135 {
            margin-bottom: 135px;
        }

        .m-sm-t-135 {
            margin-top: 135px;
        }

        .m-sm-r-135 {
            margin-right: 135px;
        }

        .m-sm-l-135 {
            margin-left: 135px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-135 {
            padding-bottom: 135px;
        }

        .p-xs-t-135 {
            padding-top: 135px;
        }

        .p-xs-r-135 {
            padding-right: 135px;
        }

        .p-xs-l-135 {
            padding-left: 135px;
        }

        .m-xs-b-135 {
            margin-bottom: 135px;
        }

        .m-xs-t-135 {
            margin-top: 135px;
        }

        .m-xs-r-135 {
            margin-right: 135px;
        }

        .m-xs-l-135 {
            margin-left: 135px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-140 {
            padding-bottom: 140px;
        }

        .p-lg-t-140 {
            padding-top: 140px;
        }

        .p-lg-r-140 {
            padding-right: 140px;
        }

        .p-lg-l-140 {
            padding-left: 140px;
        }

        .m-lg-b-140 {
            margin-bottom: 140px;
        }

        .m-lg-t-140 {
            margin-top: 140px;
        }

        .m-lg-r-140 {
            margin-right: 140px;
        }

        .m-lg-l-140 {
            margin-left: 140px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-140 {
            padding-bottom: 140px;
        }

        .p-md-t-140 {
            padding-top: 140px;
        }

        .p-md-r-140 {
            padding-right: 140px;
        }

        .p-md-l-140 {
            padding-left: 140px;
        }

        .m-md-b-140 {
            margin-bottom: 140px;
        }

        .m-md-t-140 {
            margin-top: 140px;
        }

        .m-md-r-140 {
            margin-right: 140px;
        }

        .m-md-l-140 {
            margin-left: 140px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-140 {
            padding-bottom: 140px;
        }

        .p-sm-t-140 {
            padding-top: 140px;
        }

        .p-sm-r-140 {
            padding-right: 140px;
        }

        .p-sm-l-140 {
            padding-left: 140px;
        }

        .m-sm-b-140 {
            margin-bottom: 140px;
        }

        .m-sm-t-140 {
            margin-top: 140px;
        }

        .m-sm-r-140 {
            margin-right: 140px;
        }

        .m-sm-l-140 {
            margin-left: 140px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-140 {
            padding-bottom: 140px;
        }

        .p-xs-t-140 {
            padding-top: 140px;
        }

        .p-xs-r-140 {
            padding-right: 140px;
        }

        .p-xs-l-140 {
            padding-left: 140px;
        }

        .m-xs-b-140 {
            margin-bottom: 140px;
        }

        .m-xs-t-140 {
            margin-top: 140px;
        }

        .m-xs-r-140 {
            margin-right: 140px;
        }

        .m-xs-l-140 {
            margin-left: 140px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-145 {
            padding-bottom: 145px;
        }

        .p-lg-t-145 {
            padding-top: 145px;
        }

        .p-lg-r-145 {
            padding-right: 145px;
        }

        .p-lg-l-145 {
            padding-left: 145px;
        }

        .m-lg-b-145 {
            margin-bottom: 145px;
        }

        .m-lg-t-145 {
            margin-top: 145px;
        }

        .m-lg-r-145 {
            margin-right: 145px;
        }

        .m-lg-l-145 {
            margin-left: 145px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-145 {
            padding-bottom: 145px;
        }

        .p-md-t-145 {
            padding-top: 145px;
        }

        .p-md-r-145 {
            padding-right: 145px;
        }

        .p-md-l-145 {
            padding-left: 145px;
        }

        .m-md-b-145 {
            margin-bottom: 145px;
        }

        .m-md-t-145 {
            margin-top: 145px;
        }

        .m-md-r-145 {
            margin-right: 145px;
        }

        .m-md-l-145 {
            margin-left: 145px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-145 {
            padding-bottom: 145px;
        }

        .p-sm-t-145 {
            padding-top: 145px;
        }

        .p-sm-r-145 {
            padding-right: 145px;
        }

        .p-sm-l-145 {
            padding-left: 145px;
        }

        .m-sm-b-145 {
            margin-bottom: 145px;
        }

        .m-sm-t-145 {
            margin-top: 145px;
        }

        .m-sm-r-145 {
            margin-right: 145px;
        }

        .m-sm-l-145 {
            margin-left: 145px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-145 {
            padding-bottom: 145px;
        }

        .p-xs-t-145 {
            padding-top: 145px;
        }

        .p-xs-r-145 {
            padding-right: 145px;
        }

        .p-xs-l-145 {
            padding-left: 145px;
        }

        .m-xs-b-145 {
            margin-bottom: 145px;
        }

        .m-xs-t-145 {
            margin-top: 145px;
        }

        .m-xs-r-145 {
            margin-right: 145px;
        }

        .m-xs-l-145 {
            margin-left: 145px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-150 {
            padding-bottom: 150px;
        }

        .p-lg-t-150 {
            padding-top: 150px;
        }

        .p-lg-r-150 {
            padding-right: 150px;
        }

        .p-lg-l-150 {
            padding-left: 150px;
        }

        .m-lg-b-150 {
            margin-bottom: 150px;
        }

        .m-lg-t-150 {
            margin-top: 150px;
        }

        .m-lg-r-150 {
            margin-right: 150px;
        }

        .m-lg-l-150 {
            margin-left: 150px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-150 {
            padding-bottom: 150px;
        }

        .p-md-t-150 {
            padding-top: 150px;
        }

        .p-md-r-150 {
            padding-right: 150px;
        }

        .p-md-l-150 {
            padding-left: 150px;
        }

        .m-md-b-150 {
            margin-bottom: 150px;
        }

        .m-md-t-150 {
            margin-top: 150px;
        }

        .m-md-r-150 {
            margin-right: 150px;
        }

        .m-md-l-150 {
            margin-left: 150px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-150 {
            padding-bottom: 150px;
        }

        .p-sm-t-150 {
            padding-top: 150px;
        }

        .p-sm-r-150 {
            padding-right: 150px;
        }

        .p-sm-l-150 {
            padding-left: 150px;
        }

        .m-sm-b-150 {
            margin-bottom: 150px;
        }

        .m-sm-t-150 {
            margin-top: 150px;
        }

        .m-sm-r-150 {
            margin-right: 150px;
        }

        .m-sm-l-150 {
            margin-left: 150px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-150 {
            padding-bottom: 150px;
        }

        .p-xs-t-150 {
            padding-top: 150px;
        }

        .p-xs-r-150 {
            padding-right: 150px;
        }

        .p-xs-l-150 {
            padding-left: 150px;
        }

        .m-xs-b-150 {
            margin-bottom: 150px;
        }

        .m-xs-t-150 {
            margin-top: 150px;
        }

        .m-xs-r-150 {
            margin-right: 150px;
        }

        .m-xs-l-150 {
            margin-left: 150px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-155 {
            padding-bottom: 155px;
        }

        .p-lg-t-155 {
            padding-top: 155px;
        }

        .p-lg-r-155 {
            padding-right: 155px;
        }

        .p-lg-l-155 {
            padding-left: 155px;
        }

        .m-lg-b-155 {
            margin-bottom: 155px;
        }

        .m-lg-t-155 {
            margin-top: 155px;
        }

        .m-lg-r-155 {
            margin-right: 155px;
        }

        .m-lg-l-155 {
            margin-left: 155px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-155 {
            padding-bottom: 155px;
        }

        .p-md-t-155 {
            padding-top: 155px;
        }

        .p-md-r-155 {
            padding-right: 155px;
        }

        .p-md-l-155 {
            padding-left: 155px;
        }

        .m-md-b-155 {
            margin-bottom: 155px;
        }

        .m-md-t-155 {
            margin-top: 155px;
        }

        .m-md-r-155 {
            margin-right: 155px;
        }

        .m-md-l-155 {
            margin-left: 155px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-155 {
            padding-bottom: 155px;
        }

        .p-sm-t-155 {
            padding-top: 155px;
        }

        .p-sm-r-155 {
            padding-right: 155px;
        }

        .p-sm-l-155 {
            padding-left: 155px;
        }

        .m-sm-b-155 {
            margin-bottom: 155px;
        }

        .m-sm-t-155 {
            margin-top: 155px;
        }

        .m-sm-r-155 {
            margin-right: 155px;
        }

        .m-sm-l-155 {
            margin-left: 155px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-155 {
            padding-bottom: 155px;
        }

        .p-xs-t-155 {
            padding-top: 155px;
        }

        .p-xs-r-155 {
            padding-right: 155px;
        }

        .p-xs-l-155 {
            padding-left: 155px;
        }

        .m-xs-b-155 {
            margin-bottom: 155px;
        }

        .m-xs-t-155 {
            margin-top: 155px;
        }

        .m-xs-r-155 {
            margin-right: 155px;
        }

        .m-xs-l-155 {
            margin-left: 155px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-160 {
            padding-bottom: 160px;
        }

        .p-lg-t-160 {
            padding-top: 160px;
        }

        .p-lg-r-160 {
            padding-right: 160px;
        }

        .p-lg-l-160 {
            padding-left: 160px;
        }

        .m-lg-b-160 {
            margin-bottom: 160px;
        }

        .m-lg-t-160 {
            margin-top: 160px;
        }

        .m-lg-r-160 {
            margin-right: 160px;
        }

        .m-lg-l-160 {
            margin-left: 160px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-160 {
            padding-bottom: 160px;
        }

        .p-md-t-160 {
            padding-top: 160px;
        }

        .p-md-r-160 {
            padding-right: 160px;
        }

        .p-md-l-160 {
            padding-left: 160px;
        }

        .m-md-b-160 {
            margin-bottom: 160px;
        }

        .m-md-t-160 {
            margin-top: 160px;
        }

        .m-md-r-160 {
            margin-right: 160px;
        }

        .m-md-l-160 {
            margin-left: 160px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-160 {
            padding-bottom: 160px;
        }

        .p-sm-t-160 {
            padding-top: 160px;
        }

        .p-sm-r-160 {
            padding-right: 160px;
        }

        .p-sm-l-160 {
            padding-left: 160px;
        }

        .m-sm-b-160 {
            margin-bottom: 160px;
        }

        .m-sm-t-160 {
            margin-top: 160px;
        }

        .m-sm-r-160 {
            margin-right: 160px;
        }

        .m-sm-l-160 {
            margin-left: 160px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-160 {
            padding-bottom: 160px;
        }

        .p-xs-t-160 {
            padding-top: 160px;
        }

        .p-xs-r-160 {
            padding-right: 160px;
        }

        .p-xs-l-160 {
            padding-left: 160px;
        }

        .m-xs-b-160 {
            margin-bottom: 160px;
        }

        .m-xs-t-160 {
            margin-top: 160px;
        }

        .m-xs-r-160 {
            margin-right: 160px;
        }

        .m-xs-l-160 {
            margin-left: 160px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-165 {
            padding-bottom: 165px;
        }

        .p-lg-t-165 {
            padding-top: 165px;
        }

        .p-lg-r-165 {
            padding-right: 165px;
        }

        .p-lg-l-165 {
            padding-left: 165px;
        }

        .m-lg-b-165 {
            margin-bottom: 165px;
        }

        .m-lg-t-165 {
            margin-top: 165px;
        }

        .m-lg-r-165 {
            margin-right: 165px;
        }

        .m-lg-l-165 {
            margin-left: 165px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-165 {
            padding-bottom: 165px;
        }

        .p-md-t-165 {
            padding-top: 165px;
        }

        .p-md-r-165 {
            padding-right: 165px;
        }

        .p-md-l-165 {
            padding-left: 165px;
        }

        .m-md-b-165 {
            margin-bottom: 165px;
        }

        .m-md-t-165 {
            margin-top: 165px;
        }

        .m-md-r-165 {
            margin-right: 165px;
        }

        .m-md-l-165 {
            margin-left: 165px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-165 {
            padding-bottom: 165px;
        }

        .p-sm-t-165 {
            padding-top: 165px;
        }

        .p-sm-r-165 {
            padding-right: 165px;
        }

        .p-sm-l-165 {
            padding-left: 165px;
        }

        .m-sm-b-165 {
            margin-bottom: 165px;
        }

        .m-sm-t-165 {
            margin-top: 165px;
        }

        .m-sm-r-165 {
            margin-right: 165px;
        }

        .m-sm-l-165 {
            margin-left: 165px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-165 {
            padding-bottom: 165px;
        }

        .p-xs-t-165 {
            padding-top: 165px;
        }

        .p-xs-r-165 {
            padding-right: 165px;
        }

        .p-xs-l-165 {
            padding-left: 165px;
        }

        .m-xs-b-165 {
            margin-bottom: 165px;
        }

        .m-xs-t-165 {
            margin-top: 165px;
        }

        .m-xs-r-165 {
            margin-right: 165px;
        }

        .m-xs-l-165 {
            margin-left: 165px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-170 {
            padding-bottom: 170px;
        }

        .p-lg-t-170 {
            padding-top: 170px;
        }

        .p-lg-r-170 {
            padding-right: 170px;
        }

        .p-lg-l-170 {
            padding-left: 170px;
        }

        .m-lg-b-170 {
            margin-bottom: 170px;
        }

        .m-lg-t-170 {
            margin-top: 170px;
        }

        .m-lg-r-170 {
            margin-right: 170px;
        }

        .m-lg-l-170 {
            margin-left: 170px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-170 {
            padding-bottom: 170px;
        }

        .p-md-t-170 {
            padding-top: 170px;
        }

        .p-md-r-170 {
            padding-right: 170px;
        }

        .p-md-l-170 {
            padding-left: 170px;
        }

        .m-md-b-170 {
            margin-bottom: 170px;
        }

        .m-md-t-170 {
            margin-top: 170px;
        }

        .m-md-r-170 {
            margin-right: 170px;
        }

        .m-md-l-170 {
            margin-left: 170px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-170 {
            padding-bottom: 170px;
        }

        .p-sm-t-170 {
            padding-top: 170px;
        }

        .p-sm-r-170 {
            padding-right: 170px;
        }

        .p-sm-l-170 {
            padding-left: 170px;
        }

        .m-sm-b-170 {
            margin-bottom: 170px;
        }

        .m-sm-t-170 {
            margin-top: 170px;
        }

        .m-sm-r-170 {
            margin-right: 170px;
        }

        .m-sm-l-170 {
            margin-left: 170px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-170 {
            padding-bottom: 170px;
        }

        .p-xs-t-170 {
            padding-top: 170px;
        }

        .p-xs-r-170 {
            padding-right: 170px;
        }

        .p-xs-l-170 {
            padding-left: 170px;
        }

        .m-xs-b-170 {
            margin-bottom: 170px;
        }

        .m-xs-t-170 {
            margin-top: 170px;
        }

        .m-xs-r-170 {
            margin-right: 170px;
        }

        .m-xs-l-170 {
            margin-left: 170px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-175 {
            padding-bottom: 175px;
        }

        .p-lg-t-175 {
            padding-top: 175px;
        }

        .p-lg-r-175 {
            padding-right: 175px;
        }

        .p-lg-l-175 {
            padding-left: 175px;
        }

        .m-lg-b-175 {
            margin-bottom: 175px;
        }

        .m-lg-t-175 {
            margin-top: 175px;
        }

        .m-lg-r-175 {
            margin-right: 175px;
        }

        .m-lg-l-175 {
            margin-left: 175px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-175 {
            padding-bottom: 175px;
        }

        .p-md-t-175 {
            padding-top: 175px;
        }

        .p-md-r-175 {
            padding-right: 175px;
        }

        .p-md-l-175 {
            padding-left: 175px;
        }

        .m-md-b-175 {
            margin-bottom: 175px;
        }

        .m-md-t-175 {
            margin-top: 175px;
        }

        .m-md-r-175 {
            margin-right: 175px;
        }

        .m-md-l-175 {
            margin-left: 175px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-175 {
            padding-bottom: 175px;
        }

        .p-sm-t-175 {
            padding-top: 175px;
        }

        .p-sm-r-175 {
            padding-right: 175px;
        }

        .p-sm-l-175 {
            padding-left: 175px;
        }

        .m-sm-b-175 {
            margin-bottom: 175px;
        }

        .m-sm-t-175 {
            margin-top: 175px;
        }

        .m-sm-r-175 {
            margin-right: 175px;
        }

        .m-sm-l-175 {
            margin-left: 175px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-175 {
            padding-bottom: 175px;
        }

        .p-xs-t-175 {
            padding-top: 175px;
        }

        .p-xs-r-175 {
            padding-right: 175px;
        }

        .p-xs-l-175 {
            padding-left: 175px;
        }

        .m-xs-b-175 {
            margin-bottom: 175px;
        }

        .m-xs-t-175 {
            margin-top: 175px;
        }

        .m-xs-r-175 {
            margin-right: 175px;
        }

        .m-xs-l-175 {
            margin-left: 175px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-180 {
            padding-bottom: 180px;
        }

        .p-lg-t-180 {
            padding-top: 180px;
        }

        .p-lg-r-180 {
            padding-right: 180px;
        }

        .p-lg-l-180 {
            padding-left: 180px;
        }

        .m-lg-b-180 {
            margin-bottom: 180px;
        }

        .m-lg-t-180 {
            margin-top: 180px;
        }

        .m-lg-r-180 {
            margin-right: 180px;
        }

        .m-lg-l-180 {
            margin-left: 180px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-180 {
            padding-bottom: 180px;
        }

        .p-md-t-180 {
            padding-top: 180px;
        }

        .p-md-r-180 {
            padding-right: 180px;
        }

        .p-md-l-180 {
            padding-left: 180px;
        }

        .m-md-b-180 {
            margin-bottom: 180px;
        }

        .m-md-t-180 {
            margin-top: 180px;
        }

        .m-md-r-180 {
            margin-right: 180px;
        }

        .m-md-l-180 {
            margin-left: 180px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-180 {
            padding-bottom: 180px;
        }

        .p-sm-t-180 {
            padding-top: 180px;
        }

        .p-sm-r-180 {
            padding-right: 180px;
        }

        .p-sm-l-180 {
            padding-left: 180px;
        }

        .m-sm-b-180 {
            margin-bottom: 180px;
        }

        .m-sm-t-180 {
            margin-top: 180px;
        }

        .m-sm-r-180 {
            margin-right: 180px;
        }

        .m-sm-l-180 {
            margin-left: 180px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-180 {
            padding-bottom: 180px;
        }

        .p-xs-t-180 {
            padding-top: 180px;
        }

        .p-xs-r-180 {
            padding-right: 180px;
        }

        .p-xs-l-180 {
            padding-left: 180px;
        }

        .m-xs-b-180 {
            margin-bottom: 180px;
        }

        .m-xs-t-180 {
            margin-top: 180px;
        }

        .m-xs-r-180 {
            margin-right: 180px;
        }

        .m-xs-l-180 {
            margin-left: 180px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-185 {
            padding-bottom: 185px;
        }

        .p-lg-t-185 {
            padding-top: 185px;
        }

        .p-lg-r-185 {
            padding-right: 185px;
        }

        .p-lg-l-185 {
            padding-left: 185px;
        }

        .m-lg-b-185 {
            margin-bottom: 185px;
        }

        .m-lg-t-185 {
            margin-top: 185px;
        }

        .m-lg-r-185 {
            margin-right: 185px;
        }

        .m-lg-l-185 {
            margin-left: 185px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-185 {
            padding-bottom: 185px;
        }

        .p-md-t-185 {
            padding-top: 185px;
        }

        .p-md-r-185 {
            padding-right: 185px;
        }

        .p-md-l-185 {
            padding-left: 185px;
        }

        .m-md-b-185 {
            margin-bottom: 185px;
        }

        .m-md-t-185 {
            margin-top: 185px;
        }

        .m-md-r-185 {
            margin-right: 185px;
        }

        .m-md-l-185 {
            margin-left: 185px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-185 {
            padding-bottom: 185px;
        }

        .p-sm-t-185 {
            padding-top: 185px;
        }

        .p-sm-r-185 {
            padding-right: 185px;
        }

        .p-sm-l-185 {
            padding-left: 185px;
        }

        .m-sm-b-185 {
            margin-bottom: 185px;
        }

        .m-sm-t-185 {
            margin-top: 185px;
        }

        .m-sm-r-185 {
            margin-right: 185px;
        }

        .m-sm-l-185 {
            margin-left: 185px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-185 {
            padding-bottom: 185px;
        }

        .p-xs-t-185 {
            padding-top: 185px;
        }

        .p-xs-r-185 {
            padding-right: 185px;
        }

        .p-xs-l-185 {
            padding-left: 185px;
        }

        .m-xs-b-185 {
            margin-bottom: 185px;
        }

        .m-xs-t-185 {
            margin-top: 185px;
        }

        .m-xs-r-185 {
            margin-right: 185px;
        }

        .m-xs-l-185 {
            margin-left: 185px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-190 {
            padding-bottom: 190px;
        }

        .p-lg-t-190 {
            padding-top: 190px;
        }

        .p-lg-r-190 {
            padding-right: 190px;
        }

        .p-lg-l-190 {
            padding-left: 190px;
        }

        .m-lg-b-190 {
            margin-bottom: 190px;
        }

        .m-lg-t-190 {
            margin-top: 190px;
        }

        .m-lg-r-190 {
            margin-right: 190px;
        }

        .m-lg-l-190 {
            margin-left: 190px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-190 {
            padding-bottom: 190px;
        }

        .p-md-t-190 {
            padding-top: 190px;
        }

        .p-md-r-190 {
            padding-right: 190px;
        }

        .p-md-l-190 {
            padding-left: 190px;
        }

        .m-md-b-190 {
            margin-bottom: 190px;
        }

        .m-md-t-190 {
            margin-top: 190px;
        }

        .m-md-r-190 {
            margin-right: 190px;
        }

        .m-md-l-190 {
            margin-left: 190px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-190 {
            padding-bottom: 190px;
        }

        .p-sm-t-190 {
            padding-top: 190px;
        }

        .p-sm-r-190 {
            padding-right: 190px;
        }

        .p-sm-l-190 {
            padding-left: 190px;
        }

        .m-sm-b-190 {
            margin-bottom: 190px;
        }

        .m-sm-t-190 {
            margin-top: 190px;
        }

        .m-sm-r-190 {
            margin-right: 190px;
        }

        .m-sm-l-190 {
            margin-left: 190px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-190 {
            padding-bottom: 190px;
        }

        .p-xs-t-190 {
            padding-top: 190px;
        }

        .p-xs-r-190 {
            padding-right: 190px;
        }

        .p-xs-l-190 {
            padding-left: 190px;
        }

        .m-xs-b-190 {
            margin-bottom: 190px;
        }

        .m-xs-t-190 {
            margin-top: 190px;
        }

        .m-xs-r-190 {
            margin-right: 190px;
        }

        .m-xs-l-190 {
            margin-left: 190px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-195 {
            padding-bottom: 195px;
        }

        .p-lg-t-195 {
            padding-top: 195px;
        }

        .p-lg-r-195 {
            padding-right: 195px;
        }

        .p-lg-l-195 {
            padding-left: 195px;
        }

        .m-lg-b-195 {
            margin-bottom: 195px;
        }

        .m-lg-t-195 {
            margin-top: 195px;
        }

        .m-lg-r-195 {
            margin-right: 195px;
        }

        .m-lg-l-195 {
            margin-left: 195px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-195 {
            padding-bottom: 195px;
        }

        .p-md-t-195 {
            padding-top: 195px;
        }

        .p-md-r-195 {
            padding-right: 195px;
        }

        .p-md-l-195 {
            padding-left: 195px;
        }

        .m-md-b-195 {
            margin-bottom: 195px;
        }

        .m-md-t-195 {
            margin-top: 195px;
        }

        .m-md-r-195 {
            margin-right: 195px;
        }

        .m-md-l-195 {
            margin-left: 195px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-195 {
            padding-bottom: 195px;
        }

        .p-sm-t-195 {
            padding-top: 195px;
        }

        .p-sm-r-195 {
            padding-right: 195px;
        }

        .p-sm-l-195 {
            padding-left: 195px;
        }

        .m-sm-b-195 {
            margin-bottom: 195px;
        }

        .m-sm-t-195 {
            margin-top: 195px;
        }

        .m-sm-r-195 {
            margin-right: 195px;
        }

        .m-sm-l-195 {
            margin-left: 195px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-195 {
            padding-bottom: 195px;
        }

        .p-xs-t-195 {
            padding-top: 195px;
        }

        .p-xs-r-195 {
            padding-right: 195px;
        }

        .p-xs-l-195 {
            padding-left: 195px;
        }

        .m-xs-b-195 {
            margin-bottom: 195px;
        }

        .m-xs-t-195 {
            margin-top: 195px;
        }

        .m-xs-r-195 {
            margin-right: 195px;
        }

        .m-xs-l-195 {
            margin-left: 195px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-200 {
            padding-bottom: 200px;
        }

        .p-lg-t-200 {
            padding-top: 200px;
        }

        .p-lg-r-200 {
            padding-right: 200px;
        }

        .p-lg-l-200 {
            padding-left: 200px;
        }

        .m-lg-b-200 {
            margin-bottom: 200px;
        }

        .m-lg-t-200 {
            margin-top: 200px;
        }

        .m-lg-r-200 {
            margin-right: 200px;
        }

        .m-lg-l-200 {
            margin-left: 200px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-200 {
            padding-bottom: 200px;
        }

        .p-md-t-200 {
            padding-top: 200px;
        }

        .p-md-r-200 {
            padding-right: 200px;
        }

        .p-md-l-200 {
            padding-left: 200px;
        }

        .m-md-b-200 {
            margin-bottom: 200px;
        }

        .m-md-t-200 {
            margin-top: 200px;
        }

        .m-md-r-200 {
            margin-right: 200px;
        }

        .m-md-l-200 {
            margin-left: 200px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-200 {
            padding-bottom: 200px;
        }

        .p-sm-t-200 {
            padding-top: 200px;
        }

        .p-sm-r-200 {
            padding-right: 200px;
        }

        .p-sm-l-200 {
            padding-left: 200px;
        }

        .m-sm-b-200 {
            margin-bottom: 200px;
        }

        .m-sm-t-200 {
            margin-top: 200px;
        }

        .m-sm-r-200 {
            margin-right: 200px;
        }

        .m-sm-l-200 {
            margin-left: 200px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-200 {
            padding-bottom: 200px;
        }

        .p-xs-t-200 {
            padding-top: 200px;
        }

        .p-xs-r-200 {
            padding-right: 200px;
        }

        .p-xs-l-200 {
            padding-left: 200px;
        }

        .m-xs-b-200 {
            margin-bottom: 200px;
        }

        .m-xs-t-200 {
            margin-top: 200px;
        }

        .m-xs-r-200 {
            margin-right: 200px;
        }

        .m-xs-l-200 {
            margin-left: 200px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-205 {
            padding-bottom: 205px;
        }

        .p-lg-t-205 {
            padding-top: 205px;
        }

        .p-lg-r-205 {
            padding-right: 205px;
        }

        .p-lg-l-205 {
            padding-left: 205px;
        }

        .m-lg-b-205 {
            margin-bottom: 205px;
        }

        .m-lg-t-205 {
            margin-top: 205px;
        }

        .m-lg-r-205 {
            margin-right: 205px;
        }

        .m-lg-l-205 {
            margin-left: 205px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-205 {
            padding-bottom: 205px;
        }

        .p-md-t-205 {
            padding-top: 205px;
        }

        .p-md-r-205 {
            padding-right: 205px;
        }

        .p-md-l-205 {
            padding-left: 205px;
        }

        .m-md-b-205 {
            margin-bottom: 205px;
        }

        .m-md-t-205 {
            margin-top: 205px;
        }

        .m-md-r-205 {
            margin-right: 205px;
        }

        .m-md-l-205 {
            margin-left: 205px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-205 {
            padding-bottom: 205px;
        }

        .p-sm-t-205 {
            padding-top: 205px;
        }

        .p-sm-r-205 {
            padding-right: 205px;
        }

        .p-sm-l-205 {
            padding-left: 205px;
        }

        .m-sm-b-205 {
            margin-bottom: 205px;
        }

        .m-sm-t-205 {
            margin-top: 205px;
        }

        .m-sm-r-205 {
            margin-right: 205px;
        }

        .m-sm-l-205 {
            margin-left: 205px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-205 {
            padding-bottom: 205px;
        }

        .p-xs-t-205 {
            padding-top: 205px;
        }

        .p-xs-r-205 {
            padding-right: 205px;
        }

        .p-xs-l-205 {
            padding-left: 205px;
        }

        .m-xs-b-205 {
            margin-bottom: 205px;
        }

        .m-xs-t-205 {
            margin-top: 205px;
        }

        .m-xs-r-205 {
            margin-right: 205px;
        }

        .m-xs-l-205 {
            margin-left: 205px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-210 {
            padding-bottom: 210px;
        }

        .p-lg-t-210 {
            padding-top: 210px;
        }

        .p-lg-r-210 {
            padding-right: 210px;
        }

        .p-lg-l-210 {
            padding-left: 210px;
        }

        .m-lg-b-210 {
            margin-bottom: 210px;
        }

        .m-lg-t-210 {
            margin-top: 210px;
        }

        .m-lg-r-210 {
            margin-right: 210px;
        }

        .m-lg-l-210 {
            margin-left: 210px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-210 {
            padding-bottom: 210px;
        }

        .p-md-t-210 {
            padding-top: 210px;
        }

        .p-md-r-210 {
            padding-right: 210px;
        }

        .p-md-l-210 {
            padding-left: 210px;
        }

        .m-md-b-210 {
            margin-bottom: 210px;
        }

        .m-md-t-210 {
            margin-top: 210px;
        }

        .m-md-r-210 {
            margin-right: 210px;
        }

        .m-md-l-210 {
            margin-left: 210px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-210 {
            padding-bottom: 210px;
        }

        .p-sm-t-210 {
            padding-top: 210px;
        }

        .p-sm-r-210 {
            padding-right: 210px;
        }

        .p-sm-l-210 {
            padding-left: 210px;
        }

        .m-sm-b-210 {
            margin-bottom: 210px;
        }

        .m-sm-t-210 {
            margin-top: 210px;
        }

        .m-sm-r-210 {
            margin-right: 210px;
        }

        .m-sm-l-210 {
            margin-left: 210px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-210 {
            padding-bottom: 210px;
        }

        .p-xs-t-210 {
            padding-top: 210px;
        }

        .p-xs-r-210 {
            padding-right: 210px;
        }

        .p-xs-l-210 {
            padding-left: 210px;
        }

        .m-xs-b-210 {
            margin-bottom: 210px;
        }

        .m-xs-t-210 {
            margin-top: 210px;
        }

        .m-xs-r-210 {
            margin-right: 210px;
        }

        .m-xs-l-210 {
            margin-left: 210px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-215 {
            padding-bottom: 215px;
        }

        .p-lg-t-215 {
            padding-top: 215px;
        }

        .p-lg-r-215 {
            padding-right: 215px;
        }

        .p-lg-l-215 {
            padding-left: 215px;
        }

        .m-lg-b-215 {
            margin-bottom: 215px;
        }

        .m-lg-t-215 {
            margin-top: 215px;
        }

        .m-lg-r-215 {
            margin-right: 215px;
        }

        .m-lg-l-215 {
            margin-left: 215px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-215 {
            padding-bottom: 215px;
        }

        .p-md-t-215 {
            padding-top: 215px;
        }

        .p-md-r-215 {
            padding-right: 215px;
        }

        .p-md-l-215 {
            padding-left: 215px;
        }

        .m-md-b-215 {
            margin-bottom: 215px;
        }

        .m-md-t-215 {
            margin-top: 215px;
        }

        .m-md-r-215 {
            margin-right: 215px;
        }

        .m-md-l-215 {
            margin-left: 215px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-215 {
            padding-bottom: 215px;
        }

        .p-sm-t-215 {
            padding-top: 215px;
        }

        .p-sm-r-215 {
            padding-right: 215px;
        }

        .p-sm-l-215 {
            padding-left: 215px;
        }

        .m-sm-b-215 {
            margin-bottom: 215px;
        }

        .m-sm-t-215 {
            margin-top: 215px;
        }

        .m-sm-r-215 {
            margin-right: 215px;
        }

        .m-sm-l-215 {
            margin-left: 215px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-215 {
            padding-bottom: 215px;
        }

        .p-xs-t-215 {
            padding-top: 215px;
        }

        .p-xs-r-215 {
            padding-right: 215px;
        }

        .p-xs-l-215 {
            padding-left: 215px;
        }

        .m-xs-b-215 {
            margin-bottom: 215px;
        }

        .m-xs-t-215 {
            margin-top: 215px;
        }

        .m-xs-r-215 {
            margin-right: 215px;
        }

        .m-xs-l-215 {
            margin-left: 215px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-220 {
            padding-bottom: 220px;
        }

        .p-lg-t-220 {
            padding-top: 220px;
        }

        .p-lg-r-220 {
            padding-right: 220px;
        }

        .p-lg-l-220 {
            padding-left: 220px;
        }

        .m-lg-b-220 {
            margin-bottom: 220px;
        }

        .m-lg-t-220 {
            margin-top: 220px;
        }

        .m-lg-r-220 {
            margin-right: 220px;
        }

        .m-lg-l-220 {
            margin-left: 220px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-220 {
            padding-bottom: 220px;
        }

        .p-md-t-220 {
            padding-top: 220px;
        }

        .p-md-r-220 {
            padding-right: 220px;
        }

        .p-md-l-220 {
            padding-left: 220px;
        }

        .m-md-b-220 {
            margin-bottom: 220px;
        }

        .m-md-t-220 {
            margin-top: 220px;
        }

        .m-md-r-220 {
            margin-right: 220px;
        }

        .m-md-l-220 {
            margin-left: 220px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-220 {
            padding-bottom: 220px;
        }

        .p-sm-t-220 {
            padding-top: 220px;
        }

        .p-sm-r-220 {
            padding-right: 220px;
        }

        .p-sm-l-220 {
            padding-left: 220px;
        }

        .m-sm-b-220 {
            margin-bottom: 220px;
        }

        .m-sm-t-220 {
            margin-top: 220px;
        }

        .m-sm-r-220 {
            margin-right: 220px;
        }

        .m-sm-l-220 {
            margin-left: 220px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-220 {
            padding-bottom: 220px;
        }

        .p-xs-t-220 {
            padding-top: 220px;
        }

        .p-xs-r-220 {
            padding-right: 220px;
        }

        .p-xs-l-220 {
            padding-left: 220px;
        }

        .m-xs-b-220 {
            margin-bottom: 220px;
        }

        .m-xs-t-220 {
            margin-top: 220px;
        }

        .m-xs-r-220 {
            margin-right: 220px;
        }

        .m-xs-l-220 {
            margin-left: 220px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-225 {
            padding-bottom: 225px;
        }

        .p-lg-t-225 {
            padding-top: 225px;
        }

        .p-lg-r-225 {
            padding-right: 225px;
        }

        .p-lg-l-225 {
            padding-left: 225px;
        }

        .m-lg-b-225 {
            margin-bottom: 225px;
        }

        .m-lg-t-225 {
            margin-top: 225px;
        }

        .m-lg-r-225 {
            margin-right: 225px;
        }

        .m-lg-l-225 {
            margin-left: 225px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-225 {
            padding-bottom: 225px;
        }

        .p-md-t-225 {
            padding-top: 225px;
        }

        .p-md-r-225 {
            padding-right: 225px;
        }

        .p-md-l-225 {
            padding-left: 225px;
        }

        .m-md-b-225 {
            margin-bottom: 225px;
        }

        .m-md-t-225 {
            margin-top: 225px;
        }

        .m-md-r-225 {
            margin-right: 225px;
        }

        .m-md-l-225 {
            margin-left: 225px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-225 {
            padding-bottom: 225px;
        }

        .p-sm-t-225 {
            padding-top: 225px;
        }

        .p-sm-r-225 {
            padding-right: 225px;
        }

        .p-sm-l-225 {
            padding-left: 225px;
        }

        .m-sm-b-225 {
            margin-bottom: 225px;
        }

        .m-sm-t-225 {
            margin-top: 225px;
        }

        .m-sm-r-225 {
            margin-right: 225px;
        }

        .m-sm-l-225 {
            margin-left: 225px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-225 {
            padding-bottom: 225px;
        }

        .p-xs-t-225 {
            padding-top: 225px;
        }

        .p-xs-r-225 {
            padding-right: 225px;
        }

        .p-xs-l-225 {
            padding-left: 225px;
        }

        .m-xs-b-225 {
            margin-bottom: 225px;
        }

        .m-xs-t-225 {
            margin-top: 225px;
        }

        .m-xs-r-225 {
            margin-right: 225px;
        }

        .m-xs-l-225 {
            margin-left: 225px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-230 {
            padding-bottom: 230px;
        }

        .p-lg-t-230 {
            padding-top: 230px;
        }

        .p-lg-r-230 {
            padding-right: 230px;
        }

        .p-lg-l-230 {
            padding-left: 230px;
        }

        .m-lg-b-230 {
            margin-bottom: 230px;
        }

        .m-lg-t-230 {
            margin-top: 230px;
        }

        .m-lg-r-230 {
            margin-right: 230px;
        }

        .m-lg-l-230 {
            margin-left: 230px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-230 {
            padding-bottom: 230px;
        }

        .p-md-t-230 {
            padding-top: 230px;
        }

        .p-md-r-230 {
            padding-right: 230px;
        }

        .p-md-l-230 {
            padding-left: 230px;
        }

        .m-md-b-230 {
            margin-bottom: 230px;
        }

        .m-md-t-230 {
            margin-top: 230px;
        }

        .m-md-r-230 {
            margin-right: 230px;
        }

        .m-md-l-230 {
            margin-left: 230px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-230 {
            padding-bottom: 230px;
        }

        .p-sm-t-230 {
            padding-top: 230px;
        }

        .p-sm-r-230 {
            padding-right: 230px;
        }

        .p-sm-l-230 {
            padding-left: 230px;
        }

        .m-sm-b-230 {
            margin-bottom: 230px;
        }

        .m-sm-t-230 {
            margin-top: 230px;
        }

        .m-sm-r-230 {
            margin-right: 230px;
        }

        .m-sm-l-230 {
            margin-left: 230px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-230 {
            padding-bottom: 230px;
        }

        .p-xs-t-230 {
            padding-top: 230px;
        }

        .p-xs-r-230 {
            padding-right: 230px;
        }

        .p-xs-l-230 {
            padding-left: 230px;
        }

        .m-xs-b-230 {
            margin-bottom: 230px;
        }

        .m-xs-t-230 {
            margin-top: 230px;
        }

        .m-xs-r-230 {
            margin-right: 230px;
        }

        .m-xs-l-230 {
            margin-left: 230px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-235 {
            padding-bottom: 235px;
        }

        .p-lg-t-235 {
            padding-top: 235px;
        }

        .p-lg-r-235 {
            padding-right: 235px;
        }

        .p-lg-l-235 {
            padding-left: 235px;
        }

        .m-lg-b-235 {
            margin-bottom: 235px;
        }

        .m-lg-t-235 {
            margin-top: 235px;
        }

        .m-lg-r-235 {
            margin-right: 235px;
        }

        .m-lg-l-235 {
            margin-left: 235px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-235 {
            padding-bottom: 235px;
        }

        .p-md-t-235 {
            padding-top: 235px;
        }

        .p-md-r-235 {
            padding-right: 235px;
        }

        .p-md-l-235 {
            padding-left: 235px;
        }

        .m-md-b-235 {
            margin-bottom: 235px;
        }

        .m-md-t-235 {
            margin-top: 235px;
        }

        .m-md-r-235 {
            margin-right: 235px;
        }

        .m-md-l-235 {
            margin-left: 235px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-235 {
            padding-bottom: 235px;
        }

        .p-sm-t-235 {
            padding-top: 235px;
        }

        .p-sm-r-235 {
            padding-right: 235px;
        }

        .p-sm-l-235 {
            padding-left: 235px;
        }

        .m-sm-b-235 {
            margin-bottom: 235px;
        }

        .m-sm-t-235 {
            margin-top: 235px;
        }

        .m-sm-r-235 {
            margin-right: 235px;
        }

        .m-sm-l-235 {
            margin-left: 235px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-235 {
            padding-bottom: 235px;
        }

        .p-xs-t-235 {
            padding-top: 235px;
        }

        .p-xs-r-235 {
            padding-right: 235px;
        }

        .p-xs-l-235 {
            padding-left: 235px;
        }

        .m-xs-b-235 {
            margin-bottom: 235px;
        }

        .m-xs-t-235 {
            margin-top: 235px;
        }

        .m-xs-r-235 {
            margin-right: 235px;
        }

        .m-xs-l-235 {
            margin-left: 235px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-240 {
            padding-bottom: 240px;
        }

        .p-lg-t-240 {
            padding-top: 240px;
        }

        .p-lg-r-240 {
            padding-right: 240px;
        }

        .p-lg-l-240 {
            padding-left: 240px;
        }

        .m-lg-b-240 {
            margin-bottom: 240px;
        }

        .m-lg-t-240 {
            margin-top: 240px;
        }

        .m-lg-r-240 {
            margin-right: 240px;
        }

        .m-lg-l-240 {
            margin-left: 240px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-240 {
            padding-bottom: 240px;
        }

        .p-md-t-240 {
            padding-top: 240px;
        }

        .p-md-r-240 {
            padding-right: 240px;
        }

        .p-md-l-240 {
            padding-left: 240px;
        }

        .m-md-b-240 {
            margin-bottom: 240px;
        }

        .m-md-t-240 {
            margin-top: 240px;
        }

        .m-md-r-240 {
            margin-right: 240px;
        }

        .m-md-l-240 {
            margin-left: 240px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-240 {
            padding-bottom: 240px;
        }

        .p-sm-t-240 {
            padding-top: 240px;
        }

        .p-sm-r-240 {
            padding-right: 240px;
        }

        .p-sm-l-240 {
            padding-left: 240px;
        }

        .m-sm-b-240 {
            margin-bottom: 240px;
        }

        .m-sm-t-240 {
            margin-top: 240px;
        }

        .m-sm-r-240 {
            margin-right: 240px;
        }

        .m-sm-l-240 {
            margin-left: 240px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-240 {
            padding-bottom: 240px;
        }

        .p-xs-t-240 {
            padding-top: 240px;
        }

        .p-xs-r-240 {
            padding-right: 240px;
        }

        .p-xs-l-240 {
            padding-left: 240px;
        }

        .m-xs-b-240 {
            margin-bottom: 240px;
        }

        .m-xs-t-240 {
            margin-top: 240px;
        }

        .m-xs-r-240 {
            margin-right: 240px;
        }

        .m-xs-l-240 {
            margin-left: 240px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-245 {
            padding-bottom: 245px;
        }

        .p-lg-t-245 {
            padding-top: 245px;
        }

        .p-lg-r-245 {
            padding-right: 245px;
        }

        .p-lg-l-245 {
            padding-left: 245px;
        }

        .m-lg-b-245 {
            margin-bottom: 245px;
        }

        .m-lg-t-245 {
            margin-top: 245px;
        }

        .m-lg-r-245 {
            margin-right: 245px;
        }

        .m-lg-l-245 {
            margin-left: 245px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-245 {
            padding-bottom: 245px;
        }

        .p-md-t-245 {
            padding-top: 245px;
        }

        .p-md-r-245 {
            padding-right: 245px;
        }

        .p-md-l-245 {
            padding-left: 245px;
        }

        .m-md-b-245 {
            margin-bottom: 245px;
        }

        .m-md-t-245 {
            margin-top: 245px;
        }

        .m-md-r-245 {
            margin-right: 245px;
        }

        .m-md-l-245 {
            margin-left: 245px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-245 {
            padding-bottom: 245px;
        }

        .p-sm-t-245 {
            padding-top: 245px;
        }

        .p-sm-r-245 {
            padding-right: 245px;
        }

        .p-sm-l-245 {
            padding-left: 245px;
        }

        .m-sm-b-245 {
            margin-bottom: 245px;
        }

        .m-sm-t-245 {
            margin-top: 245px;
        }

        .m-sm-r-245 {
            margin-right: 245px;
        }

        .m-sm-l-245 {
            margin-left: 245px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-245 {
            padding-bottom: 245px;
        }

        .p-xs-t-245 {
            padding-top: 245px;
        }

        .p-xs-r-245 {
            padding-right: 245px;
        }

        .p-xs-l-245 {
            padding-left: 245px;
        }

        .m-xs-b-245 {
            margin-bottom: 245px;
        }

        .m-xs-t-245 {
            margin-top: 245px;
        }

        .m-xs-r-245 {
            margin-right: 245px;
        }

        .m-xs-l-245 {
            margin-left: 245px;
        }
    }

    @media (max-width: 1023px) {
        .p-lg-b-250 {
            padding-bottom: 250px;
        }

        .p-lg-t-250 {
            padding-top: 250px;
        }

        .p-lg-r-250 {
            padding-right: 250px;
        }

        .p-lg-l-250 {
            padding-left: 250px;
        }

        .m-lg-b-250 {
            margin-bottom: 250px;
        }

        .m-lg-t-250 {
            margin-top: 250px;
        }

        .m-lg-r-250 {
            margin-right: 250px;
        }

        .m-lg-l-250 {
            margin-left: 250px;
        }
    }

    @media (max-width: 991px) {
        .p-md-b-250 {
            padding-bottom: 250px;
        }

        .p-md-t-250 {
            padding-top: 250px;
        }

        .p-md-r-250 {
            padding-right: 250px;
        }

        .p-md-l-250 {
            padding-left: 250px;
        }

        .m-md-b-250 {
            margin-bottom: 250px;
        }

        .m-md-t-250 {
            margin-top: 250px;
        }

        .m-md-r-250 {
            margin-right: 250px;
        }

        .m-md-l-250 {
            margin-left: 250px;
        }
    }

    @media (max-width: 767px) {
        .p-sm-b-250 {
            padding-bottom: 250px;
        }

        .p-sm-t-250 {
            padding-top: 250px;
        }

        .p-sm-r-250 {
            padding-right: 250px;
        }

        .p-sm-l-250 {
            padding-left: 250px;
        }

        .m-sm-b-250 {
            margin-bottom: 250px;
        }

        .m-sm-t-250 {
            margin-top: 250px;
        }

        .m-sm-r-250 {
            margin-right: 250px;
        }

        .m-sm-l-250 {
            margin-left: 250px;
        }
    }

    @media (max-width: 575px) {
        .p-xs-b-250 {
            padding-bottom: 250px;
        }

        .p-xs-t-250 {
            padding-top: 250px;
        }

        .p-xs-r-250 {
            padding-right: 250px;
        }

        .p-xs-l-250 {
            padding-left: 250px;
        }

        .m-xs-b-250 {
            margin-bottom: 250px;
        }

        .m-xs-t-250 {
            margin-top: 250px;
        }

        .m-xs-r-250 {
            margin-right: 250px;
        }

        .m-xs-l-250 {
            margin-left: 250px;
        }
    }

    /* Background*/
    .bg-white {
        background: #fff;
    }

    .bg-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 0;
    }

    .bg-overlay--blue {
        background: rgba(49, 89, 253, 0.9);
    }

    .bg-c1 {
        background: #00ad5f;
    }

    .bg-c2 {
        background: #fa4251;
    }

    .bg-c3 {
        background: #ff8300;
    }

    .bg-flat-color-1 {
        background: #20a8d8;
    }

    .bg-flat-color-2 {
        background: #63c2de;
    }

    .bg-flat-color-3 {
        background: #ffc107;
    }

    .bg-flat-color-4 {
        background: #f86c6b;
    }

    .bg-flat-color-5 {
        background: #4dbd74;
    }

    /*Image*/
    .img-radius {
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        overflow: hidden;
    }

    .img-cir {
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        border-radius: 100%;
        overflow: hidden;
    }

    .img-40 {
        height: 40px;
        width: 40px;
    }

    .img-120 {
        width: 120px;
        height: 120px;
    }

    .vmap {
        width: 100%;
        height: 400px;
    }

    .vue-lists ul,
    .vue-lists ol {
        padding-left: 30px;
    }































    .background {
        color: <?php echo $theme_color; ?> !important;
    }
</style>
