@extends('layouts.admin')

@section('scripts')
<script type="text/javascript">
  $("#example1").DataTable();
</script>
@endsection

@section('main_content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
          </div>
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inbox</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- /.col -->
        <div class="col-md-12" style="margin-left: -200px!important;">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Email</th>
                      <th>Message</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($all_count == 0)
                      <td class="mailbox-name"></td>
                        <td class="mailbox-subject">No New Messages</td>
                    @else
                      @foreach ($all_msgs as $all_msggss)
                        <tr>
                          <td class="mailbox-name"><a href="read-mail.html">{{$all_msggss->email}}</a></td>
                          <td class="mailbox-subject">{{$all_msggss->message}}</td>
                          <td class="mailbox-attachment"></td>
                          <td class="mailbox-date"></td>
                        </tr>
                    @endforeach
                    @endif
                    
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


@endsection