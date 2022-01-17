@extends('Layout.layout')
@section('name')
    {{__('general.employee_creation')}}
@endsection
@section('content')
    <div class="container">
          <!-- general form elements disabled -->
          <div class="card">
            <div class="card-header">
                <h3 class="card-title"><a href="{{route('Employee.index')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;{{__('general.back')}}</a></h3>

                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('Employee.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                         
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{__('general.name')}}</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="name">
                                        @error('name')<label style="color:red">{{$message}}</label>@enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{__('general.email')}}</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email" required>
                                        @error('email')<label style="color:red">{{$message}}</label>@enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('general.designation')}}</label>
                                        <select  class="form-control @error('designation_id') is-invalid @enderror" name="designation_id">
                                            @foreach ($Designations as $designation)
                                                <option value="{{$designation->id}}">{{$designation->title}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{{__('general.photo')}}</label><br>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <input type="file" class="mt-4 mr-4 @error('photo') is-invalid @enderror" name="photo" id="photo" onchange="pic(event)">
                                            </div>
                                            <div>
                                                <label for="photo" class="pl-5"><img src="{{asset('assets/dist/img/Avatar5.png')}}" class="mr-4 w-25" id="image"> </label>
                                            </div>
                                        </div>
                                            
                                          
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button class="btn btn-dark" type="submit">Submit</button> 
                                    <button class="btn btn-dark" type="reset">Clear</button> 
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function pic(event) {
               
                $('#image').attr("src",URL.createObjectURL(event.target.files[0]));
                
                
            }

        </script>

@endsection