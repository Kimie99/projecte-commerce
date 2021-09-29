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
        <center><h3 style=" margin-top: 5%;">Insert New Product</h3></center>
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="col-md-12">
                    <label class="form-group">Product Name:</label>
                    <input type="text" placeholder="Product Name" name="prod_name"><br><br>
                    <label class="form-group">Product Price:</label>
                    <input type="text" placeholder="Product Price" name="prod_price"><br><br>
                    <label class="form-group">Description:</label>
                    <input type="text" placeholder="Make a Description" name="prod_desc" size="50%;"><br><br>
                    <label class="form-group">Product Quantity:</label>
                    <input type="text" placeholder="Quantity Product" name="prod_qty"><br><br>
                    <label class="form-group">Product Category:</label>

                       <select name="prod_ctgy">
                       <option value="Clothes">Clothes</option>
                       <option value="Mobile">Mobile</option>
                       <option value="Watches">Watches</option>
                       <option value="Computer">Computer</option>
                       <option value="Shoes">Shoes</option>
                       <option value="Gaming & Console">Gaming & Console</option>
                       </select>
                       <br><br>
                    <label class="form-group">Product Image:</label>
                    <input type="file" name="image" placeholder="Choose image">
                    @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <br><br>
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    <a href="{{ route('product.trash') }}"> Trash</a>
                    <a href="{{ route('product.view') }}"> Product List</a>
                </div>
        </form>
    </body>
</html>

