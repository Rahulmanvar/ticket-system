@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12">
                        <div class="float-end" style="margin-bottom:10px">
                            <button onclick="addTicket(this)" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-plus"></i> Create</button>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th width="15%">Action</th>
                        </tr>
                        @foreach($tickets as $ticket)
                        <tr>
                            <td>{{$ticket->title}}</td>
                            <td>{{$ticket->status}}</td>
                            <td>
                                <button onclick="viewTicket(this)" data-id="{{$ticket->id}}" data-toggle="modal" data-target="#myModal" class="btn btn-info">View</button>
                                @if($ticket->status != 'Closed')
                                <button onclick="statusTicket(this)" data-id="{{$ticket->id}}" data-status="Closed" class="btn btn-danger">Close</button>
                                @endif
                                @if($ticket->status == 'Closed')
                                <button onclick="statusTicket(this)" data-id="{{$ticket->id}}" data-status="Pending" class="btn btn-warning">Pending</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $tickets->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">View Ticket</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
@endsection
@section('page-js')
<script type="text/javascript">
    function viewTicket(_this) {
        $('#myModal .modal-title').text('View Ticket');
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:'POST',
          url:'{{route("ticket.view")}}',
          data:{
              id:$(_this).data('id'),
          },
          success:function(data){
            $('#myModal .modal-body').html(data);
          }
        });
    }
    function addTicket(_this) {
        $('#myModal .modal-title').text('Create Ticket');
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:'GET',
          url:'{{route("ticket.create")}}',
          success:function(data){
            $('#myModal .modal-body').html(data);
          }
        });
    }
    function statusTicket(_this) {
        var id = $(_this).data('id');
        var status = $(_this).data('status');

        $(_this).html('<i class="fa fa-spinner"></i>');
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:'POST',
          url:'{{route("ticket.status")}}',
          data:{id:id,status:status},
          success:function(data){
            location.reload();
          }
        });
    }
</script>
@endsection