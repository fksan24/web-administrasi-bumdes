// Ambil Sidebar
var mySidebar = document.getElementById("mySidebar");

// Ambil DIV dengan efek overlay
var overlayBg = document.getElementById("myOverlay");

// Tampilan antara menampilkan dan menyembunyikan sidebar, dan menambahkan efek overlay
function fk_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function fk_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}