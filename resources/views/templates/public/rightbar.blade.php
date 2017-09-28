<div class="col-md-3 single-right">
  <h3>Kiểu giày</h3>
  <ul class="product-categories">
    @foreach($arKieu as $arkieu)
    <?php 
    $nameslug = str_slug($arkieu->tenkieu);
    $url = route('public.giay.danhmuc',['slug' => $nameslug, 'id' => $arkieu->id]);
    ?>
    <li><a href="{{ $url }}">{{ $arkieu->tenkieu }}</a> </li>
    @endforeach
  </ul>

          <!-- <h3>Giá</h3>
          <ul class="product-categories p1">
            <li><a href="#">100.000đ-200.000đ</a> <span class="count">(14)</span></li>
            <li><a href="#">200.000đ-300.000đ</a> <span class="count">(14)</span></li>
            <li><a href="#">300.000đ-400.000đ</a> <span class="count">(14)</span></li>
            <li><a href="#">400.000đ-500.000đ</a> <span class="count">(14)</span></li>
            <li><a href="#">500.000đ-600.000đ</a> <span class="count">(14)</span></li>
          </ul> -->
</div>