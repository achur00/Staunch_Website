<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="software development, digital marketing, social media managements">
    <meta name="author" content="Saad Saheed | Staunch Technologies">
    <title>{{ config('app.name', 'Laravel') }} | All Subscription</title>

    <meta name="keywords" content="Staunch Technologies Website">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Staunch Technologies">
    <meta itemprop="description" content="Staunch Technologies">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon"
        href="https://testwebsite.staunchtechnologies.com/public/asset/content/images/all/07/staunch logo png.png"
        type="image/png">

    <style>
        body {
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        html {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 16px;
        }

        main>.container:first-child {
            margin-top: 7em !important;
            margin-bottom: 7em !important;
        }

        .container,
        .container-fluid {
            width: 100%;
            padding-left: 15px;
            padding-right: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .row {
            display: flex;
            width: 100%;
        }

        [class*="col-"] {
            padding: 15px;
            /* border: 2px solid #010145; */
        }

        .card .table {
            width: 100%;
        }

        .table,
        tr,
        td,
        th {
            border: 2px solid #C20A0A !important;
            border-collapse: collapse;
        }

        .card .table tbody td {
            font-size: 1.7rem;
            padding: 1.6rem 10px;
            font-weight: 500;
            line-height: 1.3;
            text-align: left !important;
        }

        .address h2 {
            font-size: 2.2rem;
            font-weight: 700;
            font-family: inherit;
        }

        .address {
            font-family: Open Sans, sans-serif;
        }

        address h3,
        address a {
            color: #404689;
            font-size: 1.8rem;
            font-weight: 600;
            font-family: inherit;
        }

        .table tfoot td,
        .table thead th {
            font-size: 1.6rem;
            font-weight: 700;
            padding: 2rem 10px;
        }

        .card-footer p {
            color: #4F81BD !important;
            font-weight: 400;
            font-size: 1.7rem;
        }

        .signature {
            width: 229px;
            border: 1px solid #C20A0A !important;
            height: 100px;
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center
        }

        .logo img {
            width: 75%;
        }

        .text-black,
        .text-red {
            font-weight: 600;
            font-size: 1.6rem;
        }

        .text-red {
            color: #FE0003 !important;

        }

        .b-text {
            font-weight: 900 !important;
        }

        .text-black {
            color: #000000;
        }

        span.b-text {
            font-size: 1.4rem;
            font-weight: 600 !important;
        }

        .sig-cont h5 {
            font-size: 1.8rem;
            font-weight: 300 !important;
        }

        .card-body {
            padding-left: 7% !important;
            padding-right: 7% !important;
            font-family: 'Times New Roman', Times, serif
        }

        .card-body [class*="col-"] {
            padding-left: 0;
            padding-right: 0;
        }

        h2,
        h3,
        h4,
        h5 {
            line-height: 1.2;
            margin: 5px 0;
        }

        .py-5 {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        .my-5 {
            margin-top: 4rem;
            margin-bottom: 4rem;
        }

        .table-responsive {
            overflow: auto;
            width: 100%;
        }

        .sub-info {
            font-size: 1.5rem;
        }

        .u-text {
            text-decoration: underline;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .pay {
            box-shadow: 0 0 2px 1px #DDA2A1;
            background: linear-gradient(to bottom, #ffffff, #ffffff, #E6BABA, #E6BABA);
            border: 1px solid #DDA2A1;
            padding: 15px;
            font-size: 2rem;
        }

        @media only screen and (max-width: 576px) {
            [class*="col-"] {
                width: 100%;
            }

            .row {
                flex-flow: column;
            }

            html {
                font-size: 8px;
            }

            [class*="col"] {
                margin-bottom: 1.5rem;
            }

            .parent,
            .card-body [class*="col-"] {
                padding-left: 0;
                padding-right: 0;
            }

            .signature {
                width: 100%;
            }

            .company {
                border-bottom: 2px solid #DDA2A1
            }
        }

        @media only screen and (max-width: 400px) {
            html {
                font-size: 6px;
            }

            .company {
                border-bottom: 2px solid #DDA2A1;
            }



        }

        /*mobile*/
        @media only screen and (min-width: 576px) {
            .col-sm-1 {
                width: 8.33%;
            }

            .col-sm-2 {
                width: 16.66%;
            }

            .col-sm-3 {
                width: 25%;
            }

            .col-sm-4 {
                width: 33.33%;
            }

            .col-sm-5 {
                width: 41.66%;
            }

            .col-sm-6 {
                width: 50%;
            }

            .col-sm-7 {
                width: 58.33%;
            }

            .col-sm-8 {
                width: 66.66%;
            }

            .col-sm-9 {
                width: 75%;
            }

            .col-sm-10 {
                width: 83.33%;
            }

            .col-sm-11 {
                width: 91.66%;
            }

            .col-sm-12 {
                width: 100%;
            }

            .container {
                max-width: 540px;
            }

            .row {
                flex-flow: column;
            }

            html {
                font-size: 10px;
            }

            .company {
                border-bottom: 2px solid #DDA2A1;
            }
        }

        /*tablet*/
        @media only screen and (min-width: 768px) {
            .col-md-1 {
                width: 8.33%;
            }

            .col-md-2 {
                width: 16.66%;
            }

            .col-md-3 {
                width: 25%;
            }

            .col-md-4 {
                width: 33.33%;
            }

            .col-md-5 {
                width: 41.66%;
            }

            .col-md-6 {
                width: 50%;
            }

            .col-md-7 {
                width: 58.33%;
            }

            .col-md-8 {
                width: 66.66%;
            }

            .col-md-9 {
                width: 75%;
            }

            .col-md-10 {
                width: 83.33%;
            }

            .col-md-11 {
                width: 91.66%;
            }

            .col-md-12 {
                width: 100%;
            }

            .container {
                max-width: 720px;
            }

            /* [class*="col"] {
                margin-bottom: 1.5rem;
            } */

            .company {
                border-bottom: none;
            }

            .row {
                flex-direction: row;
            }
        }

        /*desktop*/
        @media only screen and (min-width: 992px) {
            .col-lg-1 {
                width: 8.33%;
            }

            .col-lg-2 {
                width: 16.66%;
            }

            .col-lg-3 {
                width: 25%;
            }

            .col-lg-4 {
                width: 33.33%;
            }

            .col-lg-5 {
                width: 41.66%;
            }

            .col-lg-6 {
                width: 50%;
            }

            .col-lg-7 {
                width: 58.33%;
            }

            .col-lg-8 {
                width: 66.66%;
            }

            .col-lg-9 {
                width: 75%;
            }

            .col-lg-10 {
                width: 83.33%;
            }

            .col-lg-11 {
                width: 91.66%;
            }

            .col-lg-12 {
                width: 100%;
            }

            .container {
                max-width: 960px;
                margin-top: 130px;
            }

            .row {
                flex-direction: row;
            }

        }

        /*large desktop*/
        @media only screen and (min-width: 1200px) {
            .col-xl-1 {
                width: 8.33%;
            }

            .col-xl-2 {
                width: 16.66%;
            }

            .col-xl-3 {
                width: 25%;
            }

            .col-xl-4 {
                width: 33.33%;
            }

            .col-xl-5 {
                width: 41.66%;
            }

            .col-xl-6 {
                width: 50%;
            }

            .col-xl-7 {
                width: 58.33%;
            }

            .col-xl-8 {
                width: 66.66%;
            }

            .col-xl-9 {
                width: 75%;
            }

            .col-xl-10 {
                width: 83.33%;
            }

            .col-xl-11 {
                width: 91.66%;
            }

            .col-xl-12 {
                width: 100%;
            }

            .container {
                max-width: 1140px;
            }

            .row {
                flex-direction: row;
            }
        }
    </style>

</head>

<body>
    {{-- @section('content') --}}
    <!-- Main content -->
    <div class="main-content">
        {{-- <h2 class="p-3">INVOICE</h2> --}}
        <!-- Page content -->
        <div class="container-fluid mt-5">
            <!-- Table -->
            <div class="row" style="flex-direction: column !important;">
                {{-- <div class="col-"> --}}
                <div class="col-lg-11 col-md-11 col-sm-12 parent mx-auto">
                    <div class="card" style="border: 2px dashed #C20A0A !important;">
                        <!-- Card header -->
                        <div class="card-header" style="border-bottom: 2px dashed #C20A0A !important;">
                            <div class="row">
                                <div class="col-md-6 logo">
                                    <img src="https://testwebsite.staunchtechnologies.com/public/asset/content/images/all/07/staunch logo png.png"
                                        class="navbar-brand-img" alt="...">
                                </div>

                                <div class="col-md-6 address">
                                    <h2 class="" style="color: #C20A0A;">STAUNCH TECHNOLOGIES LIMITED</h2>
                                    <address>
                                        <h3 class="">22B, Babatunde Anjous Drive.</h3>
                                        <h3 class="">Lekki Phase 1, Lagos.</h3>
                                        <h3 class="">Tel. 08060509183</h3>
                                        <h3 class="">WEBSITE: <a href="https://staunchtechnologies.com"
                                                class="text-underline"> www.staunchtechnologies.com</a></h3>
                                        <h3 class="">Email: <a href="mailto:info@staunchtechnologies.com"
                                                class="text-underline">info@staunchtechnologies.com</a></h3>
                                    </address>
                                </div>
                            </div>
                        </div>
                        @if ( $subscription)

                        <div class="card-body py-5">
                            <div class="row sub-info">
                                <div class="col-md-6 d-flex align-items-center company">
                                    <div class="">
                                        <h4 class="small font-weight-bold " style="color: #C20A0A;">
                                            {{ $subscription->user->company_name}}</h4>
                                        <h3 class="small font-weight-bold lg-w-25" style="color: #010145;">
                                            {{ $subscription->user->company_address }}</h3>
                                        <h3 class="small font-weight-bold text-underline " style="color: #010145;">
                                            ATTENTION: Mr/Mrs
                                            {{ ucwords($subscription->user->name) }}</h3>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <h2 class="small font-weight-bold" style="color: #C20A0A;">INVOICE:
                                            IVN{{ sprintf("%'05d",$subscription->id)}}{{ date('mY') }}</h2>
                                        <h3 class="small font-weight-bold" style="color: #010145;">TIN:
                                            {{ $subscription->payment_ref }}</h3>
                                        <h3 class="small font-weight-bold" style="color: #010145;">DATE:
                                            {{ date('d F, Y') }}</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="table-responsive my-5">{{-- pl-3 --}}
                                    <table class="table">
                                        <thead class="thead">
                                            <th nowrap>SERVICE NAME</th>
                                            <th nowrap>SERVICE DESCRIPTION</th>
                                            <th nowrap>DURATION</th>
                                            <th nowrap>AMOUNT (₦)</th>
                                        </thead>
                                        <?php
                                        $total = 0;
                                        ?>
                                        <tbody>
                                            {{-- @foreach ((array) $subscription as $sub) --}}


                                            <tr style="background-color: #EFD3D2; color: #010145">
                                                <td class="text-wrap">
                                                    {{ $subscription->service->name}}</td>
                                                <td class="text-wrap">
                                                    {{ $subscription->service->description}}</td>
                                                <td class="text-wrap" align="center">
                                                    {{ $subscription->start->format('F d Y') }} -
                                                    {{ $subscription->due->format('F d Y') }}</td>
                                                <td class="text-wrap">
                                                    ₦{{number_format($subscription->paid, 2, ".", ",")}}</td>
                                            </tr>

                                            <?php
                                        $total += $subscription->pricing->amount;
                                        ?>
                                            {{-- @endforeach --}}
                                        </tbody>
                                        <tfoot>
                                            <tr style="color: #010145">
                                                <td>Total</td>
                                                <td></td>
                                                <td></td>
                                                <td>₦{{number_format($total, 2, ".", ",")}}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="row d-flex justify-content-between">
                                <div class="col-md-6 sig-cont">
                                    <h5>Payment terms: <span class="b-text">100% on approval.</span></h5>
                                    <div class="signature">

                                    </div>
                                    <h3>AUTHORISED SIGNATORY</h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="pay p-3">
                                        <p class="text-black">Please make cheque payable to </p>
                                        <h3 class="text-red u-text">STAUNCH TECHNOLOGIES LIMITED</h3>
                                        <p>Or Pay into</p>
                                        <div>
                                            <h3 class="text-red">STAUNCH TECHNOLOGIES LIMITED</h3>
                                            <h3 class="text-red">Account Number: 2015912994. FBN</h3>
                                            <h3 class="text-red">Account Number: 0010911281. GTB</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="card-footer" style="text-align: center;">
                            <p>Domain Registration | Web Hosting | Dedicated Server Hosting | Web Development
                            </p>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>

</body>