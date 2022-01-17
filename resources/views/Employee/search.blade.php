<table id="example1" class="table table-bordered table-hover">
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
    <tbody>
      @foreach ($Employee as $key => $employee)
              
          
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$employee->name}}</td>
          <td>{{$employee->email}}</td>
          <td><div style="width:80px;"><img src="{{asset(PC::DIRECTORY_EMPLOYEE_PHOTO.'/'.$employee->photo)}}" class="mr-4 w-25"></div></td>
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
                      <button type="submit" 
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
  <script>
    $(function () {
      
      $('#example1').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>