@extends('layouts.dashboard')
{{-- @include('sweet::alert') --}}
@section('title')
{{ __('upload contact us info') }}
@endsection

@section('links')

@endsection

@section('jslinks')

@endsection

@section('content')
<!-- Main content -->
<div class="main-content">
    {{-- <div class="d-flex justify-content-between"> --}}
    <h2 class="p-3">Upload Contact Us Info</h2>
    {{-- <div class="clearfix m-3">
            <a href="{{ route('skills.index') }}" class="btn btn-primary float-right fa fa-arrow-left"></a>
</div> --}}
{{-- </div> --}}
<!-- Page content -->
<div class="container mt-4">

    <!-- Table -->
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-9">

            <div class="card-wrapper">
                <!-- Input groups -->
                <div class="card pb-2">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Upload Contact Us Info</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form method="POST" action="{{ route('contact.store') }}" id="act">
                            @method('POST')
                            @csrf
                            <div class="row">

                                <div class="form-group col-lg-6">
                                    <label for="address">Staunch Address<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" name="address" id="address"
                                            value="{{ $contact->address ?? old('address')}}"
                                            class="form-control @error('address') is-invalid @enderror"
                                            placeholder="{{__('Staunch Address')}}" required autocomplete="address"
                                            autofocus>
                                        @error('address')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="email">Staunch Email Address<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        {{-- {!! Form::email('email', old('email'), ['class'=>"form-control ".($errors->has("email") ? "is-invalid" : ''), 'placeholder'=>'Email', 'required'=>'', 'autocomplete'=>'email']) !!} --}}
                                        <input type="email" name="email" id="email" value="{{$contact->email ?? old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="{{__('Staunch Email Address')}}">
                                        @error('email')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="phone">Staunch Phone Number<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                                        </div>
                                        {{-- {!! Form::text('phone', null, ['class'=>"form-control ".($errors->has("phone") ? "is-invalid" : ''), 'placeholder'=>'Phone e.g 08164517303', 'pattern'=>'0[0-9]{10}', 'required'=>'', 'autocomplete'=>'phone']) !!} --}}
                                        <input type="text" name="phone" id="phone" value="{{$contact->phone ?? old('phone')}}"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="{{__('Phone Number')}}" required autocomplete="phone">
                                        @if ($errors->has('phone'))
                                        <small
                                            class="invalid-feedback d-block text-danger"><strong>{{ $errors->first('phone') }}</strong></small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <label for="desc">Contact Note<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">

                                        <textarea name="note" id="desc"
                                            class="form-control @error('note') is-invalid @enderror"
                                            placeholder="{{__('Contact Note')}}" required autocomplete="note" autofocus
                                            rows="1">{{$contact->note ?? old('note')}}</textarea>
                                        @error('note')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="facebook_url">Facebook URL<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                                        </div>
                                        <input type="url" name="facebook_url"
                                            value="{{$contact->facebook_url ?? old('facebook_url')}}"
                                            class="form-control @error('facebook_url') is-invalid @enderror"
                                            placeholder="{{__('Facebook URL')}}" required autocomplete="facebook_url"
                                            id="facebook_url" autofocus>
                                        @error('facebook_url')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="twitter_url">Twitter URL<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                        </div>
                                        <input type="url" name="twitter_url"
                                            value="{{$contact->twitter_url ?? old('twitter_url')}}"
                                            class="form-control @error('twitter_url') is-invalid @enderror"
                                            placeholder="{{__('Twitter URL')}}" required autocomplete="twitter_url"
                                            id="twitter_url" autofocus>
                                        @error('twitter_url')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="instagram_url">Instagram URL<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                        </div>
                                        <input type="url" name="instagram_url"
                                            value="{{$contact->instagram_url ?? old('instagram_url')}}"
                                            class="form-control @error('instagram_url') is-invalid @enderror"
                                            placeholder="{{__('Instagram URL')}}" required autocomplete="instagram_url"
                                            id="instagram_url" autofocus>
                                        @error('instagram_url')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="youtube_url">Youtube URL<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                                        </div>
                                        <input type="url" name="youtube_url"
                                            value="{{$contact->youtube_url ?? old('youtube_url')}}"
                                            class="form-control @error('youtube_url') is-invalid @enderror"
                                            placeholder="{{__('Youtube URL')}}" required autocomplete="youtube_url"
                                            id="youtube_url" autofocus>
                                        @error('youtube_url')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="linkedin_url">Linkedin URL<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                        </div>
                                        <input type="url" name="linkedin_url"
                                            value="{{$contact->linkedin_url ?? old('linkedin_url')}}"
                                            class="form-control @error('linkedin_url') is-invalid @enderror"
                                            placeholder="{{__('Linkedin URL')}}" required autocomplete="linkedin_url"
                                            id="linkedin_url" autofocus>
                                        @error('linkedin_url')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="website_url">Staunch Website URL<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-link"></i></span>
                                        </div>
                                        <input type="url" name="website_url"
                                            value="{{$contact->website_url ?? old('website_url')}}"
                                            class="form-control @error('website_url') is-invalid @enderror"
                                            placeholder="{{__('Staunch Website URL')}}" required
                                            autocomplete="website_url" id="website_url" autofocus>
                                        @error('website_url')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="desc">Footer Note<span class="text-danger">*</span></label>
                                    <div class="input-group input-group-merge">

                                        <textarea name="footer_note" id="desc"
                                            class="form-control @error('footer_note') is-invalid @enderror"
                                            placeholder="{{__('Footer Note')}}" required autocomplete="footer_note" autofocus
                                            rows="1">{{$contact->footer_note ?? old('footer_note')}}</textarea>
                                        @error('footer_note')
                                        <span class="invalid-feedback d-block text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-12 form-group">
                                    {{-- <input type="hidden" name="content" id="content" value="{{ $conta->content ?? "" }}">
                                    --}}
                                    <input type="hidden" name="contact" value="{{ $contact->id ?? ""}}">
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 mt-0 text-right">
                                    <input type="submit" class="btn btn-primary px-3"
                                        value="{{ __('Upload Contact info') }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection