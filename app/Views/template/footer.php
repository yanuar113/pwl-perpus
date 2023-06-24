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
<script src="<?= base_url('js/jquery.js') ?>"></script>
<?= $this->renderSection('script') ?>
<script>
    $(document).ready(function() {
        $('.sidebar li a').each(function() {
            this.onclick = function() {
                $("li").removeClass("active");
                let id = this.id;
                document.title = id
                let url = "<?= base_url() ?>" + id
                window.history.pushState({urlPath:url},"",url);
                $(this).closest("li").addClass("active");
                $.get(url, function(data) {
                    let content = $($.parseHTML(data)).find(".content").html();
                    $('.content').html(content)
                })
            }
        });
    })
</script>
</body>

</html>