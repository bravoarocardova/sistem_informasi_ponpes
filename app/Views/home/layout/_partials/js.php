<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="<?= base_url() ?>js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
    window.addEventListener('scroll', function() {
      if (window.scrollY > 1) {
        document.getElementById('navbarscrl').classList.add('fixed-top');
        // add padding top to show content behind navbar
        navbar_height = document.querySelector('.navbar').offsetHeight;
        document.body.style.paddingTop = navbar_height + 'px';
      } else {
        document.getElementById('navbarscrl').classList.remove('fixed-top');
        // remove padding top from body
        document.body.style.paddingTop = '0';
      }
    });
  });
</script>