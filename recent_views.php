<?php 
// get the ID of the currently logged-in user (assuming you have authentication set up)
$user_id = $_SESSION['user_id'];

// query the recently_viewed table to get the most recently viewed items for this user
$db = new PDO('localhost', 'root', '1234');
if($db){
    echo "Faild to connect with db!";
}else{
    echo "db Connected!";
}
$stmt = $db->prepare('SELECT item_id FROM recently_viewed WHERE user_id = ? ORDER BY timestamp DESC LIMIT 5');
$stmt->execute([$user_id]);
$recently_viewed_items = $stmt->fetchAll(PDO::FETCH_COLUMN);

// loop through the recently viewed items and display them (you'll need to modify this code to match your application's specific implementation)
echo '<h2>Recently viewed items:</h2>';
echo '<ul>';
foreach ($recently_viewed_items as $item_id) {
  echo '<li><a href="/item.php?id=' . $item_id . '">Item #' . $item_id . '</a></li>';
}
echo '</ul>';

?>