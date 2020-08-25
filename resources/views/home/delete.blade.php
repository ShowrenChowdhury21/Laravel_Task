<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>

	<h1>Delete!</h1>

    <form method="post">
        <h2>Are you sure you want to delete id = {{$user['id']}} and name = {{$user['name']}} ?</h2>
        <input type="button" onclick="window.location='/home'" name = "cancel" id= "cancel" value="cancel">
        <input type="submit" name = "destroy" id= "destroy" value="destroy">
    </form>
</body>
</html>