@include('templates.public.header')
<!--banner-starts-->
<div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <div class="banner-1"></div>
            </li>
            <li>
                <div class="banner-2"></div>
            </li>
            <li>
                <div class="banner-3"></div>
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<!--banner-ends--> 
<!--Slider-Starts-Here-->
<script src="{{ $publicUrl }}/js/responsiveslides.min.js"></script>
<script>
                // You can also use "$(window).load(function() {"
                $(function () {
                  // Slideshow 4
                  $("#slider4").responsiveSlides({
                    auto: true,
                    pager: true,
                    nav: false,
                    speed: 500,
                    namespace: "callbacks",
                    before: function () {
                      $('.events').append("<li>before event fired.</li>");
                  },
                  after: function () {
                      $('.events').append("<li>after event fired.</li>");
                  }
              });
                  
              });
          </script>
          <!--End-slider-script-->
          <!--start-shoes-->
          <!-- <div class="select-option"> -->
    <!-- <label>SẮP XẾP THEO :</label>
        <select class="select-pro">
            <option value="1">Sản phẩm nổi bật</option>
            <option value="2">Sản phẩm xem nhiều nhất</option>
        </select>
    </div>  -->
    <div class="shoes"> 
        <div class="container"> 
            <div class="product-one">
                @foreach($arItems as $arItem)
                <div class="col-md-3 product-left"> 
                    <div class="p-one simpleCart_shelfItem">
                        <?php 
                        $nameSlug = str_slug($arItem->tensp);
                        ?>
                        <a href="{{ route('public.giay.chitiet',['slug'=>$nameSlug,'id'=>$arItem->id]) }}">
                            @foreach($arHA as $arha)
                            @if($arItem->id == $arha['id_sp'])
                            <img src="{{ $publicfiles }}/{{ $arha->name }}" alt="" />
                            @break
                            @endif
                            
                            @endforeach
                            <div class="mask">
                                <span>Xem chi tiết</span>
                            </div>
                        </a>
                        <h4>{{ $arItem->tensp }}</h4>
                        <p><a class="item_add" href="#"><i></i> <span class=" item_price">{{ number_format($arItem->gia) }} VNĐ</span></a></p>
                        
                    </div>
                </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>
            {{ $arItems->links() }}
        </div>
    </div>
    
    @if(Session::has('msg'))
    <script type="text/javascript">alert('{{ Session::get("msg") }}');</script>
    @endif

    @include('templates.public.footer')  