<?php 
    session_start();
    // This is to check if the user didn't login
    if(!isset ($_SESSION['lastVisited'])) {
        $_SESSION['lastVisited'] = "pageLogin.php";
    }
?>
<!DOCTYPE html>
<html>
    <?php include("head.php"); ?>
    <div class="account-pages"></div>
        <div class="clearfix"></div>

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12 text-center">

                        <div class="home-wrapper">
                            <!-- <div class="row" style="align-content: center;">
                                <div class="col-sm-4 form-group">
                                    <div class="text-center">
                                        <button id="goBack" type="submit" class="btn btn-primary waves-effect waves-light">Back <i class="fa fa-arrow-circle-o-left"></i></button>
                                    </div>
                                </div>
                            </div> -->

                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="122" height="122" viewBox="0 0 122 122">
                                <defs>
                                    <path id="gear" d="M72,52.4v-8.8l-5.4-0.9c-0.4-1.5-1-2.9-1.7-4.1l3.2-4.4l-6.2-6.3L57.4,31c-1.3-0.7-2.7-1.3-4.1-1.7L52.4,24h-8.8l-0.9,5.4  c-1.5,0.4-2.8,1-4.1,1.7L34.2,28l-6.3,6.2l3.2,4.4c-0.7,1.3-1.3,2.7-1.7,4.2L24,43.6v8.8l5.4,0.9c0.4,1.5,1,2.8,1.7,4.1l-3.2,4.5  l6.2,6.2l4.5-3.2c1.3,0.7,2.7,1.3,4.2,1.7l0.9,5.3h8.8l0.9-5.4c1.4-0.4,2.8-1,4.1-1.7l4.5,3.2l6.2-6.2l-3.2-4.5  c0.7-1.3,1.3-2.6,1.7-4.1L72,52.4z M48,57.2c-5.1,0-9.2-4.1-9.2-9.2c0-5.1,4.2-9.2,9.2-9.2s9.2,4.1,9.2,9.2S53.1,57.2,48,57.2z"
                                    />
                                </defs>
                                <g transform="scale(0.77)">
                                    <use xlink:href="#gear" fill="#5b69bc">
                                        <animateTransform attributeType="XML" attributeName="transform" type="rotate"
                                                          from="0 48 48" to="360 48 48" dur="12s"
                                                          repeatCount="indefinite"/>
                                    </use>
                                </g>
                                <g transform="scale(0.6) translate(83 13)">
                                    <use xlink:href="#gear" fill="#10c469">
                                        <animateTransform attributeType="XML" attributeName="transform" type="rotate"
                                                          from="360 48 48" to="0 48 48" dur="12s"
                                                          repeatCount="indefinite"/>
                                    </use>
                                </g>
                                <g transform="scale(0.435) translate(37 139)">
                                    <use xlink:href="#gear" fill="#f9c851">
                                        <animateTransform attributeType="XML" attributeName="transform" type="rotate"
                                                          from="360 48 48" to="0 48 48" dur="12s"
                                                          repeatCount="indefinite"/>
                                    </use>
                                </g>
                                <g transform="scale(0.935) translate(36 39)">
                                    <use xlink:href="#gear" fill="#ff8acc">
                                        <animateTransform attributeType="XML" attributeName="transform" type="rotate"
                                                          from="0 48 48" to="360 48 48" dur="12s"
                                                          repeatCount="indefinite"/>
                                    </use>
                                </g>
                            </svg>
                            <h1 class="home-text text-uppercase text-custom"><?php echo $translations['A01081'][$language]; /* Site is Under Maintenance */ ?></h1>
                            <p class="text-muted"><?php echo $translations['A01082'][$language]; /* We're making the system more awesome.we'll be back shortly. */ ?></p>
                            <!-- <div class="row" style="align-content: center;">
                                <div class="col-sm-4 form-group">
                                    <div class="text-center">
                                        <button id="goBack" type="submit" class="btn btn-primary waves-effect waves-light">Back <i class="fa fa-arrow-circle-o-left"></i></button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
          </section>
    <script>
        var resizefunc = [];
    </script>
    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>
    <?php include("footer.php"); ?>
    <style type="text/css">
    .footer {
        left: 0px;
        text-align: center !important;
    }
    </style>
    <script type="text/javascript">
        $('#goBack').click(function() {
            var url = " <?php  echo $_SESSION['lastVisited']; ?>";
            if (url == 'pageLogin.php') {
                $.ajax({
                    type: 'POST',
                    url: 'scripts/reqLogin.php',
                    data: {type : "logout"},
                    success	: function(result) {
                        window.location.href = 'pageLogin.php';
                    },
                    error	: function(result) {
                        alert("Error!");
                    }
                });
            }
            else
                window.location.href = url;
        });
    </script>
</html>