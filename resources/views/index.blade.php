@extends('layouts.frontend.app')

@section('title','Index')

@push('css')
 

  
@endpush


@section('content')

        <!--=================== content body ====================-->
        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
            <div class="portfolio">
                <div class="container-fluid">
                    <!--=================== masaonry portfolio start====================-->
                    <div class="grid img-container justify-content-center no-gutters">
                        <div class="grid-sizer col-sm-12 col-md-6 col-lg-3"></div>
                        
                        @foreach($gallery as $value)
                        <div class="grid-item branding  col-sm-12 col-md-6 col-lg-3">
                            <a href="storage/uploads/gallery/normal/{{$value->image}}" title="{{$value->name}}">
                                <div class="project_box_one">
                                <img src="storage/uploads/gallery/thumbnails/{{$value->image}}" alt="{{$value->name}}" />
                                    <div class="product_info">
                                        <div class="product_info_text">
                                            <div class="product_info_text_inner">
                                                <i class="ion ion-plus"></i>
                                                <h4>{{$value->name}}</h4>
                                            <p>{{$value->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                       
                        @endforeach
                    </div>
                    <!--=================== masaonry portfolio end====================-->
                </div>
            </div>
             <div class="grid-sizer col-sm-12 col-md-6 col-lg-3"></div>
            <div class="align-right">  {{ $gallery->links('vendor.pagination.bootstrap-4') }}</div>
        </div>
            
        
        <!--=================== content body end ====================-->
@endsection

@push('js')

@endpush

