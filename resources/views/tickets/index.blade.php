@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
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
                                <button onclick="viewTicket(this)" data-id="{{$ticket->id}}"  data-toggle="modal" data-target="#myModal" class="btn btn-info">View</button>
                                <button class="btn btn-warning">Edit</button></td>
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
</script>
@endsection