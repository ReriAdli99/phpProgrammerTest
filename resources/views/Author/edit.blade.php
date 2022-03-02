<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form method="post" action="{{route('post.update',$post->id)}}" class="form-control">
@method('PATCH')
@csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{$post->title}}" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">content</label>
    <input type="text" name="content" class="form-control" id="exampleInputEmail1" value="{{$post->content}}" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">edit</button>
</form>
</body>
</html>