@extends('Layout.layout')
@section('name')
<a href="{{route('Employee.index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;{{__('general.back')}}</a>
@endsection
@section('content')
    <div class="container">
        

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">Company Name</h3>
                        {{-- <h5 class="widget-user-desc">{{$Employee->designation->title}}</h5> --}}
                    </div>
                    <div class="widget-user-image">
                        <img class="img elevation-2" src="@if($Employee->photo){{asset(PC::DIRECTORY_EMPLOYEE_PHOTO.'/'.$Employee->photo)}}@else{{asset('assets/dist/img/Avatar5.png')}} @endif" alt="profilr pic">
                    </div>
                    <div class="card-footer">
                       <div class="mt-5 text-center">
                           <h2 style="text-transform: uppercase;">{{$Employee->name}}</h2>
                           <h4>{{$Employee->designation->title}}</h4>
                           E-mail :{{$Employee->email}}
                       </div>
                       
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <!-- /.col -->
        </div>
    </div>
@endsection
