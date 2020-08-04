<?php 

include('config/db_connect.php');

//connect to database
$conn =mysqli_connect('host localhost', 'user beep', 'password would be here', 'name pickoutpizza');

//check connection
if (!$conn) {
    echo 'Connection Error: ' . mysqli_connect_error();
}

//write query for all pizzas
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

//make query & get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connection 
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php')?>

    <h4 class="center text2">ANY toppings. ANY ingredients.</h4>
    <div class="center">

        <?php 

            if(count($pizzas) == 2){
              echo "Add two more pizzas to receive a ten percent discount!";
             }
            elseif(count($pizzas) == 3){
             echo "Add one more pizza to receive a ten percent discount!";
             }
            elseif(count($pizzas) >= 4){
             echo "Your order is currently having a ten percent discount!";
            }

        ?>

    <div class="container">
        <div class="row">
            <?php foreach($pizzas as $pizza): ?>

                <div class="col s6 md3" style="font-size: 1.5rem">
                    <div class="card z-depth-0">
                    <img src="img/pizza.png" alt="pickoutpizza" class="imgpickoutpizza">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <ul>
                                <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>

                                    <li><?php echo htmlspecialchars($ing); ?></li>

                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">More Informations</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>          

        </div>
    </div>

    <?php include('templates/footer.php')?>

</html>