<table class="table">
  <tr>
    <th>Title</th>
    <td>{{$ticket->title}}</td>
  </tr>
  <tr>
    <th>Description</th>
    <td>{!!$ticket->description!!}</td>
  </tr>
  <tr>
    <th>Status</th>
    <td>{{$ticket->status}}</td>
  </tr>
  <tr>
    <th>Assigned User</th>
    <td>{{$ticket->assigned->name}}</td>
  </tr>
</table>