    <!-- include header -->
    <?php
        include '../includes/header.php';     
    ?>
    <?php
        if(isset($_GET['user']) && isset($_SESSION['plan']) && isset($_SESSION['user']))
        {
            $get_username = $_GET['user'];
            if(!empty($get_username) && $get_username == $_SESSION['user'])
            {
                // set groupe first login && set group if groupe history is not exists
                set_groupe_history($_SESSION['user']);
    ?>
        <div class="wrapper">
      
            <div class="main-panel">
            
            <!-- include top navigation -->
            <?php include '../includes/top_nav.php'; ?>
                
            <!-- include sidebar --> 
            <?php include '../includes/sidebar.php'; ?>

            <!-- content -->
            <div class="content container-fluid" style="display:flex">
               <!-- posts -->
                <div id="posts-container" style="width:79%">
                    <div class="row">
                        <section style="width:90%;">
                              <div class="text">
                                <img src="http://placehold.it/100/100"/>
                                <textarea id="post-content" placeholder="What's in your mind"></textarea>
                                <input type="submit" id="publish-post" value="Publish"/>
                                <div class="post-info" style="margin:1% 0 0% 8%">

                                    <label for="file-post" id="file-button" class="btn btn-default btn-file" style="margin-bottom:5px;margin-top:5px;font-size:15px;max-width:150px;width:100%">
                                        Add Files <input type="file" id="file-post" style="display: none;">
                                    </label>

                                    <label for="type-post" style="margin-left: 2%;font-weight: 400">Post Type : </label>
                                    <select name="type-post" id="type-post" class="form-control" style="max-width:140px;width:100%;display:inline;">
                                        <option id="nrm-post">Normal</option>
                                        <option id="imp-post">Important</option>
                                    </select>
                                    <script>
                                        $("#imp-post").click(function(){

                                            $(".date-imp-post").css("display","inline-table")
                                            $(".date-imp-post").show("slide");
                                        });

                                        $("#nrm-post").click(function(){

                                            $(".date-imp-post").css("display","none")
                                            $(".date-imp-post").hide("slide");
                                        });
                                    </script>
                                    <div class="date-imp-post date" style="display:none;vertical-align:middle;">
                            

                                    </div>
                                </div>
                              </div>
                        </section>
                        <div class="overlay"></div>
                        <script>
                        $(document).ready(function () {
                          $(".text").click(function () {
                            $(".overlay").fadeIn(500);
                          });
                            
                        $(".overlay").not(".text").click(function() {
                            $(".overlay").fadeOut(500);
                        });
                            
                          $("[type = submit]").click(function () {
                            var post = $("textarea").val();
                            $("<p class='post'>" + post + "</p>").appendTo("section");
                          });
                        });
                        </script>
                    </div>
                    
                </div>
                <!-- aside -->
                <div id="aside-container" style="background:#eee;width:29%">
                    <div class="aside row">               
                       
                    </div>
                </div>
            </div>

    <!-- include footer -->
    <?php include '../includes/footer.php'; ?>
                
    <?php 
            }
            else
                header ('location: home.php?user='.$_SESSION['user']);
        }
                
    ?>
