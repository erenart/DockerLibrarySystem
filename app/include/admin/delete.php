<?php
@include 'config.php';

            $ID = $_GET["ID"];
            $target = $_GET["target"];
                    
            if ($target == "book") {
            $list = "DELETE FROM books WHERE ID=".$ID;
            $records = $booksconn->query($list);
            header("location:".$webURL."admin/books_panel");
            }
            elseif ($target == "user") {
            $list = "DELETE FROM user_log WHERE ID=".$ID;
            $records = $conn->query($list);
            header("location:".$webURL."admin/user_panel");
            }
            elseif ($target == "return") {
            $insert = "UPDATE books SET issued_user_ID = NULL WHERE ID =".$ID;
            mysqli_query($booksconn, $insert);
            $insert = "UPDATE books SET book_status = 'Available' WHERE ID =".$ID;
            mysqli_query($booksconn, $insert);
            $insert = "UPDATE books SET book_issued_on = NULL WHERE ID =".$ID;
            mysqli_query($booksconn, $insert);
            header("location:".$webURL."admin/issued_books");
            }
?>

