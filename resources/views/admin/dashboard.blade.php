@extends('layouts.admin')

@section('scripts')
<script type="text/javascript">
  $("#example1").DataTable();
</script>
@endsection

@section('main_content')
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$new_users}}</h3>
                            
                <p>New Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$db_clicks}}</h3>

                <p>See More Clicks</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <a href="https://www.worldflagcounter.com/details/hfR"><img src="https://www.worldflagcounter.com/hfR/" alt="Flag Counter"></a>
          </div>
        </div>
        <!-- /.row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
      
    </section>

<section class="content">
  <div class="container-fluid">
    <div class="invoice p-3 mb-3">
      <div class="row">
        <div class="col-md-12">
          <h3>Import Excel File</h3>
          <br />
           @if(count($errors) > 0)
            <div class="alert alert-danger">
             Upload Validation Error<br><br>
             <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
             </ul>
            </div>
           @endif
           @if($message = Session::get('success'))
           <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
           </div>
           @endif
           <form method="post" enctype="multipart/form-data" action="{{ route('import_excel') }}">
            {{ csrf_field() }}
            <div class="form-group">
             <table class="table">
              <tr>
               <td width="40%" align="right"><label>Select File for Upload</label></td>
               <td width="30">
                <input type="file" name="select_file" />
               </td>
               <td width="30%" align="left">
                <input type="submit" name="upload" class="btn btn-primary" value="Upload">
               </td>
              </tr>
              <tr>
               <td width="40%" align="right"></td>
               <td width="30"><span class="text-muted">.xls, .xslx</span></td>
               <td width="30%" align="left"></td>
              </tr>
             </table>
            </div>
           </form>
          <br />
           <div class="panel panel-default">
            <div class="panel-heading">
             <h3 class="panel-title">Professor Data</h3>
            </div>
            <div class="panel-body">
             <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
               <tr>
                <th>No</th>
                <th>University</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Research Interests</th>
                <th>Disciplines</th>
                <th>Sub Disciplines 1</th>
                <th>Sub Disciplines 2</th>
                <th>Sub Disciplines 3</th>
                <th>Sub Disciplines 4</th>
               </tr>
             </thead>
             <tbody>
               <?php 
                  $count = 1;
                  foreach($professor_data as $row): 
                ?>
               <tr>
                 <td>{{$count}}</td>
                 <td>{{str_replace('_x000D_','',$row->university)}}</td>
                 <td>{{$row->name}}</td>
                 <td>{{$row->email}}</td>
                 <td>{{$row->phone}}</td>
                 <td>{{$row->research_interests}}</td>
                 <td>{{$row->disciplines}}</td>
                 <td>{{$row->sub_disciplines1}}</td>
                 <td>{{$row->sub_disciplines2}}</td>
                 <td>{{$row->sub_disciplines3}}</td>
                 <td>{{$row->sub_disciplines4}}</td>
               </tr>
               <?php 
                    $count++;
                    endforeach; 
                ?>
                </tbody>
              </table>
             </div>
            </div>
           </div>
        </div>
      </div>
  </div><!-- /.container-fluid -->
</section>


@endsection