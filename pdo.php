<?php 

/********* PDO WITH PREPAIRED STATEMENT*************/


////////////CREATE DATABASE CONNECTION///////////////


try {
	$conn = new PDO("mysql:host=localhost; dbname=php;", "root", "");
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Connection failed! " . $e->getMessage();
}




///////////GET DATA/////////////


try {
	$q = "SELECT * FROM student WHERE id = :id";

	$stmt = $conn->prepare($q);

	$id = 2;
	// $stmt->bindParam('id', $id);

	$stmt->bindColumn(1, $id);
	$stmt->bindColumn(2, $name);
	$stmt->bindColumn(3, $address);
	$stmt->bindColumn(4, $age);

	$stmt->execute(['id'=>2]);

	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	echo "<pre>";
	var_dump($result);
}
catch(PDOException $e) {
	echo $e->getMessage();
}




//////////////INSERT DATA////////////////


// try {
// 	$q = "INSERT INTO student(name, addr, age) VALUES(:name, :address, :age)";

// 	$stmt = $conn->prepare($q);

// 	//var_dump($stmt->execute(['name'=>"TTT", 'address'=>"fdf", 'age'=>88]));
	
// 	$stmt->bindParam('name', $name, PDO::PARAM_STR);
// 	$stmt->bindParam('address', $address, PDO::PARAM_STR);
// 	$stmt->bindParam('age', $age, PDO::PARAM_INT);

// 	$name = "TTT";
// 	$address = "sdfd";
// 	$age = 44;

// 	var_dump($stmt->execute());
// }
// catch(PDOException $e) {
// 	echo $e->getMessage();
// }




/////////////DELETE DATA///////////////////


// try {
// 	$q = "DELETE FROM student WHERE id = :id";

// 	$stmt = $conn->prepare($q);

// 	// $result = $stmt->execute(['id'=>7]);

// 	$stmt->bindParam('id', $id, PDO::PARAM_INT);

// 	$id = 6;

// 	$result = $stmt->execute();

// 	var_dump($result);
// }
// catch(PDOException $e) {
// 	echo $e->getMessage();
// }




///////////////////UPDATE DATA/////////////////


// try {
// 	$q = "UPDATE student SET name = :name, addr = :address, age = :age WHERE id = :id";

// 	$stmt = $conn->prepare($q);

// 	// $stmt->execute(['name'=> "QSQ", 'address'=>'dfjk', 'age'=> 345, 'id'=> 5]);

// 	$stmt->bindParam('name', $name, PDO::PARAM_STR);
// 	$stmt->bindParam('address', $address, PDO::PARAM_STR);
// 	$stmt->bindParam('age', $age, PDO::PARAM_INT);
// 	$stmt->bindParam('id', $id, PDO::PARAM_INT);

// 	$name = "ETR";
// 	$address = "sdsdf";
// 	$age = 3478;
// 	$id = 5;

// 	$stmt->execute();
// }
// catch(PDOException $e) {
// 	echo $e->getMessage();
// }




/////////UNSET STATEMENT HANDLE////////////


unset($stmt);


