<?php $currentPage = 'contact';?>

@extends('binary.master.vicemaster')

@section('title')
contact
@endsection

@section('content')

<section id="content" class="page-dynamic_template-contactpa sequentialchildren section_first ">
    <div class="row-fluid">


        <div class="span12">

            <div class="row-fluid row-dynamic-el">

                <div class="span12">
                    <div class="row-fluid row-google-map"><iframe class="googlemap" style="height:300px;"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?q=Lekki+Lagos&amp;hl=en&amp;sll=37.445835,-122.139816&amp;sspn=0.112164,0.154324&amp;hnear=Lekki+Lagos&amp;t=m&amp;z=10&amp;output=embed"></iframe>
                        <div class="desc"></div>
                    </div>
                </div>

            </div>

            <div class="row-fluid row-dynamic-el " style="margin-bottom:-100px;">

                <div class="container">

                    <div class="row-fluid">

                        <div class="span8 contact_form">
                            <div class="header">
                                <dl class="dl-horizontal">
                                    <dt><i class="moon-pen-5"></i></dt>
                                    <dd style="margin-left:55px !important; margin-top:10px;">

                                        <h4>Write Us</h4>
                                    </dd>
                                </dl>
                            </div>
                            <div class="row-fluid">
                                <div class="row-fluid">

                                    <div class="span12">
                                        <form name="contactForm" class="standard-form row-fluid"
                                            action="{{ route('contact.message') }}" method="post">
                                            @csrf

                                            @error('name')
                                            <span style="display: block; color:#f00" role="alert">
                                                <strong  class="text-error">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <input class="span6" name="name" placeholder="Name" type="text"
                                                id="themeple_name" value="" />


                                            @error('email')
                                            <span style="display: block; color:#f00" role="alert">
                                                <strong  class="text-error">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <input class="span6" name="email" placeholder="E-Mail" type="text"
                                                id="themeple_e-mail" value="" />
                                           

                                            @error('subject')
                                            <span style="display: block; color:#f00" role="alert">
                                                <strong class="text-error">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <input class="span6" name="subject" placeholder="Subject" type="text"
                                                id="themeple_subject" value="" />                                           


                                            @error('content')
                                            <span style="display: block; color:#f00" role="alert">
                                                <strong class="text-error">{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <textarea class="span12" placeholder="Content" name="content" cols="40"
                                                rows="7" id="themeple_content" style="resize: vertical;"></textarea>
                                           

                                            <p class="perspective"><input type="submit" value="Send Message"
                                                    class="custom_btn" /></p>
                                        </form>
                                        <div id="ajaxresponse"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="span4 post_page_cont">
                            <div class="header">
                                <dl class="dl-horizontal">
                                    <dt><i class="moon-file-2"></i></dt>
                                    <dd style="margin-left: 55px !important; margin-top:10px;">
                                        <h4>Our Contact Details</h4>
                                    </dd>
                                </dl>
                            </div>
                            <div id="widget_contact_info-2" class="widget widget_contact_info">
                                <ul>
                                    
                                <li class="address"><a href="#"><i class="fas fa-map-marker-alt fa-2x"></i></a> <span>{{ $contact->address }}</span></li>
                                
                                <li class="phone"><a href="tel:{{ $contact->phone }}"> <i class="fa fa-phone fa-2x"></i></a> <span>{{ $contact->phone }}</span></li>
                                
                                <li class="email"><a href="mailto:{{ $contact->email }}"><i class="fas fa-envelope fa-2x"></i></a> <span>{{ $contact->email }}</span></li>
                                
                                <div class="h-social">
                                    <ul>
                                <li class="youtube" style=""><a href="{{ $contact->youtube_url }}"> <i class="fab fa-youtube fa-2x"></i></a></li>
                                
                                <li class="instagram" style=""><a
                                    href="{{ $contact->instagram_url }}"><i class="fab fa-instagram fa-2x"></i></a></li>
                                    
                                <li class="facebook" style=""><a href="{{ $contact->facebook_url }}"><i class="fab fa-facebook fa-2x"></i></a></li>

                                    
                                <li class="linkedin" style=""><a href="{{ $contact->linkedin_url }}"><i class="fab fa-linkedin fa-2x"></i></a></li>
                                
                                <li class="twitter" style=""><a href="{{ $contact->twitter_url }}"><i class="fab fa-twitter fa-2x"></i></a></li>
                                </ul>
                                </div>
                                    
                            </div>

                            <div class="span9">
                                <div class="themeple_sc">
                                    <div class="header"><BR>
                                        <h3>Note</h3><span class="border_style_color"></span>
                                    </div>
                                </div>
                                <div class="blockquote">
                                    <div class="themeple_sc">{{ $contact->note }}</div>
                                </div>
                                <p>&nbsp;</p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
</section>
<a href="#" class="scrollup">Scroll</a>
<!-- Social Profiles -->


<!-- Footer -->
</div>
{{-- Success Alert --}}
@if(session('status'))
<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">&times;</a><strong></strong>
    {{session('status')}}</div>
@endif

{{-- Error Alert --}}
@if(session('error'))
<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">&times;</a><strong></strong>
    {{session('error')}}</div>
@endif

<script>
    //close the alert after 3 seconds.
          
           window.addEventListener('load', function(){
               let al = document.querySelector('.alert');            
               setTimeout(function() {
                   (al) ? (al.style.display = "none") : '';                
               }, 5000);
             });
        
           // $(document).ready(function(){
         // setTimeout(function() {
         //     $(".alert").alert('close');
         // }, 3000);
         // });
           
</script>
@endsection