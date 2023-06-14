<footer>
    <p>Footer</p>
</footer>

<style>
    footer {
        background-color: #333;
        color: #fff;
        padding: 1%;
        text-align: center;
        font-size: 2vw;
    }

    @media(max-width: 768px) {
        footer {
            font-size: 3vw;
        }
    }
</style>
<script src="<?=base_url('js/jquery.js') ?>"></script>
<script>
    $(document).ready(function() {
        //mengambil url aktif
        var url = window.location.href;
        //memecah url berdasarkan tanda "/"
        var activePage = url;
        //looping a href di dalam class sidebar
        console.log($('.sidebar li a'))
        $('.sidebar li a').each(function() {
            //mengambil url pada tiap href
            var linkPage = this.href;
            //jika url pada href sama dengan url aktif
            if (activePage == linkPage) {
                $(this).closest("li").addClass("active");
            }
        });
    }) 
</script>
</body>
</html>