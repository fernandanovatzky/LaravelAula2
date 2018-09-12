<h1>Formulário de cadastro de mensagens</h1>
<hr>

<form action="/mensagens" method="post">
{{ csrf_field() }}
	Título: <input type="text" name="titulo">  <br>
	Texto: <input type="text" name="texto">  <br>
	Autor: <input type="text" name="autor">  <br>
<input type="submit" value="Salvar">

</form>


<!--EXIBE MENSAGENS COM ERROS-->
@if ($errors->any ())
<div> class ="container">
<div class = "alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li> {{$error}} </li>
@endforeach
</ul>
</div>
</div>
@endif