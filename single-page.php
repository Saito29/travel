<?php 
include("path.php");
include(ROOT_PATH.'/app/controllers/comment.php');

$comment = array();

if(isset($_GET['psId'])){
    #select the id of the post
    $post = selectOne('post', ['id' => $_GET['psId']]);
    #$posts = getPublishedPosts();
}

#view counter
$postid = intval($_GET['psId']);
   
$sql = "SELECT viewer FROM post WHERE id = '$postid'";
$result = $conn->query($sql);
   
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $visits = $row["viewer"];
        $sql = "UPDATE post SET viewer = $visits+1 WHERE id ='$postid'";
        $conn->query($sql);  
    }
}
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="description" content="<?php echo $post['title']?> | Travel">
    <meta name="author" content="<?php echo $post['postedBy']?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']?> | Travel</title>
    <?php include(ROOT_PATH.'/app/includes/sg-css.php');?>
</head>
<body>
    <!--Header here-->
    <?php include (ROOT_PATH . "/app/includes/nav.php");?>
    <main>
        <!--Body-->
        <section class="container-fluid h-auto w-100 clearfix section section__height mb-3">
            <!--Content Page Details-->
            <div class="wrapper">
                <div class="row d-flex flex-grow-1">
                    <!--Main Content-->
                    <div class="container-fluid mt-3 col-md-8 clearfix h-auto mh-100">
                        <!--Content start-->
                        <div class="card h-auto w-100 border-0">
                            <div class="card-header bg-transparent border-success hstack gap-2">
                                <h6 class="card-title"><?php echo htmlspecialchars($post['title'])?></h6>
                                <p class="text-muted ms-auto">Posted: <?php echo date('F j, Y', strtotime($post['created_at']))?></p>
                                <div class="vr"></div>
                                <p class="text-muted"><i class='bx bx-show-alt'></i><?php echo htmlspecialchars($post['viewer'])?></p>
                            </div>
                            <div class="card-body">
                                <div class="card border-0">
                                    <div class="card-img-top d-flex align-items-center justify-content-center mb-3">
                                        <img src="<?php echo BASE_URL.'/app/upload/uploadThumbnail/'?><?php echo htmlspecialchars($post['image'])?>" alt="Thumbnail_post" class=" w-75 h-100 object-fit-md-cover">
                                    </div>
                                    <p class="card-text h-100 w-100"><?php echo html_entity_decode($post['description'])?></p>
                                </div>                                
                            </div>
                        </div>
                        
                        <!--End of Main content card-->

                        <!--Start Of comments Section here-->
                        <div class="row mt-3" id="comments">
                            <div class="col-md-8 clearfix w-100 h-auto">
                                <div class="card w-100 h-auto border-0">
                                    <div class="card-header bg-transparent border-success text-secondary fw-bold fs-5">Comments</div>
                                    <div class="card-body">
                                        <?php include(ROOT_PATH.'/app/helpers/updateAlert.php');?>
                                        <?php include(ROOT_PATH.'/app/helpers/formAlert.php');?>
                                        <!--Comments required to identify user-->
                                        <?php if(!isset($_SESSION['username']) && !isset($_SESSION['email'])):?>
                                        <form action="single-page.php" method="post" class="row g-3" enctype="application/x-www-form-urlencoded">
                                            <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($_GET['psId'])?>">
                                            <div class="mb-2 col-md-6 form-group">
                                                <label for="username" class="form-label">Username: </label>
                                                <input type="text" name="username" id="username" class="form-control bg-secondary-subtle" required>
                                                <p class="text-warning-emphasis">Required</p>
                                            </div>
                                            <div class="mb-2 col-md-6 form-group">
                                                <label for="email" class="form-label">Email: </label>
                                                <input type="email" name="email" id="email" class="form-control bg-secondary-subtle">
                                                <p class="text-warning-emphasis">Optional</p>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <p class="text-secondary-emphasis">Comment: </p>
                                                <textarea name="comment" class="form-control editor-comment"></textarea>                                                    
                                                <p class="text-warning-emphasis">Required</p>
                                            </div>
                                            <div class="mb-2 col-md-12 form-group">
                                                <button type="submit" name="postComment" class="btn read-more">Post<img width="32" height="32" src="https://img.icons8.com/fluency/48/sent.png" alt="sent"/></button>
                                            </div>
                                        </form>
                                        <?php endif;?>

                                        <?php if(isset($_SESSION['username']) && isset($_SESSION['email'])):?>
                                        <form action="single-page.php" method="post" class="row g-3" enctype="application/x-www-form-urlencoded">
                                            <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($_GET['psId'])?>">
                                            <input type="hidden" name="username" value="<?php echo htmlspecialchars($_SESSION['username'])?>">
                                            <input type="hidden" name="email" value="<?php echo htmlspecialchars($_SESSION['email'])?>">
                                            <div class="col-md-12 form-group">
                                                <p class="text-secondary-emphasis">Comment: </p>
                                                <textarea name="comment" class="form-control editor-comment"></textarea>                                                    
                                                <p class="text-warning-emphasis">Required</p>
                                            </div>
                                            <div class="mb-2 col-md-12 form-group">
                                                <button type="submit" name="postComment" class="btn read-more">Post<img width="32" height="32" src="https://img.icons8.com/fluency/48/sent.png" alt="sent"/></button>
                                            </div>
                                        </form>
                                        <?php endif;?>
                                    </div>

                                    <!--Post comment here-->
                                    <div class="row mt-3 py-3">
                                        <div class="col-md-8 w-100 h-100">
                                            <!--Start post comment-->
                                            <?php
                                                $postId = (isset($_GET['psId']) && is_numeric($_GET['psId'])) ? (int) $_GET['psId'] : null; // Validate the post_id

                                                if (!empty($postId)) {
                                                    $sql = "SELECT * FROM comments
                                                            WHERE post_id = ? AND status = 1";  

                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param('i', $postId);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    if ($result->num_rows > 0) { // Check for comments before displaying the HTML structure
                                                        echo '<h5 class="text-secondary-emphasis card-title mb-3">Recent Comments: ' . $result->num_rows . '</h5>';

                                                        while ($row = $result->fetch_assoc()) {                                                            
                                                            echo '<div class="card h-auto w-100 mx-auto my-2 mb-4">';
                                                            echo '<div class="card-header border-0 bg-transparent border-secondary-subtle hstack gap-2">';
                                                            echo '<img src="' . BASE_URL . '/asset/img/profile/icons8-people.gif" class="rounded-circle" style="width: 40px; height: 40px;" width="40" height="40" alt="Profile image">';
                                                            echo '<p class="card-title text-secondary-emphasis fw-bold">' . htmlspecialchars($row['username']) . '</p>';
                                                            echo '<p class="card-title text-secondary-emphasis fw-medium">Post a comment</p>';
                                                            echo '<p class="card-text text-secondary ms-auto">' . date("Fj Y | h:i:a", strtotime($row['created_at'])) . '</p>';
  
                                                            echo '</div>';
                                                            echo '<div class="card-body">';
                                                            echo '<div class="card-text">' . htmlspecialchars_decode($row['comments']) . '</div>'; 
                                                            echo '</div>';
                                                            echo '</div>';
                                                        }
                                                    } else {
                                                        echo '<p class="text-secondary-emphasis">No comments found for this post.</p>';
                                                    }

                                                $result->close();
                                                $stmt->close();
                                                } 
                                            ?>
                                            <!--end of card content-->
                                        </div>
                                    </div>
                                    <!--End of comment here-->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--ENd of Main content section-->

                    <!--Sidebar popular Content-->
                    <div class="container-fluid col-md-4 mt-3 clearfix">
                        <!--Google Widgets -->
                        <div class="card mb-3 w-auto">
                            <h5 class="card-header bg-transparent text-secondary">Google Widgets</h5>
                            <div class="card-body">
                                <?php echo html_entity_decode($post['googleWidget'])?>
                            </div>
                        </div>
                        <!--End o google widgets-->
                        <!--Post content-->
                        <div class="card h-auto w-100" id="post">
                            <h5 class="card-header bg-transparent">Popular Post</h5>
                            <div class="card-body">
                                <?php
                                    // Prepare the SQL statement with placeholders for LIMIT and escaping field names
                                    $sql = "SELECT p.id, p.title, p.image FROM post p WHERE p.is_Active = 1 LIMIT ?";

                                    // Create a prepared statement
                                    $stmt = mysqli_prepare($conn, $sql);

                                    // Bind parameter (limit) to prevent SQL injection
                                    if ($stmt) {
                                        $limit = 5; // Adjust the limit as needed
                                        mysqli_stmt_bind_param($stmt, 'i', $limit);

                                        // Execute the prepared statement
                                        mysqli_stmt_execute($stmt);

                                        // Get the result set
                                        $result = mysqli_stmt_get_result($stmt);

                                        // Fetch all results as associative arrays
                                        while ($post = mysqli_fetch_assoc($result)) {
                                            echo '<div class="card mb-2 border-0">';
                                            echo '  <img src="' . BASE_URL . '/app/upload/uploadThumbnail/' . htmlentities($post['image']) . '" class="card-img-top w-50" alt="Thumbnail_post" width="75" height="75">';
                                            echo '  <div class="card-body">';
                                            echo '    <a class="card-text" href="' . BASE_URL . '/single-page.php?psId=' . htmlentities($post['id']) . '"><p>' . htmlentities($post['title']) . '</p></a>';
                                            echo '  </div>';
                                            echo '</div>';
                                        }

                                        // Close the result set and statement (optional)
                                        mysqli_stmt_close($stmt);
                                    } else {
                                        // Handle statement preparation error (log or display an error message)
                                        error_log("Failed to prepare statement: " . mysqli_error($conn));
                                    }
                                ?>
                            </div>
                        </div>
                        <!--End of Post Content-->
                        <!--============= Sidebar Category ==============-->
                        <div class="card mt-3 clearfix" id="category">
                            <h5 class="card-header">Recent Blog Post</h5>
                            <ul class="list-group list-group-flush px-2 py-3">
                                <?php
                                    // Prepare the SQL statement with a placeholder for LIMIT
                                    $sql = "SELECT * FROM `post` WHERE is_Active = 1 LIMIT ?";

                                    // Create a prepared statement
                                    $stmt = mysqli_prepare($conn, $sql);

                                    // Bind parameter (limit) to prevent SQL injection
                                    if ($stmt) {
                                        $limit = 10; // Adjust the limit as needed
                                        mysqli_stmt_bind_param($stmt, 'i', $limit);

                                        // Execute the prepared statement
                                        mysqli_stmt_execute($stmt);

                                        // Get the result set
                                        $result = mysqli_stmt_get_result($stmt);

                                        // Fetch all results as associative arrays
                                        while ($title = mysqli_fetch_assoc($result)) {
                                            echo '<li class="list-group-item">';
                                            echo '  <a href="' . BASE_URL . '/single-page.php?psId=' . htmlentities($title['id']) . '" class="text-success px-2">' . htmlentities($title['title']) . '</a>';
                                            echo '</li>';
                                        }

                                        // Close the result set and statement (optional)
                                        mysqli_stmt_close($stmt);
                                    } else {
                                        // Handle statement preparation error (log or display an error message)
                                        error_log("Failed to prepare statement: " . mysqli_error($conn));
                                    }
                                ?>
                            </ul>
                        </div>
                        <!--============= End of Sidebar category ================-->
                    </div>
                    <!--End of sidebar popular content section-->
                </div>
            </div>
        </section>
    <!--Footer-->
    <?php include (ROOT_PATH . "/app/includes/footer.php");?>        
</main>
<?php include(ROOT_PATH.'/app/includes/scripts.php');?>
</body>
</html>