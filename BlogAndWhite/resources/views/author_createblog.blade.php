@extends('layouts.template')

@section('title', 'Create New Blog')

@section('content')
    <div class="container-fluid">
        <div class="col-12 col-sm-3">
        </div>

        <div class="container col-12 col-sm-9">
            <form action="#" method="post" name="blog-post">
                <div class="container-fluid">
                    <br>
                    <h4>Create a New Blog</h4>
                    <p>Title:</p>
                    <input type="text" name="title" required>

                    <br><br>

                    <p>Blog:</p>
                    
                    <textarea name="content" cols="100" rows="15" placeholder="Enter text here..." required ></textarea>


                    <div class="container-fluid pull-right">
                        <button type="submit" name="Add" class="btn btn-outline-dark">Add to Blog</button>
                    </div>
                </div>
            </form>
        </div>

@stop

