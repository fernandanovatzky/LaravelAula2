<h1>Lista de mensagens</h1>
<hr>
@foreach($mensagem as $mensagem)
	<p>Titulo: <a href="/mensagens/{{$mensagem->id}}">{{$mensagem->titulo}}</a></p>
	<p>Autor: {{$mensagem->autor}}</p>
	<p>Texto: {{$mensagem->texto}}</p>
	<a href="/mensagens/{{$mensagem->id}}/edit">Editar</a>
	<a href="/mensagens/{{$mensagem->id}}/delete">Deletar</a>
	<br>
	<br>
@endforeach


<a href="/mensagens/create">Criar nova mensagem</a>


<!-- EXIBE MENSAGENS DE SUCESSO-->
@if (\Session::has('success'))
<div class="container">
<div class="alert alert-success">
{{\Session::get('success')}}

</div>
</div>

@endif
