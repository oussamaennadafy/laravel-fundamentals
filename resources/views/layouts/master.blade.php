<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
 <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
 <header class="flex items-center justify-between">
  <img class="img" src="{{asset('/imgs/logo.webp')}}" alt="logo">
  <nav>
   <ul class="flex items-center justify-center gap-4">
    <li>
     <a href="/posts/create">Create Post</a>
    </li>
    <li>
     <a href="#">about</a>
    </li>
   </ul>
  </nav>
 </header>
 @yield('content')
 <footer>
  <p>all rights are reserved</p>
 </footer>
</body>

</html>