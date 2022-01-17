@extends('Layout.layout')
@section('name')
    
    {{__('general.employee_list')}}
@endsection
@section('content')
    
              
    <section class="content">
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a type="button" class="btn btn-dark" href="{{route('Employee.create')}}">
                  {{__('general.add_new_employee')}}
                </a> 
              
              <!-- /.card-header -->
              <div class="card-tools">
              <div style="display: inline-block;">
                <div class="form-group">
                  <select  class="form-control" name="designation_id" onclick="designation(this.value)">
                        <option value=0>{{__('general.designation')}}</option>
                      @foreach ($Designations as $designation)
                          <option value="{{$designation->id}}">{{$designation->title}}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div  style="display: inline-block;">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" onkeyup="search(this.value)" id="searchData" class="form-control float-right" placeholder="name/email">

                  <div class="input-group-append">
                    <button type="button" id="searchButton" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
              </div>
            </div>
              <div class="card-body" id="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>{{__('general.slno')}}</th>
                      <th>{{__('general.name')}}</th>
                      <th>{{__('general.email')}}</th>
                      <th>{{__('general.photo')}}</th>
                      <th>{{__('general.designation')}}</th>
                      <th>{{__('general.action')}}</th>
                    </tr>
                  </thead>
                  <tbody id="Tbody">
                    @foreach ($Employee as $key => $employee)
                            
                        
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->email}}</td>
                        <td><div style="width:80px;"><img src="@if($employee->photo){{asset(PC::DIRECTORY_EMPLOYEE_PHOTO.'/'.$employee->photo)}}@else{{asset('assets/dist/img/Avatar5.png')}} @endif" class="mr-4 w-25"></div></td>
                        <td>{{$employee->designation->title}}</td>
                        <td>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a  href="{{route('Employee.edit',$employee->id)}}" class="btn btn-bg-transparant" title="edit">
                                        <i class="fas fa-edit"></i>
                                    </a> 
                                </div>
                                <div class="col-sm-3">
                                    <a href="{{route('Employee.show',$employee->id)}}" class="btn btn-bg-transparant" title="show">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>   
                                <div class="col-sm-3">
                                  <form action="{{route('Employee.destroy',$employee->id)}}" method="post" id="frm{{$employee->id}}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" 
                                    onclick=" if(confirm('Are you sure want to Delete?'))
                                                { 
                                                  document.getElementById('frm{{$employee->id}}').submit();
                                                }"
                                     class="btn btn-bg-transparant" title="delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                  </form>
                                    </div> 
                            </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
            
    <script>
       

         function search(search) { 
          $.ajax({
                    url: '{{route('Employee.search')}}',
                    method: "get",
                    data: {_token: '{{ csrf_token() }}',search:search},
                    success: function (response) {                                            
                        $("#card-body").html(response);
                      
                                                             
                    }
                });   
              } 

        function designation(designation) { 
          $.ajax({
                    url: '{{route('Employee.designation')}}',
                    method: "get",
                    data: {_token: '{{ csrf_token() }}',designation:designation},
                    success: function (response) {                                            
                        $("#card-body").html(response);
                      
                                                             
                    }
                });   
              } 
          
        
    </script>

@endsection