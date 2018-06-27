@extends('layouts.template')

@section('title', 'Home')

@section('content')
<h1>Blog</h1>
<?php
	echo $posts;
?>
@stop