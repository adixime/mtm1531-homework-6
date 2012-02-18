<?php 

require_once 'includes/filter-wrapper.php';

require_once 'includes/db.php';
//var_dump($db);
//->exec() allows us to perform SQ: and NOT expect results
//->query() allows us to perform SQL and expect results
$results = $db->query(' SELECT id, movie_title, release_date, director 
						FROM movie_database 
						ORDER BY movie_title ASC
					');
//var_dump($db->errorInfo());
//var_dump($results);

?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Movie Database</title>
</head>

<body>

	<a href="add.php">Add a movie!</a>
    
	<ul>
		<?php /*foreach ($results as $movie) {
                echo '<li>' . $movie['movie_title'] . '</li>';
              }*/
        ?>
        
        <?php foreach ($results as $movie) : ?>
        	<li>
            	<a href="single.php?id=<?php echo $movie['id']; ?>"><?php echo $movie['movie_title']; ?></a>
                &bull;
                <a href="edit.php?id=<?php echo $movie['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $movie['id']; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
	</ul>

</body>
</html>
