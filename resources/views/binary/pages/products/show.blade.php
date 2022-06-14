@extends('binary.master.vicemaster')

@section('title')
{{ $product->name }} | Products
@endsection

@section('styles')
{{-- <link rel='stylesheet' id='layerslider_css-css' href="{{ asset('content/style.css') }}" type='text/css' media='all'
/> --}}
@endsection

@section('content')
<!-- Page Head -->


<!-- Page Head -->

<div class="header_page">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <h4>{{ Str::upper($product->name) }}</h4>
            </div>
            <div class="breadcrumbss">

                <ul class="page_parents pull-right">
                    <li>You are here: </li>
                    <li><a href="{{ url('products') }}">Products</a>/</li>

                    <li><a href="#">{{ $product->name }}</a></li>

                </ul>
            </div>

        </div>
    </div>

</div>

<!-- Main Content -->



<section id="content">

    <div class="container" id="blog">
        <div class="row">

            <div class="span9">





                <article id="post-27"
                    class="post-27 post type-post status-publish format-gallery hentry category-uncategorized category-web-development row-fluid blog-article v1 normal">

                    <div class="span12">

                        <div class="row-fluid">

                            <div class="span12">

                                <div class="media">






                                    <div class="slideshow_container flexslider slide_layout_" id="flex">
                                        <ul class="slides slide_flexslider">
                                            @foreach ( $product->photos as $photo )
                                            <li class="slide_element slide1 frame1"
                                                data-thumb="{{ asset('images/products').'/'.$photo->name}}">
                                                <img src="{{ asset('images/products').'/'.$photo->name}}"
                                                    title="{{$photo->name}}" alt="" />
                                            </li>
                                            @endforeach
                                            {{-- <li class=' slide_element slide2 frame2'
                                                data-thumb='{{ asset('content/images/all/07/photodune-1544662-interior-s-90x45.jpg')}}'>
                                            <img src='{{ asset('content/images/all/07/photodune-1544662-interior-s-930x621.jpg')}}'
                                                title='Interior' alt='Chairs in office' /> </li> --}}
                                        </ul>
                                    </div>




                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="content post_format_gallery">



                                    <dl class="dl-horizontal">
                                        <dt>
                                            <div class="dt"><span
                                                    class="date">{{ $product->created_at->format('d') }}</span><span
                                                    class="month">{{ $product->created_at->format('M') }}</span><span
                                                    class="year">{{ $product->created_at->format('y') }}</span></div>
                                            <div class="icon_"><i class="moon-image"></i></div>
                                        </dt>
                                        <dd>
                                            <h3><a href="index1c4a.html">{{ $product->name }}</a></h3>

                                            <div class="blog-content">
                                                <p>{!! $product->description !!}</p>
                                            </div>
                                        </dd>

                                    </dl>






                                    {{-- <div class="info">
                                        <ul>
                                            <li class="calendar">22 Jul, all</li>
                                            <li class="user">admin</li>
                                            <li class="comment">0 Comments</li>
                                        </ul>

                                        <div class="shares">
                                            <h4>Share This Story</h4>




                                            <div class="social_ic"><a href="#"><i class="moon-flickr"></i></a></div>


                                            <div class="social_ic"><a href="#"><i class="moon-youtube"></i></a></div>


                                            <div class="social_ic"><a href="#"><i class="moon-yahoo"></i></a></div>


                                            <div class="social_ic"><a href="#"><i class="moon-twitter"></i></a></div>


                                            <div class="social_ic"><a href="#"><i class="moon-facebook"></i></a></div>


                                        </div>
                                    </div> --}}



                                </div>

                            </div>
                        </div>
                    </div>
                </article>





                {{-- <h4 class="single_title">Categories</h4>
                <ul class="single-categories">
                    <li><a href="#" rel="category">Uncategorized</a></li>
                    <li><a href="#" rel="category">Web Development</a></li>
                </ul>




                <div id="comments">
                    <h4 class="single_title">Comments</h5>

                        <div class="row-fluid comments_list">


                        </div>
                </div>
                <div id="respond" class="comment-respond">
                    <h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow"
                                id="cancel-comment-reply-link" href="index1c4a.html#respond"
                                style="display:none;">Cancel reply</a></small></h3>
                    <form action="#" method="post" id="commentform" class="comment-form">
                        <p class="comment-notes">Your email address will not be published. Required fields are marked
                            <span class="required">*</span></p>
                        <p class="comment-form-author"><label for="author">Name <span class="required">*</span></label>
                            <input id="author" name="author" type="text" value="" size="30" aria-required='true' /></p>
                        <p class="comment-form-email"><label for="email">Email <span class="required">*</span></label>
                            <input id="email" name="email" type="text" value="" size="30" aria-required='true' /></p>
                        <p class="comment-form-url"><label for="url">Website</label> <input id="url" name="url"
                                type="text" value="" size="30" /></p>
                        <p class="comment-form-comment"><label for="comment">Comment</label> <textarea id="comment"
                                name="comment" cols="45" rows="8" aria-required="true"></textarea></p>
                        <p class="form-allowed-tags">You may use these <abbr
                                title="HyperText Markup Language">HTML</abbr> tags and attributes:
                            <code>&lt;a href=&quot;&quot; title=&quot;&quot;&gt; &lt;abbr title=&quot;&quot;&gt; &lt;acronym title=&quot;&quot;&gt; &lt;b&gt; &lt;blockquote cite=&quot;&quot;&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=&quot;&quot;&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=&quot;&quot;&gt; &lt;strike&gt; &lt;strong&gt; </code>
                        </p>
                        <p class="form-submit">
                            <input name="submit" type="submit" id="submit" value="Post Comment" />
                            <input type='hidden' name='comment_post_ID' value='27' id='comment_post_ID' />
                            <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                        </p>
                    </form>
                </div><!-- #respond --> --}}


            </div>


            <aside class="span3 sidebar" id="widgetarea-sidebar">

                <div class="single_content" style="margin-bottom: 25px;">
                    <ul class="metas" style="padding-top: 0;">
                        <li  style="background: none !important; padding-left: 0;">
                            <dl class="dl-horizontal">
                                <dt>Client:</dt>
                                <dd>Max Power</dd>
                            </dl>
                        </li>
                        <li  style="background: none !important; padding-left: 0;">
                            <dl class="dl-horizontal">
                                <dt>SKills/Tools:</dt>
                                <dd>{{ $product->tools }}</dd>
                            </dl>
                        </li>
                        <li  style="background: none !important; padding-left: 0;">
                            <dl class="dl-horizontal">
                                <dt>DEMO:</dt>
                                <dd><a target="_blank" href="{{ $product->url }}">{{ $product->url }}</a></dd>
                            </dl>
                        </li>
                    </ul>
                </div>

                {{-- <div id="search-2" class="widget widget_search">
                    <form action="#" id="search-form">
                        <div class="input-append">
                            <input type="text" size="16" placeholder="Search&hellip;" name="s" id="s"><button
                                type="submit" class="more">Search</button>
                        </div>
                    </form>
                </div>
                <div id="text-3" class="widget widget_text">
                    <h4 class="widget-title">About The Blog</h4>
                    <div class="textwidget">Plugin ready, in case your business needs a multi language site. Lorem ipsum
                        dolor sit amet, consectetuer adipiscing elit. Plugin ready, in case your business needs a multi
                        language site. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </div>
                </div> --}}
                <div id="categories-2" class="widget widget_categories">
                    <h4 class="widget-title">PRODUCT Categories</h4>
                    <ul>
                        @foreach ($product_categories as $product_cat)

                        <li class="cat-item cat-item-8"><a href="{{ route('product.category.search', $product_cat) }}"
                                title="View all posts filed under News">{{ $product_cat->name }}</a>
                        </li>

                        @endforeach

                    </ul>
                </div>
                <div id="widget_most_popular-2" class="widget widget_most_popular">
                    <h4 class="widget-title">Popular Products</h4>
                    <ul>

                        @foreach ($popular_products as $p_product)
                        <li>
                            <dl class="dl-horizontal">
                                <dt><img src="{{ asset('images/products').'/'.$p_product->photos[0]->name}}" alt="" style="width: 100%; height: 100%;">
                                </dt>
                                <dd><a href="{{ route('product.details', $p_product) }}">{{ $p_product->name }}</a>
                                    <p class="info">{{  $p_product->created_at->format('M.d, Y') }}</p>
                                </dd>
                            </dl>

                        </li>
                        @endforeach

                    </ul>
                </div>
               
                {{-- <div id="widget_shortcode-2" class="widget widget_shortcode">
                    <h4 class="widget-title">Testimonial</h4>
                    <div class="row-fluid">
                        <div id="testimonials">
                            <div class="testimon">
                                <p>Nunc et rutrum consetetur sadipscing dolor elitr, sed diam nonumy lore at volutpat.
                                    Sed consectetur suscipit lorem nunc.adipiscing elit. Integercommodo tristique odio,
                                    quis fringilla ligula aliquet. Sed consectetur suscipit lorem nunc.adipiscing elit.
                                </p><span class="arrow"></span>
                                <div class="user-testimonial">Ludjon Roshi</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="widget_flickr-3" class="widget widget_flickr">
                    <h4 class="widget-title">Flickr Widget</h4>
                    <div class="flickr_container">
                        <script type="text/javascript"
                            src="http://www.flickr.com/badge_code_v2.gne?count=6&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=52617155@N08">
                        </script>
                    </div>
                </div> --}}




            </aside>


        </div>

</section>



<a href="#" class="scrollup" style="display: none;">Scroll</a>
<!-- Social Profiles -->


<!-- Footer -->
</div>
@endsection