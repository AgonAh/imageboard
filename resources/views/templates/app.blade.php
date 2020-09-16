<!DOCTYPE html>
<html>
<head>
	<title>MilkChan</title>
	<link rel="stylesheet" type="text/css" href="/resources/style.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/resources/pagination.css">
    <script src="/resources/script.js"></script>
    <link rel="icon" href="/resources/favicon.png" type="image/x-icon"/>
    {{session_start()}}

</head>
<body>
    <?php if(isset($pageName)):?>
        @include('requires/header')
        @include('messager')
    <?php endif ?>
    @yield('content')
</body>
</html>
