/*Using PDO, the syntax for connecting to a database is

$db = new PDO("pgsql:host=your_host_name;
                     port=your_database_port;
                     dbname=your_database_name", 
                     your_user_name, 
                     your_password);
And if the connection attempt fails, it will throw an exception.

If you were connecting to a database hosted on your own computer, you could use something like:*/

try
{
  $user = 'postgres';
  $password = 'password';
  $db = new PDO('pgsql:host=localhost;dbname=myTestDB', $user, $password);

  // this line makes PDO give us an exception when there are problems,
  // and can be very helpful in debugging! (But you would likely want
  // to disable it for production environments.)
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

------------------------------------------------------------------------------

/*CONNECTING TO DATABASES AT HEROKU
Heroku automatically creates an environment variable DATABASE_URL 
for the admin Postgres user and its password, along with the hostname 
and port of the database instance.

You can access this environment variable in PHP and parse it.*/

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

/*Please note that the above code gets these values from the Heroku 
environment variable. You can essentially copy and paste it and use 
it as is. You do not need to replace the values in that code with 
your actual values. For example:*/

/*You SHOULD do this:*/
$dbUrl = getenv('DATABASE_URL');
/*You SHOULD NOT do this:*/
$dbUrl = getenv('postgres://fqhkwvxsdfhjejha:0809144c3cc00ba237ac0ceed358da673e39c7c3a291e5403f954bf04adc9cf@ec2-23-23-130-158.compute-1.amazonaws.com:5432/d387pkr4ml56re9');

/*You SHOULD do this:*/
$dbUser = $dbOpts["user"];
/*You SHOULD NOT do this:*/
$dbUser = $dbOpts["fqhkwvxsdfhjejha"];


---------------------------------------------------------------------------------------

/*Issuing Queries
Once you have a connection, you can then issue queries.*/
foreach ($db->query('SELECT username, password FROM note_user') as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo '<br/>';
}
--or--
$statement = $db->query('SELECT username, password FROM note_user');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo 'user: ' . $row['username'] . ' password: ' . $row['password'] . '<br/>';
}
--or--
$statement = $db->query('SELECT username, password FROM note_user');
$results = $statement->fetchAll(PDO::FETCH_ASSOC);


--------------------------------------------------------------------------------------

---Using Prepared Statements
/*As mentioned, one of the strengths of PDO is the ease of using prepared 
statements to help you avoid SQL injection.*/


$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
--or
$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
$stmt->execute(array(':name' => $name, ':id' => $id));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);