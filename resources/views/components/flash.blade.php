<div>
    @if(session()->has("success"))
        
        <div id="alert1" class="card card-outline card-success ml-4 mr-5 mt-2 mb-2">
            <div class="card-body">
                 <div class="card-tools text-right">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
                {{session("success")}}
            </div>
            <!-- /.card-body -->
        </div>
       

    @endif
</div>
<script>
      $(document).ready(function(){
        setTimeout(function(){
            $("#alert1").hide();
                },3000);   
          
          }); 
    
</script>