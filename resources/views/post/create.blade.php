<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Qorz create</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="icon" sizes="180x180"
        href="https://terareach.s3-ap-southeast-1.amazonaws.com/white-labeled-brands/qoruz_circle.png">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
</head>
@extends('home')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">CreatePost</li>
            </ol>
        </nav>
        <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="titleid" class="col-md-2 col-form-label mt-2">Title</label>
                <div class="col-md-6 mt-2">
                    <input name="title" type="text" class="form-control" id="titleid" placeholder="Enter Title">
                </div>
            </div>

            <div class="form-group row">
                <label for="releasedateid" class="col-md-2 mt-2 col-form-label">Category</label>
                <div class="col-md-6 mt-2">
                    <input name="category" type="text" class="form-control" id="releasedateid"
                        placeholder="Enter Category">
                </div>
            </div>

            <div class="form-group row">
                <label for="releasedateid" class="col-md-2 mt-2 col-form-label">Content</label>
                <div class="col-md-6 mt-2">
                    <input name="content" type="text" class="form-control" id="releasedateid"
                        placeholder="Enter content">
                </div>
            </div>

            <div class="form-group row">
                <label for="publisherid" class="col-md-2 col-form-label mt-2">
                    Description</label>
                <div class="col-md-6 mt-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" placeholder="Type desc">
                    </textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="releasedateid" class="col-md-2 col-form-label">Upload</label>
                <div class="col-md-6 mt-2">
                    <input name="image" type="file" class="form-control" id="releasedateid"
                        placeholder="Enter content">
                </div>
            </div>

            <div class="col-md-9 mt-4">
                <div class="d-flex justify-content-center">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit
                            Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
