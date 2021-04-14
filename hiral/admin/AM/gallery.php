<?php
include "header.php";
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gallery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="header.php">Home</a></li>
              <li class="breadcrumb-item active">Gallery</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title">
                  Event Gallery with Member's Lightbox
                </div>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="javascript:void(0)" data-filter="all">All Event Picture's Member's </a>
                  </div>
                  <div class="mb-2">
                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle Member's </a>
                    <div class="float-right">
                      <select class="custom-select" style="width: auto;" data-sortOrder>
                        <option value="index"> Sort by Position </option>
                        <option value="sortData"> Sort by Custom Data </option>
                      </select>
                      <div class="btn-group">
                        <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row">
                  <div class="filtr-item col-sm-2" data-category="7" data-sort="white sample">
                      <a href="dist/img/Samaj.png?text=1" data-toggle="lightbox" data-title="<i>Shree</i> <b><i><u>Padmashali</u></i></b> Samaj <b>Gujarat</b>">  
                        <img src="dist/img/Samaj.png?text=1" class="img-fluid mb-2" />
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                      <a href="dist/img/pravin.jpg?text=1" data-toggle="lightbox"  data-title="Parvin N. Koruduvar" >  
                        <img src="dist/img/pravin.jpg?text=1" class="img-fluid mb-2" />
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2" data-sort="black sample">
                      <a href="dist/img/shash.png?text=2" data-toggle="lightbox" data-title="<b><u>Shashank</u></b> <b><u>Adepawar</u></b>">
                        <img src="dist/img/shash.png?text=2" class="img-fluid mb-2"/>
                      </a>
                  </div>
                  <div class="filtr-item col-sm-2" data-category="3" data-sort="white sample">
                      <a href="dist/img/v.jpg?text=2" data-toggle="lightbox" data-title="<b><u>Vivek</u></b>  <b><u>Tiwari</u></b>">
                        <img src="dist/img/v.jpg?text=2" class="img-fluid mb-2"/>
                      </a>
                </div>
                <div class="filtr-item col-sm-2" data-category="3" data-sort="white sample">
                      <a href="dist/img/pintu.jpg?text=2" data-toggle="lightbox" data-title="<b><u>Pintu</u></b> <b><u>Modi</u></b>">
                        <img src="dist/img/pintu.jpg?text=2" class="img-fluid mb-2"/>
                      </a>
                </div>
                <div class="filtr-item col-sm-2" data-category="3" data-sort="white sample">
                      <a href="dist/img/sho.jpg?text=2" data-toggle="lightbox" data-title="<b><u>Soyam</u></b> <b><u>Adepawar</u></b>">
                        <img src="dist/img/sho.jpg?text=2" class="img-fluid mb-2"/>
                      </a>
                </div>
                    <div class="filtr-item col-sm-2" data-category="5" data-sort="black sample">
                      <a href="dist/img/f.jpg?text=2" data-toggle="lightbox" data-title="Event">
                        <img src="dist/img/f.jpg?text=2" class="img-fluid mb-2"/>
                      </a>
                  </div>
                  <div class="filtr-item col-sm-2" data-category="6" data-sort="white sample">
                      <a href="dist/img/e.jpg?text=2" data-toggle="lightbox" data-title="Event">
                        <img src="dist/img/e.jpg?text=2" class="img-fluid mb-2"/>
                      </a>
              </div>
              <div class="filtr-item col-sm-2" data-category="7" data-sort="white sample">
                      <a href="dist/img/s.jpg?text=1" data-toggle="lightbox" data-title="Event">  
                        <img src="dist/img/s.jpg?text=1" class="img-fluid mb-2" />
                      </a>
                    </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Ekko Lightbox -->
<script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Filterizr-->
<script src="plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Page specific script -->
  <script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

