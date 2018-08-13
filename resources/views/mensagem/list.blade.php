@foreach($lmsg as $msg) 
<h1>{{$msg->titulo}}</h1>
<p>{{$msg->texto}}</p>
<p>{{$msg->autor}}</p>
@endforeach