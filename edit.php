<?php

require_once 'includes/filter-wrapper.php';

$errors = array();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
	header('Location: index.php');
	exit;
}

$movie_title = filter_input(INPUT_POST, 'movie_title', FILTER_SANITIZE_STRING);
$director = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING);
$release_date = filter_input(INPUT_POST, 'release_date', FILTER_SANITIZE_STRING);


if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
	if(empty($movie_title)) {
		$errors['movie_title'] = true;
	}
	if (empty($director)) {
		$errors['director'] = true;
	}
	if (empty($release_date)) {
		$errors['release_date'] = true;
	}
	if (empty($errors)) {
		require_once 'includes/db.php';
		
		$sql = $db->prepare('
			UPDATE movie_database
			SET movie_title = :movie_title, director = :director, release_date = :release_date
			WHERE id = :id
		');
		$sql->bindValue(':movie_title', $movie_title, PDO::PARAM_STR);
		$sql->bindValue(':director', $director, PDO::PARAM_STR);
		$sql->bindValue(':release_date', $release_date, PDO::PARAM_STR);
		$sql->bindValue(':id', $id, PDO::PARAM_STR);
		$sql->execute();
		
		header('Location: index.php');
		exit;
	}
}else {
	require_once 'includes/db.php';
	
	$sql = $db->prepare('
		SELECT id, movie_title, director, release_date
		FROM movie_database
		WHERE id = :id
	');
	$sql->bindValue(':id', $id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch();
	
	$movie_title = $results['movie_title'];
	$director = $results['director'];
	$release_date = $results['release_date'];
}

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit a Movie</title>
	<link href="css/general.css" rel="stylesheet">
</head>

<body>

	<form method="post" action="edit.php?id=<?php echo $id; ?>">
    	<div>
        	<label for="">Movie Name:<?php if (isset($errors['movie_title'])) : ?> <strong>is required</strong><?php endif; ?></label>
            <input id="movie_title" name="movie_title" value="<?php echo $movie_title; ?>" required>
        </div>
        <div>
        	<label for="director">director<?php if (isset($errors['director'])) : ?> <strong>is required</strong><?php endif; ?></label>
            <input id="director" name="director" value="<?php echo $director; ?>" required>
        </div>
		<div>
        	<label for="release_date">Release Date<?php if (isset($errors['release_date'])) : ?> <strong>is required</strong><?php endif; ?></label>
            <input id="release_date" name="release_date" value="<?php echo $release_date; ?>" required>
        </div>
        <button type="submit">Update</button>
    </form>

</body>
</html>