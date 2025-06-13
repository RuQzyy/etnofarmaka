@extends("layouts.admin_template")

@section("content")
    <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon text-bg-primary shadow-sm">
            <i class="bi bi-cart-fill"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Obat</span>
            <span class="info-box-number">
              {{-- {{}} --}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <!-- /.col -->
      <!-- fix for small devices only -->
      <!-- <div class="clearfix hidden-md-up"></div> -->
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon text-bg-warning shadow-sm">
            <i class="fas fa-shopping-basket"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Pemesanan</span>
            {{-- <span class="info-box-number">{{}}</span> --}}
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection