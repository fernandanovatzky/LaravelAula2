<h1>Lista de mensagens</h1>
<hr>
@foreach($mensagem as $mensagem)
	<h3>{{$mensagem->scheduledto}}</h3>
	<p><a href="/mensagem/{{$mensagem->id}}">{{$mensagem->title}}</a></p>
	<p>{{$mensagem->title}}</p>
	<p>{{$mensagem->description}}</p>
	<br>
@endforeach


<!-- EXIBE MENSAGENS DE SUCESSO-->
@if (\Session::has('success'))
<div class="container">
<div class="alert alert-success">
{{\Session::get('success')}}

</div>
</div>

@endif
