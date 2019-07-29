@extends('templates.template_sela.master')
@section('content')

<section>
    <div class="container">
     {{Session::get('cart')}} 
        <div class="row">            
            <div class="col-sm-12 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            
                            <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                    <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    <div class="item">
                                    <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    <div class="item">
                                    <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    
                                </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev"
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="" width="100px" />
                            <h2>{{$detail->name}}</h2>
                            <img class="img-fluid" src="{{url('')}}/product/{{$detail->image}}"></a>
                            <br>
                            <p><b>Price : </b>Rp. {{number_format($detail->price)}}</p>
                            <p><b>Stock : </b>{{$detail->stock}}</p>
                            <p><b>Varian: </b>{{$detail->varian}}</p>
                            <img src="images/product-details/rating.png" alt="" />
                            <span>

                            <form method="POST" action='{{url("/cart/store")}}'>

                             @csrf
                                <label>Quantity:</label>
                                <input type="hidden" name="id" id="id" value='{{$detail->id}}' />
                                <input type="text" name="qty" id="qty" value='1'/>
                                <button type="submit" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"> Add to cart </i>
                                </button>
                               <!--  {{url('templates/template_sela/cart/$cart->id/update')}}   -->  
                            </span>
                            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                         </div><!--/product-information-->
                         </form>
                    </div>
                </div><!--/product-details-->
               
                
            </div>
        </div>
    </div>
</section>
@endsection
