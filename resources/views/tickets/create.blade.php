<form id="form" method="POST" action="{{route('ticket.store')}}">
  @csrf
  <div class="alert alert-danger" id="msg" style="display:none;">
  </div>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="description" placeholder="Enter description"></textarea>
  </div>
  <div class="form-group">
    <label>Assigned User</label>
    <select class="form-control" name="assigned_user_id">
      <option value="">Select user</option>
      @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
    </select>
  </div>
  <hr>
  <div class="form-group text-center">
    <button type="button" onclick="saveTicket(this)" class="btn btn-success">Save</button>
  </div>
</form>
<script type="text/javascript">
  function saveTicket(_this) {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'POST',
      url:'{{route("ticket.store")}}',
      data: $('#form').serialize(),
      success:function(data){
        if(data.error){
          $('#form #msg').show().text(data.error);
          return false;
        }
        $('#form #msg').removeClass('alert-danger').addClass('alert-success').show().text(data.success);
        location.reload();
      }
    });
  }
</script>