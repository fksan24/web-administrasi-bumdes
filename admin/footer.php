<!-- Footer -->
<footer class="w3-container w3-padding-16 w3-red">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Kembali ke atas</a>
  <p>@copyrightprojectkelompok1</p>
</footer>
  
  <!-- Akhir konten page -->

  <!-- Java Script -->
  <script>
    // Ambil Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Ambil DIV dengan efek overlay
    var overlayBg = document.getElementById("myOverlay");

    // Tampilan antara menampilkan dan menyembunyikan sidebar, dan menambahkan efek overlay
    function w3_open() {
      if (mySidebar.style.display === 'block') {
      mySidebar.style.display = 'none';
      overlayBg.style.display = "none";
    } else {
      mySidebar.style.display = 'block';
      overlayBg.style.display = "block";
      }
    }

    // Close the sidebar with the close button
    function w3_close() {
      mySidebar.style.display = "none";
      overlayBg.style.display = "none";
    }

    function myAccFunc() {
      var x = document.getElementById("demoAcc");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-red";
      } else {
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-red", "");
      }
    }

    function myAccFunc0() {
      var x = document.getElementById("demoAcc0");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-red";
      } else {
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-red", "");
      }
    }
  </script>
</body>
</html>