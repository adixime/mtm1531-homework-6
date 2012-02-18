<?php

require_once 'includes/filter-wrapper.php';

$errors = array();

$movie_title = filter_input(INPUT_POST, 'movie_title', FILTER_SANITIZE_STRING);
$director = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING);

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
	if(empty($movie_title)) {
		$errors['movie_title'] = true;
	}
	if (empty($director)) {
		$errors['director'] = true;
	}
	if (empty($errors)) {
		require_once 'includes/db.php';
		
		$sql = $db->prepare('
			INSERT INTO movie_database (movie_title, director)
			VALUES (:movie_title, :director)
		');
		$sql->bindValue(':movie_title', $movie_title, PDO::PARAM_STR);
		$sql->bindValue(':director', $director, PDO::PARAM_STR);
		$sql->execute();
		
		header('Location: index.php');
		exit;
	}
}

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Add a Dinosaur</title>
</head>

<body>

	<form method="post" action="add.php">
    	<div>
        	<label for="">Movie Name:<?php if (isset($errors['movie_title'])) : ?> <strong>is required</strong><?php endif; ?></label>
            <input id="movie_title" name="movie_title" value="<?php echo $movie_title; ?>" required>
        </div>
        <div>
        	<label for="director">director<?php if (isset($errors['director'])) : ?> <strong>is required</strong><?php endif; ?></label>
            <input id="director" name="director" value="<?php echo $director; ?>" required>
        </div>
        <button type="submit">Add</button>
    </form>

</body>
</html>