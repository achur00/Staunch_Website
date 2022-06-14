
@extends('binary.master.master')
@section('content')
    
  <section id="content" class="page-dynamic_template-about2 sequentialchildren  section_last">
    <div class="row-fluid">
     
      
     <div class="span12">
       
      <div class="row-fluid row-dynamic-el " style="">

        <div class="container">

          <div class="row-fluid">

            <div class="span6 dynamic_slideshow"><div class="slideshow_container flexslider slide_layout_fixed" id="flex" >    <ul class="slides slide_flexslider">		<li class=' slide_element slide1 frame1' data-thumb="{{ asset('asset/content/images/all/07/misc-4-90x45.jpg') }}"><img src="{{ asset('content/images/all/07/misc-4.jpg')}}" title='misc-4' alt='' />		</li>	</ul></div><span class="shadow"></span></div>

            <div class="span6 plain_text alignment_left"><h2 class="big_title" style="color:#555;">Who we are</h2><p class="content"  style="color:rgb(0, 0, 0);">STAUNCH TECHNOLOGIES  provides a wide range of Hosting Solutions. Get your website hosted at one of the best web hosting service providers on the Internet. We offer Shared Server, Dedicated Server and VPS hosting on both Windows and Linux Platforms.

                STAUNCH TECHNOLOGIES is a subsidiary of Intuitive Technology Services International Limited, an e-business consulting firm that works on improving clients’ profitability by effectively aligning their overall business strategy with technology in order to increase sales, reduce cost and improve on client’s business operations.
                
                As a technology company situated in Lekki, Lagos State, STAUNCH TECHNOLOGIES is able to provide its customers with innovative services designed to complement their existing businesses. We serve customers ranging from individual, SMEs to Large organisation within and outside Nigeria.
                
                Navigating to our track record says it all, we’ve been providing our services to a lot of well established organisations and have not been talked ill of. We value win-win stories, as this makes us more competent and trustworthy. Improving everyday on our services and being in pace with evolving technology helps to keep our clients businesses in touch with the fast spinning world of opportunities.</p></div>


                

            </div>

          </div>

        </div>

















        @include('binary.pages.about_us.about_footer')
</section>
<a href="#" class="scrollup">Scroll</a> 
<!-- Social Profiles -->


<!-- Footer -->

@endsection