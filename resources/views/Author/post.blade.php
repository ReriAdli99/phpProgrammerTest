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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/post">post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/user">user</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/logout">logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<table>
<thead>
    <tr>
        <th>title</th>
        <th>content</th>
        <th>aksi</th>
    </tr>
</thead>
<tbody>
    @foreach($post as $p)
    <tr>
        <td>{{$p->title}}</td>
        <td>{{$p->content}}</td>
        <td>
            <a href="{{route('post.edit',$p->id)}}">edit</a>
            <div class="btn-group">
                <form action="{{route('post.hapus',$p->id)}}" method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button style="width:100px" >Hapus</button>
                </form>
            </div> 
        </td>
    </tr>
    @endforeach
</tbody>
<a href="/tambahpost">tambah post</a>
</table>
</body>
</html>