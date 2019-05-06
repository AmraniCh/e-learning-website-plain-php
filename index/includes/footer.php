        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>
    </div>
</div>

    <!-- ajax scripts -->
    <script src="assets/js/ajax_load_image.js"></script>
    <script src="assets/js/ajax_create_group.js"></script>
    <script src="assets/js/ajax_change_group.js"></script>
    <script src="assets/js/ajax_delete_edit_group.js"></script>
    <script src="../../js/ajax_logout.js"></script>
    <script src="../js/ajax_upload_file.js"></script>
    <script src="../js/ajax_delete_file.js"></script>
    <script src="../js/ajax_delete_all.js"></script>   
    <!-- substruct file titles  -->
    <script>subtruct_title()</script>
    <!-- validation inputs  -->
    <script src="../js/validation.js"></script>
    <!-- download animation -->
    <script>
        $(document).ready(function() {
            $(".btn-download").click(function(e) {
                downloadAnimation(e);
            });
        });
    </script>
    <!-- add group form load -->
    <script>
        // click add groupe => load group form for add group
        $(document).ready(function() {
            $(document).on("click", "#btn-load-groupe-form", function() {
                $(".msg-container").css("display", "none");
                $("#top-panel").css("display", "none");
                $(".line").css("display", "none");
                load_add_groupe_form();
            });
        });
    </script>
    <!-- script php -->
    <script>let vall = "<?php echo $country ?>";</script>
        
    <?php
    
        // add group notification form
        if(isset($_GET['user']) && isset($_SESSION['plan']) && isset($_SESSION['user'])){         
            if($_SESSION['plan'] == 'professor'){
                $grp_count = get_group_count($username);
                // if count = 0 => show notification no groupe founded
                if($grp_count == 0)
                    echo '<script>load_add_groupe_notification();</script>';
            }
        }
    ?>

</body>




</html>