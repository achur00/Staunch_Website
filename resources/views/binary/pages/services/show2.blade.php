<!-- Page Head -->


<!-- Page Head -->


<!-- Main Content -->



<section id="content">

    <div class="container" id="blog">
        <div class="row">

            <div class="span7">

                <article id="post-27"
                    class="post-27 post type-post status-publish format-gallery hentry category-uncategorized category-web-development row-fluid blog-article v1 normal">

                    <div class="span12">

                        <div class="row-fluid">

                            <div class="span12">

                                <div class="media">

                                    <div class="slideshow_container flexslider slide_layout_" id="flex">
                                        <ul class="slides slide_flexslider">
                                            @foreach ( $service->photos as $photo )
                                            <li class="slide_element slide1 frame1"
                                                data-thumb="{{ asset('images/services').'/'.$photo->name}}">
                                                <img src="{{ asset('images/services').'/'.$photo->name}}"
                                                    title="{{$photo->name}}" alt="" />
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>




                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="content post_format_gallery">



                                    {{--<dl class="dl-horizontal" style="background: none !important;">
                                        <dt>
                                            <div class="dt"><span
                                                    class="date">{{ $service->created_at->format('d') }}</span><span
                                                    class="month">{{ $service->created_at->format('M') }}</span><span
                                                    class="year">{{ $service->created_at->format('y') }}</span></div>
                                            <div class="icon_"><i class="moon-image"></i></div>
                                        </dt>
                                        <dd>
                                            <h3><a href="index1c4a.html">{{ $service->name }}</a></h3>

                                            <div class="blog-content">
                                                <p>{!! $service->description !!}</p>
                                            </div>
                                        </dd>

                                    </dl>--}}


                                </div>

                            </div>
                        </div>
                    </div>
                </article>

            </div>


            <aside class="span5 sidebar" id="widgetarea-sidebar">
                
                 <div class="row-fluid row-dynamic-el" style="margin-bottom: 0px !important;">
                    <div class="span12">
                        <div class="header">
                            <dl class="dl-horizontal">
                                <dt><i class="moon-info"></i></dt>
                                <dd style="margin-left:55px !important; margin-top:10px;">
                                    <h4>About {{$service->name}}</h4>
                                </dd>
                            </dl>
                        </div>
                        <div class="content">
                            <p>{!! $service->description !!}</p>
                        </div>
                        
                    </div>
                </div>

                <div class="single_content" style="margin-bottom: 25px; margin-top: 8px;">
                    <ul class="metas" style="padding-top: 0;">
                        <!--<li style="background: none !important; padding-left: 0;">-->
                        <!--    <dl class="dl-horizontal">-->
                        <!--        <dt>Client:</dt>-->
                        <!--        <dd>Max Power</dd>-->
                        <!--    </dl>-->
                        <!--</li>-->
                        <!--<li style="background: none !important; padding-left: 0;">-->
                        <!--    <dl class="dl-horizontal">-->
                        <!--        <dt>SKills:</dt>-->
                        <!--        <dd>PHP, LARAVEL</dd>-->
                        <!--    </dl>-->
                        <!--</li>-->
                        <li style="background: none !important; padding: 0;">
                            <dl class="dl-horizontal">
                                <dt style="overflow: visible; padding-top: 0px;"><a class="btn btn-primary" href="{{url('contact')}}">CONTACT US TODAY</a></dt>
                                <dd></dd>
                            </dl>
                        </li>
                    </ul>
                </div>

                {{--<div id="categories-2" class="widget widget_categories">
                    <h4 class="widget-title">Service Categories</h4>
                    <ul>
                        @foreach ($service_categories as $service_cat)

                        <li class="cat-item cat-item-8"><a href="{{ route('service.category.search', $service_cat) }}"
                                title="View all posts filed under News">{{ $service_cat->name }}</a>
                        </li>

                        @endforeach

                    </ul>
                </div>--}}
                <div id="widget_most_popular-2" class="widget widget_most_popular">
                    <h4 class="widget-title">Other services</h4>
                    <ul>

                        @foreach ($popular_services as $p_service)
                        <li>
                            <dl class="dl-horizontal">
                                <dt><img src="{{ asset('images/services').'/'.$p_service->photos[0]->name}}" alt=""
                                        style="width: 100%; height: 100%;">
                                </dt>
                                <dd><a href="{{ route('service.details', $p_service) }}">{{ $p_service->name }}</a>
                                    <p class="info">{{  $p_service->created_at->format('M.d, Y') }}</p>
                                </dd>
                            </dl>

                        </li>
                        @endforeach

                    </ul>
                </div>


            </aside>


        </div>