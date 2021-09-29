<html>
    <body>
        <table>
            @foreach ($products as $product)
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image Item</th>


            </tr>
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_price }}</td>
                <td>{{ $product->product_category }}</td>
                <td><img src="{{ asset("storage/{$product->path_image}") }}" width="80px" height="80px" alt="Image"></td>
                {{-- Delete Permanent --}}
                @if ($product->trashed())
                {!! Form::open(['route' => ['product.delete', $product->id], 'method'=> 'post']) !!}
                <td> {!! Form::button('Delete', ['type'=> 'submit','onclick' => "return confirm('Anda Betul-Betul Pasti 100% Untuk Hapuskan')"]) !!}</td>
                {!! Form::close() !!}
                @endif

                {{-- Restore --}}
                @if ($product->trashed())
                {!! Form::open(['route' => ['product.restore', $product->id], 'method'=> 'post']) !!}
                <td> {!! Form::button('Restore', ['type'=> 'submit','onclick' => "return confirm('Anda Betul-Betul Pasti 100% Untuk Kembalikan')"]) !!}</td>
                {!! Form::close() !!}
                @endif


            </tr>
            @endforeach

        </table>


    </body>

</html>
