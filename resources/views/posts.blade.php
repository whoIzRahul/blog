<html lang="en">
<head>
    <title>My Blog</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>

    @foreach ($posts as $post)
        {!! $post !!} 
    @endforeach

</body>
</html>