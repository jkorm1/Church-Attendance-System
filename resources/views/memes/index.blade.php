<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memes</title>
</head>
<body>
    <h1>Memes</h1>
    <ul>
        @foreach ($memes as $meme)
            <li>
                <h2>{{ $meme->title }}</h2>
                <img src="{{ $meme->image_url }}" alt="{{ $meme->title }}" style="max-width: 300px;">
            </li>
        @endforeach
    </ul>
</body>
</html>
