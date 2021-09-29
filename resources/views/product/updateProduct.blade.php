<html>
    <style>
        .col-md-12{
            text-align: center;
            border: 0ch solid black;
            margin-top: 5%;

        }
    </style>
    <body>
        @if ($errors->any())
        <div class="alert alert-danger">

         <ul class="list-group">
             @foreach ($errors->all() as $error )
             {{ $error }}

             @endforeach
         </ul>
        </div>

        @endif
        <center><h3 style=" margin-top: 5%;">Update Product</h3></center>
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
                <div class="col-md-12">
                    <label class="form-group">Product Name:</label>
                    <input type="text" placeholder="Product Name" name="prod_name" value="{{ $product->product_name }}"><br><br>
                    <label class="form-group">Product Price:</label>
                    <input type="text" placeholder="Product Price" name="prod_price" value="{{ $product->product_price }}"><br><br>
                    <label class="form-group">Product Quantity:</label>
                    <input type="text" placeholder="Product Quantity" name="prod_qty" value="{{ $product->product_qty }}"><br><br>
                    <label class="form-group">Description:</label>
                    <input type="text" placeholder="Description" name="prod_desc" value="{{ $product->description }}" size="50%"><br><br>
                    <label class="form-group">Product Category:</label>
                    <input type="text" placeholder="Category" name="prod_ctgy" value="{{ $product->product_category }}"><br><br>
                    <img src="{{ asset("storage/{$product->path_image}") }}" width="80px" height="80px" alt="Image">
                    <div class="form-group">
                        <input type="file" name="image" placeholder="Choose image">
                    @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div><br>
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>

                </div>
        </form>
    </body>
</html>

