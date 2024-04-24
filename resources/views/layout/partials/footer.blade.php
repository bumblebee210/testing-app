<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2023</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>

<script>
    
    new DataTable('#example');

</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var loadingScreen = document.getElementById('loading-screen');
        loadingScreen.style.display = 'none'; // Sembunyikan loading screen setelah halaman dimuat sepenuhnya
    });
</script>

<script>
  $(document).ready(function(){
    // Ketika ikon mata diklik
    $('#togglePassword').click(function(){
      // Mendapatkan tipe input saat ini
      var type = $('#password').attr('type');
      
      // Jika tipe input adalah 'password', ubah menjadi 'text'
      // Jika tipe input adalah 'text', ubah menjadi 'password'
      if(type === 'password') {
        $('#password').attr('type', 'text');
        $('#togglePassword i').removeClass('fa-eye').addClass('fa-eye-slash');
      } else {
        $('#password').attr('type', 'password');
        $('#togglePassword i').removeClass('fa-eye-slash').addClass('fa-eye');
      }
    });
  });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('.password-toggle');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('img').src = type === 'password' ? "{{ asset('../Icon/eye-pass.png') }}" : "{{ asset('../Icon/eye-pass.png') }}";
        });
    });
</script>

