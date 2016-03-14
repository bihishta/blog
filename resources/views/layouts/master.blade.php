<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <title>Welcome to Blog</title>

</head>

<body>
@yield('content')

<div id="sidebar">
@section('advertisement')
    <p>buy something</p>
    <!-- for closing the section and displaying the above text-->
    @show
</div>


</body>
</html>