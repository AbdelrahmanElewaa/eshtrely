<?php

//submit_rating.php
session_start();
$conn= new mysqli("localhost","root","","eshtrely");
   

if(isset($_POST["rating_data"]))
{

    $data = array(
        'user_id'        =>    $_SESSION["id"],

        'product_id'        =>    $_POST["ID"],
        ':user_rating'        =>    $_POST["rating_data"]
        
    );

    $sql= "INSERT INTO  `rating` ( `userid`, `productid`, `productrating`) VALUES ('".$_SESSION['id']."','".$_POST['ID']."','".$_POST["rating_data"]."')";
    if ($conn->query($sql)) {
       echo "dehk";
    }
}

if(isset($_POST["action"]))
{
    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_user_rating = 0;
    $review_content = array();

    $sql = "
    SELECT * FROM rating 
    ORDER BY userid DESC
    ";

    $result = $conn->query($query, PDO::FETCH_ASSOC);

    foreach($result as $row)
    {
        $review_content[] = array(
            
            'user_id'        =>    $row["id"],

        'product_id'        =>    $row["productid"],
        'rating'        =>    $row["productrating"]
        );

        if($row["productrating"] == '5')
        {
            $five_star_review++;
        }

        if($row["productrating"] == '4')
        {
            $four_star_review++;
        }

        if($row["productrating"] == '3')
        {
            $three_star_review++;
        }

        if($row["productrating"] == '2')
        {
            $two_star_review++;
        }

        if($row["productrating"] == '1')
        {
            $one_star_review++;
        }

        $total_review++;

        $total_user_rating = $total_user_rating + $row["productrating"];

    }

    $average_rating = $total_user_rating / $total_review;

    $output = array(
        'average_rating'    =>    number_format($average_rating, 1),
        'total_review'        =>    $total_review,
        'five_star_review'    =>    $five_star_review,
        'four_star_review'    =>    $four_star_review,
        'three_star_review'    =>    $three_star_review,
        'two_star_review'    =>    $two_star_review,
        'one_star_review'    =>    $one_star_review,
        'review_data'        =>    $review_content
    );

    echo json_encode($output);

}

?>