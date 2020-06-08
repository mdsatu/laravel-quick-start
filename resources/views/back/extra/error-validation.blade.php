@foreach($errors->all() as $error)
    <p class="alert alert-danger noPrint">{{$error}}</p>
@endforeach
