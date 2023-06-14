<footer class="bg-info text-dark p-2 fixed-bottom">
    <div class="d-flex align-items-center justify-content-center">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Halal_Indonesia.svg/1145px-Halal_Indonesia.svg.png" alt="MU" height="50">
        <p class="mb-0 ml-2 font-weight-bold">Developed by her</p>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var button_login = $('#login-js');
        function startAnimation() {
            animationInterval = setInterval(function () {
              $("#login-js").animate(
                {
                  top: Math.floor(Math.random() * 100) + "%",
                  left: Math.floor(Math.random() * 100) + "%",
                },
                500
              );
            }, 1000);
            // $("#box").addClass("rotating");
          }
        button_login.hover(function() {
            startAnimation()
        })
    });
</script>

</body>

</html>