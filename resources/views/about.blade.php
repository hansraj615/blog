@extends('layouts.frontend.app')

@section('title','About')

@push('css')
 

  
@endpush


@section('content')

          <!--=================== content body ====================-->
        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
            <div>
                <div class="img_card">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-7 content_section">
                            <div class="content_box">
                                <div class="content_box_inner">
                                    <div>
                                        <h3>
                                            Just a few words about us
                                        </h3>
                                        <p>
                                           {{$about[0]->about}}
                                        </p>
                                        <!--=================== counter start====================-->
                                        <div class="pt50">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-md-4">
                                                    <div class="counter_box">
                                                        <div class="divider"></div>
                                                        <span class="counter"> {{$about[0]->yojexperiance}}</span>
                                                        <h5>Years of experience</h5>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="counter_box">
                                                        <div class="divider"></div>
                                                        <span class="counter"> {{$about[0]->projectcompleted}}</span>
                                                        <h5>happy clients</h5>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="counter_box">
                                                        <div class="divider"></div>
                                                        <span class="counter"> {{$about[0]->happyclient}}</span>
                                                        <h5>projects completed</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--=================== counter end====================-->
                                    </div>
                                    <!--===================testimonial start====================-->
                                    <div class="testimonial_carousel mt50">
                                            @foreach($testimonial as $value)
                                        <div class="testimonial_box">
                                            <p>
                                                {{$value->comment}}
                                            </p>
                                            <div class="testimonial_author">
                                                <img src="assets/img/user.png" alt="author">
                                                <h5>{{$value->name}}</h5>
                                                <p><span>{{$value->company}}</span></p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!--===================testimonial end====================-->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-5 img_section" style="background-image: url('assets/img/bg/about.png');"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--=================== content body end ====================-->
@endsection

@push('js')

@endpush

