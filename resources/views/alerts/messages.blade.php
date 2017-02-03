@if(Session::has('message'))
  <div class="alert alert-success alert dismissible" role='alert'>
    <button type="button" class="close" data-dismiss="alert" aria-label="close" aria-hidden="true">x</button>
    {{Session::get('message')}}
  </div>
@endif