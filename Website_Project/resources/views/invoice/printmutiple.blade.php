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
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('css/argon.min5438.css?v=1.2.0')}}" type="text/css">

    <!-- Page plugins -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <style>
        main>.container:first-child {
            margin-top: 7em !important;
            margin-bottom: 7em !important;
        }

        html {
            font-size: 14px;
        }

        * {
            box-sizing: border-box;
        }

        .table,
        tr,
        td,
        th {
            border: 2px solid #C20A0A;
        }

        .card .table tbody td {
            font-size: 1rem;
            padding: 0.6rem;
            font-weight: 500;
            text-align: left !important;
        }

        .card .table tfoot td {
            padding: 0.6rem;
        }

        .table tfoot td,
        .table thead th {
            font-size: 1rem;
            font-weight: 700;
        }

        .card-footer p {
            color: #4F81BD !important;
            font-weight: 500;
        }

        .signature {
            width: 229px;
            border: 1px solid #C20A0A !important;
            height: 100px;
        }

        .text-black,
        .text-red {
            font-weight: 600;
            font-size: 1rem;
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
            font-size: 1rem;
        }

        .table tbody td p {
            /* width: 100%; */
            /* word-break:break-all; */
            /* word-wrap: break-word !important; */
            /* white-space: normal !important; */
            /* display: inline; */
        }

        .card-body {
            padding-left: 7% !important;
            padding-right: 7% !important;
            font-family: 'Times New Roman', Times, serif
        }

        h2,
        h3,
        h4 {
            line-height: 1.5rem;
            margin: 0;
        }

        .sub-info {
            font-size: 1.5rem;
        }

        .u-text {
            text-decoration: underline;
        }

        .pay {
            box-shadow: 0 0 2px 1px #DDA2A1;
            background: linear-gradient(to bottom, #ffffff, #ffffff, #E6BABA, #E6BABA);
            border: 1px solid #DDA2A1;
        }

        @media screen and (max-width: 767px) {
            [class*="col"] {
                margin-bottom: 1.5rem;
            }


            /* .sig-cont{
                margin-bottom: 
            } */
        }
    </style>

</head>

<body>

    <script>
        window.print();
    </script>
    {{-- @section('content') --}}
    <!-- Main content -->
    <div class="main-content">
        {{-- <h2 class="p-3">INVOICE</h2> --}}
        <!-- Page content -->
        <div class="container-fluid mt-5">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="col-lg-11 col-md-11 mx-auto">
                        <div class="card" style="border: 2px dashed #C20A0A !important;">
                            <!-- Card header -->
                            <div class="card-header" style="border-bottom: 2px dashed #C20A0A !important;">
                                <div class="row">
                                    <div class="col-md-6 logo d-flex justify-content-center">
                                        <img src="https://testwebsite.staunchtechnologies.com/public/asset/content/images/all/07/staunch logo png.png"
                                            class="navbar-brand-img w-75 align-self-center" alt="...">
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

                            @if ( $subscriptions)
                            <div class="card-body py-5 overflow-hidden">
                                <div class="row sub-info">
                                    <div class="col-md-6 d-flex align-items-center">
                                        <div>
                                            <h4 class="small font-weight-bold " style="color: #C20A0A;">
                                                {{ $subscriptions[0]->user->company_name}}</h4>
                                            <h3 class="small font-weight-bold lg-w-25" style="color: #010145;">
                                                {{ $subscriptions[0]->user->company_address }}</h3>
                                            <h3 class="small font-weight-bold text-underline " style="color: #010145;">
                                                ATTENTION: Mr/Mrs
                                                {{ ucwords($subscriptions[0]->user->name) }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <h2 class="small font-weight-bold" style="color: #C20A0A;">INVOICE:
                                                IVN{{ sprintf("%'05d",$subscriptions[0]->id)}}{{ date('mY') }}</h2>
                                            <h3 class="small font-weight-bold" style="color: #010145;">TIN:
                                                {{ $subscriptions[0]->payment_ref }}</h3>
                                            <h3 class="small font-weight-bold" style="color: #010145;">DATE:
                                                {{ date('d F, Y') }}</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 table-responsive py-5">
                                        <table class="table"> {{--table --}}
                                            <thead class="thead">{{--thead --}}
                                                <tr>
                                                    <th scope="col" style="width: 15% !important;" class=""
                                                        align="center">SERVICE NAME
                                                    </th>
                                                    <th scope="col" style="width: 40% !important;" class=""
                                                        align="center">SERVICE
                                                        DESCRIPTION
                                                    </th>
                                                    <th scope="col" style="width: 25% !important;" class=""
                                                        align="center">DURATION
                                                    </th>
                                                    <th scope="col" style="width: 20% !important;" class=""
                                                        align="center">AMOUNT (₦)
                                                    </th>
                                                </tr>
                                            </thead>
                                            <?php
                                        $total = 0;
                                        ?>
                                            <tbody class="">
                                                @foreach ($subscriptions as $subscription)


                                                <tr scope="row" class=""
                                                    style="background-color: #EFD3D2; color: #010145">
                                                    <td class="text-wrap">
                                                        {{ $subscription->service->name}}</td>
                                                    <td class="text-wrap">
                                                        {{ preg_replace("/&#?[a-z0-9]+;/i", " ", strip_tags($subscription->service->description)) }}
                                                    </td>
                                                    <td class="text-wrap" align="center">
                                                        {{ $subscription->start->format('F d Y') }} -
                                                        {{ $subscription->due->format('F d Y') }}</td>
                                                    <td class="text-wrap">
                                                        ₦{{number_format($subscription->paid, 2, ".", ",")}}</td>
                                                </tr>

                                                <?php
                                        $total += $subscription->pricing->amount;
                                        ?>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr style="color: #010145">
                                                    <td align="left">VAT</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>₦{{number_format(($total/100*7.5), 2, ".", ",")}}</td>
                                                </tr>
                                                <tr style="color: #010145">
                                                    <td align="left">Total</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>₦{{number_format((($total/100*7.5)+$total), 2, ".", ",")}}</td>
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
                </div>
            </div>
        </div>
    </div>

</body>