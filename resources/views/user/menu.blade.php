
<html>
    <!-- Basic -->

    <head>
        <!-- Site Metas -->
        <title>Website | Shopee Ciplak Menu</title>
        <link rel="icon" type="image/ico" href="https://img.freepik.com/free-vector/letter-s-logo-vector_23987-138.jpg?size=338&ext=jpg"/>

    </head>
    <style>
        ul {
          list-style-type: none;
          overflow: hidden;
          background-color: rgb(228, 22, 142);
        }

        li {
          float: left;
        }

        li a {
          display: block;
          color: white;
          text-align: center;
          padding: 19px 17px;
          text-decoration: none;
        }

        li a:hover {
          background-color: #111;
        }
        image{

        }
        .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 20%;

        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        /* Add some padding inside the card container */
        .container {
        padding: 2px 16px;
        }
        /* description */
        #more {display: none;}
        </style>

    <body>
    {{-- header --}}
    <ul>
        <li><a href="#page-top"><img src="https://img.freepik.com/free-vector/letter-s-logo-vector_23987-138.jpg?size=338&ext=jpg" alt="logo" width="10%";height=10%;/></a></li>
        <li style="float: right;"><a href="#about">About</a></li>
        <li style="float: right;"><a href="#news">News</a></li>
        <li style="float: right;"><a href="#contact">Contact</a></li>
        <li style="float: right;"><a class="active" href="#home">Home</a></li>
    </ul>
    <form action="{{ route('product.search') }}" method="GET">
        <input type="text" name="search" required/>
        <button type="submit">Search</button>
    </form>
    {{-- item  --}}
    @foreach ($products as $product)
      <div class="card">
        <div class="image"><img src="{{ asset("storage/{$product->path_image}") }}" alt="Img" style="width:100%"></div>
        <div class="container">
          <h4><b>{{ $product->product_name }} </b></h4>
          <p><b>Category:</b> {{ $product->product_category }}<br><b>Price  :</b> RM{{ $product->product_price }}
          <br><b>Quantity:</b> {{ $product->product_qty }}</p>
          <p><b>Description:</b> {{ $product->description }}</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet,
             nulla et dictum interdum, nisi lorem egestas vitae scel<span id="dots">...</span>
             <span id="more">erisque enim ligula venenatis dolor. Maecenas nisl est, ultrices
             nec congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet.
             Nunc sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc
             venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida venenatis.
             Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh tempor porta.</span></p>

          <button onclick="myFunction()" id="myBtn">Read more</button></p>
        </div>
      </div>
    @endforeach


    </body>

    <script>
        function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
          dots.style.display = "inline";
          btnText.innerHTML = "Read more";
          moreText.style.display = "none";
        } else {
          dots.style.display = "none";
          btnText.innerHTML = "Read less";
          moreText.style.display = "inline";
        }
      }


    </script>

</html>



