<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
        <meta name="csrf-token" content="{{ csrf_token() }}">
  
    
    <title>Inertia App</title>
    @vite('default')
</head>
<body>
    <div id="app" data-page="{{ json_encode($page) }}"></div>
</body>
</html>
